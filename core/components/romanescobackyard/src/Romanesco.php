<?php
/**
 * @package romanescobackyard
 * @subpackage classfile
 */

namespace FractalFarming\Romanesco;

use MODX\Revolution\modX;
use MODX\Revolution\Sources\modMediaSource;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Spatie\SchemaOrg\Schema;
use Spatie\SchemaOrg\Graph;
use CssLint\Linter;
use Jcupitt\Vips\Image;

//use FractalFarming\Romanesco\Model\CrossLink;
//use FractalFarming\Romanesco\Model\ExternalLink;
//use FractalFarming\Romanesco\Model\Option;
//use FractalFarming\Romanesco\Model\OptionGroup;
//use FractalFarming\Romanesco\Model\SocialConnect;
//use FractalFarming\Romanesco\Model\SocialShare;
//use FractalFarming\Romanesco\Model\Task;
//use FractalFarming\Romanesco\Model\TaskComment;

class Romanesco
{
    /** @var modX $modx */
    public modX $modx;

    /** @var string $namespace */
    public $namespace = 'romanescobackyard';

    /** @var array $config */
    public $config = [];

    /** @var Graph|null $structuredData */
    public ?Graph $structuredData;

    /** @var array $schemaOptions */
    private $schemaOptions = null;

    /** @var array $mediaSources */
    private $mediaSources = [];

    function __construct(modX &$modx, array $config = [])
    {
        $this->modx =& $modx;
        $this->namespace = $this->getOption('namespace', $config, $this->namespace);

        $corePath = $this->getOption('core_path', $config, $this->modx->getOption('core_path', null, MODX_CORE_PATH) . 'components/' . $this->namespace . '/');
        $assetsPath = $this->getOption('assets_path', $config, $this->modx->getOption('assets_path', null, MODX_ASSETS_PATH) . 'components/' . $this->namespace . '/');
        $assetsUrl = $this->getOption('assets_url', $config, $this->modx->getOption('assets_url', null, MODX_ASSETS_URL) . 'components/' . $this->namespace . '/');

        $this->config = array_merge([
            'namespace' => $this->namespace,
            'corePath' => $corePath,
            'modelPath' => $corePath . 'src/Model/',
            'vendorPath' => $corePath . 'vendor/',
            'chunksPath' => $corePath . 'elements/chunks/',
            'snippetsPath' => $corePath . 'elements/snippets/',
            'pluginsPath' => $corePath . 'elements/plugins/',
            'controllersPath' => $corePath . 'src/Controllers/',
            'processorsPath' => $corePath . 'src/Processors/',
            'templatesPath' => $corePath . 'templates/',
            'cachePath' => $this->modx->getOption('core_path') . 'cache/',
            'assetsPath' => $assetsPath,
            'assetsUrl' => $assetsUrl,
            'jsUrl' => $assetsUrl . 'js/',
            'cssUrl' => $assetsUrl . 'css/',
            'imagesUrl' => $assetsUrl . 'img/',
            'connectorUrl' => $assetsUrl . 'connector.php'
        ], $config);

        // Collect structured data in central graph object
        if (class_exists('Spatie\SchemaOrg\Graph')) {
            $this->structuredData = new Graph();
        }
    }

    /**
     * Get a local configuration option or a namespaced system setting by key.
     *
     * @param string $key The option key to search for.
     * @param array $options An array of options that override local options.
     * @param mixed $default The default value returned if the option is not found locally or as a
     * namespaced system setting; by default this value is null.
     *
     * @return mixed The option value or the default value specified.
     */
    public function getOption(string $key, $options = [], $default = null)
    {
        $option = $default;
        if (!empty($key) && is_string($key)) {
            if ($options != null && array_key_exists($key, $options)) {
                $option = $options[$key];
            } elseif (array_key_exists($key, $this->config)) {
                $option = $this->config[$key];
            } elseif (array_key_exists("{$this->namespace}.{$key}", $this->modx->config)) {
                $option = $this->modx->getOption("{$this->namespace}.{$key}");
            }
        }
        return $option;
    }

    /**
     * Look for a key in a multidimensional array.
     *
     * @param array $haystack
     * @param string $needle
     * @return array
     */
    public function recursiveArraySearch(array $haystack, string $needle): array
    {
        $result = [];
        $iterator  = new \RecursiveArrayIterator($haystack);
        $recursive = new \RecursiveIteratorIterator(
            $iterator,
            \RecursiveIteratorIterator::SELF_FIRST
        );
        foreach ($recursive as $key => $value) {
            if ($key === $needle) {
                $result[] = $value;
            }
        }
        return $result;
    }

