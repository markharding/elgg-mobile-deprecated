<?php 
	define('externalpage',true);
	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
	global $CONFIG;

	unset($_SESSION['desktop']);
	$siteroot = $vars['url'];
	$lastpage = $_GET['elp'];
	header("Location: $siteroot/index.php");

?>
