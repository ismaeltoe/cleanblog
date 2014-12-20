<?php
/**
 * Custom Widget for displaying Social Icons with a link to your profile/wall/site
 *
 *
 *
 * @link http://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 * 
 */

class Clean_Blog_Social_Widget extends WP_Widget {

	private $socials = array( 
		'android', 
		'behance', 'bitbucket', 
		'deviantart', 'dribble',
		'facebook', 'flickr',
		'github', 'google-plus',
		'instagram',
		'jsfiddle', 
		'lastfm', 'linkedin',
		'pinterest', 
		'slideshare', 'soundcloud', 'stack-overflow',
		'tumblr', 'twitter',
		'vine',
		'youtube' );

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct( 'widget_cleanblog_social', __( 'Clean Blog Social', TDOMAIN ), array(
			'classname'   => 'widget_cleanblog_social',
			'description' => __( 'Use this widget to display your social profiles links.', TDOMAIN ),
		) );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		echo $args['before_wigdet'];
		?>
		<li>
			<a href="<?php echo $instance['link']; ?>">
	            <span class="fa-stack fa-lg">
	                <i class="fa fa-circle fa-stack-2x"></i>
	                <i class="fa fa-<?php echo $instance['social']; ?> fa-stack-1x fa-inverse"></i>
	            </span>
	        </a>
	    </li>
<?php
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		$title  = empty( $instance['title'] ) ? '' : esc_attr( $instance['title'] );
		$link = empty( $instance['link'] ) ? '' : esc_attr( $instance['link'] );
		$social = isset( $instance['social'] ) && in_array( $instance['social'], $this->socials ) ? $instance['social'] : '';
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', TDOMAIN ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'social' ) ); ?>"><?php _e( 'Social Network to show:', TDOMAIN ); ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'social' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'social' ) ); ?>">
				<?php foreach ( $this->socials as $slug ) : ?>
				<option value="<?php echo esc_attr( $slug ); ?>"<?php selected( $social, $slug ); ?>><?php echo $slug; ?></option>
				<?php endforeach; ?>
			</select>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>"><?php _e( 'Your Profile/Wall/Site Link:', TDOMAIN ); ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>">
		</p>
<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		$instance['title']  = strip_tags( $new_instance['title'] );
		$instance['link'] = strip_tags( $new_instance['link'] );
		if ( in_array( $new_instance['social'], $this->socials ) ) {
			$instance['social'] = $new_instance['social'];
		}

		return $instance;
	}
}