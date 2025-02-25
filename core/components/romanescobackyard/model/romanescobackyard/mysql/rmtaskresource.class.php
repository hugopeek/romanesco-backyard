<?php
/**
 * @package romanescobackyard
 */
require_once (strtr(realpath(dirname(dirname(__FILE__))), '\\', '/') . '/rmtaskresource.class.php');
class rmTaskResource_mysql extends rmTaskResource {}
?>