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
                    <div class="social_menu_class">
                        <ul id="menu-social-connect" class="ds-top-menu-ul">
                            <li id="menu-item-211" class="alignright floatright margin 10px 20px menu-item menu-item-type-custom menu-item-object-custom social-icon google-plus menu-item-211"><a target="_blank" href="http://plus.google.com/cofficocom"><i class="icon-2x icon-google-plus "></i><span class="fa-hidden">Google+</span></a></li>
                            <li id="menu-item-210" class="alignright floatright margin 10px 20px menu-item menu-item-type-custom menu-item-object-custom social-icon pinterest menu-item-210"><a target="_blank" href="http://pinterest.com/cofficocom"><i class="icon-2x icon-pinterest "></i><span class="fa-hidden">Pinterest</span></a></li>
                            <li id="menu-item-209" class="alignright floatright margin 10px 20px menu-item menu-item-type-custom menu-item-object-custom social-icon instagram menu-item-209"><a target="_blank" href="http://instagram.com/cofficocom"><i class="icon-2x icon-instagram "></i><span class="fa-hidden">Instagram</span></a></li>
                            <li id="menu-item-208" class="alignright floatright margin 10px 20px menu-item menu-item-type-custom menu-item-object-custom social-icon twitter menu-item-208"><a target="_blank" href="http://twitter.com/cofficocom"><i class="icon-2x icon-twitter "></i><span class="fa-hidden">Twitter</span></a></li>
                            <li id="menu-item-207" class="alignright floatright margin 5px auto menu-item menu-item-type-custom menu-item-object-custom social-icon facebook menu-item-207"><a target="_blank" href="http://facebook.com/cofficocom"><i class="icon-2x icon-facebook "></i><span class="fa-hidden">Facebook</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
add_action('dt_before_header', 'ds_add_top_header');
?>
