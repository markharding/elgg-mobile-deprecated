<?php
/**
 * Elgg Mobile
 * A Mobile Client For Elgg
 *
 * @package Elgg
 * @subpackage Core
 * @author kramnorth (Mark Harding)
 * @link http://kramnorth.com
 *
 */

	function mobile_init(){
		
		elgg_extend_view('page/elements/head','mobile/metatags');
		
		elgg_extend_view('css/elgg','mobile/css');
		
		//set our default index page
		
		if(elgg_get_viewtype() == "mobile"){
		elgg_register_plugin_hook_handler('index', 'system','main_handler');
		}
		

    }
	
	function main_handler() {
	require_once dirname(__FILE__) . '/pages/main.php';
	return true;
}
	
	if($_SESSION['isMobile']){
	elgg_set_viewtype('mobile');
	}
	//get view from the default view if we dont have them
	elgg_register_viewtype_fallback('mobile');
	elgg_register_event_handler('init','system','mobile_init');
//elgg_register_simplecache_view(mobile);
	elgg_register_action("mobile/login",$CONFIG->pluginspath . "mobile/actions/login.php",'public');
		

?>
