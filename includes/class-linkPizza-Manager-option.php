<?php
/**
 *
 *
 * @link       http://linkpizza.com
 * @since      1.0.0
 *
 * @package    linkPizza-manager
 * @subpackage linkPizza-manager/includes
 */



class linkPizza_manager_Option {

	/**
	 * Get an option
	 *
	 * Looks to see if the specified setting exists, returns default if not.
	 *
	 * @since 	1.0.0
	 * @return 	mixed 	$value 	Value saved / $default if key if not exist
	 */
	static public function get_option( $key, $default = false ) {

		if ( empty( $key ) ) {
			return $default;
		}

		$plugin_options = get_option( 'linkPizza_Manager_settings', array() );

		$value = isset( $plugin_options[ $key ] ) ? $plugin_options[ $key ] : $default;

		return $value;
	}
}
