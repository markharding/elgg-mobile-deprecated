<?php
	/**
	 * extra view of river item
	 * replaces the default wrappers inner div
	 * performer and time,maybe comment of a river item
	 *
	 * @package ImprovedRiverDashboard
	 */
	/**
	 * @author Snow.Hellsing <snow.hellsing@firebloom.cc>
	 * @copyright FireBloom Studio
	 * @link http://firebloom.cc
	 */
	$performed_by = $vars['performed_by'];
	$object = $vars['object'];
	$body = $vars['body'];
	$time = $vars['time']?$vars['time']:$object->time_created;
	$show_comment = $vars['show_comment'];

	echo '</div>';//break from basic_river_item_view

	echo elgg_view("profile/icon",
    					array(
    						'entity' => $performed_by,
    						'size' => 'small')); ?>

<div class="obj_guid js_meta"><?php echo $object->guid;?></div>
<div class="item_body">
	<?php echo $body; ?>
</div>
<div class="item_info">
	<?php echo friendly_time($time);

	if ($show_comment) {
		?>
		<a href="" class="toggle_comment">(<span class="comment_cnt"><?php echo count_annotations($object->guid,'','','generic_comment');?></span>)&nbsp;<?php echo elgg_echo('river:item:toggle_comments');?></a>
		<?php
	}
	?>

</div>
<?php
	if ($show_comment) {
?>
<div class="item_comments">
<?php
	echo getRiverItemComments($object->guid);
?>
</div>
<div class="item_comment_form">
	<?php echo elgg_view('river/forms/comment',array('entity' => $object));?>
</div>
<?php
	}//if ($show_comment)
	echo '<div class="hide_basic_river_item_view_time">';//hide friendly time div in basic view
?>
