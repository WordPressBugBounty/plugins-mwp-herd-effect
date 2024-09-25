<?php


use HerdEffects\Settings_Helper;

defined( 'ABSPATH' ) || exit;

$show = [
	'general_start' => __( 'General', 'mwp-herd-effect' ),
	'everywhere'    => __( 'Everywhere', 'mwp-herd-effect' ),
	'shortcode'     => __( 'Shortcode', 'mwp-herd-effect' ),
	'general_end'   => __( 'General', 'mwp-herd-effect' ),

];


$args = [
	//region Display Rules
	'show' => [
		'type'  => 'select',
		'title' => __( 'Display', 'mwp-herd-effect' ),
		'val'   => 'everywhere',
		'atts'  => $show,
	],
	//endregion


	//region Other

	'fontawesome' => [
		'type'  => 'checkbox',
		'title' => __( 'Disable Font Awesome Icon', 'mwp-herd-effect' ),
		'val'   => 0,
		'label' => __( 'Disable', 'mwp-herd-effect' ),
	],
	
	//endregion

	//region Responsive Visibility
	'screen'       => [
		'type'  => 'number',
		'title' => [
			'label'  => __( 'Hide on smaller screens', 'mwp-herd-effect' ),
			'name'   => 'include_mobile',
			'toggle' => true,
		],
		'val'   => 480,
		'addon' => 'px',
	],

	'screen_more' => [
		'type'  => 'number',
		'title' => [
			'label'  => __( 'Hide on larger screens', 'mwp-herd-effect' ),
			'name'   => 'include_more_screen',
			'toggle' => true,
		],
		'val'   => 1024,
		'addon' => 'px'
	],

	//endregion

];


return $args;
