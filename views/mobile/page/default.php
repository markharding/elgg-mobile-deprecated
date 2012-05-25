<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<?php echo elgg_view('page/elements/head', $vars); ?>
</head>
<body>
<div data-role="page" id="page">
        <div class="elgg-page-messages">
            <?php echo elgg_view('page/elements/messages', array('object' => $vars['sysmessages'])); ?>
        </div>
        
       <div data-role="header" class="elgg-header" data-position="fixed">
      		<?php echo elgg_view('page/elements/header_logo', $vars); ?>
            
            <a href="#menu" data-transition="slidedown">Menu</a>
       </div> 
       
        <div data-role="content">
                <?php echo elgg_view('page/elements/body', $vars); ?>
            </div>
</div><!--end page-->
	<div data-role="page" id="menu">

	<div data-role="header" class="elgg-header" data-position="fixed">
		<h1>Menu</h1>
		<a href="#page">Back</a>
	</div><!-- /header -->

	<div data-role="content">	
		<ul data-role="listview" data-inset="false" >
			<?php 
			//This needs it own function, should not be loaded from here
			$menu_name= 'site';
			 
			$vars['name'] = $menu_name;
			$sort_by = elgg_extract('sort_by', $vars, 'text');

				 if (isset($CONFIG->menus[$menu_name])) {
					 $menu = $CONFIG->menus[$menu_name];
				 } else {
					 $menu = array();
				 }
 
				 // Give plugins a chance to add menu items just before creation.
				 // This supports dynamic menus (example: user_hover).
				 $menu = elgg_trigger_plugin_hook('register', "menu:$menu_name", $vars, $menu);
 
				$builder = new ElggMenuBuilder($menu);
				$vars['menu'] = $builder->getMenu($sort_by);
				$vars['selected_item'] = $builder->getSelected();
 
				 // Let plugins modify the menu
				 $vars['menu'] = elgg_trigger_plugin_hook('prepare', "menu:$menu_name", $vars, $vars['menu']);
			
				$default_items = elgg_extract('default', $vars['menu'], array());
					foreach ($default_items as $menu_item) {
							echo elgg_view('navigation/menu/elements/item', array('item' => $menu_item));
					}
					?>
                    
                    <li>Logout</li>
			
		</ul>			
	</div><!-- /content -->

</div><!-- /page -->
<?php echo elgg_view('page/elements/foot'); ?>
</body>
</html>