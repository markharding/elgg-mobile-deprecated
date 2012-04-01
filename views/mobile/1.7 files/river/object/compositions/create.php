<?php
	
	$performed_by = get_entity($vars['item']->subject_guid); // $statement->getSubject();
	$performed_on = get_entity($vars['item']->object_guid);
	
	$url = "<a href=\"{$performed_by->getURL()}\">{$performed_by->name}</a><i>";
	$string = sprintf(elgg_echo("Added a new compositions"),$url);
	?>
    

 <?php   echo $string;  ?></i>