<?php

use HerdEffects\Settings_Helper;

defined( 'ABSPATH' ) || exit;

return [

	//region Show
	'sec_step' => [
		'type' => 'select',
		'title' => __('Appearance mode', 'mwp-herd-effect'),
		'val' => 'stable',
		'atts' => [
			'stable' => __( 'Stable', 'herd-effects' ),
		],
	],

	'speed' => [
		'type'  => 'number',
		'title' => __( 'Show every', 'mwp-herd-effect' ),
		'val'   => '5',
		'atts' => [
			'min'  => 0,
			'step' => 1,
		],
		'addon' => 'sec',
	],

	'number' => [
		'type'  => 'number',
		'title' => __( 'Number of notifications', 'mwp-herd-effect' ),
		'val'   => '3',
		'atts' => [
			'min'  => 0,
			'step' => 1,
		],
	],
	//endregion

	//region Animation

	'window_animate' => [
		'type' => 'select',
		'title' => __('Animation In', 'mwp-herd-effect'),
		'val' => '1',
		'atts' => Settings_Helper::animationIn(),
	],

	'window_animate_out' => [
		'type' => 'select',
		'title' => __('Animation Out', 'mwp-herd-effect'),
		'val' => '1',
		'atts' => Settings_Helper::animationOut(),
	],

	//endregion

];