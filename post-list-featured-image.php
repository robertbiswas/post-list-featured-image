<?php
/*
* Plugin Name:       Featured Image in Post List
* Plugin URI:        https://robertbiswas.com
* Description:       Showing featured Image in Dashboad Post List
* Version:           1.0.0
* Requires at least: 6.0.0
* Requires PHP:      7.4
* Author:            Robert Biswas
* Author URI:        https://robertbiswas.com
* License:           GPL v2 or later
* License URI:       https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain:       fipl
*/

if ( ! defined( 'ABSPATH' ) ) {
exit;
}

class Post_List_Feature_image{
	
	static $instance;

	public static function get_instance() {
		if ( ! self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __construct(){
		$this->require_classes();
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_style' ) );
	}

	public function require_classes(){
		require_once __DIR__ . '/includes/post-image-column.php';
		new Post_Image_Column();
	}

	public function enqueue_admin_style($hook) {
		if ( 'edit.php' != $hook ) {
			return;
		}
		wp_enqueue_style('plfi-admin-style', plugin_dir_url( __FILE__ ) . 'assets/css/admin-style.css', array(), '1.0');
	}
}

Post_List_Feature_image::get_instance();




