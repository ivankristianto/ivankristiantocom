<?php
/**
 * Calibrefx Admin Class
 *
 * Abstract class to build Admin page
 *
 */
abstract class Calibrefx_Admin {

	/**
	 * Hold pagehook value when menu is registered
	 *
	 * @var string
	 */
	public $pagehook;

	/**
	 * ID of the admin menu and settings page.
	 *
	 * @var string
	 */
	public $page_id;

	/**
	 * Name of the settings field in the options table.
	 *
	 * @var string
	 */
	public $settings_field;

	/**
	 * Hold default settings of the settings option
	 *
	 * @var string
	 */
	public $default_settings;

	/**
	 * Remove Post Form
	 *
	 * @var object
	 */
	public $_form_method = 'post';


	public $_submit_url = 'options.php';

	/**
	 * Constructor
	 */
	function __construct( $settings_field = 'calibrefx-settings' ) {
		$this->settings_field = $settings_field;
	}

	/**
	 * Initialize our admin area
	 *
	 */
	public function initialize() {
		global $calibrefx;

		add_action( 'calibrefx_hidden_fields', array( $this, 'hidden_fields' ) );
		add_action( 'admin_init', array( $this, 'register_settings' ), 5 );
		add_action( 'admin_init', array( $this, 'settings_init' ), 20 );
		add_filter( 'admin_body_class', 'calibrefx_admin_body_class', 20, 1 );

		add_action( 'admin_notices', array( $this, 'notices' ) );

		//We add the security layer here
		$this->security_filters();

		if ( ! isset( $_SERVER['REQUEST_METHOD'] ) OR 'POST' !== esc_attr( $_SERVER['REQUEST_METHOD'] ) ) {
			return;
		}

		do_action( 'calibrefx_before_save_core' );

		/** Add a sanitizer/validator */
		add_filter( 'pre_update_option_' . $this->settings_field, array( &$this, 'save' ), 10, 2 );

		do_action( 'calibrefx_after_save_core' );
	}

	/**
	 * Register Our Security Filters
	 *
	 * $return void
	 */
	protected function security_filters() {}

	/**
	 * Register our meta boxes
	 *
	 * $return null
	 */
	abstract public function meta_boxes();

	/**
	 * Register our meta sections
	 *
	 * $return null
	 */
	abstract public function meta_sections();

	public function hidden_fields() {

	}

	/**
	 * Save our settings option
	 *
	 * $return array
	 */
	public function save( $_newvalue, $_oldvalue ) {
		
		//We merge newvalue and oldvalue
		if ( isset( $_newvalue['reset'] ) ) {
			return $_newvalue;
		}

		if ( ! empty( $_POST['calibrefx_do_import'] ) ) {
			return $_newvalue;
		}

		//Get the value from post settings

		$_newvalue = isset( $_POST[ $this->settings_field ] ) ? $_POST[ $this->settings_field ] : array();

		if($_newvalue){
			$_newvalue = ( is_array( $_newvalue ) ) ? array_map( 'esc_attr', $_newvalue ) : esc_attr( $_newvalue );
		}

		//merge value from old settings
		if ( ! is_array( $_oldvalue ) ) { $_oldvalue = array(); }
		if ( ! is_array( $_newvalue ) ) { $_newvalue = array(); }

		$_newvalue = array_merge( $_oldvalue, $_newvalue );

		//We merge with default value too
		$_newvalue = array_merge( (array) $this->default_settings, $_newvalue );


		if ( ! empty( $_newvalue ) ) {
			//We sanitizing
			global $calibrefx;
			$_newvalue = $calibrefx->security->sanitize_input( $this->settings_field, $_newvalue );
		}

		//flush wp_cache
		wp_cache_flush();

		return $_newvalue;
	}

