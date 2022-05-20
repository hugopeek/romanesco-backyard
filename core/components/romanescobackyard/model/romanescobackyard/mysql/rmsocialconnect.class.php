<?php
/**
 * @package romanescobackyard
 */
require_once (strtr(realpath(dirname(dirname(__FILE__))), '\\', '/') . '/rmsocialconnect.class.php');
class rmSocialConnect_mysql extends rmSocialConnect {}
?>