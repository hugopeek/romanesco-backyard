# Changelog for Romanesco Backyard

## Backyard 1.0.0-beta24
Released on ...

- Add category field to cross-link and external link objects

## Backyard 1.0.0-beta23
Released on March 23, 2025

- Update configuration for RealFaviconGenerator Gulp task
- Collect structured data in central graph object (inside base class)
- Add schema.org generator with Composer

## Backyard 1.0.0-beta22
Released on February 28, 2025

- Add search to Tasks grid
- Allow Tasks to be attached to objects other than resource
- Allow social connections to be attached to objects other than resource
- Tweak lexicon keys for Global Content top menu
- Stop using extension package to autoload base class
- Evaluate widest breakpoint when generating critical CSS (1920px)
- Provide base path for critical CSS snippet upfront

## Backyard 1.0.0-beta21
Released on January 3, 2025

- Add menu item for clearing SVG cache
- Set minimum PHP version to 8.1
- Update Composer dependencies
- Fix floated icons messing up each others positions in MIGX grids

## Backyard 1.0.0-beta20
Released on August 6, 2024

- Run Critical gulp task as ESM module (requires critical > v5)
- Remove NPM gulp-clean dependency (use del module instead)

## Backyard 1.0.0-beta19
Released on April 25, 2024

- Add internal task runner based on Symfony Process (WIP)
- Add lexicon strings for backend form validation
- Style HTML headings in MIGX grid row actions
- Tweak select dropdowns that contain a description

## Backyard 1.0.0-beta18
Released on December 20, 2023

- Add Collections renderer for displaying TV values as list
- Add scrollbar to tall resource lists in Collection views
- Add lexicon strings for video embed consent messages

## Backyard 1.0.0-beta17
Released on November 13, 2023

- Modify lexicon strings of Qredits component
- Include CSS of individual components when assessing critical CSS
- Use separate setting for critical CSS path
- Add lexicon keys for overview filters

## Backyard 1.0.0-beta16
Released on October 8, 2023

- Set minimum PHP version to 8.0
- Update internal FUI styling to 2.9.3
- Update Composer dependencies
- Update composer.phar to 2.5.8
- Add lexicon keys for image alt fallback text
- Make search field smaller in MIGX TV grids
- Avoid horizontal scrollbars in MIGX modals with nested grid
- Show thumbnail next to selector after selecting image
- Replace updated combo box value with ghost element
- Remove HTML from selected value in combo boxes
- Include PHPStan via Composer
- Add styling for right floated icons in MIGX grids
- Add search field to input options grid
- Add new input option groups through modal
- Don't show soft deleted input options in grid

## Backyard 1.0.0-beta15
Released on April 8, 2023

- Update internal FUI styling to 2.9.3 nightly
- Better placeholder for other option fields
- Check if semantic_dist_path context setting exists before building custom CSS

## Backyard 1.0.0-beta14
Released on February 1, 2023

- Require Composer php-vips package

## Backyard 1.0.0-beta13
Released on December 1, 2022

- Improve clearing of custom cache
- Rename Tool Shed to Project Data

## Backyard 1.0.0-beta12
Released on October 30, 2022

- Update internal FUI styling to 2.9.0
- Rename shell_path setting to env_path

## Backyard 1.0.0-beta11
Released on September 12, 2022

- Add missing resolver for extension package
- Replace exec commands with Symfony processes
- Add function to minify CSS
- Add function to generate background CSS

## Backyard 1.0.0-beta10
Released on July 18, 2022

- Rename todo and doing SVG icons
- Autoload Romanesco base class with Composer
- Add HtmlPageDom package as dependency
- Auto install Composer dependencies during package installation
- Use Composer for installing dependencies
- Fix mini repeater layout in custom CB stylesheet

## Backyard 1.0.0-beta9
Released on May 24, 2022

- Disable resolver with getPage corrections
- Remove content_repurpose table + grid [BC]
- Use tasks table for project timeline entries [BC]
- Combine notes, issues and improvements into tasks table [BC]
- Add social_sharing table + grid
- Add social_connections table + grid
- Wait for favicon process to finish before returning
- Set default favicon variables after checking command line argument, not before
- Accept custom dist path for generate-favicons task
- Add option to hide advanced CB features in manager
- Fix alternative field positioning in global backgrounds CB
- Sort input options by position in group view

## Backyard 1.0.0-beta8
Released on November 19, 2021

