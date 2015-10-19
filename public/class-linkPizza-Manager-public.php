<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://linkpizza.com
 * @since      1.0.0
 *
 * @package    linkPizza-Manager
 * @subpackage linkPizza-Manager/public
 */

class linkPizza_Manager_Public {

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
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name,'//zeef.io/images/custom/linkpizza/pzz.min.js', array('jquery' ), $this->version, true );

	}
	
	public function add_linkpizza_head(){
		?><?php $options = get_option( 'linkpizza_manager_settings' ); ?>
			<script>var pzz_uid=<?php echo $options['user_id']?>;</script>
		<?php
	}

}
