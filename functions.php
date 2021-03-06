<?php
/**
 * DarkUnion functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @package DarkUnion
 */

if ( ! function_exists( 'DarkUnion_setup' ) ) :
  function DarkUnion_starter_setup() {
    load_theme_textdomain( 'DarkUnion', get_template_directory() . '/languages' );
	  add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menus( array(
      'primary' => __( 'Primary Menu', 'DarkUnion' ),
      'footer'  => __( 'Footer Menu', 'DarkUnion' ),
      'tabs'  => __( 'Tabs Menu', 'DarkUnion' ),
	   ) );
     add_theme_support( 'html5', array(
       'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
     ) );
     add_theme_support( 'post-formats', array(
       'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
     ) );
    add_theme_support(  'customize-selective-refresh-widgets' );
    add_theme_support('custom-logo', array(
      'height' => 100,
      'flex-width' => true,
      'padding' => 10,
    ));
    function  DarkUnion_add_editor_styles() {
      add_editor_style( 'custom-editor-style.css' );
    }
    add_action( 'after_setup_theme', 'DarkUnion_starter_setup');
    add_action( 'admin_init', 'DarkUnion_add_editor_styles' );
  }
endif;
add_action( 'after_setup_theme', 'DarkUnion_starter_setup' );

function DarkUnion_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'DarkUnion_content_width', 1170 );
}
add_action( 'after_setup_theme', 'DarkUnion_content_width', 0 );

function DarkUnion_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'DarkUnion' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'DarkUnion' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'DarkUnion_widgets_init' );

//opruimen alle extra ids en classes op items
function wp_nav_menu_attributes_filter($var) {
	return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
}
add_filter('nav_menu_css_class', 'wp_nav_menu_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'wp_nav_menu_attributes_filter', 100, 1);
add_filter('page_css_class', 'wp_nav_menu_attributes_filter', 100, 1);

// scripts laden
function DarkUnion_scripts() {
  //laden bootstrap
  wp_enqueue_style( 'DarkUnion-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css' );
  //laden eigen css
	wp_enqueue_style( 'DarkUnion-css', get_template_directory_uri() . '/style.css' );
  // laden javascript
  wp_enqueue_script('DarkUnion-jqueryjs', get_template_directory_uri() . '/js/jquery.min.js', array() );
  // laden move.js
  wp_enqueue_script('DarkUnion-movejs', get_template_directory_uri() . '/js/move.js', array() );
  // Remove WP Version From Styles
  add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 );
  // Remove WP Version From Scripts
  add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 );
  // Function to remove version numbers
  function sdt_remove_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}

wp_enqueue_script('jquery');
  // Internet Explorer HTML5 support
  wp_enqueue_script( 'html5hiv',get_template_directory_uri().'/js/html5.js', array(), '3.7.0', false );
  wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );
  wp_enqueue_script('DarkUnion-bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'DarkUnion_scripts' );

// function include_js() {
//   wp_enqueue_script('DarkUnion-movejs', get_stylesheet_directory_uri() . '/js/move.js');
//   }
// add_action( 'wp_enqueue_scripts', 'include_js');

function DarkUnion_password_form() {
  global $post;
  $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
  $o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
  <div class="d-block mb-3">' . __( "To view this protected post, enter the password below:", "DarkUnion" ) . '</div>
  <div class="form-group form-inline"><label for="' . $label . '" class="mr-2">' . __( "Password:", "DarkUnion" ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" class="form-control mr-2" /> <input type="submit" name="Submit" value="' . esc_attr__( "Submit", "DarkUnion" ) . '" class="btn btn-primary"/></div>
  </form>';
  return $o;
  }
add_filter( 'the_password_form', 'DarkUnion_password_form' );


?>
