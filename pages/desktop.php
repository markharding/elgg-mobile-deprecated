<?php 
	define('externalpage',true);
	require_once(dirname(dirname(dirname(dirname(__FILE__)))) . "/engine/start.php");
	global $CONFIG;
	
session_start();    
$_SESSION['view_desktop'] = true;
$siteroot = $vars['url'];
$lastpage = $_GET['elp'];
header("Location: $siteroot/index.php");
?>
