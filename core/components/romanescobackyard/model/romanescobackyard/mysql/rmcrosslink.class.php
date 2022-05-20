<?php
/**
 * @package romanescobackyard
 */
require_once (strtr(realpath(dirname(dirname(__FILE__))), '\\', '/') . '/rmcrosslink.class.php');
class rmCrossLink_mysql extends rmCrossLink {}
?>