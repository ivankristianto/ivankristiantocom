<?php

/**
 * Register the widget for use in Appearance -> Widgets
 */
function calibrefx_popular_post_init() {
	register_widget( 'CFX_Popular_Post_Widget' );
}
add_action( 'widgets_init', 'calibrefx_popular_post_init' );

class CFX_Popular_Post_Widget extends WP_Widget {

	protected $defaults;

	/**
	 * Constructor
	 */
	function __construct() {
		parent::__construct(
			'popular-posts-widget',
			apply_filters( 'calibrefx_widget_name', __( 'Popular Posts', 'calibrefx' ) ),
			array(
				'classname' => 'widget_popular_posts',
				'description' => __( 'Display popular posts with thumbnail on your sidebar', 'calibrefx' )
			)
		);

		$this->defaults = array(
			'title'       	=> '',
			'num_posts'  	=> '5',
			'show_thumbnail' => 0,
			'image_size' => 'thumbnail',
			'show_detail' => 0,
			'detail_length' => 100
		);

	}

	/**
	 * Display widget content.
	 *
	 * @param array $args Display arguments including before_title, after_title, before_widget, and after_widget.
	 * @param array $instance The settings for the particular instance of the widget
	 */
	function widget( $args, $instance ) {
		global $wpdb,$calibrefx;

		extract( $args );
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		echo $before_widget;

		if ( ! empty( $instance['title'] ) ) {
			echo $before_title . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $after_title; }

		$query = new WP_Query(array(
			'posts_per_page' => $instance['num_posts'],
			'orderby' => 'comment_count',
			'order' => 'DESC',
			'ignore_sticky_posts' => true
		) );

		$no_post_thumbnail = apply_filters( 'no_thumbnail_image_url', CALIBREFX_IMAGES_URL.'/no-image.jpg' );

		echo '<ul class="list-latest-posts">';

		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) : $query->the_post();

				$img = calibrefx_get_image( array( 'format' => 'html', 'size' => $instance['image_size']) );
				$img = ( ! empty( $img) ? $img : '<img src="'.$no_post_thumbnail.'" />' );
				$date_format = get_option( 'date_format' );

				if ( $instance['show_thumbnail'] ) {
					echo '
						<li>
							<div class="'.calibrefx_row_class().' latest-post-item">
								<div class="latest-post-thumb col-lg-4 col-md-4 col-sm-4 col-xs-4">
									<a href="'.get_permalink().'" class="thumbnail">'.$img.'</a>
								</div>
								<div class="latest-post-detail col-lg-8 col-md-8 col-sm-8 col-xs-8">
									<h5 class="latest-post-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h5>
									<p class="latest-post-info">'.do_shortcode( '[post_date]' ).'</p>
									'.(( $instance['show_detail']) ? get_the_content_limit( $instance['detail_length'] ) : '' ).'
								</div>
							</div>
						</li>
					';
				}else {
					echo '
						<li>
							<div class="'.calibrefx_row_class().' latest-post-item">
								<div class="latest-post-detail col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<h5 class="latest-post-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h5>
									<p class="latest-post-date">'.date( $date_format, get_the_time( 'U' ) ).'</p>
									'.(( $instance['show_detail']) ? get_the_content_limit( $instance['detail_length'] ) : '' ).'
								</div>
							</div>
						</li>
					';
				}

			endwhile;
		else :
			echo '<li>'.__( 'There is no post available yet', 'calibrefx' ).'</li>';
		endif;

		echo '</ul>';

		echo $after_widget;

		wp_reset_query();
		wp_reset_postdata();
	}

	 /**
	  * Update a particular instance.
	  */
	function update( $new_instance, $old_instance ) {

		$new_instance['title'] = strip_tags( $new_instance['title'] );
		return $new_instance;

	}

	/**
	 * Display the settings update form.
	 */
	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, $this->defaults );
?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'calibrefx' ); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'num_posts' ); ?>"><?php _e( 'Number of posts to show', 'calibrefx' ); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'num_posts' ); ?>" name="<?php echo $this->get_field_name( 'num_posts' ); ?>" value="<?php echo absint( $instance['num_posts'] ); ?>" size="3" />
		</p>
		
		<p>
			<input id="<?php echo $this->get_field_id( 'show_detail' ); ?>" type="checkbox" name="<?php echo $this->get_field_name( 'show_detail' ); ?>" value="1"<?php checked( $instance['show_detail'] ); ?> />
			<label for="<?php echo $this->get_field_id( 'show_detail' ); ?>"><?php _e( 'Show Content', 'calibrefx' ); ?></label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'detail_length' ); ?>"><?php _e( 'Content Length', 'calibrefx' ); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'detail_length' ); ?>" name="<?php echo $this->get_field_name( 'detail_length' ); ?>" value="<?php echo absint( $instance['detail_length'] ); ?>" size="3" />
		</p>

		<hr class="div" />

		<p>
			<input id="<?php echo $this->get_field_id( 'show_thumbnail' ); ?>" type="checkbox" name="<?php echo $this->get_field_name( 'show_thumbnail' ); ?>" value="1"<?php checked( $instance['show_thumbnail'] ); ?> />
			<label for="<?php echo $this->get_field_id( 'show_thumbnail' ); ?>"><?php _e( 'Show Thumbnail', 'calibrefx' ); ?></label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'image_size' ); ?>"><?php _e( 'Image Size', 'calibrefx' ); ?>:</label>
			<select id="<?php echo $this->get_field_id( 'image_size' ); ?>" name="<?php echo $this->get_field_name( 'image_size' ); ?>">
				<option value="thumbnail">thumbnail (<?php echo get_option( 'thumbnail_size_w' ); ?>x<?php echo get_option( 'thumbnail_size_h' ); ?>)</option>
				<?php
				$sizes = calibrefx_get_additional_image_sizes();
				foreach ( (array) $sizes as $name => $size ) {
					echo '<option value="' . $name . '" ' . selected( $name, $instance['image_size'], false ) . '>' . $name . ' ( ' . $size['width'] . 'x' . $size['height'] . ' )</option>'; }
				?>
			</select>
		</p>

<?php
	}
}