<?php
/*
 * Page Name: Style
 */

use HerdEffects\Admin\CreateFields;

defined( 'ABSPATH' ) || exit;

$page_opt = include( 'options/3.style.php' );
$field    = new CreateFields( $options, $page_opt );

$item_order = ! empty( $options['item_order']['location'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>
    <details class="wpie-item"<?php echo esc_attr( $open ); ?>>
        <input type="hidden" name="param[item_order][location]" class="wpie-item__toggle"
               value="<?php echo absint( $item_order ); ?>">
        <summary class="wpie-item_heading">
            <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-pointer"></span></span>
            <span class="wpie-item_heading_label"><?php esc_html_e( 'Location', 'mwp-herd-effect' ); ?></span>
            <span class="wpie-item_heading_type"></span>
            <span class="wpie-item_heading_toogle">
        <span class="wpie-icon wpie_icon-chevron-down"></span>
        <span class="wpie-icon wpie_icon-chevron-up "></span>
    </span>
        </summary>
        <div class="wpie-item_content">
            <div class="wpie-fieldset">
                <div class="wpie-fields wpie-modal-location">
			        <?php $field->create( 'herd_top' ); ?>
			        <?php $field->create( 'herd_bottom' ); ?>
			        <?php $field->create( 'herd_left' ); ?>
			        <?php $field->create( 'herd_right' ); ?>
                </div>
            </div>

        </div>
    </details>

<?php
$item_order = ! empty( $options['item_order']['general'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>

    <details class="wpie-item"<?php echo esc_attr( $open ); ?>>
        <input type="hidden" name="param[item_order][general]" class="wpie-item__toggle"
               value="<?php echo absint( $item_order ); ?>">
        <summary class="wpie-item_heading">
            <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-paintbrush"></span></span>
            <span class="wpie-item_heading_label"><?php esc_html_e( 'General', 'mwp-herd-effect' ); ?></span>
            <span class="wpie-item_heading_type"></span>
            <span class="wpie-item_heading_toogle">
        <span class="wpie-icon wpie_icon-chevron-down"></span>
        <span class="wpie-icon wpie_icon-chevron-up "></span>
    </span>
        </summary>
        <div class="wpie-item_content">
            <div class="wpie-fieldset">
                <div class="wpie-legend"><?php esc_html_e( 'Border', 'mwp-herd-effect' ); ?></div>
                <div class="wpie-fields">
					<?php $field->create( 'border_radius' ); ?>
					<?php $field->create( 'border_style' ); ?>
					<?php $field->create( 'border_width' ); ?>
					<?php $field->create( 'border_color' ); ?>
                </div>
            </div>
            <div class="wpie-fieldset">
                <div class="wpie-legend"><?php esc_html_e( 'Shadow', 'mwp-herd-effect' ); ?></div>
                <div class="wpie-fields">
					<?php $field->create( 'shadow' ); ?>
					<?php $field->create( 'shadow_h_offset' ); ?>
					<?php $field->create( 'shadow_v_offset' ); ?>
					<?php $field->create( 'shadow_blur' ); ?>
					<?php $field->create( 'shadow_spread' ); ?>
					<?php $field->create( 'shadow_color' ); ?>
                </div>
            </div>
        </div>
    </details>

<?php
$item_order = ! empty( $options['item_order']['content'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>

<details class="wpie-item"<?php echo esc_attr( $open ); ?>>
    <input type="hidden" name="param[item_order][content]" class="wpie-item__toggle"
           value="<?php echo absint( $item_order ); ?>">
    <summary class="wpie-item_heading">
        <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-file-content"></span></span>
        <span class="wpie-item_heading_label"><?php esc_html_e( 'Content', 'mwp-herd-effect' ); ?></span>
        <span class="wpie-item_heading_type"></span>
        <span class="wpie-item_heading_toogle">
        <span class="wpie-icon wpie_icon-chevron-down"></span>
        <span class="wpie-icon wpie_icon-chevron-up "></span>
    </span>
    </summary>
    <div class="wpie-item_content">
        <div class="wpie-fieldset">
            <div class="wpie-fields">
			    <?php $field->create( 'content_width' ); ?>
			    <?php $field->create( 'content_height' ); ?>
			    <?php $field->create( 'content_size' ); ?>
			    <?php $field->create( 'content_padding' ); ?>
			    <?php $field->create( 'content_font' ); ?>
			    <?php $field->create( 'content_line_height' ); ?>
			    <?php $field->create( 'bg_color' ); ?>
			    <?php $field->create( 'text_color' ); ?>
            </div>
        </div>
    </div>
</details>

<?php
$item_order = ! empty( $options['item_order']['title'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>

    <details class="wpie-item"<?php echo esc_attr( $open ); ?>>
        <input type="hidden" name="param[item_order][title]" class="wpie-item__toggle"
               value="<?php echo absint( $item_order ); ?>">
        <summary class="wpie-item_heading">
            <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-text"></span></span>
            <span class="wpie-item_heading_label"><?php esc_html_e( 'Title', 'mwp-herd-effect' ); ?></span>
            <span class="wpie-item_heading_type"></span>
            <span class="wpie-item_heading_toogle">
        <span class="wpie-icon wpie_icon-chevron-down"></span>
        <span class="wpie-icon wpie_icon-chevron-up "></span>
    </span>
        </summary>
        <div class="wpie-item_content">
            <div class="wpie-fieldset">
                <div class="wpie-fields">
					<?php $field->create( 'title_size' ); ?>
					<?php $field->create( 'title_line_height' ); ?>
					<?php $field->create( 'title_font' ); ?>
					<?php $field->create( 'title_font_weight' ); ?>
					<?php $field->create( 'title_font_style' ); ?>
					<?php $field->create( 'title_align' ); ?>
					<?php $field->create( 'title_color' ); ?>
                </div>
            </div>
        </div>
    </details>

<?php
$item_order = ! empty( $options['item_order']['icon'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>

    <details class="wpie-item"<?php echo esc_attr( $open ); ?>>
        <input type="hidden" name="param[item_order][icon]" class="wpie-item__toggle"
               value="<?php echo absint( $item_order ); ?>">
        <summary class="wpie-item_heading">
            <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-image"></span></span>
            <span class="wpie-item_heading_label"><?php esc_html_e( 'Icon', 'mwp-herd-effect' ); ?></span>
            <span class="wpie-item_heading_type"></span>
            <span class="wpie-item_heading_toogle">
        <span class="wpie-icon wpie_icon-chevron-down"></span>
        <span class="wpie-icon wpie_icon-chevron-up "></span>
    </span>
        </summary>
        <div class="wpie-item_content">
            <div class="wpie-fieldset">
                <div class="wpie-fields">
					<?php $field->create( 'icon_width' ); ?>
					<?php $field->create( 'icon_size' ); ?>
					<?php $field->create( 'icon_background' ); ?>
					<?php $field->create( 'icon_color' ); ?>
                </div>
            </div>
        </div>
    </details>

<?php
$item_order = ! empty( $options['item_order']['close_button'] ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>
<details class="wpie-item"<?php echo esc_attr( $open ); ?>>
    <input type="hidden" name="param[item_order][close_button]" class="wpie-item__toggle"
           value="<?php echo absint( $item_order ); ?>">
    <summary class="wpie-item_heading">
        <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-xmark"></span></span>
        <span class="wpie-item_heading_label"><?php esc_html_e( 'Close Button', 'mwp-herd-effect' ); ?></span>
        <span class="wpie-item_heading_type"></span>
        <span class="wpie-item_heading_toogle">
        <span class="wpie-icon wpie_icon-chevron-down"></span>
        <span class="wpie-icon wpie_icon-chevron-up "></span>
    </span>
    </summary>
    <div class="wpie-item_content">

        <div class="wpie-fieldset">
            <div class="wpie-fields">
			    <?php $field->create( 'show_close' ); ?>
			    <?php $field->create( 'close_size' ); ?>
			    <?php $field->create( 'close_offset_x' ); ?>
			    <?php $field->create( 'close_offset_y' ); ?>
			    <?php $field->create( 'close_color' ); ?>
			    <?php $field->create( 'close_h_color' ); ?>
            </div>
        </div>


    </div>
</details>

<?php
