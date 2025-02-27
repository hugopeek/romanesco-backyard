<?php
/**
 * @package romanescobackyard
 */
require_once (strtr(realpath(dirname(dirname(__FILE__))), '\\', '/') . '/rmsocialconnectresource.class.php');
class rmSocialConnectResource_mysql extends rmSocialConnectResource {}
?>