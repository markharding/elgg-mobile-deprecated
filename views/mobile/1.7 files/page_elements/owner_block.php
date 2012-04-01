<?php
/**
 * Elgg owner block
 * Displays page ownership information
 *
 * @package Elgg
 * @subpackage Core
 * @author Curverider Ltd
 * @link http://elgg.org/
 *
 */

$contents .= elgg_view('owner_block/extend');
		
	// Have we been asked to inject any content? If so, display it
		if (isset($vars['content']))
			$contents .= $vars['content'];
		
	// Initialise the submenu
		$submenu = get_submenu(); // elgg_view('canvas_header/submenu');
		if (!empty($submenu))
			$contents .= "<div id=\"owner_block_submenu\">" . $submenu . "</div>"; // plugins can extend this to add menu options
			
		if (!empty($contents)) {
			echo "<div id=\"owner_block\">";
			echo $contents;
			echo "</div><div id=\"owner_block_bottom\"></div>";
		}

?>