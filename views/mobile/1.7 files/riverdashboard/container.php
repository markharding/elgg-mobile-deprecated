<?php

?>
<?php
/**
 * Elgg Mobile
 * A Mobile Client For Elgg
 *
 * @package Elgg
 * @subpackage Core
 * @author Mark Harding
 * @link http://maestrozone.com
 *
 */
?>
<div style="height:5px;"> </div>
<div id="statusupdate">
<?php echo elgg_echo("mobile:river:what"); ?>
	<form action="<?php echo $vars['url']; ?>action/thewire/add" method="post" name="noteForm">
			
		<?php
 
			$owner =  $_SESSION['user']->getGUID();
			$latest_wire = get_entities("object", "thewire", $owner, "", 1, 0, false, 0, null);
foreach($latest_wire as $lw){
			$status = $lw->description;}
			$display .= "<textarea name='note' id=\"thewire_publisherInputBox\" class=\"statusbox\">
</textarea>";
			echo $display;
		?>
			<input type="hidden" name="method" value="site" />
			<input type="hidden" name="location" value="activity" />
			<input type="hidden" name="access_id" value="2" />
            <?php echo elgg_view('input/securitytoken'); ?>
            
			<input type="submit" value="<?php echo elgg_echo('Share!'); ?>" id="submit_mobile"/>
	</form>
    <h3><?php echo elgg_echo("mobile:river:title"); ?></h3>
    </div>
    <?php


	//grab the current site message
	//$site_message = get_entities("object", "sitemessage", 0, "", 1);
	//if ($site_message) {
		//$mes = $site_message[0];
		//$message = $mes->description;
		//$dateStamp = friendly_time($mes->time_created);
		//$delete = elgg_view("output/confirmlink",array(
			//												'href' => $vars['url'] . "action/riverdashboard/delete?message=" . $mes->guid,//
		//													'text' => elgg_echo('delete'),
		//													'confirm' => elgg_echo('deleteconfirm'),
			//											));
	//}
	


	//if there is a site message
	//if($site_message){
	 
		//echo "<h3>" . elgg_echo("sitemessages:announcements") . "</h3>";
		//echo "<p><small>" . elgg_echo("sitemessages:posted") . ": " . $dateStamp;
		//if admin display the delete link
		//if(isadminloggedin())
		//	echo " " . $delete . " ";	
		//echo "</small></p>";
		//display the message
		//echo "<p>" . $message . "</p>";
	//}

$river = $vars['river'];
?>
<div id="river">
<?php
$type = get_plugin_setting('mobileriverview', 'mobile');
$subtype = '';
$relationship_type = "";
$subject_guid = 0;
if (empty($type)){
echo elgg_view_river_items(0, 0, $type, $content[0], $content[1], '', 10 ,0,0,true);}
if ($type == "friend") {
echo elgg_view_river_items($_SESSION['user']->getGuid(), 0, $type, $content[0], $content[1], '', 10 ,0,0,true);}
?>
</div>