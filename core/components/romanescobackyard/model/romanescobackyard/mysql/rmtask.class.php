<?php
/**
 * @package romanescobackyard
 */
require_once (strtr(realpath(dirname(dirname(__FILE__))), '\\', '/') . '/rmtask.class.php');
class rmTask_mysql extends rmTask {}
?>