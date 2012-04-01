<!-- left sidebar -->
<div id="two_column_left_sidebar">
	<?php set_input('view', 'mobile');	echo elgg_view('page_elements/owner_block',array('content' => $vars['area1']));	?>
	<?php if (isset($vars['area3'])) echo $vars['area3']; ?>
</div><div id="two_column_left_sidebar_maincontent"><?php if (isset($vars['area2'])) echo $vars['area2']; ?></div>