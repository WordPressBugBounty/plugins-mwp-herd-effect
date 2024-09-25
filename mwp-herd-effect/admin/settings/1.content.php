<?php
/*
 * Page Name: Content
 */

use HerdEffects\Admin\CreateFields;

defined( 'ABSPATH' ) || exit;

$page_opt = include( 'options/1.content.php' );
$field    = new CreateFields( $options, $page_opt );
?>

    <div class="wpie-fieldset">
        <div class="wpie-fields is-column">
			<?php $field->create( 'herd_title' ); ?>
        </div>
        <div class="wpie-fields">
            <?php $field->create( 'image_type' ); ?>
            <?php $field->create( 'menu_icon' ); ?>
            <?php $field->create( 'herd_custom_link' ); ?>
        </div>
    </div>

    <div class="wpie-fieldset">
        <div class="wpie-fields is-column">
			<?php $field->create( 'herd_text' ); ?>
        </div>
    </div>

<?php
