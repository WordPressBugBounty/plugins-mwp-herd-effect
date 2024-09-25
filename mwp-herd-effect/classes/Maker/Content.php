<?php

namespace HerdEffects\Maker;

defined( 'ABSPATH' ) || exit;

class Content {
	/**
	 * @var mixed
	 */
	private $id;
	/**
	 * @var mixed
	 */
	private $param;
	/**
	 * @var mixed
	 */
	private $title;

	public function __construct( $id, $param ) {
		$this->id    = $id;
		$this->param = $param;
	}

	public function init(): string {
		return $this->create();
	}

	private function create(): string {
		$param = $this->param;

		$out = '<div id="wow-notification-' . absint( $this->id ) . '" class="wow-notification">';
		if ( ! empty( $param['show_close'] ) ) {
			$out .= '<div class="wow-notification-close">&times;</div>';
		}
		$out .= '<div class="wow-notification-block">';
		$out .= $this->create_image();
		$out .= '<div class="wow-notification-text-block">';
		$out .= $this->create_title();
		$out .= $this->create_content();
		$out .= '</div></div></div>';

		return $out;
	}

	private function create_image(): string {
		$out = '';

		if ( empty( $this->param['image_type'] ) || $this->param['image_type'] === 'none' ) {
			return $out;
		}

		$out = '<div class="wow-notification-img">';

		if ( $this->param['image_type'] === 'custom' ) {
			$out .= '<img src="' . esc_url( $this->param['herd_custom_link'] ) . '">';
		} elseif ( $this->param['image_type'] === 'emoji' ) {
			$out .= esc_attr( $this->param['image_emoji'] );
		} elseif ( $this->param['image_type'] === 'class' ) {
			$out .= '<span class="' . esc_attr( $this->param['image_emoji'] ) . '"></span>';
		}
		else {
			$out .= '<span class="' . esc_attr( $this->param['menu_icon'] ) . '"></span>';
		}

		$out .= '</div>';

		return $out;
	}

	private function create_title(): string {
		$out = '';

		if ( empty( $this->param['herd_title'] ) ) {
			return $out;
		}

		return '<div class="wow-notification-title">' . esc_html( $this->param['herd_title'] ) . '</div>';
	}

	private function create_content(): string {
		$out = '<div class="wow-wow-notification-text">';
		$content = wp_kses_post( $this->param['herd_text'] );
		$search = ['[variable1]', '[variable2]', '[variable3]', '[variable4]', '[variable5]'];
		$replace = ['[variable_1]', '[variable_2]', '[variable_3]', '[variable_4]', '[variable_5]'];
		$out .= str_replace($search, $replace, $content);
		$out .= '</div>';

		return $out;
	}
}