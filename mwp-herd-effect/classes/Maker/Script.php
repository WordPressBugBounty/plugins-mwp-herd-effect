<?php

namespace HerdEffects\Maker;

defined( 'ABSPATH' ) || exit;

class Script {
	private array $script;
	/**
	 * @var mixed
	 */
	private $param;
	/**
	 * @var mixed
	 */
	private $id;

	public function __construct( $id, $param ) {
		$this->id     = $id;
		$this->param  = $param;
		$this->script = [];
	}


	public function init(): array {
		$param = $this->param;

		$this->script['openTime']['type'] = 'stable';
		$this->script['openTime']['min']  = absint( $param['speed'] );

		$this->script['number'] = absint( $param['number'] );

		$this->variables();
		$this->screen();
		$this->style();

		return $this->script;
	}

	private function variables(): void {
		$param = $this->param;
		if ( ! empty( $param['amount_min'] ) && ! empty( $param['amount_max'] ) ) {
			$this->script['variables']['amount'] = [
				absint( $param['amount_min'] ),
				absint( $param['amount_max'] ),
			];
		}

		if ( ! empty( $param['herd_name'] ) ) {
			$this->script['variables']['1'] = preg_split( "/,+/", $param['herd_name'] );
		}
		if ( ! empty( $param['herd_city'] ) ) {
			$this->script['variables']['2'] = preg_split( "/,+/", $param['herd_city'] );
		}
		if ( ! empty( $param['herd_product'] ) ) {
			$this->script['variables']['3'] = preg_split( "/,+/", $param['herd_product'] );
		}

		if ( ! empty( $param['variable4'] ) ) {
			$this->script['variables']['4'] = preg_split( "/,+/", $param['variable4'] );
		}

		if ( ! empty( $param['variable5'] ) ) {
			$this->script['variables']['5'] = preg_split( "/,+/", $param['variable5'] );
		}
	}


	private function screen() {
		if ( ! empty( $this->param['include_mobile'] ) ) {
			$this->script['screenMin'] = [
				'enabled'    => true,
				'breakpoint' => absint( $this->param['screen'] ),
			];
		}

		if ( ! empty( $this->param['include_more_screen'] ) ) {
			$this->script['screenMax'] = [
				'enabled'    => true,
				'breakpoint' => absint( $this->param['screen_more'] ),
			];
		}
	}

	private function style(): void {
		$param    = $this->param;
		$location = $this->location();
		$general  = $this->general_style();
		$content  = $this->content_style();
		$title    = [];
		if ( ! empty( $param['herd_title'] ) ) {
			$title = $this->title_style();
		}
		$icon = [];
		if ( $param['image_type'] !== 'none' ) {
			$icon = $this->icon_style();
		}
		$close = [];
		if ( ! empty( $param['show_close'] ) ) {
			$close = $this->close_style();
		}

		$args     = array_merge( $general, $location, $title, $content, $icon, $close );
		$esc_args = array_map( 'esc_attr', $args );

		$this->script['style'] = $esc_args;
	}

	private function location(): array {
		$param  = $this->param;
		$top    = 'auto';
		$right  = 'auto';
		$bottom = 'auto';
		$left   = 'auto';

		if ( ! empty( $param['include_herd_top'] ) ) {
			$top = $param['herd_top'] . $param['herd_top_unit'];
		}

		if ( ! empty( $param['include_herd_bottom'] ) ) {
			$bottom = $param['herd_bottom'] . $param['herd_bottom_unit'];
		}

		if ( ! empty( $param['include_herd_left'] ) ) {
			$left = $param['herd_left'] . $param['herd_left_unit'];
		}

		if ( ! empty( $param['include_herd_right'] ) ) {
			$right = $param['herd_right'] . $param['herd_right_unit'];
		}

		$location = "$top $right $bottom $left";

		return [ '--inset' => $location ];
	}

	private function general_style(): array {
		$param = $this->param;
		$args  = [
			'--radius' => ( $param['border_radius'] ?? '5' ) . 'px',
		];

		if ( isset( $param['border_style'] ) && $param['border_style'] !== 'none' ) {
			$border_width = ( $param['border_width'] ?? '0' ) . 'px';
			$border_style = $param['border_style'] ?? 'solid';
			$border_color = $param['border_color'] ?? '#ffffff';

			$args['--border'] = "$border_width $border_style $border_color";
		}

		if ( isset( $param['shadow'] ) && $param['shadow'] !== 'none' ) {
			$offset_x     = ( $param['shadow_h_offset'] ?? '0' ) . 'px';
			$offset_y     = ( $param['shadow_v_offset'] ?? '0' ) . 'px';
			$blur         = ( $param['shadow_blur'] ?? '0' ) . 'px';
			$spread       = ( $param['shadow_spread'] ?? '0' ) . 'px';
			$shadow_color = $param['shadow_color'] ?? '#ffffff';

			$args['--shadow'] = "$offset_x $offset_y $blur $spread $shadow_color";
		}

		return $args;
	}

	private function content_style(): array {
		$param      = $this->param;
		$text_block = ( ! empty( $param['content_width_unit'] ) && ! empty( $param['content_width'] ) ) ? absint( $param['content_width'] ) . $param['content_width_unit'] : '200px';
		$args       = [
			'--text-block'      => $text_block,
			'--text-size'       => ( $param['content_size'] ?? '14' ) . 'px',
			'--text-line'       => ( $param['content_line_height'] ?? '18' ) . 'px',
			'--text-color'      => $param['text_color'] ?? '#ffffff',
			'--text-background' => $param['bg_color'] ?? 'rgba(0, 0, 0, 0.75)',
			'--text-font'       => $param['content_font'] ?? 'inherit',
			'--text-padding'    => ( $param['content_padding'] ?? '10' ) . 'px',
		];

		if ( isset( $param['content_height_unit'] ) ) {
			if ( $param['content_height_unit'] === 'auto' ) {
				$args['--text-height'] = 'auto';
			} else {
				$args['--text-height'] = $param['content_height'] . $param['content_height_unit'];
			}
		}


		return $args;
	}

	private function title_style(): array {
		$param = $this->param;
		$args  = [
			'--title-font'   => $param['title_font'] ?? 'inherit',
			'--title-size'   => ( $param['title_size'] ?? '18' ) . 'px',
			'--title-weight' => $param['title_font_weight'] ?? 'bolder',
			'--title-style'  => $param['title_font_style'] ?? 'normal',
			'--title-line'   => ( $param['title_line_height'] ?? '32' ) . 'px',
			'--title-align'  => $param['title_align'] ?? 'left',
			'--title-color'  => $param['title_color'] ?? '#ffffff',
		];

		return $args;
	}

	private function icon_style(): array {
		$param = $this->param;
		$args  = [
			'--img-block'      => ( $param['icon_width'] ?? '60' ) . 'px',
			'--img-size'       => ( $param['icon_size'] ?? '40' ) . 'px',
			'--img-background' => $param['icon_background'] ?? 'rgba(0,0,0,0.75)',
			'--img-color'      => $param['icon_color'] ?? '#ffffff',
		];

		return $args;
	}

	private function close_style(): array {
		$param = $this->param;
		$args  = [
			'--close-size'        => ( $param['close_size'] ?? '24' ) . 'px',
			'--close-color'       => $param['close_color'] ?? '#ffffff',
			'--close-h-color'     => $param['close_h_color'] ?? '#ffffff',
			'--close-inset-top'   => ( $param['close_offset_y'] ?? '5' ) . 'px',
			'--close-inset-right' => ( $param['close_offset_x'] ?? '5' ) . 'px',
		];

		return $args;
	}

}