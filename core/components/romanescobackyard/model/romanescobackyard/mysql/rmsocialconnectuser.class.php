<?php
/**
 * @package romanescobackyard
 */
require_once (strtr(realpath(dirname(dirname(__FILE__))), '\\', '/') . '/rmsocialconnectuser.class.php');
class rmSocialConnectUser_mysql extends rmSocialConnectUser {}
?>