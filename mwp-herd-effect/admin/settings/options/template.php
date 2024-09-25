<?php

defined( 'ABSPATH' ) || exit;

$template = [
	'text' => [
		'type'  => 'text',
		'title' => __( 'Title', 'mwp-herd-effect' ),
		'val'   => '',
		'atts' => [
			'placeholder' => __( 'Placeholder', 'mwp-herd-effect' ),
		],
	],

	'number' => [
		'type'  => 'number',
		'title' => __( 'Title', 'mwp-herd-effect' ),
		'val'   => '',
		'atts' => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	],

	'select' => [
		'type' => 'select',
		'title' => __('Title', 'mwp-herd-effect'),
		'val' => '1',
		'atts' => [
			'1' => __( '1', 'mwp-herd-effect' ),
			'2' => __( '2', 'mwp-herd-effect' ),
			'3' => __( '3', 'mwp-herd-effect' ),
		],
	],

	'color' => [
		'type'  => 'text',
		'val'   => '#ffffff',
		'title' => __( 'Color', 'mwp-herd-effect' ),
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'checkbox' => [
		'type'  => 'checkbox',
		'title' => __( 'Title', 'mwp-herd-effect' ),
		'label' => __( 'Enable', 'mwp-herd-effect' ),
	],

	'title' => [
		'label'  => __( 'Title', 'mwp-herd-effect' ),
		'name'   => '',
		'toggle' => true,
		'val'    => 1
	],

	'addon' => [
		'type' => 'select',
		'name' => '',
		'val'  => '',
		'atts' => [
			'1' => __( '1', 'mwp-herd-effect' ),
			'2' => __( '2', 'mwp-herd-effect' ),
			'3' => __( '3', 'mwp-herd-effect' ),
		],
	],

];