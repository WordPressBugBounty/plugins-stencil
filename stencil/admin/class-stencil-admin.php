<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://getstencil.com/
 * @since      1.0.0
 *
 * @package    Stencil
 * @subpackage Stencil/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Stencil
 * @subpackage Stencil/admin
 * @author     Stencil <wordpress@getstencil.com>
 */
class Stencil_Admin {

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
		add_action( 'wp_loaded', array( $this, 'maybe_show_notice' ) );
	}

	public function maybe_show_notice() {
		add_action( 'admin_notices', array( $this, 'media_notice' ) );
	}

	public function media_notice() {
		global $pagenow;
		if ( $pagenow != 'upload.php' ) {
			return;
		}

		echo '<div data-dismissible="disable-media-notice-forever" class="notice notice-warning is-dismissible">
			<p>If you are looking for the Stencil WordPress Plugin, you will find it when creating or editing new posts or pages. Just go to a post or page and try to insert an image. You will then see the Stencil tab at the top.</a></p>
		</div>';
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
		 * defined in Stencil_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Stencil_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/stencil-admin.css', array(), $this->version, 'all' );

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
		 * defined in Stencil_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Stencil_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/stencil-admin.js', array( 'jquery' ), $this->version, false );

	}

}
