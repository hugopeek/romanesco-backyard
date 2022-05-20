<?php
/**
 * @package romanescobackyard
 */
require_once (strtr(realpath(dirname(dirname(__FILE__))), '\\', '/') . '/rmtaskcomment.class.php');
class rmTaskComment_mysql extends rmTaskComment {}
?>