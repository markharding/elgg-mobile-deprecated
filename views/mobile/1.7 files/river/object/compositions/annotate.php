<?php

	$statement = $vars['statement'];
	$performed_by = $statement->getSubject();
	$object = $statement->getObject();
	
	$url = "<a href=\"{$performed_by->getURL()}\">{$performed_by->name}</a>";
	$string = sprintf(elgg_echo("file:river:annotate"),$url) . " ";
	$string .= "<a href=\"/pg/compositions/<?php echo $owner->username; ?>/view/<?php echo $file_guid; ?>\">" . elgg_echo("file:river:item") . "</a>";

	echo $string; 
	
?>