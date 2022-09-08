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
			// >> `register_activation_hook( DIR_PATH, [ 'AwesomePlugin', 'activate'] );`
			// >> `register_deactivation_hook( DIR_PATH, [ 'AwesomePlugin', 'deactivate' ] );`.

			add_action( 'init', [ $this, 'register_blocks' ] );
		}

		public function register_blocks() {
			register_block_type( PLUGIN_PATH . '/build' );
		}

	}

	new Coco_Blocks_Plugin();
}
