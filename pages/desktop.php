<?php 
	define('externalpage',true);
	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
	global $CONFIG;
	
session_start();    
$_SESSION['desktop'] = 1;
$siteroot = $vars['url'];
$lastpage = $_GET['elp'];
header("Location: $siteroot/index.php");
?>
