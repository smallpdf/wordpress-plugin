import React, { useEffect, useRef } from 'react';
import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	MediaPlaceholder,
	BlockControls,
	InspectorControls,
} from '@wordpress/block-editor';
import {
	ToolbarGroup,
	ToolbarButton,
	PanelBody,
	TextControl,
} from '@wordpress/components';
import { Fragment } from '@wordpress/element';
import './editor.scss';

export default function Edit( { attributes, setAttributes } ) {
	const { url, height = 360, preview } = attributes;
	const blockProps = useBlockProps();
	const pdfWidgetRef = useRef( null ); // Reference to the widget container
	const embedPdfSmallpdf = window.embedPdfSmallpdf || {
		blockPreviewImageUrl: '',
	};

	useEffect( () => {
		if ( pdfWidgetRef.current && url ) {
			const script = document.createElement( 'script' );
			script.src = 'https://smallpdf.com/api/embed-widget.js';
			script.async = true;

			// Insert the script directly after the widget container
			pdfWidgetRef.current.parentNode.insertBefore(
				script,
				pdfWidgetRef.current.nextSibling
			);

			return () => {
				// Remove the script when the component unmounts or URL changes
				if ( script.parentNode ) {
					script.parentNode.removeChild( script );
				}
			};
		}
	}, [ url ] ); // Depend on URL to manage script when changing PDF

	if ( preview ) {
		return (
			<Fragment>
				<div className="block-preview-container">
					<img
						src={ embedPdfSmallpdf.blockPreviewImageUrl }
						className="block-preview-image"
						alt="Block Preview"
					/>
				</div>
			</Fragment>
		);
	}

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Settings', 'smallpdf-embed-pdf' ) }>
					<TextControl
						label={ __( 'Height (px)', 'smallpdf-embed-pdf' ) }
						value={ height }
						onChange={ ( value ) =>
							setAttributes( {
								height: parseInt( value, 10 ) || 360,
							} )
						}
						type="number"
					/>
					<TextControl
						label={ __( 'PDF URL', 'smallpdf-embed-pdf' ) }
						value={ url }
						onChange={ ( value ) =>
							setAttributes( { url: value } )
						}
						type="text"
						help={ __(
							'Paste the URL of an external PDF file or select a file from the library.',
							'smallpdf-embed-pdf'
						) }
					/>
				</PanelBody>
			</InspectorControls>
			<div { ...blockProps }>
				<BlockControls>
					{ url && (
						<ToolbarGroup>
							<ToolbarButton
								onClick={ () =>
									setAttributes( { id: null, url: null } )
								}
								icon="trash"
							>
								{ __( 'Delete PDF', 'smallpdf-embed-pdf' ) }
							</ToolbarButton>
						</ToolbarGroup>
					) }
				</BlockControls>
				{ url ? (
					<div
						ref={ pdfWidgetRef }
						style={ { width: `100%`, height: `${ height }px` } }
						className="smallpdf-widget"
						data-pdf-url={ url }
					></div>
				) : (
					<MediaPlaceholder
						onSelect={ ( media ) => {
							if ( media && media.url ) {
								setAttributes( {
									id: media.id,
									url: media.url,
								} );
							} else {
								// Handle errors or invalid media
							}
						} }
						allowedTypes={ [ 'application/pdf' ] }
						multiple={ false }
						labels={ {
							title: __(
								'Upload your PDF',
								'smallpdf-embed-pdf'
							),
						} }
					/>
				) }
			</div>
		</>
	);
}
