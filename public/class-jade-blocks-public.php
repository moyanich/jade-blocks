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

				/* HERO BLOCKS */

				acf_register_block(array(
					'name'				=> 'jade-hero-one',
					'mode'				=> 'preview',
					'align' 			=> 'full',
					'title'				=> __('Hero Block'),
					'description'		=> __('A custom hero block.'),
					'render_callback'	=> 'jade_acf_block_render_callback',
					'enqueue_assets' 	=> function(){
						wp_enqueue_style( 'jade-block-css', plugin_dir_url( __FILE__ ) . '/css/jade-blocks-public.min.css', false,
						'1.0.0' );
					},
					'category'			=> 'jade-acf-blocks',
					'icon'				=> 'admin-comments',
					'keywords'			=> array( 'hero', 'image', 'layout' ),
					'supports'          => array(
						'align'         => true,
						'mode'          => true,
						'multiple'      => true,
					),
				));

				/* CARD BLOCKS */

				acf_register_block(array(
					'name'				=> 'jade-card-v1',
					'mode'				=> 'preview',
					'title'				=> __('Card V1'),
					'description'		=> __('A custom card block.'),
					'render_callback'	=> 'jade_acf_block_render_callback',
					'enqueue_assets' 	=> function(){
						wp_enqueue_style( 'jade-block-css', plugin_dir_url( __FILE__ ) . '/css/jade-blocks-public.min.css', false,
						'1.0.0' );
					},
					'category'			=> 'jade-acf-blocks',
					'icon'				=> '<svg xmlns="http://www.w3.org/2000/svg" width="415" height="484" viewBox="0 0 415 484"><g transform="translate(-31 -34)"><g transform="translate(-7 17.754)"><rect width="415" height="484" transform="translate(38 16.246)" fill="#fff"/><rect width="415" height="267" transform="translate(38 16.246)" fill="#2699fb"/><text transform="translate(65 326.246)" fill="#7f7f7f" font-size="31" font-family="Arial-BoldMT, Arial" font-weight="700"><tspan x="0" y="0">Heading</tspan></text><text transform="translate(65 366.246)" fill="#454545" font-size="10" font-family="ArialMT, Arial"><tspan x="0" y="9">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod </tspan><tspan x="0" y="20">tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At </tspan><tspan x="0" y="31">vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, </tspan><tspan x="0" y="42">no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit </tspan><tspan x="0" y="53">amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut </tspan><tspan x="0" y="64">labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam </tspan><tspan x="0" y="75">et justo</tspan></text></g><g transform="translate(50 478)"><g fill="none" stroke="#bce0fd" stroke-width="2"><rect width="96" height="40" rx="4" stroke="none"/><rect x="1" y="1" width="94" height="38" rx="3" fill="none"/></g><text transform="translate(48 24)" fill="#2699fb" font-size="10" font-family="Arial-BoldMT, Arial" font-weight="700"><tspan x="-15" y="0">MORE</tspan></text></g></g></svg>',
					'keywords'			=> array( 'card', 'image', 'layout' ),
					'supports'          => array(
						'align'         => true,
						'mode'          => true,
						'multiple'      => true,
					),
					'example' => array(
						'attributes' => array(
							'mode' => 'preview',
							'data' => array(
								'background_color' => '#ff0000',
								'other_custom_field' => 'xxx',
							),
						)
					),
				));

				acf_register_block(array(
					'name'				=> 'jade-card-v2',
					'mode'				=> 'preview',
					'title'				=> __('Card V2'),
					'description'		=> __('A circular card block.'),
					'render_callback'	=> 'jade_acf_block_render_callback',
					'enqueue_assets' 	=> function(){
						wp_enqueue_style( 'jade-block-css', plugin_dir_url( __FILE__ ) . '/css/jade-blocks-public.min.css', false,
						'1.0.0' );
					},
					'category'			=> 'jade-acf-blocks',
					'icon'				=> '<svg xmlns="http://www.w3.org/2000/svg" width="540" height="664" viewBox="0 0 540 664"><g transform="translate(-30 -21)"><g transform="translate(30 21)" fill="#fff" stroke="rgba(0,0,0,0)" stroke-linecap="round" stroke-width="1"><rect width="540" height="664" stroke="none"/><rect x="0.5" y="0.5" width="539" height="663" fill="none"/></g><text transform="translate(55 435)" fill="#7f7f7f" font-size="40" font-family="Arial-BoldMT, Arial" font-weight="700"><tspan x="0" y="0">Heading</tspan></text><text transform="translate(55 468)" fill="#454545" font-size="12" font-family="ArialMT, Arial"><tspan x="0" y="11">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor </tspan><tspan x="0" y="25">invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et </tspan><tspan x="0" y="39">accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata </tspan><tspan x="0" y="53">sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur </tspan><tspan x="0" y="67">sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna </tspan><tspan x="0" y="81">aliquyam erat, sed diam voluptua. At vero eos et accusam et justo</tspan></text><g transform="translate(54.718 593.227)"><g transform="translate(0.282 -0.227)" fill="none" stroke="#bce0fd" stroke-linecap="round" stroke-width="2"><rect width="125" height="52" rx="4" stroke="none"/><rect x="1" y="1" width="123" height="50" rx="3" fill="none"/></g><text transform="translate(61.282 30.773)" fill="#2699fb" font-size="12" font-family="Arial-BoldMT, Arial" font-weight="700"><tspan x="-18" y="0">MORE</tspan></text></g><circle cx="163.5" cy="163.5" r="163.5" transform="translate(136 32)" fill="#2699fb"/></g></svg>',
					'keywords'			=> array( 'card', 'image', 'layout' ),
					'supports'          => array(
						'align'         => true,
						'mode'          => true,
						'multiple'      => true,
					),
				));

				acf_register_block(array(
					'name'				=> 'jade-card-v3',
					'mode'				=> 'preview',
					'title'				=> __('Card V3'),
					'description'		=> __('A card block.'),
					'render_callback'	=> 'jade_acf_block_render_callback',
					'enqueue_assets' 	=> function(){
						wp_enqueue_style( 'jade-block-css', plugin_dir_url( __FILE__ ) . '/css/jade-blocks-public.min.css', false,
						'1.0.0' );
					},
					'category'			=> 'jade-acf-blocks',
					'icon'				=> '<svg xmlns="http://www.w3.org/2000/svg" width="540" height="664" viewBox="0 0 540 664"><g transform="translate(-30 -21)"><g transform="translate(30 21)" fill="#fff" stroke="rgba(0,0,0,0)" stroke-linecap="round" stroke-width="1"><rect width="540" height="664" stroke="none"/><rect x="0.5" y="0.5" width="539" height="663" fill="none"/></g><text transform="translate(55 435)" fill="#7f7f7f" font-size="40" font-family="Arial-BoldMT, Arial" font-weight="700"><tspan x="0" y="0">Heading</tspan></text><text transform="translate(55 468)" fill="#454545" font-size="12" font-family="ArialMT, Arial"><tspan x="0" y="11">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor </tspan><tspan x="0" y="25">invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et </tspan><tspan x="0" y="39">accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata </tspan><tspan x="0" y="53">sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur </tspan><tspan x="0" y="67">sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna </tspan><tspan x="0" y="81">aliquyam erat, sed diam voluptua. At vero eos et accusam et justo</tspan></text><g transform="translate(54.718 593.227)"><g transform="translate(0.282 -0.227)" fill="none" stroke="#bce0fd" stroke-linecap="round" stroke-width="2"><rect width="125" height="52" rx="4" stroke="none"/><rect x="1" y="1" width="123" height="50" rx="3" fill="none"/></g><text transform="translate(61.282 30.773)" fill="#2699fb" font-size="12" font-family="Arial-BoldMT, Arial" font-weight="700"><tspan x="-18" y="0">MORE</tspan></text></g><circle cx="163.5" cy="163.5" r="163.5" transform="translate(136 32)" fill="#2699fb"/></g></svg>',
					'keywords'			=> array( 'card', 'image', 'layout' ),
					'supports'          => array(
						'align'         => true,
						'mode'          => true,
						'multiple'      => true,
					),

				));








				
								
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
