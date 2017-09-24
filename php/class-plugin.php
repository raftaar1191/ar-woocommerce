<?php
/**
 * Bootstraps the AR WooCommerce plugin.
 *
 * @package ARWooCommerce
 */

namespace ARWooCommerce;

/**
 * Main plugin bootstrap file.
 */
class Plugin extends Plugin_Base {

	/**
	 * Initiate the plugin resources.
	 *
	 * Priority is 9 because WP_Customize_Widgets::register_settings() happens at
	 * after_setup_theme priority 10. This is especially important for plugins
	 * that extend the Customizer to ensure resources are available in time.
	 *
	 * @action after_setup_theme, 9
	 */
	public function init() {
		$this->config = apply_filters( 'ar_woocommerce_plugin_config', $this->config, $this );

		$this->hooks();
	}

	/**
	 * Include all the action ans filters that are going to be called.
	 */
	function hooks() {
		$this->add_filter( 'woocommerce_product_data_tabs', array( $this, 'woocommerce_product_data_tabs' ), 10, 1 );
		$this->add_action( 'woocommerce_product_data_panels', array( $this, 'woocommerce_product_data_panels' ), 10, 1 );
		$this->add_action( 'woocommerce_process_product_meta_simple', array( $this, 'woocommerce_process_product_meta_simple' ), 10, 1 );
	}

	/**
	 * AR tab Add in the product dashboard.
	 */
	function woocommerce_product_data_tabs( $args  ) {
		$args['ar-woocommerce-tab'] = array(
			'label' => __( 'AR', 'my_text_domain' ),
			'target' => 'ar_woocommerce_product_data',
		);
		return $args;
	}

	/**
	 * AR tab content Add in the product dashboard.
	 */
	function woocommerce_product_data_panels() {
		?>
		<!-- id below must match target registered in above add_my_custom_product_data_tab function -->
		<div id="ar_woocommerce_product_data" class="panel woocommerce_options_panel">
			<?php
			$post_id = (int) $_GET['post'];

			woocommerce_wp_text_input(
				array(
					'id' => '_ar_link',
					'label' => __( 'AR Link', 'ar-woocommerce' ),
					'value' => esc_url_raw( get_post_meta( $post_id, '_ar_link', true ) )
				)
			);

			/*
			<p class="form-field _ar_button_field ">
			<label for="_ar_button_field"><?php echo __( 'Generate OR', 'ar-woocommerce' ); ?></label>
			<a href="#" class="_ar_button_field _ar_generate_or_button _ar_generate_or" id="_ar_button_field"><?php echo __( 'Click', 'ar-woocommerce' ); ?></a>
			</p>
			*/
			?>
		</div>
		<?php
	}

	/**
	 * Save AR product meta
	 */
	function woocommerce_process_product_meta_simple( $post_id ) {
//		Save the AR link
		if ( isset( $_POST['_ar_link'] ) ) {
			$_ar_link = (string) $_POST['_ar_link'];
			update_post_meta( $post_id, '_ar_link', esc_url_raw( $_ar_link ) );
		}
	}


	/**
	 * Register scripts.
	 *
	 * @action wp_default_scripts, 11
	 *
	 * @param \WP_Scripts $wp_scripts Instance of \WP_Scripts.
	 */
	public function register_scripts( \WP_Scripts $wp_scripts ) {}

	/**
	 * Register styles.
	 *
	 * @action wp_default_styles, 11
	 *
	 * @param \WP_Styles $wp_styles Instance of \WP_Styles.
	 */
	public function register_styles( \WP_Styles $wp_styles ) {}
}
