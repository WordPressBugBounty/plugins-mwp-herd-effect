<?php

defined( 'ABSPATH' ) || exit;

return [
	'amount_min' => [
		'type'  => 'number',
		'title' => __( 'Amount min', 'mwp-herd-effect' ),
		'val'   => '1',
		'atts'  => [
			'min'  => 0,
			'step' => 1,
		],
	],

	'amount_max' => [
		'type'  => 'number',
		'title' => __( 'Amount max', 'mwp-herd-effect' ),
		'val'   => '59',
		'atts'  => [
			'min'  => 0,
			'step' => 1,
		],
	],

	'herd_name' => [
		'type'  => 'textarea',
		'atts' => [
			'placeholder' => __( 'Enter the values separated by comma.', 'mwp-herd-effect' ),
		],
	],

	'herd_city' => [
		'type'  => 'textarea',
		'atts' => [
			'placeholder' => __( 'Enter the values separated by comma.', 'mwp-herd-effect' ),
		],
	],

	'herd_product' => [
		'type'  => 'textarea',
		'atts' => [
			'placeholder' => __( 'Enter the values separated by comma.', 'mwp-herd-effect' ),
		],
	],

	'variable4' => [
		'type'  => 'textarea',
		'atts' => [
			'placeholder' => __( 'Enter the values separated by comma.', 'mwp-herd-effect' ),
		],
	],

	'variable5' => [
		'type'  => 'textarea',
		'atts' => [
			'placeholder' => __( 'Enter the values separated by comma.', 'mwp-herd-effect' ),
		],
	],

];