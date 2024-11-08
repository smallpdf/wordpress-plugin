<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class SmallpdfEmbedPdf {

    public function __construct() {

    }

	/**
     * Register all hooks for the plugin functionality.
     */
    public function run() {
        add_action( 'init', array( $this, 'register_block_type' ) );
		add_action( 'enqueue_block_assets', array( $this, 'enqueue_block_assets' ) );
        add_action( 'enqueue_block_editor_assets', array( $this, 'smallpdf_embed_pdf_translations' ) );
        add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
        add_shortcode( 'pdf', array( $this, 'pdf_shortcode' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_shortcode_script' ) );
    }

	/**
     * Register block type and enqueue block editor scripts.
     */

    public function register_block_type() {
		wp_register_script(
			'smallpdf-embed-pdf-editor-script',
			SMALLPDF_EMBED_PDF_URL . 'build/blocks/embed-pdf/index.js',
			array( 'wp-blocks', 'react', 'wp-i18n', 'wp-block-editor' ),
            SMALLPDF_EMBED_PDF_VERSION,
			true
		);

		wp_localize_script(
			'smallpdf-embed-pdf-editor-script',
			'embedPdfSmallpdf',
			array(
				'blockPreviewImageUrl' => SMALLPDF_EMBED_PDF_URL . 'includes/assets/block-preview-450x480.png',
			)
		);

        // Register the block
        register_block_type(SMALLPDF_EMBED_PDF_DIR . '/build/blocks/embed-pdf');
    }

    /**
     * Enqueue translations for the block editor.
     */
	public function smallpdf_embed_pdf_translations() {


        wp_set_script_translations( 'smallpdf-embed-pdf-editor-script', 'smallpdf-embed-pdf', SMALLPDF_EMBED_PDF_DIR . 'languages' );
    }

    /**
     * Load plugin textdomain for translations.
     */
	public function load_textdomain() {
        load_plugin_textdomain( 'smallpdf-embed-pdf', false, SMALLPDF_EMBED_PDF_DIR . 'languages' );
    }

	/**
     * Handle the [pdf] shortcode and generate the required HTML output.
     *
     * @param array $atts Shortcode attributes.
     * @return string HTML output for the shortcode.
     */
    public function pdf_shortcode( $atts ) {
        // Set up default attributes
        $atts = shortcode_atts( array(
            'height' => '360',  // Default height is 360px
            'url'    => ''      // No default PDF URL
        ), $atts, 'pdf' );

        // Validate and prepare attributes
        $height = is_numeric( $atts['height'] ) ? $atts['height'] . 'px' : $atts['height'];
        $url = esc_url( $atts['url'] );  // Ensure the URL is safe to use

        // Check if a URL is provided
        if ( empty( $url ) ) {
            return '<p>' . __( 'Please provide a URL for the PDF.', 'smallpdf-embed-pdf' ) . '</p>';
        }

        // Generate the HTML code without the script tag
        $html = '<div class="smallpdf-widget-wrapper">';
        $html .= '<div style="width:100%; height: ' . esc_attr( $height ) . ';" class="smallpdf-widget" data-pdf-url="' . esc_attr( $url ) . '"></div>';
        $html .= '</div>';

        return $html;
    }

    /**
     * Enqueue the external script only if the shortcode is present on the page.
     */
    public function enqueue_shortcode_script() {
        if ( is_singular() && has_shortcode( get_post()->post_content, 'pdf' ) ) {
            wp_enqueue_script(
                'smallpdf-embed-widget',
                'https://smallpdf.com/api/embed-widget.js',
                array(),
                null,
                true
            );
        }
    }

	/**
     * Enqueue block assets for both frontend and editor.
     */
	public function enqueue_block_assets() {

        // Enqueue the block editor styles
        wp_enqueue_style(
            'smallpdf-embed-pdf-editor-css',
            SMALLPDF_EMBED_PDF_URL . 'build/blocks/embed-pdf/index.css',
            array( 'wp-edit-blocks' ),
            SMALLPDF_EMBED_PDF_VERSION,
			true
        );
    }
}
