<?php
/**
 * Plugin Name:       Coco Blocks
 * Description:       Example block scaffolded with Create Block tool.
 * Requires at least: 5.9
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            @Cobianzo 
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       coco
 *
 * @package           create-block
 */

 // TODELETE
// function create_block_coco_blocks_block_init() {
// 	register_block_type( __DIR__ . '/build' );	
// }
// add_action( 'init', 'create_block_coco_blocks_block_init' );



/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	return;
}

/* global vars used all along the plugin  */
define( 'PLUGIN_PATH', dirname( __FILE__ ) );
define( 'PLUGIN_URL', plugins_url( "/", __FILE__ ) );

/* The entry point of the plugin is this class (called at the end) */
if ( ! class_exists( 'Coco_Blocks_Plugin' ) ) {
	class Coco_Blocks_Plugin {

		/** fired when plugin starts */
		public function __construct() {

			$this->setup_actions();

		}

		/** The very ENTRY POINT */
		private function setup_actions() {

			// Main plugin hooks, if any. Create the functions if we use them. So far it's commented.
			// >> `register_activation_hook( DIR_PATH, [ 'Coco_Blocks_Plugin', 'activate'] );`
			// >> `register_deactivation_hook( DIR_PATH, [ 'Coco_Blocks_Plugin', 'deactivate' ] );`.

			add_action( 'init', [ $this, 'register_blocks' ] );

			// OPTIONS FOR THE PLUGIN
			// add_action( 'enqueue_block_assets', [ $this, 'optional_enqueue_if_block_is_present' ] );  // Frontend and CMS: Can only be loaded in the footer.  // @BOOK:EXTRA_JS_SCRIPTS

		}

		public function register_blocks() {
			// from here, check src/blockX/edit.js, save.js editor.scss and the other files
			register_block_type( PLUGIN_PATH . '/build/block1' );
			register_block_type( PLUGIN_PATH . '/build/block2' );
		}

		/** OPTIONAL. @BOOK:EXTRA_JS_SCRIPTS. Deactivated by default. Load js in frontend the library 
		 * Uncomment the 'add_action... ' to activate it */
		public function optional_enqueue_if_block_is_present() {

			if ( has_block( 'coco-blocks/block1' ) ) {
				// this is the js needed to make the slider work in frontend. In backend we dont need it.
				wp_enqueue_script(
					'my-handle-js',
					plugin_dir_url( __FILE__ ) . '/build/frontend.js', 
					[], // @TODO: we could grab the dependencies from the file ./build/block1/frontend.asset.php .
					'1.0.0',
					true
				);
						// enqueue a css file.
						wp_enqueue_style(
							'my-handle-css',
								//plugin_dir_url( __FILE__ ) . '/node_modules/@splidejs/splide/dist/css/splide.min.css',
								plugin_dir_url( __FILE__ ) . '/build/frontend.css',
								[],
							1
						);
			}
		}






	}

	// this triggers the setuo_actions
	new Coco_Blocks_Plugin();
} // end of if.
