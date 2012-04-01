<?php

	/**
	 * Elgg thewire display view
	 * 
	 * @package ElggTheWire
	 * @license Private
	 * @author Curverider <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 * 
	 * @uses $vars['entity'] Optionally, the note to view
	 */
	echo '<div id="the-wire-updates-notice" class="contentWrapper" style="display: none;"></div>';
	echo '<div id="the-wire">'; 
	if (isset($vars['entities']) && sizeof($vars['entities']) > 0) {
		foreach($vars['entities'] as $message){
				echo elgg_view_entity($message);
		}
    }
	echo '</div>';
    
     //grab the offset
    $offset = $vars['offset'];
    if(!$offset)
    	$offset = 20;

	// grab the count
	$count = get_entities_from_annotations("object", "thewire", "wire_reply", "", "", 0, 20, $offset, "desc", true);

	if ($count < $offset) {
		echo "<script type=\"text/JavaScript\">$(document).ready(function() { $('#more').hide(); });</script>";
	}

	if (!$vars['ajax']) {
?>

<script type="text/JavaScript">
$(document).ready(function(){
	bindWireEvents();

	var updates = new thewireUpdateChecker(60000);
	updates.start();
});


/**
 * Binds JS events to the wire elements.
 * Called on page load and for each "more" click.
 */
function bindWireEvents() {
	// @todo not the best way to handle this...
	// unbind the click link to avoid slideDown, slideUp
	$('.conversationlink').unbind('click');

	// show conversation link.
	$('.conversationlink').click(function() {
		var id = $(this).parents('.thewire-posts-wrapper').attr('id').split('-')[1];
		//var id = $(this).attr('id').split('-')[1];
		
		thewireToggleConversation(id);
		return false;
	});
	
	// more link at the bottom of the page
	$("#more").click(function(){
		if (typeof(wireOffset) == 'undefined')
			wireOffset = 20;
		
		$('#the-wire').append('<div id="more-' + wireOffset + '" style="display: none;"></div>');
		var element = $('#more-' + wireOffset);
		element.load('<?php echo $vars['url']; ?>mod/thewire/endpoint/more.php', {'offset': wireOffset}, function(text, status, xhr) {
			if (status == 'success') {
				element.slideDown();
				wireOffset += 20;
				bindWireEvents();
			}
		});
	});

	// inline reply
	$('.thewire_options .reply').click(function () {
		var wrapper = $(this).parents('.thewire-posts-wrapper');
		var id = wrapper.attr('id').split('-')[1];
		$(".inline_reply_wrapper").empty(); // dump any other open reply forms
		wrapper.find('.inline_reply_holder').load("<?php echo $vars['url']; ?>mod/thewire/endpoint/reply.php", {wirepost: id});
		return false;
	});
};

// check for updates on the wire.
function thewireUpdateChecker(interval) {
	this.intervalID = null;
	this.interval = interval;
	this.url = '<?php echo $vars['url']; ?>mod/thewire/endpoint/ping.php';
	this.last_reload = null;
	
	this.start = function() {
		// last checked was when this page loaded.
		// returns in MS, we need S.
		// add the initial interval here so we're not trying to grab
		// posts that were just posted (ie, our post)
		var date = new Date();
		this.last_reload = Math.floor(date.getTime() / 1000); 

		// needed to complete closure scope.
		var self = this;
		
		this.intervalID = setInterval(function() { self.checkUpdates(); }, this.interval);
	}

	this.checkUpdates = function() {
		// more closure fun
		var self = this;
		$.ajax({
			'type': 'GET',
			'url': this.url,
			'data': {'last_reload': this.last_reload},
			'success': function(data) {
				if (data) {
					$('#the-wire-updates-notice').html(data).slideDown();
					// could crank down the interval here.
					// if we change the message to simply "New Posts!" 
					// we could stop the polling altogether.
				}
			}
		})
	}

	this.stop = function() {
		clearInterval(this.interval);
	}

	this.changeInterval = function(interval) {
		this.stop();
		this.interval = interval;
		this.start();
	}
}


/**
 * Toggles a conversation in the wire
 */
function thewireToggleConversation(id) {
	var e = $('#thewire-' + id).find('.the_wire_conversation');
	var link = $('#thewire-' + id).find('.conversationlink');
	
	// if the conversation is hidden, load then display it.
	if (e.css('display') == 'none' || e.css('display') == 'hidden') {
		e.find('.discussion').load(
			"<?php echo $vars['url']; ?>mod/thewire/endpoint/show_discussion.php", 
			{'wirepost': id}, 
			function (text, status, xhr) {
				if (status == 'success') {
					// switch the links, show the conversation.
					$(link).find('.view-conversation').hide();
					$(link).find('.hide-conversation').show();
					//$(e).slideDown();
					$(e).slideDown().show(function(){$(this).show();}); // extra show function to force display in ie7
					//$(e).slideDown().show(function(){e.find('.discussion').show();})
				}
			}
		);
	}
	// if the conversation is shown hide it.
	else {
		// switch show the conversations
		//e.slideToggle();
		//e.slideToggle().hide(function(){$(this).hide();});
		//e.slideUp().hide(function(){e.hide();});
		//e.hide();
		
				
		$(link).find('.view-conversation').show();
		$(link).find('.hide-conversation').hide();
		
		//$(e).slideUp().hide(function(){$(e).hide();});
		$(e).hide().slideUp();
	}

	return false;
}

</script>
<div class="contentWrapper" style="text-align:center;padding:0;"><input type="submit" id="more" value="more"></div><!-- div to load up more messages -->

<?php 	
	}
?>
