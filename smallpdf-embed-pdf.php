<?php
/**
 * Plugin Name:       Embed PDF with Smallpdf
 * Plugin URI:		  https://smallpdf.com/pdf-embed
 * Description:       Embed PDF by Smallpdf is a free and secure plugin that allows you to embed PDF documents directly into your posts and pages. No API keys are required.
 * Version:           1.0.0
 * Requires at least: 6.5
 * Requires PHP:      7.4
 * Author:            Smallpdf
 * Author URI:        https://smallpdf.com
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       smallpdf-embed-pdf
 * Domain Path:       /languages
 *
 * @package EmbedPDFSmallpdf
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Define plugin constants
define( 'SMALLPDF_EMBED_PDF_VERSION', '1.0.0' );
define( 'SMALLPDF_EMBED_PDF_DIR', plugin_dir_path( __FILE__ ) );
define( 'SMALLPDF_EMBED_PDF_URL', plugin_dir_url( __FILE__ ) );

require_once SMALLPDF_EMBED_PDF_DIR . 'includes/class-smallpdf-embed-pdf.php';

// Activation & deactivation hooks
register_activation_hook( __FILE__, 'smallpdf_embed_pdf_activate' );
register_deactivation_hook( __FILE__, 'smallpdf_embed_pdf_deactivate' );

// Activation callback function
function smallpdf_embed_pdf_activate() {
    // Register the plugin version in database
    update_option( 'smallpdf_embed_pdf_version', SMALLPDF_EMBED_PDF_VERSION );
}

// Deactivation callback function
function smallpdf_embed_pdf_deactivate() {
    // Unregister the plugin version from database
    delete_option( 'smallpdf_embed_pdf_version' );
}

function smallpdf_embed_pdf_init() {
    $plugin = new SmallpdfEmbedPdf();
    $plugin->run();
}
add_action( 'plugins_loaded', 'smallpdf_embed_pdf_init' );
