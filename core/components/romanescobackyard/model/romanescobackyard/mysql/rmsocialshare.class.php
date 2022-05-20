<?php
/**
 * @package romanescobackyard
 */
require_once (strtr(realpath(dirname(dirname(__FILE__))), '\\', '/') . '/rmsocialshare.class.php');
class rmSocialShare_mysql extends rmSocialShare {}
?>