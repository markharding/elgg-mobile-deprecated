<?php
/**
 * Elgg Mobile
 * A Mobile Client For Elgg
 *
 * @package Elgg
 * @subpackage Core
 * @author Mark Harding
 * @link http://maestrozone.com 
 *
 */

global $CONFIG;

$form_body = "<p class=\"loginbox\"><label>" . elgg_echo('username') . "<br />" . elgg_view('input/text', array('internalname' => 'username', 'class' => 'login-textarea')) . "</label>";
$form_body .= "<br />";
$form_body .= "<label>" . elgg_echo('password') . "<br />" . elgg_view('input/password', array('internalname' => 'password', 'class' => 'login-textarea')) . "</label><br />";

$form_body .= elgg_view('login/extend');

$form_body .= elgg_view('input/submit', array('value' => elgg_echo('login'))) . " <div id=\"persistent_login\"><label><input type=\"checkbox\" name=\"persistent\" value=\"true\" />".elgg_echo('user:persistent')."</label></div></p>";



$login_url = $vars['url'];
if ((isset($CONFIG->https_login)) && ($CONFIG->https_login)) {
	$login_url = str_replace("http", "https", $vars['url']);
}
?>
<div id="login-box">
	<?php
		echo elgg_view('input/form', array('body' => $form_body, 'action' => "{$login_url}action/login"));
	?>
</div> 
<div id="login-controls">
<p><?php echo elgg_echo("mobile:needaccount"); ?> <a href="<?php echo $vars['url']; ?>account/register.php?view=mobile"> <?php echo elgg_echo("signup"); ?> </a></p>

</div>