	/**
	 * Register the settings option in wp_options.
	 *
	 * @return null Returns early if not on the correct admin page.
	 */
	public function register_settings() {

		/** If this page doesn't store settings, no need to register them */
		if ( ! $this->settings_field ){
			return;
		}

		register_setting( $this->settings_field, $this->settings_field );
		add_option( $this->settings_field, $this->default_settings );

		if ( ! isset( $_REQUEST['page'] ) OR $this->page_id != absint( $_REQUEST['page'] ) ){
			return;
		}

		if ( calibrefx_get_option( 'reset', $this->settings_field ) ) {
			//prevent redirect loop
			calibrefx_set_option( 'reset', 0 );
			wp_cache_flush(); //refresh option caches
			
			if ( update_option( $this->settings_field, $this->default_settings ) ){
				calibrefx_admin_redirect( $this->page_id, array( 'reset' => 'true' ) );
			} else {
				calibrefx_admin_redirect( $this->page_id, array( 'error' => 'true' ) );
			}
			exit;
		}
	}

	/**
	 * Display notices on the save or reset of settings.
	 *
	 * @return null Returns early if not on the correct admin page.
	 */
	public function notices() {
		if ( ! isset( $_REQUEST['page'] ) OR $this->page_id != $_REQUEST['page'] ){
			return;
		}

		if ( isset( $_REQUEST['settings-updated'] ) AND 'true' == $_REQUEST['settings-updated'] ){
			echo '<div id="message" class="updated"><p><strong>' . __( 'Settings saved.', 'calibrefx' ) . '</strong></p></div>';
		} elseif ( isset( $_REQUEST['reset'] ) AND 'true' == $_REQUEST['reset'] ) {
			echo '<div id="message" class="updated"><p><strong>' . __( 'Settings reset.', 'calibrefx' ) . '</strong></p></div>';
		} elseif ( isset( $_REQUEST['error'] ) AND 'true' == $_REQUEST['error'] ){
			echo '<div id="message" class="updated"><p><strong>' . __( 'Settings not saved. Error occured.', 'calibrefx' ) . '</strong></p></div>';
		} elseif ( isset( $_REQUEST['import'] ) AND 'true' == $_REQUEST['import'] ){
			echo '<div id="message" class="updated"><p><strong>' . __( 'Import Settings Success.', 'calibrefx' ) . '</strong></p></div>';
		}
	}

	public function settings_init() {
		add_action( 'load-' . $this->pagehook, array( $this, 'scripts' ) );
		add_action( 'load-' . $this->pagehook, array( $this, 'styles' ) );
		add_action( 'load-' . $this->pagehook, array( $this, 'meta_sections' ) );
		add_action( 'load-' . $this->pagehook, array( $this, 'meta_boxes' ) );
	}

	public function scripts() {
		wp_enqueue_script( 'common' );
		wp_enqueue_script( 'wp-lists' );
		wp_enqueue_script( 'postbox' );
	}

	public function styles() {
		wp_enqueue_style( 'calibrefx_admin_css' );
	}

