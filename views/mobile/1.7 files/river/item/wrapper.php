<?php
$performed_by = get_entity($vars['item']->subject_guid);
$object = get_entity($vars['item']->object_guid);
?>
<div class="river_profile_icon">
<a href="<?php echo $performed_by->getURL(); ?>?view=mobile"><img src="<?php echo $performed_by->getIcon('small'); ?>"></a>
</div> 
<div class="river_item"><div class="river_show"><p><?php echo $vars['body'];?></p><p class="river_item_time"><?php echo friendly_time($vars['item']->posted);	?></p></div></div>