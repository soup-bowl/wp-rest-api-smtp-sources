<?php
/**
 * Outputs standard mail configs via REST API.
 *
 * @package wprass
 * @author soup-bowl <code@soupbowl.io>
 * @license MIT
 *
 * @wordpress-plugin
 * Plugin Name:       REST API - SMTP Sources
 * Description:       Outputs standard mail configs via REST API.
 * Plugin URI:        https://github.com/soup-bowl/wp-rest-api-smtp-sources
 * Version:           3
 * Author:            soup-bowl
 * Author URI:        https://www.soupbowl.io
 * License:           MIT
 */

add_action(
	'rest_api_init',
	function () {
		// /wp-json/wprass/v1/sources
		register_rest_route(
			'wprass/v1',
			'/sources',
			array(
				'methods'  => 'GET',
				'callback' => function() {
					header( 'Access-Control-Allow-Origin: *' );
					header( 'Access-Control-Allow-Methods: GET' );
					header( 'Access-Control-Allow-Headers: X-Requested-With' );

					echo file_get_contents( plugin_dir_path( __FILE__ ) . 'sources.json' );
					die();
				},
			)
		);
	}
);