	public function dashboard() {
		global $calibrefx_sections,
			   $calibrefx_current_section;

		$this->_submit_url = apply_filters( 'calibrefx_'.$calibrefx_current_section.'_form_url', 'options.php' );

		?>
        <div id="<?php echo $this->settings_field;?>-page" class="wrap calibrefx-metaboxes <?php echo $calibrefx_current_section; ?>">
            <form method="<?php echo $this->_form_method; ?>" action="<?php echo $this->_submit_url; ?>" enctype="multipart/form-data" id="calibrefx-form">
                <?php if ( 'post' == $this->_form_method ) : ?>
                <?php wp_nonce_field( 'closedpostboxes', 'closedpostboxesnonce', false ); ?>
                <?php wp_nonce_field( 'meta-box-order', 'meta-box-order-nonce', false ); ?>
                <?php settings_fields( $this->settings_field ); // important! ?>
                <?php do_action( 'calibrefx_hidden_fields' ); ?>
                <?php endif; ?>

                <div class="calibrefx-header">
                    <div class="calibrefx-option-logo">
                        <a target="_blank" href="http://www.calibrefx.com" title="CalibreFx">&nbsp;</a>
                    </div>
                    <?php if ( 'post' == $this->_form_method ) : ?>
                    <div class="calibrefx-submit-button">
                        <div class="clear"></div>
                        <button type="submit" class="calibrefx-h2-button calibrefx-settings-submit-button"><i class="fa fa-save fa-2"></i> <?php _e( 'Save Settings', 'calibrefx' ) ?></button>
                        <button type="submit" class="calibrefx-h2-button calibrefx-settings-reset-button" name="<?php echo $this->settings_field; ?>[reset]" value="1" onclick="return calibrefx_confirm( '<?php echo esc_js( __( 'Are you sure you want to reset?', 'calibrefx' ) ); ?>' );"><i class="fa fa-refresh fa-2"></i><?php _e( 'Reset Settings', 'calibrefx' ); ?></button>
                    </div>
                    <?php endif; ?>
                </div>


                <div class="calibrefx-content">
                    
                    <div class="metabox-holder">
                        <div class="calibrefx-tab">
                            <ul class="calibrefx-tab-option">
                                <?php
								foreach ( $calibrefx_sections as $section ) {
									$current_class = ( $calibrefx_current_section === $section['slug'] ) ? ' class="current"' : '';
									$section_link = admin_url( 'themes.php?page=' . $this->page_id . '&section=' . $section['slug'] );

									$icon = $section['icon'];

									echo "<li$current_class>
                                            <a href='$section_link'>
                                                <span class='calibrefx-section-link'><i class='$icon'></i>" . esc_attr( $section['title'] ) . "</span>
												<!--span class='calibrefx-section-link-additional'></span-->
											</a>
										</li>";
								}
								?>
                            </ul>
                            <div class="calibrefx-option">
                                <h2><?php echo esc_attr( $calibrefx_sections[ $calibrefx_current_section ]['title'] ); ?></h2>
                                <div class="postbox-container main-postbox calibrefx-<?php echo $calibrefx_current_section; ?>">
                                    <?php
									calibrefx_do_meta_sections( $calibrefx_current_section, $this->pagehook, 'main', null );
									?>
                                </div>

                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <script type="text/javascript">
            //<![CDATA[
            jQuery(document).ready( function( $ ) {
                // close postboxes that should be closed
                $( '.if-js-closed' ).removeClass( 'if-js-closed' ).addClass( 'closed' );
                // postboxes setup
                postboxes.add_postbox_toggles( '<?php echo esc_attr( $this->pagehook ); ?>' );
                            
                postboxes._mark_area = function() {
                    var visible = $( 'div.postbox:visible' ).length, side = $( '#post-body #side-sortables' );

                    $( '#<?php echo esc_attr( $this->pagehook ); ?> .meta-box-sortables:visible' ).each(function(n, el) {
                        var t = $( this );

                        if ( visible == 1 || t.children( '.postbox:visible' ).length )
                            t.removeClass( 'empty-container' );
                        else
                            t.addClass( 'empty-container' );
                    });

                    if ( side.length ) {
                        if ( side.children( '.postbox:visible' ).length )
                            side.removeClass( 'empty-container' );
                        else if ( $( '#postbox-container-1' ).css( 'width' ) == '280px' )
                            side.addClass( 'empty-container' );
                    }
                };

                postboxes._mark_area();

                $( '.calibrefx-ability a' ).click(function() {
                    $(this).addClass( 'active' );
                });
				
				
				setTimeout( function() { equalize_option_height() }, 400 );	
            });
			
			equalize_option_height = function() {
				var calibrefx_tab_option = jQuery( '.calibrefx-tab-option' ),
					calibrefx_option = jQuery( '.calibrefx-option' ),
					height = 0;
				
				jQuery( '.calibrefx-tab-option li' ).each( function() {
					height += jQuery(this).height();
				});
				
				if( calibrefx_option.height() < height ) {
					calibrefx_option.height( height );
				}
			}
            //]]>
        </script>
        <?php
	}

}
