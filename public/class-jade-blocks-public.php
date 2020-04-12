<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       www.google.com
 * @since      1.0.0
 *
 * @package    Jade_Blocks
 * @subpackage Jade_Blocks/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Jade_Blocks
 * @subpackage Jade_Blocks/public
 * @author     Amoy <Nicholson>
 */
class Jade_Blocks_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/jade-blocks-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/jade-blocks-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
		 * Add a block category for "Jade ACF Blocks" if it doesn't exist already.
		 *
		 * @param array $categories Array of block categories.
		 *
		 * @return array
		 */
		public function jade_blocks_Categories( $categories, $post ) {
			return array_merge(
				$categories,
				array(
					array(
						'slug' => 'jade-acf-blocks',
						'title' => __( 'Jade ACF Blocks', 'jade-blocks' ),
						'icon'  => 'wordpress',
					),
				)
			);
		}

		public function jade_blocks_acf_init() {
	
			if( function_exists('acf_register_block') ) {
								
				acf_register_block(array(
					'name'				=> 'jade-card-block',
					'mode'				=> 'preview',
					'title'				=> __('Card Block'),
					'description'		=> __('A custom card block.'),
					'render_callback'	=> 'jade_acf_block_render_callback',
					'enqueue_assets' 	=> function(){
						wp_enqueue_style( 'jade-block-css', plugin_dir_url( __FILE__ ) . '/css/jade-blocks-public.min.css', false,
						'1.0.0' );
					},
					'category'			=> 'jade-acf-blocks',
					'icon'				=> 'admin-comments',
					'keywords'			=> array( 'card', 'image', 'layout' ),
					'supports'          => array(
						'align'         => true,
						'mode'          => true,
						'multiple'      => true,
					),
				));

					// register a testimonial block
				/*acf_register_block(array(
					'name'				=> 'testimonial',
					'title'				=> __('Testimonial'),
					'description'		=> __('A custom testimonial block.'),
					'render_callback'	=> 'my_acf_block_render_callback',
					'category'			=> 'Jumelles ACF Blocks',
					'icon'				=> 'admin-comments',
					'keywords'			=> array( 'testimonial', 'quote' ),
					'supports'          => array(
						'align'         => true,
						'mode'          => true,
						'multiple'      => true,
					),
				)); */
				
				/*acf_register_block(array(
					'name'				=> 'team',
					'title'				=> __('Team'),
					'description'		=> __('A custom team block.'),
					'render_callback'	=> 'jumelles_acf_block_render_callback',
					'enqueue_assets' 	=> function(){
						wp_enqueue_style( 'block-css', get_template_directory_uri() . '/acfblocks.min.css' );
					},
					'category'			=> 'jumelles-blocks',
					'icon'				=> 'admin-comments',
					'keywords'			=> array( 'team', 'teams', 'posts' ),
					'supports'          => array(
						'align'         => true,
						'mode'          => true,
						'multiple'      => true,
					),
				));
		
				acf_register_block(array(
					'name'				=> 'post-grid',
					'title'				=> __('Post Grid'),
					'description'		=> __('A custom posts grid block.'),
					'render_callback'	=> 'jumelles_acf_block_render_callback',
					'enqueue_assets' 	=> function(){
						wp_enqueue_style( 'block-css', get_template_directory_uri() . '/acfblocks.min.css' );
					},
					'category'			=> 'jumelles-blocks',
					'icon'				=> 'admin-comments',
					'keywords'			=> array( 'posts' ),
					'supports'          => array(
						'align'         => true,
						'mode'          => true,
						'multiple'      => true,
					),
				)); */
			}
		}
		
		


}
