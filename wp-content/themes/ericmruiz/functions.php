<?php
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
function theme_enqueue_scripts(){

	wp_register_script('modernizr', get_bloginfo('template_url') . '/js/modernizr.js');
	wp_enqueue_script('modernizr');

	wp_register_script('require', get_bloginfo('template_url') . '/js/vendor/requirejs/require.js', array(), false, true);
	wp_enqueue_script('require');

	wp_register_script('global', get_bloginfo('template_url') . '/js/global.js', array('require'), false, true);
	wp_enqueue_script('global');

	wp_register_script('ss-standard', get_bloginfo('template_url') . '/webfonts/ss-standard.js');
	wp_enqueue_script('ss-standard');

	wp_register_script('livereload', 'http://localhost:35729/livereload.js?snipver=1', null, false, true);
	wp_enqueue_script('livereload');

	wp_enqueue_style('global', get_bloginfo('template_url') . '/css/global.css');
	wp_enqueue_style('ss-standard-font', get_bloginfo('template_url') . '/webfonts/ss-standard.css');
}

//Add Featured Image Support
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 500 );
}


if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'category-thumb', 300 ); //300 pixels wide (and unlimited height)
}


// Clean up the <head>
function removeHeadLinks() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');

function register_menus() {
	register_nav_menus(
		array(
			'main-nav' => 'Main Navigation',
			'secondary-nav' => 'Secondary Navigation',
			'sidebar-menu' => 'Sidebar Menu'
		)
	);
}
add_action( 'init', 'register_menus' );

// function register_widgets(){

// 	register_sidebar( array(
// 		'name' => __( 'Sidebar' ),
// 		'id' => 'main-sidebar',
// 		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
// 		'after_widget' => '</li>',
// 		'before_title' => '<h3 class="widget-title">',
// 		'after_title' => '</h3>',
// 	) );

// }//end register_widgets()
// add_action( 'widgets_init', 'register_widgets' );


// read more link
// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
       global $post;
	return '<a class="read-more" href="'. get_permalink($post->ID) . '"> // More </a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Eric's sidebar for the footer widgets
// Register Sidebar
function footer_sidebar() {

	$args = array(
		'id'            => 'eric-footer',
		'name'          => __( 'eric-footer', 'text_domain' ),
		'description'   => __( 'Footer Widgets', 'text_domain' ),
		'name'          => __( 'Footer Widgets', 'theme_text_domain' ),
		'class'         => 'footer-block',
		'before_widget' => '<div class="footer-block">',
		'after_widget'	=> '</div>',
		'before_title'  => '<h2 class="footer-block--title">',
		'after_title'   => '</h2>'
	);
	register_sidebar( $args );

}

// Hook into the 'widgets_init' action
add_action( 'widgets_init', 'footer_sidebar' );

// Register Custom Post Type
function em_book_list() {

	$labels = array(
		'name'                => _x( 'Reading List', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Reading List', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Readling List', 'text_domain' ),
		'name_admin_bar'      => __( 'Readling List', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Items', 'text_domain' ),
		'add_new_item'        => __( 'Add New Item', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'new_item'            => __( 'New Item', 'text_domain' ),
		'edit_item'           => __( 'Edit Item', 'text_domain' ),
		'update_item'         => __( 'Update Item', 'text_domain' ),
		'view_item'           => __( 'View Item', 'text_domain' ),
		'search_items'        => __( 'Search Item', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'reading_list', 'text_domain' ),
		'description'         => __( 'A list of books I\'ve read and recommend', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => false,
		'capability_type'     => 'page',
	);
	register_post_type( 'reading_list', $args );

}

// Hook into the 'init' action
add_action( 'init', 'em_book_list', 0 );

// Register Custom Post Type
function em_articles() {

	$labels = array(
		'name'                => _x( 'Articles', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Article', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Articles', 'text_domain' ),
		'name_admin_bar'      => __( 'Post Articles', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Items', 'text_domain' ),
		'add_new_item'        => __( 'Add New Item', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'new_item'            => __( 'New Item', 'text_domain' ),
		'edit_item'           => __( 'Edit Item', 'text_domain' ),
		'update_item'         => __( 'Update Item', 'text_domain' ),
		'view_item'           => __( 'View Item', 'text_domain' ),
		'search_items'        => __( 'Search Item', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'articles', 'text_domain' ),
		'description'         => __( 'Article Description', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title' ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'articles', $args );

}

// Hook into the 'init' action
add_action( 'init', 'em_articles', 0 );

class EM_Articles_Widget extends WP_widget {

	public function __construct() {
		// widget actual processes
		parent::__construct(
			'em_articles_widget', // Base ID
			__( 'Eric\'s Recent Articles', 'text_domain' ), // Name
			array( 'description' => __( 'A widget to dislpay Eric\'s most recent articles from outside sources', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}

		helloworld();
		echo $args['after_widget'];
		
		// make function call to get the wp_query
		
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">

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
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} // end of widget class

function helloworld() {
	global $post;
	$query = new WP_Query();
	$query->query('post_type=articles&order=DESC&posts_per_page=5');
	if ($query->found_posts > 0) {
		echo '<ul>';
		while ($query->have_posts()) {
			$query->the_post();
			echo '<li><a href="' . get_field('article_link') . '">' . get_the_title() . '</a></li>';	
		}
		echo '</ul>';
		wp_reset_postdata(); 
	}
}


function register_em_articles_widget() {
    register_widget( 'EM_Articles_Widget' );
}
add_action( 'widgets_init', 'register_em_articles_widget' );
