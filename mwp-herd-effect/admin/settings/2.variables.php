<?php

/*
 * Page Name: Variables
 */

use HerdEffects\Admin\CreateFields;

defined( 'ABSPATH' ) || exit;

$page_opt = include( 'options/2.variables.php' );
$field    = new CreateFields( $options, $page_opt );

$item_order = ! empty( $options['item_order']['amount'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>

    <details class="wpie-item"<?php echo esc_attr( $open ); ?>>
        <input type="hidden" name="param[item_order][amount]" class="wpie-item__toggle"
               value="<?php echo absint( $item_order ); ?>">
        <summary class="wpie-item_heading">
            <span class="wpie-item_heading_icon">∑</span>
            <span class="wpie-item_heading_label"><?php esc_html_e( 'Amount', 'mwp-herd-effect' ); ?></span>
            <span class="wpie-item_heading_type"></span>
            <span class="wpie-item_heading_toogle">
                <span class="wpie-icon wpie_icon-chevron-down"></span>
                <span class="wpie-icon wpie_icon-chevron-up "></span>
            </span>
        </summary>
        <div class="wpie-item_content">
            <div class="wpie-fieldset">
                <div class="wpie-fields">
					<?php $field->create( 'amount_min' ); ?>
					<?php $field->create( 'amount_max' ); ?>
                </div>
            </div>
        </div>
    </details>

<?php
$item_order = ! empty( $options['item_order']['variable_1'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>
    <details class="wpie-item"<?php echo esc_attr( $open ); ?>>
        <input type="hidden" name="param[item_order][variable_1]" class="wpie-item__toggle"
               value="<?php echo absint( $item_order ); ?>">
        <summary class="wpie-item_heading">
            <span class="wpie-item_heading_icon">1</span>
            <span class="wpie-item_heading_label"><?php esc_html_e( 'Variable 1', 'mwp-herd-effect' ); ?></span>
            <span class="wpie-item_heading_type"></span>
            <span class="wpie-item_heading_toogle">
                <span class="wpie-icon wpie_icon-chevron-down"></span>
                <span class="wpie-icon wpie_icon-chevron-up "></span>
            </span>
        </summary>
        <div class="wpie-item_content">
            <div class="wpie-fieldset">
                <div class="wpie-fields is-column">
					<?php $field->create( 'herd_name' ); ?>
                </div>
            </div>
        </div>
    </details>

<?php
$item_order = ! empty( $options['item_order']['variable_2'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>
    <details class="wpie-item"<?php echo esc_attr( $open ); ?>>
        <input type="hidden" name="param[item_order][variable_2]" class="wpie-item__toggle"
               value="<?php echo absint( $item_order ); ?>">
        <summary class="wpie-item_heading">
            <span class="wpie-item_heading_icon">2</span>
            <span class="wpie-item_heading_label"><?php esc_html_e( 'Variable 2', 'mwp-herd-effect' ); ?></span>
            <span class="wpie-item_heading_type"></span>
            <span class="wpie-item_heading_toogle">
                <span class="wpie-icon wpie_icon-chevron-down"></span>
                <span class="wpie-icon wpie_icon-chevron-up "></span>
            </span>
        </summary>
        <div class="wpie-item_content">
            <div class="wpie-fieldset">
                <div class="wpie-fields is-column">
					<?php $field->create( 'herd_city' ); ?>
                </div>
            </div>
        </div>
    </details>

<?php
$item_order = ! empty( $options['item_order']['variable_3'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>
    <details class="wpie-item"<?php echo esc_attr( $open ); ?>>
        <input type="hidden" name="param[item_order][variable_3]" class="wpie-item__toggle"
               value="<?php echo absint( $item_order ); ?>">
        <summary class="wpie-item_heading">
            <span class="wpie-item_heading_icon">2</span>
            <span class="wpie-item_heading_label"><?php esc_html_e( 'Variable 3', 'mwp-herd-effect' ); ?></span>
            <span class="wpie-item_heading_type"></span>
            <span class="wpie-item_heading_toogle">
                <span class="wpie-icon wpie_icon-chevron-down"></span>
                <span class="wpie-icon wpie_icon-chevron-up "></span>
            </span>
        </summary>
        <div class="wpie-item_content">
            <div class="wpie-fieldset">
                <div class="wpie-fields is-column">
					<?php $field->create( 'herd_product' ); ?>
                </div>
            </div>
        </div>
    </details>

<?php
$item_order = ! empty( $options['item_order']['variable_4'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>
    <details class="wpie-item"<?php echo esc_attr( $open ); ?>>
        <input type="hidden" name="param[item_order][variable_4]" class="wpie-item__toggle"
               value="<?php echo absint( $item_order ); ?>">
        <summary class="wpie-item_heading">
            <span class="wpie-item_heading_icon">4</span>
            <span class="wpie-item_heading_label"><?php esc_html_e( 'Variable 4', 'mwp-herd-effect' ); ?></span>
            <span class="wpie-item_heading_type"></span>
            <span class="wpie-item_heading_toogle">
                <span class="wpie-icon wpie_icon-chevron-down"></span>
                <span class="wpie-icon wpie_icon-chevron-up "></span>
            </span>
        </summary>
        <div class="wpie-item_content">
            <div class="wpie-fieldset">
                <div class="wpie-fields is-column">
					<?php $field->create( 'variable4' ); ?>
                </div>
            </div>
        </div>
    </details>

<?php
$item_order = ! empty( $options['item_order']['variable_5'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>
    <details class="wpie-item"<?php echo esc_attr( $open ); ?>>
        <input type="hidden" name="param[item_order][variable_5]" class="wpie-item__toggle"
               value="<?php echo absint( $item_order ); ?>">
        <summary class="wpie-item_heading">
            <span class="wpie-item_heading_icon">5</span>
            <span class="wpie-item_heading_label"><?php esc_html_e( 'Variable 5', 'mwp-herd-effect' ); ?></span>
            <span class="wpie-item_heading_type"></span>
            <span class="wpie-item_heading_toogle">
                <span class="wpie-icon wpie_icon-chevron-down"></span>
                <span class="wpie-icon wpie_icon-chevron-up "></span>
            </span>
        </summary>
        <div class="wpie-item_content">
            <div class="wpie-fieldset">
                <div class="wpie-fields is-column">
					<?php $field->create( 'variable5' ); ?>
                </div>
            </div>
        </div>
    </details>

<?php
