<?php

use HerdEffects\Settings_Helper;

defined( 'ABSPATH' ) || exit;

return [
	//region Location
	'herd_top' => [
		'type'  => 'number',
		'title' => [
			'label'  => __( 'Top', 'mwp-herd-effect' ),
			'name'   => 'include_herd_top',
			'toggle' => true,
			'val'    => 1
		],
		'val'   => '10',
		'atts'  => [
			'step' => 1,
		],
		'addon' => [
			'type' => 'select',
			'name' => 'herd_top_unit',
			'val'  => '%',
			'atts' => [
				'%'  => __( '%', 'mwp-herd-effect' ),
				'px' => __( 'px', 'mwp-herd-effect' ),
			],
		],
	],

	'herd_bottom' => [
		'type'  => 'number',
		'title' => [
			'label'  => __( 'Bottom', 'mwp-herd-effect' ),
			'name'   => 'include_herd_bottom',
			'toggle' => true,
			'val'    => 0
		],
		'val'   => '10',
		'atts'  => [
			'step' => 1,
		],
		'addon' => [
			'type' => 'select',
			'name' => 'herd_bottom_unit',
			'val'  => '%',
			'atts' => [
				'%'  => __( '%', 'mwp-herd-effect' ),
				'px' => __( 'px', 'mwp-herd-effect' ),
			],
		],
	],

	'herd_left' => [
		'type'  => 'number',
		'title' => [
			'label'  => __( 'Left', 'mwp-herd-effect' ),
			'name'   => 'include_herd_left',
			'toggle' => true,
			'val'    => 0
		],
		'val'   => '10',
		'atts'  => [
			'step' => 1,
		],
		'addon' => [
			'type' => 'select',
			'name' => 'herd_left_unit',
			'val'  => '%',
			'atts' => [
				'%'  => __( '%', 'mwp-herd-effect' ),
				'px' => __( 'px', 'mwp-herd-effect' ),
			],
		],
	],

	'herd_right' => [
		'type'  => 'number',
		'title' => [
			'label'  => __( 'Right', 'mwp-herd-effect' ),
			'name'   => 'include_herd_right',
			'toggle' => true,
			'val'    => 1
		],
		'val'   => '10',
		'atts'  => [
			'step' => 1,
		],
		'addon' => [
			'type' => 'select',
			'name' => 'herd_right_unit',
			'val'  => '%',
			'atts' => [
				'%'  => __( '%', 'mwp-herd-effect' ),
				'px' => __( 'px', 'mwp-herd-effect' ),
			],
		],
	],
	//endregion

	//region Title

	'title_size' => [
		'type'  => 'number',
		'title' => __( 'Font Size', 'mwp-herd-effect' ),
		'val'   => '18',
		'addon' => 'px',
		'atts'  => [
			'min' => 0,
		],
	],

	'title_line_height' => [
		'type'  => 'number',
		'title' => __( 'Line Height', 'mwp-herd-effect' ),
		'val'   => '32',
		'addon' => 'px',
		'atts'  => [
			'min' => 0,
		],
	],

	'title_font' => [
		'type'  => 'select',
		'title' => __( 'Font Family', 'mwp-herd-effect' ),
		'val'   => 'inherit',
		'atts'  => [
			'inherit'         => __( 'Use Your Themes', 'mwp-herd-effect' ),
			'Tahoma'          => 'Tahoma',
			'Georgia'         => 'Georgia',
			'Comic Sans MS'   => 'Comic Sans MS',
			'Arial'           => 'Arial',
			'Lucida Grande'   => 'Lucida Grande',
			'Times New Roman' => 'Times New Roman',
		],
	],

	'title_font_weight' => [
		'type'  => 'select',
		'title' => __( 'Font Weight', 'mwp-herd-effect' ),
		'val'   => 'bolder',
		'atts'  => [
			'normal'  => 'Normal',
			'bold'    => 'Bold',
			'bolder'  => 'Bolder',
			'lighter' => 'Lighter',
		],
	],

	'title_font_style' => [
		'type'  => 'select',
		'title' => __( 'Font Style', 'mwp-herd-effect' ),
		'val'   => 'normal',
		'atts'  => [
			'normal' => 'Normal',
			'italic' => 'Italic',
		],
	],

	'title_align' => [
		'type'  => 'select',
		'title' => __( 'Align', 'mwp-herd-effect' ),
		'val'   => 'left',
		'atts'  => [
			'left'   => 'Left',
			'center' => 'Center',
			'right'  => 'Right',
		],
	],

	'title_color' => [
		'type'  => 'text',
		'title' => __( 'Color', 'mwp-herd-effect' ),
		'val'   => '#ffffff',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	//endregion

	//region Content

	'content_width' => [
		'type'  => 'number',
		'title' => __( 'Block Width', 'mwp-herd-effect' ),
		'val'   => '200',
		'atts' => [
			'min'  => 0,
			'step' => 1,
		],
		'addon' => [
			'type' => 'select',
			'name' => 'content_width_unit',
			'val'  => 'px',
			'atts' => [
				'px' => __( 'px', 'mwp-herd-effect' ),
				'%' => __( '%', 'mwp-herd-effect' ),
			],
		],
	],

	'content_height' => [
		'type'  => 'number',
		'title' => __( 'Block Height', 'mwp-herd-effect' ),
		'val'   => '0',
		'atts' => [
			'min'  => 0,
			'step' => 1,
		],
		'addon' => [
			'type' => 'select',
			'name' => 'content_height_unit',
			'val'  => 'auto',
			'atts' => [
				'auto' => __( 'auto', 'mwp-herd-effect' ),
				'px' => __( 'px', 'mwp-herd-effect' ),
			],
		],
	],

	'content_size' => [
		'type'  => 'number',
		'title' => __( 'Font Size', 'mwp-herd-effect' ),
		'addon' => 'px',
		'val'   => 14,
		'atts'  => [
			'min' => '0',
		],
	],

	'content_padding' => [
		'type'  => 'number',
		'title' => __( 'Padding', 'mwp-herd-effect' ),
		'val'   => '10',
		'atts' => [
			'min'  => 0,
			'step' => 1,
		],
		'addon' => 'px'
	],

	'content_font'  => [
		'type'  => 'select',
		'title' => __( 'Font Family', 'mwp-herd-effect' ),
		'val'   => 'inherit',
		'atts'  => [
			'inherit'         => __( 'Use Your Themes', 'mwp-herd-effect' ),
			'Sans-Serif'      => 'Sans-Serif',
			'Tahoma'          => 'Tahoma',
			'Georgia'         => 'Georgia',
			'Comic Sans MS'   => 'Comic Sans MS',
			'Arial'           => 'Arial',
			'Lucida Grande'   => 'Lucida Grande',
			'Times New Roman' => 'Times New Roman',
		],
	],

	'content_line_height' => [
		'type'  => 'number',
		'title' => __( 'Line Height', 'mwp-herd-effect' ),
		'val'   => '18',
		'atts' => [
			'min'  => 0,
			'step' => 1,
		],
		'addon' => 'px',
	],

	'bg_color' => [
		'type'  => 'text',
		'val'   => 'rgba(0,0,0,0.75)',
		'title' => __( 'Background', 'mwp-herd-effect' ),
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'text_color' => [
		'type'  => 'text',
		'val'   => '#ffffff',
		'title' => __( 'Text color', 'mwp-herd-effect' ),
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],
	//endregion

	//region Icon
	'icon_width' => [
		'type'  => 'number',
		'title' => __( 'Block Width', 'mwp-herd-effect' ),
		'val'   => '60',
		'atts' => [
			'min'  => 0,
			'step' => 1,
		],
		'addon' => 'px',
	],

	'icon_size' => [
		'type'  => 'number',
		'title' => __( 'Size', 'mwp-herd-effect' ),
		'val'   => '40',
		'atts' => [
			'min'  => 0,
			'step' => 1,
		],
		'addon' => 'px',
	],

	'icon_background' => [
		'type'  => 'text',
		'val'   => 'rgba(0,0,0,0.75)',
		'title' => __( 'Background', 'mwp-herd-effect' ),
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'icon_color' => [
		'type'  => 'text',
		'val'   => '#ffffff',
		'title' => __( 'Color', 'mwp-herd-effect' ),
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	//endregion

	//region Close Button
	'show_close' => [
		'type'  => 'checkbox',
		'title' => __( 'Close Button', 'mwp-herd-effect' ),
		'label' => __( 'Enable', 'mwp-herd-effect' ),
	],

	'close_size' => [
		'type'  => 'number',
		'title' => __( 'Size', 'mwp-herd-effect' ),
		'val'   => '24',
		'atts' => [
			'min'  => 0,
			'step' => 1,
		],
		'addon' => 'px',
	],

	'close_offset_x' => [
		'type'  => 'number',
		'title' => __( 'Offset Horizontal', 'mwp-herd-effect' ),
		'val'   => '5',
		'atts' => [
			'step' => 1,
		],
		'addon' => 'px',
	],

	'close_offset_y' => [
		'type'  => 'number',
		'title' => __( 'Offset Vertical', 'mwp-herd-effect' ),
		'val'   => '5',
		'atts' => [
			'step' => 1,
		],
		'addon' => 'px',
	],

	'close_color' => [
		'type'  => 'text',
		'val'   => '#ffffff',
		'title' => __( 'Color', 'mwp-herd-effect' ),
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'close_h_color' => [
		'type'  => 'text',
		'val'   => '#ffffff',
		'title' => __( 'Hover Color', 'mwp-herd-effect' ),
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	//endregion

	//region Border
	'border_radius'  => [
		'type'  => 'number',
		'title' => __( 'Radius', 'mwp-herd-effect' ),
		'val'   => 5,
		'atts'  => [
			'min' => '0',
		],
		'addon' => 'px',
	],

	'border_style' => [
		'type'  => 'select',
		'title' => __( 'Style', 'mwp-herd-effect' ),
		'val'   => 'none',
		'atts'  => [
			'none'   => __( 'None', 'mwp-herd-effect' ),
			'solid'  => __( 'Solid', 'mwp-herd-effect' ),
			'dotted' => __( 'Dotted', 'mwp-herd-effect' ),
			'dashed' => __( 'Dashed', 'mwp-herd-effect' ),
			'double' => __( 'Double', 'mwp-herd-effect' ),
			'groove' => __( 'Groove', 'mwp-herd-effect' ),
			'inset'  => __( 'Inset', 'mwp-herd-effect' ),
			'outset' => __( 'Outset', 'mwp-herd-effect' ),
			'ridge'  => __( 'Ridge', 'mwp-herd-effect' ),
		],
	],

	'border_width' => [
		'type'  => 'number',
		'title' => __( 'Thickness', 'mwp-herd-effect' ),
		'val'   => 0,
		'atts'  => [
			'min' => '0',
		],
		'addon' => 'px',
	],

	'border_color' => [
		'type'  => 'text',
		'val'   => '#ffffff',
		'title' => __( 'Color', 'mwp-herd-effect' ),
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	//endregion

	//region Shadow
	'shadow'       => [
		'type'  => 'select',
		'title' => __( 'Shadow', 'mwp-herd-effect' ),
		'val'   => 'none',
		'atts'  => [
			'none'   => __( 'None', 'mwp-herd-effect' ),
			'outset' => __( 'Yes', 'mwp-herd-effect' ),
		],
	],

	'shadow_h_offset' => [
		'type'  => 'number',
		'title' => __( 'Horizontal Position', 'mwp-herd-effect' ),
		'addon' => 'px',
		'val'   => 0,
	],

	'shadow_v_offset' => [
		'type'  => 'number',
		'title' => __( 'Vertical Position', 'mwp-herd-effect' ),
		'addon' => 'px',
		'val'   => 0,
	],

	'shadow_blur' => [
		'type'  => 'number',
		'title' => __( 'Blur', 'mwp-herd-effect' ),
		'addon' => 'px',
		'val'   => 3,
	],

	'shadow_spread' => [
		'type'  => 'number',
		'title' => __( 'Spread', 'mwp-herd-effect' ),
		'addon' => 'px',
		'val'   => 0,
	],

	'shadow_color'  => [
		'type'  => 'text',
		'val'   => '#020202',
		'title' => __( 'Color', 'mwp-herd-effect' ),
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],
	//endregion
];