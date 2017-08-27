<?php
/**
 * Bootstrap the calibrefx unit testing environment.
 *
 * @package wordpress-plugin-tests
 */

// Support for:
// 1. `WP_DEVELOP_DIR` environment variable
// 2. Plugin installed inside of WordPress.org developer checkout
// 3. Tests checked out to /tmp
if ( false !== getenv( 'WP_DEVELOP_DIR' ) ) {
	$test_root = getenv( 'WP_DEVELOP_DIR' );
} else if ( file_exists( '../../../../tests/phpunit/includes/bootstrap.php' ) ) {
	$test_root = '../../../../tests/phpunit';
} else if ( file_exists( '/tmp/wordpress-tests-lib/includes/bootstrap.php' ) ) {
	$test_root = '/tmp/wordpress-tests-lib';
}

require $test_root . '/includes/functions.php';

// Activates this plugin in WordPress so it can be tested.
function _manually_load_themes() {
	switch_theme( 'calibrefx' );
	require dirname( __FILE__ ) . '/../functions.php';
}
tests_add_filter( 'after_setup_theme', '_manually_load_themes' );

require $test_root . '/includes/bootstrap.php';