    /**
     * Get path from media source object.
     *
     * Returns relative path (to site root) if optional $path parameter is set.
     * Returns absolute path (from server root) by default.
     *
     * @param int $sourceId
     * @param string $path
     * @return string
     */
    public function getMediaSourcePath(int $sourceId = 1, string $path = ''): string
    {
        // Return cached instance if already initialized
        if (isset($this->mediaSources[$sourceId])) {
            $source = $this->mediaSources[$sourceId];
            return $path ? $source->prepareOutputUrl($path) : $source->getBasePath();
        }
        $isMODX3 = $this->modx->getVersionData()['version'] >= 3;
        $sourceClass = $isMODX3 ? modMediaSource::class : 'sources.modMediaSource';

        /** @var modMediaSource|null $source */
        $source = $this->modx->getObject($sourceClass, $sourceId);

        if ($source) {
            $source->initialize();
            $this->mediaSources[$sourceId] = $source;
            return $path ? $source->prepareOutputUrl($path) : $source->getBasePath();
        }

        return '';
    }

    /**
     * Array with common properties for use in structured data.
     *
     * @param array $additionalOptions
     * @return array
     */
    public function getSchemaOptions(array $additionalOptions = []): array
    {
        if ($this->schemaOptions === null) {
            $this->schemaOptions = [];
        }
        return array_merge($this->schemaOptions, $additionalOptions);
    }

    /**
     * Update the entire array of schema options.
     *
     * @param array $options
     * @return void
     */
    public function setSchemaOptions(array $options = []): void
    {
        // Initialize if needed
        if ($this->schemaOptions === null) {
            $this->getSchemaOptions();
        }
        $this->schemaOptions = $options;
    }

    /**
     * Add or update a single schema option.
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function setSchemaOption(string $key, mixed $value): void
    {
        // Initialize if needed
        if ($this->schemaOptions === null) {
            $this->getSchemaOptions();
        }
        $this->schemaOptions[$key] = $value;
    }

    /**
     * Custom context settings are not always picked up by chunks and snippets
     * because (unlike native MODX settings) they are not automatically
     * initialized.
     *
     * This function mimics the default MODX behaviour: it checks the context
     * settings first and falls back on the system setting if nothing was found.
     *
     * @param string $setting
     * @param string $contextKey
     * @param string $default
     * @return string
     */
    public function getContextSetting(string $setting, string $contextKey, string $default = ''): string
    {
        $contextSetting = $this->modx->getObject('modContextSetting', [
            'context_key' => $contextKey,
            'key' => $setting
        ]);

        if ($contextSetting) {
            return $contextSetting->get('value');
        }

        $systemSetting = $this->modx->getObject('modSystemSetting', [
            'key' => $setting
        ]);

        if ($systemSetting) {
            return $systemSetting->get('value');
        }

        return $default;
    }

    /**
     * Context aware retrieval of a Configuration (ClientConfig) setting.
     *
     * @param string $setting
     * @param string $contextKey
     * @param string $default
     * @return string
     */
    public function getConfigSetting(string $setting, string $contextKey = '', string $default = ''): string
    {
        // Get the global setting first
        $cgSetting = $this->modx->getObject('cgSetting', ['key' => $setting]);

        // If ClientConfig is context aware, dig deeper for a context setting
        if (is_object($cgSetting) && $contextKey && $this->modx->getOption('clientconfig.context_aware')) {
            $cgContextValue = $this->modx->getObject('cgContextValue', ['setting' => $cgSetting->get('id'), 'context' => $contextKey]);

            if (is_object($cgContextValue)) {
                return $cgContextValue->get('value');
            } else {
                return $cgSetting->get('value');
            }
        }

        // Contexts are disabled, return global setting
        if (is_object($cgSetting)) {
            return $cgSetting->get('value');
        }

        // We're in trouble now...
        $this->modx->log(modX::LOG_LEVEL_ERROR, "[Romanesco] Setting $setting not found!");

        return $default;
    }