- Add resolver for syncing database changes
- Remove unnecessary migx_id and pos values in MIGX configs
- Fix aggregate keys for Author in schema (don't use alias field!)
- Improve data formatting and descriptions in Related Content grids
- Change sort order of Input Options with drag&drop [BC]
- Add database table and MIGX grid for external links
- Add lexicon keys for feedback widget

## Backyard 1.0.0-beta7
Released on October 21, 2021

- Add lexicon keys for frontend form validation

## Backyard 1.0.0-beta6
Released on August 30, 2021

- Add custom cache partition for patterns
- Fix clearing of individual custom cache partitions
- Set non-empty default values for htpasswd user and pass
- Remove minify parameter from critical task (was removed in 4.0)

## Backyard 1.0.0-beta5
Released on June 10, 2021

- Add option to generate critical CSS for pages behind htpasswd wall
- Replace hardcoded Fibonacci input values with generated ones

## Backyard 1.0.0-beta4
Released on April 19, 2021

- Prevent critical CSS generator from messing up data urls
- Add public function to get cache busting string
- Fix variables in Collection renderers
- Fix incorrect reference to permissions key in menu config

## Backyard 1.0.0-beta3
Released on February 8, 2021

- Add auto-generated front-end pattern library
- Add top menu items for clearing custom cache
- Update lexicon keys for footer credits
- Add boolean editor and renderer for indicating hidemenu status in Collections
- Remove additional top margin on first CB repeater row
- Add custom formatting and CSS for Redactor v3
- Allow getConfigSetting function to run without context key

## Backyard 1.0.0-beta2
Released on September 4, 2020

- Add option to generate critical CSS in sequence
- Add function to retrieve custom context setting
- Add function to retrieve context aware Configuration setting

## Backyard 1.0.0-beta1
Released on August 27, 2020

- Add function to generate critical CSS to Romanesco class
- Add Gulp task for generating critical CSS

## Backyard 0.11.4
Released on July 1, 2020

- Add Gulp task for minifying CSS
- Fix asynchronous callback for Gulp generate-favicon task
- Force Gulp clean task when generating CSS per context

## Backyard 0.11.3
Released on June 15, 2020

- Apply minimal styling to Redactor instances in narrower columns
- Modify Collections image renderer to only accept absolute path
- Add Gulp configuration for generating CSS per context
- Update Jquery to v3.5.1
- Add custom combobox to Collections that stores 1 and 0 values correctly

## Backyard 0.11.2
Released on April 27, 2020

- Show option group IDs in MIGX grid
- Add FAQ category to input options

## Backyard 0.11.1
Released on April 20, 2020

- Add more custom CB icons
- Change menu index of tool shed in top menu
- New lexicon keys for articles

## Backyard 0.11.0
Released on March 30, 2020

- Reduce file size of manager preview CSS by removing colors and form styles
- Remove Google+ keys
- Remove duplicate status grid keys
- Fix broken social connect keys for organizations in Dutch lexicon
- Add missing keys to Dutch lexicons
- Add lexicon keys for email footer and share button
- Add lexicon key share_this_short
- Remove margin top in 2-column ContentBlocks modals

## Backyard 0.10.2
Released on January 14, 2020

- Add lexicon keys for pagination elements
- Prevent CB Add field / Add layout modals to be split into 2 columns

## Backyard 0.10.1
Released on December 17, 2019

- Add Collections renderer for handling booleans as 0/1
- Divide CB modals with a lot of settings into 2 columns

## Backyard 0.10.0
Released on November 19, 2019

- Add global Romanesco class
- Add lexicon keys for Global Backgrounds
- Disable 'Add item' in deprecated Global Backgrounds MIGX TV
- Adjust repeater layout of Global Background fields
- Update SUI styling for CB previews
- Correct media source of global background SVGs
- Show IDs of input options in grid

## Backyard 0.9.2
Released on May 22, 2019

- Improve styling of CB mini repeaters
- Load tool shed menu title with lexicon

## Backyard 0.9.1
Released on February 10, 2019

- Load Semantic UI styles inside CB preview containers

## Backyard 0.9.0
Released on January 21, 2019

- Remove all resources from package (due to update issues)
- Backup resourcemap.php before running installer

## Backyard 0.8.0
Released on January 17, 2019

- Enable 3-level dropdowns in Backyard navigation
- Add Kanban view for tracking page progress
- Update status icons and lexicon keys
- Change template to BasicDetailToC on pattern pages
- Add latest Electrons to front-end library

## Backyard 0.7.0
Released on November 15, 2018

- Add database schema for new Romanesco components
    - Timeline
    - Project timeline
    - Notes
    - Issues
    - Content improvements
    - Crosslinks
    - Related content
    - Re-purpose content
    - Input options
    - Input option groups
- Add MIGX configs for managing data in TVs and CMPs
- Add resolver to load default set of input options
- Build config file with PHP instead of Grunt

## Backyard 0.6.0
Released on July 27, 2018

- Remove popup examples with MODX code from pattern library

## Backyard 0.5.1
Released on January 16, 2018

- Add resource with CSS theme variables
- Add gulp task for generating favicons
- Add basic contact form

## Backyard 0.5.0
Released on December 19, 2017

- Import assets folder from Romanesco Soil repository
- Assign resource IDs to corresponding system settings after installation

## Backyard 0.4.2
Released on November 21, 2017

- Include content_type in resource configs (fixes undefined index PHP warnings)

## Backyard 0.4.1
Released on November 21, 2017

- Update resolver to fix installation issues

## Backyard 0.4.0
Released on July 25, 2017

- Add Tutorials and Test cases to Backyard area
- Move current categories under Backyard page to Examples subpage

## Backyard 0.3.3
Released on May 2, 2017

- Move keys for top menu items to default lexicon file
- Add keys for buttons to clear individual custom cache partitions
- Add Adaptation and Monetization pages to Backyard

## Backyard 0.3.2
Released on February 22, 2017

- Remove nonsensical test content from Backyard pages
- Corrections and additional content

## Backyard 0.3.1
Released on January 26, 2017

- Add Backyard resources
- Add Dashboard resource
- Add Universal styling under Electrons (showing the Semantic UI site.variables)
- Change alias 'pattern-library' to 'patterns'
- Corrections and additional content

## Backyard 0.3.0
Released on December 19, 2016

- Add Bosons category for ContentBlocks pages
- Fill Atoms pages
- Fill Molecules pages

## Backyard 0.2.1
Released on December 9, 2016

- Create script to migrate content changes back into Backyard package
- Change folder structure to match resource URIs
- Fill Electrons pages

## Backyard 0.2.0
Released on December 9, 2016

- Add resources for front-end pattern library (still empty)
- Small lexicon and namespace corrections

## Backyard 0.1.2

- Change lexicon prefixes from 'patternlab' to 'romanesco' [BC]

## Backyard 0.1.1

- Remove space / hyphen from package names
- Remove replace tasks from gruntfile

## Backyard 0.1.0

- Add PatternLab pages
- Add PatternLab lexicons