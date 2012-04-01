<?php
// Set title
if (empty($vars['title'])) {
	$title = $vars['config']->sitename;
} else if (empty($vars['config']->sitename)) {
	$title = $vars['title'];
} else {
	$title = $vars['config']->sitename . ": " . $vars['title'];
}
echo elgg_view('page_elements/header', $vars);
echo elgg_view('page_elements/header_contents', $vars); ?>
<div id="layout_canvas">
<?php echo elgg_view('messages/list', array('object' => $vars['sysmessages']));
echo $vars['body']; ?>
</div><!-- /#layout_canvas -->
<div class="mobilecopy"><!-- if you want to remove the below message then you MUST first make a donation of at least £25.00. If you do remove the below message and have not donated then you are breaking the licence of this plugin and may cause it to misfunction, be prevented from futher versions or have legal action taken against you. -->
Elgg Mobile &copy; Mark Harding 2010
</div><?php echo elgg_view('page_elements/footer', $vars); ?>