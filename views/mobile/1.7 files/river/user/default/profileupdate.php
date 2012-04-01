<?php

	$performed_by = get_entity($vars['item']->subject_guid); // $statement->getSubject();
	
	$url = "<a href=\"{$performed_by->getURL()}?view=mobile\">{$performed_by->name}</a><i>";
	$string = sprintf(elgg_echo("profile:river:update"),$url);
?>
<?php echo $string; ?></i>