<?php
/*
 * Page Name: Add New
 */

use HerdEffects\Admin\CreateFields;
use HerdEffects\Admin\Settings;
use HerdEffects\WOWP_Plugin;

defined( 'ABSPATH' ) || exit;

$options = Settings::get_options();

$title = $options['title'] ?? '';
$id    = $options['id'] ?? '';

if ( ! isset( $options['live_preview'] ) ) {
	$builder_open = ' open';
} elseif ( ! empty( $options['live_preview'] ) ) {
	$builder_open = ' open';
} else {
	$builder_open = '';
}

?>
    <form action="" id="wpie-settings" class="wpie-settings__wrapper" method="post">

        <div class="wpie-settings__main">

            <div class="wpie-field title">
                <label class="wpie-field__label">
                <span class="screen-reader-text">
                    <?php esc_html_e( 'Enter title here', 'mwp-herd-effect' ); ?></span>
                    <input type="text" name="title" size="30" value="<?php echo esc_attr( $title ); ?>" id="title"
                           placeholder="<?php esc_attr_e( 'Add title', 'mwp-herd-effect' ); ?>">
                </label>
            </div>

            <details class="wpie-item is-builder"<?php echo esc_attr( $builder_open ); ?>>
                <input type="hidden" name="live_preview" class="wpie-item__toggle" value="1">
                <summary class="wpie-item_heading">
                    <h3>
                        <span class="wpie-icon wpie_icon-eye-open"></span>
                        <span class="wpie-icon wpie_icon-eye-closed"></span>
						<?php esc_html_e( 'Live preview', 'wpbuttons' ); ?>
                    </h3>
                    <span class="wpie-item_heading_toogle">
                    <span class="wpie-icon wpie_icon-chevron-down"></span>
                <span class="wpie-icon wpie_icon-chevron-up "></span>
                </span>
                </summary>

                <div class="wpie-live-preview">
                    <style id="wpie-live-preview-style"></style>
                    <div id="notification-preview" class="notification">
                        <div class="notification-close">&times;</div>
                        <div class="notification-block">
                            <div class="notification-img">
                                <span class="fa-solid fa-0"></span>
                            </div>
                            <div class="notification-text-block">
                                <div class="notification-title"></div>
                                <div class="notification-text"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </details>

			<?php Settings::init(); ?>

        </div>

        <div class="wpie-settings__sidebar">
			<?php require_once WOWP_Plugin::dir() . 'admin/settings/sidebar.php'; ?>
        </div>

        <input type="hidden" name="tool_id" value="<?php echo absint( $id ); ?>" id="tool_id"/>
        <input type="hidden" name="item_time" value="<?php echo esc_attr( time() ); ?>"/>
		<?php wp_nonce_field( WOWP_Plugin::PREFIX . '_nonce', WOWP_Plugin::PREFIX . '_settings' ); ?>
    </form>

<?php
