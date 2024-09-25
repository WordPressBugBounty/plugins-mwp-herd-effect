<?php

/**
 * Class UpdateDB
 *
 * Contains methods for updating the database structure and data
 *
 * @package    HerdEffects
 * @subpackage Update
 * @author     Dmytro Lobov <hey@wow-company.com>, Wow-Company
 * @copyright  2024 Dmytro Lobov
 * @license    GPL-2.0+
 *
 */

namespace HerdEffects\Update;

use HerdEffects\Admin\DBManager;
use HerdEffects\Settings_Helper;
use HerdEffects\WOWP_Plugin;

class UpdateDB {

	public static function init(): void {
		$current_db_version = get_option( WOWP_Plugin::PREFIX . '_db_version' );

		if ( $current_db_version && version_compare( $current_db_version, '7.0', '>=' ) ) {
			return;
		}

		self::start_update();

		update_option( WOWP_Plugin::PREFIX . '_db_version', '7.0' );
	}

	public static function start_update(): void {
		self::update_database();
		self::update_fields();
	}

	public static function update_database(): void {

		global $wpdb;
		$table           = $wpdb->prefix . WOWP_Plugin::PREFIX;
		$charset_collate = $wpdb->get_charset_collate();

		$columns = "
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			title VARCHAR(200) DEFAULT '' NOT NULL,
			param longtext DEFAULT '' NOT NULL,
			status boolean DEFAULT 0 NOT NULL,
			mode boolean DEFAULT 0 NOT NULL,
			tag text DEFAULT '' NOT NULL,
			PRIMARY KEY  (id)
			";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

		$sql = "CREATE TABLE $table ($columns) $charset_collate;";
		dbDelta( $sql );
	}


	public static function update_fields(): void {
		$results = DBManager::get_all_data();

		if ( empty( $results ) || ! is_array( $results ) ) {
			return;
		}
		foreach ( $results as $result ) {
			$param     = maybe_unserialize( $result->param );
			$test_mode = (!empty($param['test_mode']) && $param['test_mode'] === 'yes') ? 1 : 0;
			$status    = 0;

			$param = self::update_param( $param );

			$data = [
				'param'  => maybe_serialize( $param ),
				'status' => absint( $status ),
				'mode'   => absint( $test_mode ),
				'tag'    => '',
			];

			$where = [ 'id' => $result->id ];

			$data_formats = [ '%s', '%d', '%d', '%s' ];

			DBManager::update( $data, $where, $data_formats );

		}
	}

	public static function update_param( $param ) {


		// Show
		if ( ! is_array( $param['show'] ) ) {
			$show_old = ! empty( $param['show'] ) ? $param['show'] : 'everywhere';
			$param['show']      = [];
			$param['operator']  = [];
			$param['page_type'] = [];
			$param['ids']       = [];

			$param['show'][0]      = 'shortcode';
			$param['operator'][0]  = '1';
			$param['page_type'][0] = 'is_front_page';
			$param['ids'][0]       = ! empty( $param['id_post'] ) ? $param['id_post'] : '';

			switch ( $show_old ) {
				case 'all':
					$param['show'][0] = 'everywhere';
					break;
			}
		}

		return $param;
	}

}