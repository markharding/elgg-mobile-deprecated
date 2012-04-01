</div><!-- /#page_wrapper -->
</div><!-- /#page_container -->
<div id="layout_footer">
		<div id="mobile_elgg">        
		<a href="<?php echo $vars['url']; ?>mod/mobile/desktop.php"> <?php echo elgg_echo("mobile:full"); ?></a>      
        </div>
		<?php $ts = time(); $token = generate_action_token($ts);  if (isloggedin()){ ?>
		<div id="mobile_logout">
        <a href="<?php echo $vars['url']; ?>action/logout?__elgg_ts=<?php echo $ts; ?>&__elgg_token=<?php echo $token; ?>"><?php echo elgg_echo("logout"); ?></a></small>
		</div>
        <?php } ?>
</div><!-- /#layout_footer -->
</body>
</html>