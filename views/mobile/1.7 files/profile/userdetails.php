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

	
		$iconsize = "medium";
	
	// wrap all profile info
	echo "<div id=\"profile_info\">";

?>

<?php	
	
	// wrap the icon and links in a div
	echo "<div id=\"profile_info_column_left\">";
	
	echo "<div id=\"profile_icon_wrapper\">";
	// get the user's main profile picture
	echo elgg_view(
						"profile/icon", array(
												'entity' => $vars['entity'],
												//'align' => "left",
												'size' => $iconsize,
												'override' => true,
											  )
					);


    echo "</div>";
    echo "<div class=\"clearfloat\"></div>";
     // display relevant links			
    //echo elgg_view("profile/profilelinks", array("entity" => $vars['entity']));
       
    // close profile_info_column_left
    echo "</div>";

?>

	
	<div id="profile_info_column_middle" >
	
	
	<?php
	$rel = "";
	if (page_owner() == $vars['entity']->guid)
		$rel = 'me';
	else if (check_entity_relationship(page_owner(), 'friend', $vars['entity']->guid))
		$rel = 'friend';
		
	// display the users name
	echo "<h2><a href=\"" . $vars['entity']->getUrl() . "\" rel=\"$rel\">" . $vars['entity']->name . "</a></h2>";
	$owner =  $vars['entity']->guid;
	$latest_wire = get_entities("object", "thewire", $owner, "", 1, 0, false, 0, null);
	foreach($latest_wire as $lw){$status = $lw->description;}
 	echo "<div id=\"profilestatus\"> $status </div>";
	//check to see if the user is looking at their own profile
	    if ($_SESSION['user']->guid == page_owner()){
//ADD A STATUS UPDATE BOX HERE		    
	    } else {

	if (isloggedin()) {
		if ($_SESSION['user']->getGUID() != $vars['entity']->getGUID()) {
			
			$ts = time();
			$token = generate_action_token($ts);
					
			if ($vars['entity']->isFriend()) {
				echo "<p class=\"user_menu_removefriend\"><a href=\"{$vars['url']}action/friends/remove?friend={$vars['entity']->getGUID()}&__elgg_token=$token&__elgg_ts=$ts\">" . elgg_echo("friend:remove") . "</a></p>";
			} else {
				echo "<p class=\"user_menu_addfriend\"><a href=\"{$vars['url']}action/friends/add?friend={$vars['entity']->getGUID()}&__elgg_token=$token&__elgg_ts=$ts\">" . elgg_echo("friend:add") . "</a></p>";
			}
		}
	}
	    }
	?>
    
    
	</div><!-- /#profile_info_column_middle -->

</div><!-- /#profile_info -->
<div class="profile_nav"> 
<a href="?view=mobile&p=activity"><?php echo elgg_echo("mobile:profile:activity"); ?> </a>| <a href="?view=mobile&p=mb"><?php echo elgg_echo("messageboard:board"); ?>  </a>| <a href="?view=mobile&p=info"><?php echo elgg_echo("mobile:profile:info"); ?> </a><?php if (get_plugin_setting('photostab', 'mobile') == ""){ ?>| <a href="?view=mobile&p=photos"><?php echo elgg_echo("photos"); ?></a> <?php } ?>
</div>
<?php if (get_input('p') == 'info') {
		$even_odd = null;
			if (is_array($vars['config']->profile) && sizeof($vars['config']->profile) > 0)
			foreach($vars['config']->profile as $shortname => $valtype) {
				if ($shortname != "description") {
					$value = $vars['entity']->$shortname;
					if (!empty($value)) {
					
				//This function controls the alternating class
                $even_odd = ( 'odd' != $even_odd ) ? 'odd' : 'even';					
	
	?>
<p class="<?php echo $even_odd; ?>">
		<b><?php
			echo elgg_echo("profile:{$shortname}");		
		?>: </b>
		<?php
			echo elgg_view("output/{$valtype}",array('value' => $vars['entity']->$shortname));
		?>
	</p> 
	<?php } }  }?>
        <p class="profile_aboutme_title"><b><?php echo elgg_echo("profile:aboutme"); ?></b></p>
		
		<?php 
		echo elgg_view('output/longtext', array('value' => $vars['entity']->description));
		//echo autop(filter_tags($vars['entity']->description)); 
		?>	
        	<?php
	
		if ($vars['entity']->canEdit()) {

	?>				
    <a href="<?php echo $vars['url']; ?>pg/profile/<?php echo $vars['entity']->username; ?>/edit/"><?php echo elgg_echo("profile:edit"); ?></a>
    <?php } } else if (get_input('p') == 'activity' || get_input('p') == false){ ?>
<div id="profileriver">
<?php
$type = '';
$subtype = '';
$relationship_type = "";
$subject_guid = $vars['entity']->guid;

echo elgg_view_river_items($subject_guid, 0, $relationship_type, $type, $subtype, '');
?>
</div>
<?php } else if (get_input('p') == 'mb'){  

// Get the user who is the owner of the message board
	    $entity = get_entity(page_owner());
	    
    // Get any annotations for their message board
		$contents = $entity->getAnnotations('messageboard', 50, 0, 'desc');
		if(isloggedin()){
			echo elgg_view("messageboard/forms/add");
		}

		echo elgg_view("messageboard/messageboard", array('annotation' => $contents));
			
} else if (get_input('p') == 'photos'){  
// Get objects
$owner = page_owner_entity();
	set_context('search');
	set_input('search_viewtype', 'gallery');
	if ($owner instanceof ElggGroup)
		$area2 .= list_entities("object", "album", $owner->guid, 12);
	else
		$area2 .= list_entities("object", "album", $owner->guid, 12);
	
	set_context('photos');
	echo $area2;
} ?>