<?php
/*
Plugin Name: SyncFu
Plugin URI: http://wordpress.org/extend/plugins/syncfu/
Description: Enables <a href="http://www.syncfu.com">SyncFu Group Purhcases</a> on all pages.
Version: 0.2.1
Author: SyncFu Ltd.
Author URI: http://www.syncfu.com/
*/

if (!defined('WP_CONTENT_URL'))
      define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');
if (!defined('WP_CONTENT_DIR'))
      define('WP_CONTENT_DIR', ABSPATH.'wp-content');
if (!defined('WP_PLUGIN_URL'))
      define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');
if (!defined('WP_PLUGIN_DIR'))
      define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');

function activate_syncfu() {
  add_option('syncfu_key', '');
}

function deactive_syncfu() {
  delete_option('syncfu_key');
}

function admin_init_syncfu() {
  register_setting('syncfu', 'syncfu_key');
}

function admin_menu_syncfu() {
  add_options_page('SyncFu', 'SyncFu', 8, 'syncfu', 'options_page_syncfu');
}

function options_page_syncfu() {
  include(WP_PLUGIN_DIR.'/syncfu/options.php');
}

function syncfu() {
  $syncfu_key = trim(get_option('syncfu_key'));
  if (empty($syncfu_key)) {
    ?>

    <!-- You need to set up the SyncFu plugin -->
    <?php
  } else {
    ?>

    <!-- SyncFu Widget (http://www.syncfu.com) -->
    <script type='text/javascript'>
      var SyncFu = {apiKey: '<?php echo $syncfu_key ?>'};
      (function() {
        var sf = document.createElement('script'), s = document.getElementsByTagName('script')[0];
        sf.type = 'text/javascript'; sf.async = true;
        sf.src = ('https:' === document.location.protocol ? 'https://syncfu.heroku.com/s/js/widget.js' : 'http://app.syncfu.com/s/js/widget.js');
        s.parentNode.insertBefore(sf, s);
      })();
    </script>
    <!-- End SyncFu Widget -->

    <?php
  }
}

register_activation_hook(__FILE__, 'activate_syncfu');
register_deactivation_hook(__FILE__, 'deactive_syncfu');

if (is_admin()) {
  add_action('admin_init', 'admin_init_syncfu');
  add_action('admin_menu', 'admin_menu_syncfu');
}

if (!is_admin()) {
  add_action('wp_footer', 'syncfu');
}

?>
