<?php

defined( 'ABSPATH' ) || exit;


$default    = $options['item_order']['pro_feature'] ?? 1;
$item_order = ! empty( $default ) ? 1 : 0;
$open       = ! empty( $item_order ) ? ' open' : '';
?>

<div class="wpie-sidebar wpie-sidebar-features">
    <details class="wpie-item"<?php echo esc_attr( $open ); ?>>
        <input type="hidden" name="param[item_order][pro_feature]" class="wpie-item__toggle"
               value="<?php echo absint( $item_order ); ?>">
        <summary class="wpie-item_heading">
            <span class="wpie-item_heading_icon"><span class="wpie-icon wpie_icon-rocket wpie-color-danger"></span></span>
            <span class="wpie-item_heading_label"><?php esc_html_e( 'PRO FEATURES', 'mwp-herd-effect' ); ?></span>
            <span class="wpie-item_heading_type"></span>
            <span class="wpie-item_heading_toogle">
        <span class="wpie-icon wpie_icon-chevron-down"></span>
        <span class="wpie-icon wpie_icon-chevron-up "></span>
    </span>
        </summary>
        <div class="wpie-fields__box">

            <details class="wpie-details-sidebar">
                <summary>Notification Link</summary>
                <div class="wpie-details-sidebar-box">
                    Transform notifications into clickable links, enhancing their functionality and user engagement. With this feature, you can set any notification to act as a hyperlink, directing users to a specific URL when clicked.
                </div>
            </details>

            <details class="wpie-details-sidebar">
                <summary>Appearance mode</summary>
                <div class="wpie-details-sidebar-box">
                    The feature provides flexibility in how your notifications are displayed, allowing you to choose between random and stable appearance modes.
                </div>
            </details>

            <details class="wpie-details-sidebar">
                <summary>Auto-close</summary>
                <div class="wpie-details-sidebar-box">
                    Feature automatically closes notifications after a set period, enhancing user experience by ensuring that alerts do not linger on the screen longer than necessary.
                </div>
            </details>

            <h4>Animations and Icons</h4>
            <details class="wpie-details-sidebar">
                <summary>Icons</summary>
                <div class="wpie-details-sidebar-box">
                    Choose to hide icons altogether for a clean and minimalist design, upload and display a custom image for brand-specific graphics, use custom icon classes from libraries like Font Awesome for a wide range of choices, or integrate emojis to add personality and make your notifications more engaging.
                </div>
            </details>
            <details class="wpie-details-sidebar">
                <summary>Animation</summary>
                <div class="wpie-details-sidebar-box">
                    Choose from 32 different animation transitions to enhance your notification’s visual appeal.
                </div>
            </details>

            <h4>Display Rules and Visibility</h4>
            <details class="wpie-details-sidebar">
                <summary>Display Rules</summary>
                <div class="wpie-details-sidebar-box">
                    Multi Display Rules - Add several Display Rules to control exactly where your notification appear
                    using shortcodes, page types, post categories/tags, author pages, date archives and more.
                </div>
            </details>

            <details class="wpie-details-sidebar">
                <summary>Responsive Visibility</summary>
                <div class="wpie-details-sidebar-box">
                    Remove on Mobile, Remove on Desktop
                </div>
            </details>

            <details class="wpie-details-sidebar">
                <summary>Hide Based on Browser</summary>
                <div class="wpie-details-sidebar-box">
                    Customize the visibility of your notifications depending on the user's browser. Selectively hide
                    notification for specific browsers to ensure compatibility and enhance user experience across different
                    web environments.
                </div>
            </details>

            <h4>User Permissions and Targeting</h4>

            <details class="wpie-details-sidebar">
                <summary>Permissions of Users</summary>
                <div class="wpie-details-sidebar-box">
                    Set specific permissions for displaying notifications based on user roles. Customize which user
                    groups (e.g., Administrators, Editors, Authors) can view or interact with your notifications, ensuring
                    relevant content reaches the appropriate audience.
                </div>

            </details>

            <details class="wpie-details-sidebar">
                <summary>URL has Param</summary>
                <div class="wpie-details-sidebar-box">
                    Trigger the notification to open if the URL contains a specific parameter, such as notification=active,
                    allowing targeted content delivery based on URL parameters.
                </div>
            </details>
            <details class="wpie-details-sidebar">
                <summary>URL is Referrer</summary>
                <div class="wpie-details-sidebar-box">
                    Customize notification experiences for visitors arriving from specific websites, such as displaying
                    a welcome message for users coming from a partner site.
                </div>
            </details>

            <details class="wpie-details-sidebar">
                <summary>Geotargeting</summary>
                <div class="wpie-details-sidebar-box">
                    Show notifications based on the geographic location of your website visitors, enhancing targeted
                    engagement by tailoring content to regional audiences.
                </div>
            </details>

            <details class="wpie-details-sidebar">
                <summary>Multi Language</summary>
                <div class="wpie-details-sidebar-box">
                    Restrict notification visibility to users with a specific language setting, ensuring that the content is
                    relevant and understandable for the intended audience.
                </div>
            </details>

            <h4>Scheduling</h4>
            <details class="wpie-details-sidebar">
                <summary>Schedule</summary>
                <div class="wpie-details-sidebar-box">
                    Control when your notification appear by scheduling them based on specific days, times, or dates.
                    This allows you to plan and promote time-sensitive events or campaigns effectively, ensuring your
                    messages reach users at the optimal moment.
                </div>
            </details>

        </div>
    </details>
    <div class="wpie-buttons">
        <a href="https://wow-estore.com/interactive-demo-wow-herd-effects-pro/" class="wpie-button is-demo" target="_blank">Demo</a>
        <a href="https://wow-estore.com/item/wow-herd-effects-pro/" class="wpie-button is-pro" target="_blank">GET PRO</a>
    </div>
</div>

