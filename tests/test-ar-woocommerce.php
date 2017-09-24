<?php
/**
 * Test_AR_WooCommerce
 *
 * @package ARWooCommerce
 */

namespace ARWooCommerce;

/**
 * Class Test_AR_WooCommerce
 *
 * @package ARWooCommerce
 */
class Test_AR_WooCommerce extends \WP_UnitTestCase {

	/**
	 * Test _ar_woocommerce_php_version_error().
	 *
	 * @see _ar_woocommerce_php_version_error()
	 */
	public function test_ar_woocommerce_php_version_error() {
		ob_start();
		_ar_woocommerce_php_version_error();
		$buffer = ob_get_clean();
		$this->assertContains( '<div class="error">', $buffer );
	}

	/**
	 * Test _ar_woocommerce_php_version_text().
	 *
	 * @see _ar_woocommerce_php_version_text()
	 */
	public function test_ar_woocommerce_php_version_text() {
		$this->assertContains( 'AR WooCommerce plugin error:', _ar_woocommerce_php_version_text() );
	}
}
