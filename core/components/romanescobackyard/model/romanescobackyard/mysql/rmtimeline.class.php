<?php
/**
 * @package romanescobackyard
 */
require_once (strtr(realpath(dirname(dirname(__FILE__))), '\\', '/') . '/rmtimeline.class.php');
class rmTimeline_mysql extends rmTimeline {}
?>