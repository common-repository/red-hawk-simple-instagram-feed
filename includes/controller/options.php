<?php
if (!defined('ABSPATH')) exit;
function rhsif_instagram_feed_options()
{
	if(isset($_GET['settings-updated'])) { ?>
	<div id="redhawk_alert" class="alert alert-success">
		<strong><?php _e('Settings saved.','rhsif_entiven_lang'); ?></strong>
		<?php _e('please continue adjusting your plugin','rhsif_entiven_lang'); ?>
		<button id="redhawk_alert_close"><?php _e('Close','rhsif_entiven_lang'); ?></button>
	</div>
	<?php } ?>
		<div class="redhawk_header">
		<div style="display: inline-block;padding: 0.5%;" class="redhawk_header_left">
			<img style="display: inline-block;float: left;" src="<?= plugins_url('/assets/images/instagram.jpg',__FILE__); ?>"/>
			<h1 style="display: inline-block;font-size: 28px;color: #242424;" class="rhsif_header_">| Simple instagram feed</h1>
		</div>
		<div style="display: inline-block;padding: 0.5%;" class="redhawk_header_right">

		</div>
		</div>
		<div style="display:none;text-align:right;" class="rhsif_example">
			<span id="rhsif_close_example" style="font-size:23px;color:#525252;cursor: pointer;" class="dashicons dashicons-no"></span>
			<div class="_rhsif_step_1" style="text-align:center;">
			<h2>
				<?php
				_e('First step. Enter on Instagram, and copy the username from URL', 'rhsif_entiven_lang');
				?>
			</h2>
				<img src="<?= plugins_url('/assets/images/ex1.jpg',__FILE__); ?>"/>
			</div>
		<div class="_rhsif_step_2" style="text-align:center;">
		<h2>
			<?php _e('Second step. Paste below on the instagram username field','rhsif_entiven_lang'); ?>
		</h2>
		</div>
		</div>
		<form id="redhawk_simple_insta" method="post" action="options.php">
		<?php settings_fields("rhsif_entiven_group"); ?>
   		<?php @do_settings_fields("rhsif_entiven_group"); ?>
			<div id="redhawk_super_table">
				<div class="spacer">
					<div class="with-label"><label for="redhawk_1"><?php _e('Instagram username','rhsif_entiven_lang'); ?></label></div>
					<div><input type="text" name="rhsif_entiven_redhawk_1" id="redhawk_userid" value="<?php if(get_option('rhsif_entiven_redhawk_1')==''){echo "wordpressdotcom";}else{ echo get_option('rhsif_entiven_redhawk_1');} ?>" autofocus />
					<p>
					<a id="rhsif_example" href="#example"><span class="dashicons dashicons-visibility"></span> <?php _e('View example','rhsif_entiven_lang'); ?></a></p>
					</div>
				</div>
				<div class="spacer">
					<div class="with-label"><label for="redhawk_ouwn_access_touken"><?php _e('Set quantity of photos what do you want display','rhsif_entiven_lang');?></label></div>
					<div><input min="1" max="50" type="number" name="rhsif_entiven_redhawk_2" id="redhawk_access_touken" value="<?php if(get_option('rhsif_entiven_redhawk_2')==''){echo 10;}else{echo get_option('rhsif_entiven_redhawk_2');}?>"/></div>
				</div>
				<div class="spacer">
				<div class="with-label"><label for="rhsif_entiven_redhawk_checkopt"><?php _e('Set way how do you want display photos','rhsif_entiven_lang'); ?></label></div>
				<div>
				<li style="list-style: none;">
				<label><input type="radio" name="rhsif_entiven_redhawk_check" value="SI"<?php checked('SI'==get_option('rhsif_entiven_redhawk_check'));?> required/><span class="dashicons dashicons-grid-view"></span> <?php _e('Display photos on grid','rhsif_entiven_lang'); ?></label></li>
				<li style="list-style: none;">
				<label><input type="radio" name="rhsif_entiven_redhawk_check" value="NO"<?php checked('NO'==get_option('rhsif_entiven_redhawk_check'));?> required/><span class="dashicons dashicons-list-view"></span> <?php _e('Display photos on a list','rhsif_entiven_lang'); ?></label></li>
				</div>
				</div>
				<div class="spacer" style="text-align:center;">
					<div><?php _e('Copy and paste this shortcode where do you want to display photos','rhsif_entiven_lang'); ?></div>
					<br>
					<br>
					<div><code style="display: block;overflow: auto;background: #fafafa;border: 1px solid #ddd;font-size:16px;">[rhsif_entiven]</code></div>
				</div>
				<div class="rhsif_submit-section">
					<center>
						<button type="submit" class="rhsif_submit_options"><?php _e('Save','rhsif_entiven_lang'); ?></button>
						<span style="display: block;font-size: 13px;margin-top: 4%;">Version free 1.1</span>
					</center>
				</div>
			</div>
			<div class="rhsif_submit-section">
				<center>
					<div class="coypright redhawk_copy">
						<p><?php _e('Powered by','rhsif_entiven_lang'); ?> Redhawk - Entiven group</p>
						<p><?php _e('site','rhsif_entiven_lang'); ?>: <a target="_blank" href="https://entiven.com">entiven.com</a></p>
						<span><?php _e('Coming soon, more options and more features..','rhsif_entiven_lang'); ?></span>
					</div>
				</center>
			</div>
		</form>
		<?php
}