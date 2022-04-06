<?php 

include_once(plugin_dir_path( __FILE__ ) . 'includes/enqueue.php');

include_once(plugin_dir_path( __FILE__ ) . 'includes/add-menu-page.php');

include_once(plugin_dir_path( __FILE__ ) . 'includes/generate-shortcode.php');

include_once(plugin_dir_path( __FILE__ ) . 'includes/page-settings.php');

require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/Jesterlopez/plugin-wp',
	__FILE__,
	'plugin-wp'
);

$myUpdateChecker->getVcsApi()->enableReleaseAssets();

// //Set the branch that contains the stable release.
// $myUpdateChecker->setBranch('stable-branch-name');

// //Optional: If you're using a private repository, specify the access token like this:
// $myUpdateChecker->setAuthentication('your-token-here');