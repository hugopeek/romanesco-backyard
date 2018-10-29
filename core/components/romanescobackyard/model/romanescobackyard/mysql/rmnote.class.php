<?php
/**
 * @package romanescobackyard
 */
require_once (strtr(realpath(dirname(dirname(__FILE__))), '\\', '/') . '/rmnote.class.php');
class rmNote_mysql extends rmNote {}
?>