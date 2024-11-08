/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from '@wordpress/block-editor';

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @param {Object} props
 * @param {Object} props.attributes
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
 *
 * @return {Element} Element to render.
 */
export default function save( { attributes } ) {
	const { url, height } = attributes;

	return (
		<div { ...useBlockProps.save() }>
			{ url && (
				<>
					<div
						style={ { width: '100%', height: `${ height }px` } }
						className="smallpdf-widget"
						data-pdf-url={ url }
					></div>
					<script src="https://smallpdf.com/api/embed-widget.js"></script>
				</>
			) }
		</div>
	);
}
