<?php

	/**
	 * Elgg thewire reply page
	 * 
	 * @package ElggTheWire
	 * @license Private
	 * @author Curverider <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 * 
	 */

	$wire_user = get_input('wire_name');
	$reply = get_input('wire_post');
		//get its parent
	$full_post = get_entity($reply);
	//$parent = $full_post->parent;
	$access_id = $full_post->access_id;    	
	$get_discussion = get_annotations($reply, "object", "thewire", "wire_reply", "", 0, 99, 0, "desc");
	$name = $full_post->getOwnerEntity()->name;
	$actual_post = $full_post->description;

?>
<!-- display the reply form -->
<div class="post_to_wire">
<script>
function textCounter(field,cntfield,maxlimit) {
    // if too long...trim it!
    if (field.value.length > maxlimit) {
        field.value = field.value.substring(0, maxlimit);
    } else {
        // otherwise, update 'characters left' counter
        cntfield.value = maxlimit - field.value.length;
    }
}
</script>
	<form action="<?php echo $vars['url']; ?>action/thewire/reply" method="post" name="noteForm">
	<?php
		echo "<div class='thewire_characters_remaining'><input readonly type=\"text\" name=\"remLen1\" size=\"3\" maxlength=\"3\" value=\"140\" class=\"thewire_characters_remaining_field\">";
		echo elgg_echo("thewire:charleft") . "</div>";
	?>
	<?php                
		echo "<textarea name='note' value='' onKeyDown=\"textCounter(document.noteForm.note,document.noteForm.remLen1,140)\" onKeyUp=\"textCounter(document.noteForm.note,document.noteForm.remLen1,140)\" id=\"thewire_large-textarea\">{$msg}</textarea>";
		echo "<input type=\"submit\" class=\"wire_post_button\" value=\"";
		echo elgg_echo("thewire:post") . "\" /><div class='clearfloat'></div>";
	?>
		<input type='hidden' name='parent' value='<?php echo $reply; ?>' />
		<input type="hidden" name="method" value="site" />
		<input type="hidden" name="access" value="<?php echo $access_id; ?>" />
	</form>
</div>

<!-- display the main post and any other replies -->
<div class="thewire-posts-wrapper">
	<div class="thewire-conversation">
		<!-- <div class="thewire-posts-wrapper"> open the wrapper -->	


			
			<?php
				if($get_discussion){
				echo "<div class='threaded_replies_wrapper'><div class='the_wire_conversation replypage'>";			
					foreach($get_discussion as $disc){
						//check the reply has a value, if not, don't display it. We know the first annotation created
						//when the parent is created has no value so we don't want to display it here
						if($disc->value != ''){
							$comment_name = get_user($disc->owner_guid)->name;
			?>
							<div class="thewire-post reply">
							  <div class="note_body"><!-- open note_body div -->
							    <div class="thewire_icon">
							    <?php
								        echo elgg_view("profile/icon",array('entity' => get_user($disc->owner_guid), 'size' => 'tiny'));
							    ?>
							    </div>		    					
								<?php
									echo "<div class='wire-post-message'><p><span class='wireownername'><a href=\"\">{$comment_name}</a>: </span>";
								  	$desc = $disc->value;
								    $desc = preg_replace('/\@([A-Za-z0-9\_\.\-]*)/i','@<a href="' . $vars['url'] . 'pg/thewire/$1">$1</a>',$desc);
								    echo parse_urls($desc);
								    echo "</p></div>";
								?>				
								<div class="note_date">
								<?php
									echo elgg_echo("thewire:wired") . " " . sprintf(elgg_echo("thewire:strapline"),
														friendly_time($disc->time_created)
									);
									echo " via site";	
								?>
								</div>	
							</div>
						  </div>
				<?php
						}//end of if $disc->value statement
						}//end of foreach
						
						echo "</div></div>";	
					}
				?>
		<!-- </div> -->

		
		<div class="thewire-post parent">		
			<div class="note_body">		
				<div class="thewire_icon">
				    <?php
						echo elgg_view("profile/icon",array('entity' => $full_post->getOwnerEntity(), 'size' => 'small'));
				    ?>
				</div>
				<?php
					echo "<div class='wire-post-message'><p><span class='wireownername'><a href=\"\">{$name}</a>: </span> ";
					$desc = $full_post->description;
					$desc = preg_replace('/\@([A-Za-z0-9\_\.\-]*)/i','@<a href="' . $vars['url'] . 'pg/thewire/$1">$1</a>',$desc);
					echo parse_urls($desc);
					echo "</p></div>";
				?>
				<div class="note_date">	
				<?php
					echo "<b>Conversation started " . sprintf(elgg_echo("thewire:strapline"),
							friendly_time($full_post->time_created)
					);
					echo "</b>  via " . elgg_echo($full_post->method);		
				?>
				</div><div class="clearfloat"></div>
				</div>	
			</div><!-- /thewire-post parent -->		
		
		
	</div>
</div>