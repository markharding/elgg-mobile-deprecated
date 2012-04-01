<?php

	/**
	 * Elgg thewire sidebar links
	 * 
	 * @package ElggTheWire
	 * @license Private
	 * @author Curverider <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 */
	 
	//set variables
	$select_user = '';
	$select_mentions = '';
	$select_everyone = '';

	//highlight the correct menu option
	if((page_owner() == $_SESSION['user']->guid) && $vars['mentions'] != 'yes' ) {
		$select_everyone = 'class=""';
		$select_mentions = 'class=""';
		$select_user = 'class="selected"';
	}elseif($vars['mentions'] == 'yes') {
		$select_everyone = 'class=""';
		$select_user = 'class=""';
		$select_mentions = 'class="selected"';
	}else{
		$select_everyone = 'class="selected"';
		$select_user = 'class=""';
		$select_mentions = 'class=""';
	}
?>
<div class="sidebarBox">
<div id="owner_block_submenu"><ul>
<?php
	if(isloggedin()){
		echo "<li {$select_everyone}><a href=\"{$vars['url']}mod/thewire/everyone.php\">" . elgg_echo('thewire:all') . "</a></li>";
		echo "<li {$select_user}><a href=\"{$vars['url']}pg/thewire/" . $_SESSION['user']->username . "\">". elgg_echo('thewire:read') ."</a></li>";
		//echo "<li {$select_mentions}><a href=\"{$vars['url']}mod/thewire/mentions.php?username=" . $_SESSION['user']->username . "\">@" . $_SESSION['user']->username . "</a></li>";
	}
?>
</ul></div></div>