    /**
     * Generate theme.variables file based on Presentation settings.
     *
     * @param array $settings
     * @param string $context
     * @return bool
     */
    public function generateThemeVariables(array $settings = [], string $context = ''): bool
    {
        // Set theme.variables path for current context
        $themesFolder = $this->modx->getOption('base_path') . 'assets/semantic/src/themes/';
        if ($context) {
            $themeVariablesPath = $themesFolder . $context . '/globals/theme.variables';
        } else {
            $themeVariablesPath = $themesFolder . 'project/globals/theme.variables';
        }

        // Write to theme.variables
        $pathInfo = pathinfo($themeVariablesPath);
        $path = $pathInfo['dirname'];
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        file_put_contents(
            $themeVariablesPath,
            $this->modx->getChunk('themeVariables', $settings)
        );

        return true;
    }

    /**
     * Generate CSS for given context.
     *
     * @param string $context
     * @param bool $bumpVersion
     * @return bool
     */
    public function generateCustomCSS(string $context = '', bool $bumpVersion = false): bool
    {
        // Construct build command
        $gulpFile = escapeshellcmd($this->modx->getOption('assets_path')) . 'components/romanescobackyard/js/gulp/generate-multicontext-css.js';

        if ($context) {
            $distPath = $this->modx->getObject('modContextSetting', [
                'context_key' => $context,
                'key' => 'romanesco.semantic_dist_path'
            ]);
            if (!is_object($distPath)) {
                $this->modx->log(modX::LOG_LEVEL_ERROR, "Could not find semantic_dist_path setting for context: $context.");
                return false;
            }
            $cmd = [
                'gulp', 'build-context',
                '--gulpfile', $gulpFile,
                '--key', $context,
                '--dist', $this->modx->getOption('base_path') . $distPath->get('value')
            ];
        }
        else {
            $cmd = [
                'gulp', 'build-css',
                '--gulpfile', $gulpFile,
            ];
        }

        // Start Symfony process
        $this->runCommand($cmd, 'css.log');

        // Bump CSS version number to force refresh
        if ($bumpVersion) {
            $this->bumpVersionNumber();
        }

        return true;
    }

    /**
     * Generate critical CSS for a given page.
     *
     * @param array $settings
     * @return bool
     */
    public function generateCriticalCSS(array $settings = []): bool
    {
        $cmd = [
            'gulp', 'critical',
            '--src', $settings['url'],
            '--dest', $this->modx->getOption('base_path') . rtrim($settings['criticalPath'],'/') . '/' . rtrim($settings['uri'],'/') . '.css',
            '--basePath', $this->modx->getOption('base_path'),
            '--cssPaths', rtrim($settings['distPath'],'/') . '/semantic.css',
            '--cssPaths', rtrim($settings['distPath'],'/') . '/components/form.css',
            '--cssPaths', rtrim($settings['distPath'],'/') . '/components/checkbox.css',
            '--cssPaths', rtrim($settings['distPath'],'/') . '/components/dropdown.css',
            '--cssPaths', rtrim($settings['distPath'],'/') . '/components/tab.css',
            '--cssPaths', rtrim($settings['distPath'],'/') . '/components/icon.css',
            '--cssPaths', rtrim($settings['distPath'],'/') . '/components/step.css',
            '--cssPaths', rtrim($settings['distPath'],'/') . '/components/flag.css',
            '--cssPaths', rtrim($settings['cssPathSemantic'],'/') . '/backgrounds.css',
            '--cssPaths', rtrim($settings['cssPathCustom'],'/') . '/site.css',
            '--user', escapeshellcmd($this->modx->getOption('romanesco.htpasswd_user')) ?: 'undefined',
            '--pass', escapeshellcmd($this->modx->getOption('romanesco.htpasswd_pass')) ?: 'undefined',
            '--devMode', $this->modx->getOption('romanesco.dev_mode'),
            '--gulpfile', escapeshellcmd($this->modx->getOption('assets_path')) . 'components/romanescobackyard/js/gulp/generate-critical-css.mjs'
        ];

        // Start Symfony process
        $this->runCommand($cmd, 'critical.log');

        return true;
    }

