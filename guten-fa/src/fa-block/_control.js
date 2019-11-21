//コンポーネント化に必要っぽい
import React from 'react';

// @wordpress
import { PanelBody, BaseControl } from '@wordpress/components';

// fonticonpicker
import FontIconPicker from '@fonticonpicker/react-fonticonpicker';

// fonticonpicker用の css （ここに書いてもwebフォントがうまく読み込まれなかった）
// import "@fonticonpicker/react-fonticonpicker/dist/fonticonpicker.base-theme.react.css";
// import "@fonticonpicker/react-fonticonpicker/dist/fonticonpicker.material-theme.react.css";

// iconData
import iconData from './_icons';

const BlockControl = ( props ) => {
	const { attributes, setAttributes } = props;

	return (
		<PanelBody title="項目設定">
			<BaseControl label="アイコンを選択" id="loos_icon_select">
				<div>
					<FontIconPicker
						icons={ iconData }
						theme="bluegrey"
						// renderUsing='class'
						value={ attributes.iconClass }
						// isMulti={false}
						iconsPerPage={ 20 }
						onChange={ ( value ) => {
							setAttributes( { iconClass: value } );
						} }
					/>
					<div className="fip-spacer"></div>
				</div>
			</BaseControl>
		</PanelBody>
	);
};
export default BlockControl;
