<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.google.com
 * @since      1.0.0
 *
 * @package    Jade_Blocks
 * @subpackage Jade_Blocks/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Jade_Blocks
 * @subpackage Jade_Blocks/admin
 * @author     Amoy Nicholson
 */

if ( !class_exists( 'Jade_Blocks_Admin' ) ) {
	
	class Jade_Blocks_Admin {

		/**
		 * The ID of this plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string    $plugin_name    The ID of this plugin.
		 */
		private $plugin_name;

		/**
		 * The version of this plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string    $version    The current version of this plugin.
		 */
		private $version;

		/**
		 * Initialize the class and set its properties.
		 *
		 * @since    1.0.0
		 * @param      string    $plugin_name       The name of this plugin.
		 * @param      string    $version    The version of this plugin.
		 */
		public function __construct( $plugin_name, $version ) {

			$this->plugin_name = $plugin_name;
			$this->version = $version;
			
		}

		
		/**
		 * Register the stylesheets for the admin area.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_styles() {

			/**
			 * This function is provided for demonstration purposes only.
			 *
			 * An instance of this class should be passed to the run() function
			 * defined in Jade_Blocks_Loader as all of the hooks are defined
			 * in that particular class.
			 *
			 * The Jade_Blocks_Loader will then create the relationship
			 * between the defined hooks and the functions defined in this
			 * class.
			 */

			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/jade-blocks-admin.css', array(), $this->version, 'all' );

		}

		/**
		 * Register the JavaScript for the admin area.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_scripts() {

			/**
			 * This function is provided for demonstration purposes only.
			 *
			 * An instance of this class should be passed to the run() function
			 * defined in Jade_Blocks_Loader as all of the hooks are defined
			 * in that particular class.
			 *
			 * The Jade_Blocks_Loader will then create the relationship
			 * between the defined hooks and the functions defined in this
			 * class.
			 */

			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/jade-blocks-admin.js', array( 'jquery' ), $this->version, false );

		}

		public function jade_blocks_Settings_Page() {
			$page_title = 'Jade Blocks Dashboard';
			$menu_title = 'Jade Blocks';
			$capability = 'manage_options';
			$menu_slug	= 'jade-blocks';
			$callback = array( $this, 'page_settings');
			$icon_url = 'dashicons-admin-plugins';
			$position = 22;
			add_menu_page($page_title, $menu_title, $capability, $menu_slug, $callback, $icon_url, $position);
		}

		/**
		 * Creates the admin page
		 *
		 * @since 		1.0.0
		 * @return 		void
		 */
		public function page_settings() {

			include( plugin_dir_path( __FILE__ ) . 'partials/jade-blocks-admin-display.php' );

		} // page_settings()

		/* 
		* ACF Save Field Group Function
		*/
		function jade_blocks_json_save_point( $jade_blocks_path ) {
			// update path
			$jade_blocks_path = plugin_dir_path( __FILE__ ) . '../acf-json';
			// return
			return $jade_blocks_path;
		}

		/* 
		* ACF Load Field Group Function
		*/
		function jade_blocks_json_load_point( $jade_blocks_paths ) {
			// remove original path (optional)
			unset($jade_blocks_paths[0]);			
			// append path
			$jade_blocks_paths[] = plugin_dir_path( __FILE__ ) . '../acf-json';
			// return
			return $jade_blocks_paths;
		}
	}

}

