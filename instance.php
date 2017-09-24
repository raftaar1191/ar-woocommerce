<?php
/**
 * Instantiates the AR WooCommerce plugin
 *
 * @package ARWooCommerce
 */

namespace ARWooCommerce;

global $ar_woocommerce_plugin;

require_once __DIR__ . '/php/class-plugin-base.php';
require_once __DIR__ . '/php/class-plugin.php';

$ar_woocommerce_plugin = new Plugin();

/**
 * AR WooCommerce Plugin Instance
 *
 * @return Plugin
 */
function get_plugin_instance() {
	global $ar_woocommerce_plugin;
	return $ar_woocommerce_plugin;
}
