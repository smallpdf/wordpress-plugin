/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
import { registerBlockType } from '@wordpress/blocks';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './style.scss';

/**
 * Internal dependencies
 */
import Edit from './edit';
import save from './save';
import metadata from './block.json';

/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */

registerBlockType( metadata.name, {
	icon: {
		src: (
			<svg
				width="24"
				height="24"
				viewBox="0 0 24 24"
				fill="none"
				xmlns="http://www.w3.org/2000/svg"
			>
				<g clipPath="url(#clip0_505_2)">
					<path
						fillRule="evenodd"
						clipRule="evenodd"
						d="M16.2 16.2H24V21.6C24 22.2365 23.7471 22.847 23.297 23.2971C22.8469 23.7471 22.2365 24 21.6 24H16.2V16.2Z"
						fill="#FF46FB"
					/>
					<path
						fillRule="evenodd"
						clipRule="evenodd"
						d="M7.80005 16.2H16.2V24H7.80005V16.2Z"
						fill="#CA41FC"
					/>
					<path
						fillRule="evenodd"
						clipRule="evenodd"
						d="M0 16.2H7.8V24H2.4C1.76348 24 1.15303 23.7471 0.702944 23.2971C0.252856 22.847 0 22.2365 0 21.6V16.2Z"
						fill="#8B48FE"
					/>
					<path
						fillRule="evenodd"
						clipRule="evenodd"
						d="M24 7.8H16.2V16.2H24V7.8Z"
						fill="#81E650"
					/>
					<path
						fillRule="evenodd"
						clipRule="evenodd"
						d="M16.2 7.8H7.80005V16.2H16.2V7.8Z"
						fill="#00D267"
					/>
					<path
						fillRule="evenodd"
						clipRule="evenodd"
						d="M7.8 7.8H0V16.2H7.8V7.8Z"
						fill="#00C0FF"
					/>
					<path
						fillRule="evenodd"
						clipRule="evenodd"
						d="M16.2 0H21.6C22.2365 0 22.8469 0.252856 23.297 0.702944C23.7471 1.15303 24 1.76348 24 2.4V7.8H16.2V0Z"
						fill="#FFD200"
					/>
					<path
						fillRule="evenodd"
						clipRule="evenodd"
						d="M7.80005 0H16.2V7.8H7.80005V0Z"
						fill="#FF8E00"
					/>
					<path
						fillRule="evenodd"
						clipRule="evenodd"
						d="M0 2.4C0 1.76348 0.252856 1.15303 0.702944 0.702944C1.15303 0.252856 1.76348 0 2.4 0L7.8 0V7.8H0V2.4Z"
						fill="#FF5400"
					/>
				</g>
				<defs>
					<clipPath id="clip0_505_2">
						<rect width="24" height="24" fill="white" />
					</clipPath>
				</defs>
			</svg>
		),
	},
	/**
	 * @see ./edit.js
	 */
	edit: Edit,

	/**
	 * @see ./save.js
	 */
	save,
} );
