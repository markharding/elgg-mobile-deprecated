<?php
	if (isloggedin()) {
?><div id="elgg_topbar">
<div id="elgg_topbar_container_left">	
	<div class="toolbarlinks">
    	<ul>
		<li><a href="<?php echo $vars['url']; ?>pg/dashboard/?view=mobile" class="pagelinks"><?php echo elgg_echo('Home'); ?></a></li>
        <li><a href="<?php echo $vars['url']; ?>pg/profile/<?php echo $vars['user']->username; ?>?view=mobile" class="pagelinks"><?php echo elgg_echo('profile'); ?></a></li>
        <li><a href="<?php echo $vars['url']; ?>pg/friends/<?php echo $vars['user']->username; ?>?view=mobile" class="pagelinks"><?php echo elgg_echo('friends'); ?></a></li>        <?php 
	$num_messages = count_unread_messages();
	if($num_messages){
		$num = $num_messages;
	} else {
		$num = 0;
	}

	if($num == 0){ ?>
        <li><a href="<?php echo $vars['url']; ?>pg/messages/inbox?view=mobile" class="pagelinks"><?php echo elgg_echo('Inbox'); ?></a></li>
        <?php
    }else{
?>
 <li><a href="<?php echo $vars['url']; ?>pg/messages/inbox?view=mobile" class="pagelinks"><?php echo elgg_echo('Inbox'); ?> (<?php echo $num; ?>)</a></li>
 <?php }?>
        </ul> 
	</div>
</div>
</div><!-- /#elgg_topbar -->
<div class="clearfloat"></div>
<?php
	}