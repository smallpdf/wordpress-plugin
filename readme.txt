=== Embed PDF with Smallpdf ===

Contributors:      Smallpdf
Tags:              PDF, embed PDF, PDF viewer, document, Smallpdf
Tested up to:      6.6.2
Requires at least: 6.5
Requires PHP:      7.4
Stable tag:        1.0.0
License:           GPL-2.0-or-later
License URI:       https://www.gnu.org/licenses/gpl-2.0.html

Embed PDF by Smallpdf is a free and secure plugin that allows you to embed PDF documents directly into your posts and pages. No API keys are required.

== Description ==

Embed PDF with Smallpdf makes it easy to add PDF documents to your WordPress posts and pages. This plugin offers two convenient methods for embedding PDFs:

1. **Gutenberg Block**:
    - Add the block by clicking on the + button in the Gutenberg editor.
    - Search for "Embed PDF with Smallpdf".
    - You can either upload a PDF from your media library or paste a PDF URL in the block details in the sidebar.
    - Adjust the height of the widget by specifying the size in pixels (px) from the sidebar.

2. **Shortcode**:
    - Use the shortcode `[pdf url='_ADD_PDF_URL_HERE_']` to embed a PDF.
    - Control the height of the widget by adding the `height` parameter to the shortcode, e.g., `[pdf url='' height='480']`. The height value, in px, must be integer.

This flexibility allows you to seamlessly integrate PDF files into your content, ensuring they are easily accessible to your audience.

== Use of Third-Party Services ==

This plugin integrates the Embed PDF widget viewer from [Smallpdf](https://smallpdf.com/embed-pdf). To display your PDF successfully, the file may be processed through Smallpdf's servers.

By using this plugin, you agree to Smallpdf's [Terms & Conditions](https://smallpdf.com/terms) and [Privacy Policy](https://smallpdf.com/privacy)

== Installation ==

= From your Wordpress Admin Dashboard (Recommended) =

1. Go to _Plugins_ → _Add New Plugin_
2. Search for _Embed PDF with Smallpdf_
3. Click _Install_, then _Activate_


= Manual installation =

1. Download the plugin as `.zip` file
2. Unzip the downloaded archive
3. Upload `smallpdf-pdf-embed` folder into your `/wp-content/plugins/` directory
4. Go to _Plugins_ → _Installed Plugins_
5. _Activate_ Embed PDF with Smallpdf

== Frequently Asked Questions ==

= Can I embed multiple PDFs on the same page? =

Yes, you can embed multiple PDFs on the same page using either the Gutenberg block or the shortcode. Each block or shortcode will handle an individual PDF file.

= Can I adjust the dimensions of the embedded PDF viewer? =

Yes, you can adjust the height of the embedded PDF viewer. In the Gutenberg block, you can specify the height in the block's sidebar settings. When using the shortcode, add the height parameter with the desired value in pixels, e.g., `height='500'`.

= What types of PDF files can I embed? =

You can embed any standard PDF file. Simply ensure that the URL you provide or the file you upload is a valid PDF document.

= Can I use this plugin without an API key? =

Yes, the Embed PDF with Smallpdf plugin does not require an API key to function. You can embed PDFs without any additional setup

= Why does it say "Document unavaiable"? =

The message `Document unavailable` typically means that the PDF is not reachable or readable. To resolve this issue, please ensure that:

- The URL points to a valid PDF file.
- There are no typos in the URL.
- Your internet connection is stable.

If the problem persists, verify that the PDF file is publicly accessible and not restricted by permissions or behind a firewall.

== Changelog ==

= 1.0.0 =
* Initial release of Embed PDF with Smallpdf
