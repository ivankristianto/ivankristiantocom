<?php

define( 'CHILD_THEME_NAME', 'minimalist' );
define( 'CHILD_THEME_URL', 'http://www.ivankristianto.com' );
define( 'CHILD_THEME_VERSION', '1.1.0' );
define( 'CHILD_THEME_DB_VERSION', '1' );
define( 'CHILD_APP_DIR', 'app' );

add_theme_support( "calibrefx-template-styles" );

add_action( "wp_head", "add_comfortaa_font" );
function add_comfortaa_font(){ ?>
	<link href='//fonts.googleapis.com/css?family=Comfortaa:400,700' rel='stylesheet' type='text/css'>
<?php
}

add_theme_support( 'infinite-scroll', array(
	'type'           => 'scroll',
	'footer_widgets' => false,
	'container'      => 'content',
	'footer'         => 'wrapper',
	'wrapper'        => true,
	'render'         => false,
	'posts_per_page' => false,
) );

function add_search_box_to_menu( $items, $args ) {
	if( $args->theme_location == 'primary' ){
		return $items.get_search_form( FALSE );
	}

	return $items;
}
add_filter('wp_nav_menu_items','add_search_box_to_menu', 10, 2);

function min_enqueue_scripts(){
	wp_enqueue_script( 'min.functions', CHILD_JS_URL . '/functions.js', array( 'jquery' ) );
}
add_action( 'calibrefx_meta', 'min_enqueue_scripts' );

function min_init_themes(){
	remove_action( 'calibrefx_meta', 'calibrefx_do_meta', 10 );
}
add_action( 'init', 'min_init_themes' );

function min_readmore_text(){
	return __( 'Read more...', 'minimalist' );
}
add_filter( 'calibrefx_readmore_text', 'min_readmore_text' );

function image_display( $content ){
   	$content .= '<div class="entry-image">';
    $content .= calibrefx_get_image( array( 'format' => 'html', 'size' => 'full', 'attr' => array( 'class' => 'alignnone post-image img-responsive' ) ) );
    $content .= '</div>';

    return $content;
}

function gallery_display( $content ){
    $attached_images = get_children('post_type=attachment&post_mime_type=image&post_parent=' . get_the_id() );
    $arrKeys = array_keys($attached_images);
    if( !empty( $arrKeys ) ){ 
        $arrKeys = implode(",", $arrKeys);
        $content .= '<div class="entry-gallery">';
        $content .= do_shortcode( '[gallery type="rectangular" link="file" size="large" ids="' . $arrKeys . '"]'  );
        $content .= '</div>';
    }

    return $content;
}

function date_display( $content ){
    $content .= '<div class="published-date">';
    $content .= do_shortcode( '[post_date format="relative"]'  );
    $content .= '</div>';

    return $content;
}

function force_comment( $content ) {
    global $withcomments ;
    //$withcomments = true;

    return $content;
}


/*add_shortcode( 'ck_related_articles', 'me_related_articles' );  
function me_related_articles( $atts ) {
	$atts = shortcode_atts( array(
		'title'        => '',
		'show_image'   => '1',
		'show_excerpt' => '1',
		'count'        => '5',
		'post_ids'     => '',
	), $atts, 'ck_related_articles' );

	global $post;

	$post_type = get_post_type( $post );

	$post_ids = explode( ',', $atts['post_ids'], absint( $atts['count'] ) );
	$post_ids = array_filter( $post_ids, function ( $value ) {
		return ( '' !== $value && 'null' !== $value );
	} );
	$post_ids = array_map( function ( $value ) {
		//make sure the post id is integer
		return absint( $value );
	}, $post_ids );

	//we don't want to show current post
	$exclude_ids = array( $post->ID, $post_ids );

	$related_post_ids = get_related_post_ids( $post, $atts['count'], $exclude_ids );
	$post_ids         = array_merge( $post_ids, $related_post_ids );

	$query_args = array(
		'post_type'      => $post_type,
		'posts_per_page' => absint( $atts['count'] ),
		'post__in'       => $post_ids,
		'post_status'    => array( 'publish' ),
		'cache_results'  => true,
		'orderby'        => 'post__in',
	);
	$query      = new \WP_Query( $query_args );

	echo '<pre>';var_dump($query->posts);exit;
}

function get_related_post_ids( $post, $size = 5, $exclude_ids = array() ) {

	$post_type = get_post_type( $post );

	//First try to use Jetpack Related Post
	if ( class_exists( '\Jetpack_RelatedPosts' ) && method_exists( '\Jetpack_RelatedPosts', 'init_raw' ) ) {
		$jetpack_related_posts = \Jetpack_RelatedPosts::init_raw();

		$categories = get_the_terms( $post, 'category' );
		$tags       = get_the_terms( $post, 'post_tag' );

		$args = array(
			'size'             => (int) $size,
			'post_type'        => $post_type,
			'has_terms'        => array( $categories, $tags ),
			'exclude_post_ids' => $exclude_ids,
		);

		$related_post_ids = $jetpack_related_posts->get_for_post_id( $post->ID, $args );
		var_dump($related_post_ids);exit;
		if ( $related_post_ids ) {
			return wp_list_pluck($related_post_ids,'id');
		}
	}
	
	return array();
}*/