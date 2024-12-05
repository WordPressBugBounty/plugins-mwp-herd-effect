<?php

use HerdEffects\Settings_Helper;

defined( 'ABSPATH' ) || exit;

return [
	'herd_title' => [
		'title' => __( 'Notification title', 'mwp-herd-effect' ),
		'type'  => 'text',
		'atts'  => [
			'placeholder' => __( 'Enter notification title', 'mwp-herd-effect' ),
		],
	],

	'image_type' => [
		'type'  => 'select',
		'title' => __( 'Icon type', 'mwp-herd-effect' ),
		'val'   => 'icon',
		'atts'  => [
			'icon'   => __( 'Icons', 'mwp-herd-effect' ),
			'custom' => __( 'Image', 'mwp-herd-effect' ),
		],
	],


	'menu_icon' => [
		'type'    => 'text',
		'title'   => __( 'Icon', 'mwp-herd-effect' ),
		'value'   => 'fas fa-wand-magic-sparkles',
		'options' => [
			'class' => 'wpie-icon-box',
		]
	],

	'herd_custom_link' => [
		'title' => __( 'Image URL', 'mwp-herd-effect' ),
		'type'  => 'text',
		'atts'  => [
			'placeholder' => __( 'Enter Image URL', 'mwp-herd-effect' ),
		],
		'class' => 'wpie-image-download',
		'addon' => ' ',
	],

	'herd_text' => [
		'type'  => 'editor',
		'class' => 'is-full',
		'val'   => __( '[variable_1] from [variable_2] has just bought <strong>Wow Herd Effects Pro</strong> [amount] minutes ago.','mwp-herd-effect' ),
		'atts'  => [
			'class' => 'wpie-fulleditor',
		],
	],

];