<?php

	/**
	 * Elgg get bookmarks bookmarklet view
	 * 
	 * @package ElggBookmarks
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.org/
	 */

?>
	<div class="contentWrapper">
	<p>
		<?php echo elgg_echo("bookmarks:bookmarklet:description"); ?>
	</p>
	<p class="sharing_bookmarklet">
		<a href="javascript:location.href='<?php echo $vars['url']; ?>mod/bookmarks/add.php?address='+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title)"> <img src="<?php echo $vars['url']; ?>_graphics/elgg_bookmarklet.gif" border="0" title="<?php echo elgg_echo("bookmarks:this"); ?>" />   </a>
	</p>
	<p>
		<?php echo elgg_echo("bookmarks:bookmarklet:descriptionie"); ?>
	</p>
	<p>
		<?php echo elgg_echo("bookmarks:bookmarklet:description:conclusion"); ?>
	</p>
	</div>