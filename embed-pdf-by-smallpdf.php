<?php
/**
 * Plugin Name:       Embed PDF with Smallpdf
 * Plugin URI:		  https://smallpdf.com/embed-pdf
 * Description:       Embed PDF by Smallpdf is a free and secure plugin that allows you to embed PDF documents directly into your posts and pages. No API keys are required.
 * Version:           1.0.1
 * Requires at least: 6.5
 * Requires PHP:      7.4
 * Author:            Smallpdf
 * Author URI:        https://smallpdf.com
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       embed-pdf-by-smallpdf
 * Domain Path:       /languages
 *
 * @package EmbedPdfBySmallpdf
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Define plugin constants
define( 'EMBED_PDF_BY_SMALLPDF_VERSION', '1.0.0' );
define( 'EMBED_PDF_BY_SMALLPDF_DIR', plugin_dir_path( __FILE__ ) );
define( 'EMBED_PDF_BY_SMALLPDF_URL', plugin_dir_url( __FILE__ ) );

require_once EMBED_PDF_BY_SMALLPDF_DIR . 'includes/class-embed-pdf-by-smallpdf.php';

// Activation & deactivation hooks
register_activation_hook( __FILE__, 'embed_pdf_by_smallpdf_activate' );
register_deactivation_hook( __FILE__, 'embed_pdf_by_smallpdf_deactivate' );

// Activation callback function
function embed_pdf_by_smallpdf_activate() {
    // Register the plugin version in database
    update_option( 'EMBED_PDF_BY_SMALLPDF_VERSION', EMBED_PDF_BY_SMALLPDF_VERSION );
}

// Deactivation callback function
function embed_pdf_by_smallpdf_deactivate() {
    // Unregister the plugin version from database
    delete_option( 'EMBED_PDF_BY_SMALLPDF_VERSION' );
}

function embed_pdf_by_smallpdf_init() {
    $plugin = new EmbedPdfBySmallpdf();
    $plugin->run();
}
add_action( 'plugins_loaded', 'embed_pdf_by_smallpdf_init' );
