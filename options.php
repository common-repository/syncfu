<div class="wrap">
<h2>SyncFu Group Selling</h2>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<?php settings_fields('syncfu'); ?>

<p>
  <a href="http://www.syncfu.com" target="_blank">SyncFu</a> is a group buying facility which you can easily install for free directly into your web site. 
  It enables you to create, customise and control group offers on chosen products or services.
  This brilliantly simple widget will increase your sales volumes, attract new customers and expand your business through social media and networks.
</p>
<p>
  To use the SyncFu system, you'll have to <a href="http://app.syncfu.com/" target="_blank">create an account</a>.
  All you need is a valid email address and a password to make your account active. 
  Please note that more information will be required later to complete the verification process.
</p>
<p>
  If you have any questions or issues, please do not hesitate to contact us at <a href="mailto:support@syncfu.com">support@syncfu.com</a> or visit our <a href="http://syncfu.com/pages/merchant_intro.html">merchant pages</a>.
</p>
<hr/>
<table class="form-table">
<tr valign="top">
<th scope="row">
  <label for="syncfu_key">Your API Key</label>
</th>
<td>
  <input type="text" name="syncfu_key" value="<?php echo get_option('syncfu_key'); ?>" class="regular-text"/>
  <span class="description">The 40-character API key shown in your <i>SetUp / Account Settings</i> tab</span>
</td>
</tr>
</table>

<input type="hidden" name="action" value="update" />

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>
