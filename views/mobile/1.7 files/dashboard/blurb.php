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
<?php echo elgg_echo("mobile:river:title"); ?>
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
			<input type="submit" value="<?php echo elgg_echo('Share!'); ?>" id="submit_mobile"/>
	</form>
    <h3>Activity Stream</h3>
    </div>
<?php
/**
 * Elgg river for dashboard.
 *
 * @package Elgg
 * @author Curverider Ltd
 * @link http://elgg.com/
 */

/// Extract the river
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