import { registerBlockType } from '@wordpress/blocks';
import { Fragment } from '@wordpress/element';

import {
	InspectorControls,
	//RichText,
	//InnerBlocks
} from '@wordpress/block-editor';

// FontAwesomeをimport
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';

// BlockControl;
import BlockControl from './_control';
import './style.css';

/**
 * icomoonとfontawesomeで返すアイコンデータを分けるための関数
 *
 * @param iconClass
 */
const sliceIconData = ( iconClass ) => {
	let iconData;
	// const array = ['fas ', 'fab ', 'far '];
	if ( null !== iconClass.match( /fas |fab |far / ) ) {
		iconData = iconClass.split( ' ' );
		iconData[ 1 ] = iconData[ 1 ].replace( 'fa-', '' );
		return iconData;
	}
	return iconClass;
};

// Point : Font Awesomeのアイコンをiタグで描画してしまうと再描画できない
registerBlockType( 'myguten/fa-block', {
	title: 'FontAwesome Test',
	icon: 'smiley',
	category: 'common', //「一般ブロック」に追加
	attributes: {
		iconClass: {
			type: 'string',
			default: 'fas fa-car',
		},
	},
	edit: ( props ) => {
		const { attributes } = props;

		const iconData = sliceIconData( attributes.iconClass );

		return (
			<Fragment>
				<InspectorControls>
					<BlockControl { ...props } />
				</InspectorControls>
				<div className="iconBox">
					<div className="__icon">
						{ typeof iconData === 'string' ? (
							<i className={ attributes.iconClass }></i>
						) : (
							<FontAwesomeIcon icon={ iconData } />
						) }
					</div>
				</div>
			</Fragment>
		);
	},
	save: ( { attributes } ) => {
		const iconData = sliceIconData( attributes.iconClass );
		return (
			<div className="iconBox">
				<div className="__icon">
					<FontAwesomeIcon icon={ iconData } />
				</div>
			</div>
		);
	},
} );
