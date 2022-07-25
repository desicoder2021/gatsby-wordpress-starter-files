<?php
/**
 * Plugin Name: Bookworm Overlay Menu
 * Plugin URI: http://techvista.in
 * Description: Creates a mobile overlaymenu for the Bookworm website
 * Version: 1.0
 * Author: Tech Vista
 * Author URI: http://techvista.in
 */

function wbn_overlay_register_stylesheet(){
	wp_register_style( 'wbn_overlay_stylesheet', plugins_url( '/styles/style.css', __FILE__ ) );
	wp_enqueue_style( 'wbn_overlay_stylesheet' );
}

function wbn_add_script() {
  wp_register_script('wbn_script', plugins_url('scripts/wbn-overlay.js', __FILE__), array('jquery') );
  wp_enqueue_script('wbn_script');
}

// Load the styles
add_action( 'wp_enqueue_scripts', 'wbn_overlay_register_stylesheet' );

// Load the JQuery script
add_action( 'wp_enqueue_scripts', 'wbn_add_script' );

// Initiate the plugin in the footer
add_action( 'wp_footer', 'wbn_overlay_menu' );

function wbn_overlay_menu(){ ?>
	
	<!-- The Div for the overlay menu -->
	<div id="wbn-ovrly-menu">
		<span class="wbn-ovrly-closeButton">
			<img src="/wp-content/themes/bookworm/img/tango_close_button.svg">
		</span>

		<div class="wbn-tango-white-logo">
			<a href=" <?php echo get_site_url(); ?> "><img src="/wp-content/themes/bookworm/img/logo-inverted.svg"></a>
		</div>

		<nav id="wbn-ovrly-nav" role="navigation">
			<?php wp_nav_menu( array( 'menu' => 'mainMenu' ) ); ?>
		</nav>
	</div>

	<!-- The Span for the hamburger button -->
	<span class="wbn-ovrly-hamburger">
		<img src="/wp-content/themes/bookworm/img/menu-icon.svg">
	</span>
	
<?php }