    /**
     * Generate static CSS file with global backgrounds.
     *
     * A generic site.css will be created in the default location, containing
     * the backgrounds in the Global Backgrounds container. If there are child
     * containers present under this resource, a separate file will be generated
     * for this context in a sub folder.
     *
     * @return bool
     */
    public function generateBackgroundCSS(): bool
    {
        // Get all background containers
        $bgContainers = $this->modx->getCollection('modResource', array(
            'parent' => $this->modx->getOption('romanesco.global_backgrounds_id'),
            'template' => 8
        ));

        // Get chunk with CSS template
        if ($this->modx->getObject('modChunk', array('name' => 'cssTheme'))) {
            $cssChunk = 'cssTheme';
        } else {
            $cssChunk = 'css';
        }

        // Get default CSS path
        $cssPathSystem = $this->modx->getOption('romanesco.custom_css_path');
        if ($cssPathSystem) {
            $cssPathDefault = $this->modx->getOption('base_path') . $cssPathSystem;
        } else {
            $cssPathDefault = $this->modx->getOption('base_path') . 'assets/css';
        }

        // Set file content and path
        $css = $this->modx->getChunk($cssChunk);
        $staticFile = $cssPathDefault . '/site.css';

        // Validate all CSS
        $cssLinter = new Linter();
        $lintResult = $cssLinter->lintString($css);
        $errors = [];
        foreach ($lintResult as $error) {
            $errors[] = $error->__toString();
        }
        if ($errors) {
            $this->modx->log(modX::LOG_LEVEL_ERROR,"\nCSS is not valid and will not be generated at $staticFile:\n" . implode("\n", $errors));
            return true;
        }

        // Generate CSS file
        if (!$this->modx->cacheManager->writeFile($staticFile, $css)) {
            $this->modx->log(modX::LOG_LEVEL_ERROR, "Error writing CSS to static file {$staticFile}", '', __FUNCTION__, __FILE__, __LINE__);
        }

        // Start collecting CSS paths for minification down the road
        $minifyCSS[] = $cssPathDefault;

        // Each container represents a context
        foreach ($bgContainers as $container) {
            $context = $container->get('alias');

            // Find correct file path for this context
            $cssPathContext = $this->modx->getObject('modContextSetting', array(
                'context_key' => $context,
                'key' => 'romanesco.custom_css_path'
            ));
            if ($cssPathContext) {
                $cssPath = $this->modx->getOption('base_path') . $cssPathContext->get('value');
            } else {
                $cssPath = $cssPathDefault . '/' . $context;
            }

            // Prepare CSS for this context
            $css = $this->modx->getChunk($cssChunk, array(
                'context' => $context,
            ));
            $staticFile = $cssPath . '/site.css';

            // Validate CSS
            $lintResult = $cssLinter->lintString($css);
            $errors = [];
            foreach ($lintResult as $error) {
                $errors[] = $error->__toString();
            }
            if ($errors) {
                $this->modx->log(modX::LOG_LEVEL_ERROR,"\nCSS is not valid and will not be generated at $staticFile:\n" . implode("\n", $errors));
                continue;
            }

            // Generate CSS file
            if (!$this->modx->cacheManager->writeFile($staticFile, $css)) {
                $this->modx->log(modX::LOG_LEVEL_ERROR, "Error writing CSS to static file {$staticFile}", '', __FUNCTION__, __FILE__, __LINE__);
            }

            // Sign up for minification
            $minifyCSS[] = $cssPath;
        }

        // Minify CSS (run as snippet, so it can be scheduled)
        foreach ($minifyCSS as $path) {
            $this->modx->runSnippet('minifyCSS', ['css_path' => $path]);
        }

        return true;
    }

    /**
     * Minify given CSS file with Gulp.
     *
     * @param string $path
     * @return bool
     */
    public function minifyCSS(string $path): bool
    {
        $cmd = [
            'gulp', 'minify-css',
            '--path', $path,
            '--gulpfile', escapeshellcmd($this->modx->getOption('assets_path')) . 'components/romanescobackyard/js/gulp/minify-css.js'
        ];

        // Start Symfony process
        $this->runCommand($cmd);

        return true;
    }

