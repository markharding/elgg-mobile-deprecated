<?php
/**
 * Elgg header logo
 * The logo to display in elgg-header.
 */

$site = elgg_get_site_entity();
$site_name = $site->name;
?>
<h1>
	<?php //echo $site_name; ?>
    <img src="<?php echo elgg_get_site_url(); ?>mod/mobile/graphics/logo_mobile.png" class="logo_centre"/>
</h1>
