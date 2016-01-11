<?php
/*#############################################
HERE YOU CAN ADD YOUR OWN FUNCTIONS OR REPLACE FUNCTIONS IN THE PARENT THEME
#############################################*/

// Here we add the parent styles
add_action( 'wp_enqueue_scripts', 'ds_child_enqueue_styles' );
function ds_child_enqueue_styles() {
    wp_enqueue_style( 'dt-parent-style', get_template_directory_uri() . '/style.css', array());

}

// Here we defind the textdomain for the child theme, if changing you should also replace it in the function below. 
if (!defined('DS_CHILD')) define('DS_CHILD', 'directory-starter-child');


add_action('after_setup_theme', 'ds_child_theme_setup');
function ds_child_theme_setup(){
   // load_child_theme_textdomain( DS_CHILD, get_stylesheet_directory() . '/languages' ); // uncomment this if you plan to use translation
}

function register_my_menus() {
    register_nav_menus(
        array(
            'social-menu' => __( 'Social Menu' )
        )
  );
}
add_action( 'init', 'register_my_menus' );

function ds_add_top_header() {
    global $current_user;
    get_currentuserinfo();
    if ( class_exists( 'BuddyPress' ) ) {
        $user_link = bp_get_loggedin_user_link().'settings/';
    } else {
        $user_link = get_author_posts_url( $current_user->ID );
    }
    ?>
    <div class="ds-top-header">
        <div class="container">
            <div class="ds-top-header-inner">
                <div class="ds-top-head-left">
                    <?php echo get_bloginfo( 'description', 'display' ); ?>
                </div>
                <div class="ds-top-head-right">
                    <?php wp_nav_menu( array(
                        'theme_location' => 'social-menu',
                        'container_class' => 'social_menu_class',
                        'menu_class' => 'ds-top-menu-ul'
                    ) ); ?>
                </div>
            </div>
        </div>
    </div>
    <?php
}
add_action('dt_before_header', 'ds_add_top_header');
?>
