<?php
/*
 * Page Name: Settings
 */

use HerdEffects\Admin\CreateFields;

defined( 'ABSPATH' ) || exit;

$page_opt = include( 'options/4.settings.php' );
$field    = new CreateFields( $options, $page_opt );
$id       = $options['id'] ?? '';

?>



    <div class="wpie-fieldset">
        <div class="wpie-legend"><?php esc_html_e( 'Show', 'mwp-herd-effect' ); ?></div>
        <div class="wpie-fields">
			<?php $field->create( 'sec_step' ); ?>
			<?php $field->create( 'speed' ); ?>
        </div>
        <div class="wpie-fields">
	        <?php $field->create( 'number' ); ?>
        </div>
    </div>

<?php
