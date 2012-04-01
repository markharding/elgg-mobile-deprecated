<?php

    /**
	 * Elgg comments add form
	 * Customized for river dashboard use by Snow.Hellsing
	 * 
	 * @package Elgg
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 * 
	 * @uses $vars['entity']
	 */
	/**
	 * @author Snow.Hellsing <snow.hellsing@firebloom.cc>
	 * @copyright FireBloom Studio
	 * @link http://firebloom.cc
	 */
	 
	 if (isset($vars['entity']) && isloggedin()) {
    	 $form_body = elgg_view('input/text',array('internalname' => 'generic_comment'));
		 $form_body .= elgg_view('input/hidden', array('internalname' => 'entity_guid', 'value' => $vars['entity']->getGUID()));
		 $form_body .= elgg_view('input/submit', array('value' => elgg_echo("Comment!")));
?>
<div class="generic_comment"><!-- start of generic_comment div -->
	    
		<div class="generic_comment_icon">	        
    		<?php
    			echo elgg_view("profile/icon",
    						array(
    							'entity' => $_SESSION['user'], 
    							'size' => 'small'));
    		?>
		</div>
		<div class="generic_comment_details">    		
			<?php echo elgg_view('input/form', array('body' => $form_body, 'action' => "{$vars['url']}action/riverdashboard/comment"));?>		    
		</div><!-- end of generic_comment_details -->
	</div><!-- end of generic_comment div -->
<?php 
	}//if (isset($vars['entity']) && isloggedin())
?>