    /**
     * Generate favicons for given context using Vips and ImageMagick.
     *
     * @param array $settings
     * @return bool
     */
    public function generateFavicons(array $settings = []): bool
    {
        // Get source image path
        $sourcePath = $this->modx->getOption('base_path') . $settings['logo_badge_path'];
        $sourcePath = str_replace('//', '/', $sourcePath);

        if (!file_exists($sourcePath)) {
            $this->modx->log(modX::LOG_LEVEL_ERROR, "Source image not found: $sourcePath");
            return false;
        }

        // Determine output directory
        $outputDir = MODX_BASE_PATH . $this->modx->getOption('romanesco.favicon_path', null, 'assets/favicons/');
        $outputDir = rtrim($outputDir, '/') . '/';
        if (!is_dir($outputDir)) {
            mkdir($outputDir, 0750, true);
        }

        // Detect source format
        $extension = strtolower(pathinfo($sourcePath, PATHINFO_EXTENSION));
        $sourceFormat = in_array($extension, ['png', 'svg']) ? $extension : 'png';

        // Set image options
        $thumbOptions = [
            'Q' => 95,  // High quality for PNG
            'compression' => 6  // Balanced compression
        ];

        // Load image with Vips
        try {
            if ($sourceFormat === 'svg') {
                // For SVG, load with high quality settings
                $image = Image::newFromFile($sourcePath, [
                    'unlimited' => true,
                    'dpi' => 300,  // High DPI for better quality
                    'scale' => 1   // Don't auto-scale
                ]);

                // Copy SVG to favicons folder
                // @todo: sanitize
                copy($sourcePath, $outputDir . 'icon.svg');
            } else {
                $image = Image::newFromFile($sourcePath);
            }
        } catch (\Exception $e) {
            $this->modx->log(modX::LOG_LEVEL_ERROR, "Failed to load image with Vips: " . $e->getMessage());
            return false;
        }

        // Generate PNG icons
        try {
            $resized = $image->thumbnail_image(180, ['height' => 180]);
            $resized->writeToFile($outputDir . 'apple-touch-icon.png', $thumbOptions);
            $resized = $image->thumbnail_image(96, ['height' => 96]);
            $resized->writeToFile($outputDir . 'icon-96.png', $thumbOptions);
            $resized = $image->thumbnail_image(192, ['height' => 192]);
            $resized->writeToFile($outputDir . 'icon-192.png', $thumbOptions);
            $resized = $image->thumbnail_image(512, ['height' => 512]);
            $resized->writeToFile($outputDir . 'icon-512.png', $thumbOptions);
        } catch (\Exception $e) {
            $this->modx->log(modX::LOG_LEVEL_ERROR, "Failed to generate PNG icons: " . $e->getMessage());
        }

        // Generate 512x512 mask image (with safe margins)
        try {
            // Resize source to 409x409
            $resized = $image->thumbnail_image(409, [
                'height' => 409,
            ]);

            // Add alpha channel if needed
            if ($resized->bands < 4) {
                $resized = $resized->addalpha();
            }

            // Embed the 409x409 image in a 512x512 canvas with transparent margins
            $result = $resized->embed(51, 51, 512, 512, ['extend' => 'background']);
            $result->writeToFile($outputDir . 'icon-mask-512.png', $thumbOptions);
        } catch (\Exception $e) {
            $this->modx->log(modX::LOG_LEVEL_ERROR, "Failed to generate icon-mask-512.png: " . $e->getMessage());
        }

        // Generate favicon.ico (in root, for maximum compatibility)
        try {
            $icoPath = MODX_BASE_PATH . 'favicon.ico';
            $tempPng = [
                '16' => $outputDir . 'temp_ico_16.png',
                '32' => $outputDir . 'temp_ico_32.png',
                '48' => $outputDir . 'temp_ico_48.png'
            ];

            // Create temporary PNGs
            $resized = $image->thumbnail_image(16, ['height' => 16]);
            $resized->writeToFile($tempPng['16'], $thumbOptions);
            $resized = $image->thumbnail_image(32, ['height' => 32]);
            $resized->writeToFile($tempPng['32'], $thumbOptions);
            $resized = $image->thumbnail_image(48, ['height' => 48]);
            $resized->writeToFile($tempPng['48'], $thumbOptions);

            // Concatenate into ico using ImageMagick
            $cmd = [
                'magick',
                $tempPng['48'],
                $tempPng['32'],
                $tempPng['16'],
                '-colorspace', 'sRGB',
                '-depth', '8',
                $icoPath
            ];
            $this->runCommand($cmd);

            // Clean up temporary files
            foreach ($tempPng as $file) {
                if (file_exists($file)) {
                    unlink($file);
                }
            }
        } catch (\Exception $e) {
            $this->modx->log(modX::LOG_LEVEL_ERROR, "Failed to generate favicon.ico: " . $e->getMessage());
        }

        // Generate or update site.webmanifest
        $manifestPath = MODX_BASE_PATH . 'site.webmanifest';
        $siteName = $this->modx->getOption('site_name');
        $themeColor = $this->getConfigSetting('theme_color_primary');
        $bgColor = $this->getConfigSetting('theme_page_background_color');

        $manifest = [
            'name' => $siteName,
            'short_name' => $siteName,
            'start_url' => '/',
            'display' => 'standalone',
            'background_color' => $bgColor,
            'theme_color' => $themeColor,
            'icons' => [
                [
                    'src' => '/assets/favicons/icon-192.png',
                    'sizes' => '192x192',
                    'type' => 'image/png'
                ],
                [
                    'src' => '/assets/favicons/icon-mask-512.png',
                    'sizes' => '512x512',
                    'type' => 'image/png',
                    'purpose' => 'maskable'
                ],
                [
                    'src' => '/assets/favicons/icon-512.png',
                    'sizes' => '512x512',
                    'type' => 'image/png'
                ]
            ]
        ];

        // Check if manifest exists and merge icons if it does
        if (file_exists($manifestPath)) {
            $existingManifest = json_decode(file_get_contents($manifestPath), true);
            if ($existingManifest) {
                // Preserve existing non-icon properties
                foreach ($existingManifest as $key => $value) {
                    if ($key !== 'icons') {
                        $manifest[$key] = $value;
                    }
                }
            }
        }

        file_put_contents($manifestPath, json_encode($manifest, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        // Bump favicon version number to force refresh
        $version = $this->modx->getObject('modSystemSetting', ['key' => 'romanesco.favicon_version']);
        if ($version) {
            $currentValue = (float) $version->get('value');
            $version->set('value', $currentValue + 0.1);
            $version->save();
        } else {
            $this->modx->log(modX::LOG_LEVEL_ERROR, 'Could not find favicon_version setting');
        }

        // Log success as error (so we can celebrate more)
        $this->modx->log(modX::LOG_LEVEL_ERROR, "Successfully generated favicons");

        return true;
    }

    /**
     * Bump semantic version number to force refresh in browser.
     *
     * @param string $type Asset type can be either CSS or JS. Defaults to CSS.
     * @return void
     */
    public function bumpVersionNumber(string $type = 'CSS') : void
    {
        switch ($type) {
            case 'JS':
                $version = $this->modx->getObject('modSystemSetting', ['key' => 'romanesco.assets_version_js']);
                break;
            default:
                $version = $this->modx->getObject('modSystemSetting', ['key' => 'romanesco.assets_version_css']);
        }

        if (is_object($version))
        {
            // Only update minor version number (1.0.1<--)
            $versionArray = explode('.', $version->get('value'));
            $versionMinor = array_pop($versionArray);
            $versionArray[] = $versionMinor + 1;

            $version->set('value', implode('.', $versionArray));
            $version->save();
        } else {
            $setting = 'romanesco.assets_version_'. strtolower($type);
            $this->modx->log(modX::LOG_LEVEL_ERROR, "Could not find $setting setting");
        }
    }

    /**
     * Inject version number into assets path, to force browsers to refresh their cache.
     *
     * @param string $type
     * @return string
     */
    public function getCacheBustingString(string $type): string
    {
        if (!in_array(strtolower($type),['css','js'])) return '';

        try {
            if ($this->modx->getObject('cgSetting', ['key' => 'cache_buster'])->get('value') == 1) {
                return '.' . str_replace('.', '', $this->modx->getOption('romanesco.assets_version_' . strtolower($type)));
            }
            return '';
        }
        catch (\Error $e) {
            $this->modx->log(modX::LOG_LEVEL_ERROR, $e);
            return '';
        }
    }

    /**
     * Run command outside MODX with Symfony Process
     *
     * @param array $cmd Format the command as an array, with each argument as a separate value.
     * @param string|null $logFile Write standard output to log file (optional). All errors are written to error log.
     * @return void
     */
    public function runCommand(array $cmd, string $logFile = null): void
    {
        // Set environment PATH (needs to be added as a system setting)
        // Preserve symlinks for development installations (using GPM packages)
        $env = [
            'PATH' => (string)$this->modx->getOption('romanesco.env_path'),
            'NODE_PRESERVE_SYMLINKS' => (int)$this->modx->getOption('romanesco.dev_mode'),
        ];

        // Run, Forrest!
        $process = new Process($cmd, MODX_BASE_PATH, $env);
        $process->run();

        // After command is finished
        if (!$process->isSuccessful()) {
            $error = new ProcessFailedException($process);
            $this->modx->log(modX::LOG_LEVEL_ERROR, "\n" . $error);
            return;
        }

        // Log standard output to file or error log
        $output = $process->getOutput();

        if ($logFile) {
            $logFile = MODX_CORE_PATH . 'cache/logs/' . $logFile;
            $date = new \DateTime();
            $date = $date->format("Y-m-d H:i:s");
            file_put_contents($logFile, "[$date] $output", FILE_APPEND);
        } else {
            $this->modx->log(modX::LOG_LEVEL_INFO, "\n" . $output);
        }
    }
}
