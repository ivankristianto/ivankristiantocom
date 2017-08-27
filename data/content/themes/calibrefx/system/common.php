<?php

/**
 * Check the php version
 *
 * @return bool
 */
if ( ! function_exists( 'is_php' ) ) {

	function is_php( $version = '5.3.0' ) {
		static $_is_php;
		$version = (string) $version;

		if ( ! isset( $_is_php[ $version ] ) ) {
			$_is_php[ $version ] = ( version_compare( PHP_VERSION, $version ) >= 0 );
		}

		return $_is_php[ $version ];
	}
}

// ------------------------------------------------------------------------
/**
 * Fire everything and display it.
 * 
 * @param  array  $args allow to custom template
 * @return void
 */
function calibrefx( $args = array() ) {
	$default_args = array(
			'header'	=>	'',
			'footer'	=>	'',
		);

	$args = array_merge( $default_args, $args );
	extract( $args );
	
	get_header( $header );

	do_action( 'calibrefx_inner' );
	do_action( 'calibrefx_before_content_wrapper' );

	$content_wrapper_class = calibrefx_row_class() . ' ' . apply_filters( 'content_wrapper_class', '' );
	?>
    <div id="content-wrapper" class="<?php echo esc_attr( $content_wrapper_class ); ?>" >
        <?php do_action( 'calibrefx_before_content' ); ?>
        <div id="content" class="<?php echo esc_attr( calibrefx_content_span() ); ?>">
            <?php
			do_action( 'calibrefx_before_loop' );
			do_action( 'calibrefx_loop' );
			do_action( 'calibrefx_after_loop' );
			?>
        </div><!-- end #content -->
        <?php do_action( 'calibrefx_after_content' ); ?>
    </div><!-- end #content-wrapper -->
    <?php
	do_action( 'calibrefx_after_content_wrapper' );
	do_action( 'calibrefx_after_inner' );

	get_footer( $footer );
}