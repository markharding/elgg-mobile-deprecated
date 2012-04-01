<?php
/**
 * Elgg top toolbar
 * The standard elgg top toolbar
 */



// Elgg logo
//echo elgg_view_menu('topbar', array('sort_by' => 'priority', array('elgg-menu-hz')));
$logo_path = $vars['url'] . 'mod/mobile/graphics/logo_mobile.png';
echo "<a href=\"{$vars['url']}\">";
echo "<div class=\"logo_centre\"><img src=\"{$logo_path}\" align=\"center\"/></div>";
echo "</a>";

// elgg tools menu
// need to echo this empty view for backward compatibility.
//echo elgg_view("navigation/topbar_tools");
