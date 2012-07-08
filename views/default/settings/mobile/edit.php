<?php
$current_version = file_get_contents($vars['url'].'mod/mobile/version.txt');
$version = file_get_contents('http://www.kramnorth.co.uk/dev/mobile/version.txt');
if ($current_version >= $version){?>
<p>You are running the latest version of the mobile plugin. </p>
<?php } else { ?>
<p>You are running an out of date version of elgg mobile. Please update this plugin to the latest version <b><?php echo $version; ?></b> by <a href="http://community.elgg.org/mod/plugins/read.php?guid=387453">clicking here</a>. <p>
<?php }?>
<p>
	<b>RiverView</b>
	<select name="params[mobileriverview]">
		<option value="friend" <?php if ($vars['entity']->mobileriverview == 'friend') echo " selected=\"yes\" "; ?>>Friends</option>
		<option value="" <?php if ($vars['entity']->mobileriverview != 'friend') echo " selected=\"yes\" "; ?>>Everyone</option>
	</select>
</p>
<p>
	<b>Display the photos tab?</b>
	<select name="params[photostab]">
		<option value="no" <?php if ($vars['entity']->photostab == 'no') echo " selected=\"yes\" "; ?>>No</option>
		<option value="" <?php if ($vars['entity']->photostab != 'no') echo " selected=\"yes\" "; ?>>Yes</option>
	</select>
</p>