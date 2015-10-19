<?php
/**
 *
 *
 * @link       http://linkpizza.com
 * @since      1.0.0
 *
 * @package    linkPizza-manager
 * @subpackage linkPizza-manager/admin/settings
 */

/**
 * The Settings definition of the plugin.
 *
 *
 * @package    linkPizza-manager
 * @subpackage linkPizza-manager/admin/settings
 */
class linkPizza_Manager_Settings_Definition {

	public static $plugin_name = 'linkPizza_Manager';

	/**
	 * Sanitize plugin name.
	 *
	 * Lowercase alphanumeric characters and underscores are allowed.
	 * Uppercase characters will be converted to lowercase.
	 * Dashes characters will be converted to underscores.
	 *
	 * @access    private
	 * @return    string            Sanitized snake cased plugin name
	 */
	private static function get_snake_cased_plugin_name() {

		return str_replace( '-', '_', sanitize_key( self::$plugin_name ) );

	}

	/**
	 * [apply_tab_slug_filters description]
	 *
	 * @param  array $default_settings [description]
	 *
	 * @return array                   [description]
	 */
	static private function apply_tab_slug_filters( $default_settings ) {

		$extended_settings[] = array();
		$extended_tabs       = self::get_tabs();

		foreach ( $extended_tabs as $tab_slug => $tab_desc ) {

			$options = isset( $default_settings[ $tab_slug ] ) ? $default_settings[ $tab_slug ] : array();

			$extended_settings[ $tab_slug ] = apply_filters( self::get_snake_cased_plugin_name() . '_settings_' . $tab_slug, $options );
		}

		return $extended_settings;
	}

	/**
	 * [get_default_tab_slug description]
	 * @return [type] [description]
	 */
	static public function get_default_tab_slug() {

		return key( self::get_tabs() );
	}

	/**
	 * Retrieve settings tabs
	 *
	 * @since    1.0.0
	 * @return    array    $tabs    Settings tabs
	 */
	static public function get_tabs() {

		$tabs                = array();
		$tabs['credentials'] = __( 'Credentials', self::$plugin_name);

		return apply_filters( self::get_snake_cased_plugin_name() . '_settings_tabs', $tabs );
	}

	/**
	 * 'Whitelisted' Plugin_Name settings, filters are provided for each settings
	 * section to allow extensions and other plugins to add their own settings
	 *
	 *
	 * @since    1.0.0
	 * @return    mixed    $value    Value saved / $default if key if not exist
	 */
	static public function get_settings() {

		$settings[] = array();

		$settings['credentials']['user_id'] = array(
					'name' => __( 'Your user id', self::$plugin_name ),
					'desc' => __( 'To use the LinkPizza, you first need to create an account at <a href="https://zeef.com/signup">ZEEF</a>.<br></br> you can request access to the LinkPizza API by emailing <a href="mailto:info@linkpizza.com">info@linkpizza.com</a>.', self::$plugin_name ),
					'type' => 'number'
		    );
		

		return self::apply_tab_slug_filters( $settings );
	}
}
