'use strict';

(function ($) {

    $.fn.wowNotifocationLiveBuilder = function () {

        const builder = $('#notification-preview');
        const closeBtn = $(builder).find('.notification-close');
        const title = $(builder).find('.notification-title');
        const img = $(builder).find('.notification-img');
        const text = $(builder).find('.notification-text');

        const style = $('#wpie-live-preview-style');

        const selectors = {
            settings: '#wpie-settings',
        }

        $(selectors.settings).on('change click keyup', run);

        run();

        function run() {
            setContent();
            setIcon();
            setTitle();
            setStyle();
        }

        function setContent() {
            // If Visual editor is initialized and active, fetch content from it
            const editor = tinymce.get('wpie-fulleditor-1');
            if (editor && $('#wp-wpie-fulleditor-1-wrap').hasClass('tmce-active')) {
                $(text).html(editor.getContent()); // immediately set the text
                editor.on('keyup', function () {
                    $(text).html(editor.getContent());
                });
            }

            // If textarea (Text editor) is active, fetch content from it
            if ($('#wp-wpie-fulleditor-1-wrap').hasClass('html-active')) {
                $('.notification-text').html($('#wpie-fulleditor-1').val()); // immediately set the text
                $('#wpie-fulleditor-1').on('input', function () {
                    $(text).html($(this).val());
                });
            }
        }

        function setIcon() {
            const type = $('[data-field="image_type"]').val();
            const icon = $('[data-field="menu_icon"]').val();
            const imgLink = $('[data-field="herd_custom_link"]').val();
            const emoji = $('[data-field="image_emoji"]').val();

            $(img).removeClass('is-hidden');

            if (type === 'icon') {
                $(img).html(`<span class="${icon}"></span>`);
            }

            if (type === 'custom') {
                $(img).html(`<img src="${imgLink}">`);
            }

            if (type === 'emoji') {
                $(img).html(`${emoji}`);
            }

            if (type === 'class') {
                $(img).html(`<span class="dashicons dashicons-format-image"></span>`);
            }

            if (type === 'none') {
                $(img).addClass('is-hidden');
            }

        }

        function setTitle() {
            const titleText = $('[data-field="herd_title"]').val();
            $(title).html(titleText);
        }

        function setStyle() {

            let general = generalCss();
            let location = locationCss();
            let content = contentCss();
            let title = titleCss();
            let icon = iconCss();
            let close = closeCss();

            let args = $.extend({}, general, location, content, title, icon, close);

            let css = '#notification-preview {';

            Object.keys(args).forEach(key => {
                css += `${key}: ${args[key]};`;
            });

            css += '}';

            $(style).html(css);
        }

        function generalCss() {
            const sel = {
                radius: '[data-field="border_radius"]',
                borderStyle: '[data-field="border_style"]',
                borderWidth: '[data-field="border_width"]',
                borderColor: '[data-field="border_color"]',
                shadow: '[data-field="shadow"]',
                offsetH: '[data-field="shadow_h_offset"]',
                offsetV: '[data-field="shadow_v_offset"]',
                blur: '[data-field="shadow_blur"]',
                spread: '[data-field="shadow_spread"]',
                shadowColor: '[data-field="shadow_color"]',
            };

            const css = {
                '--radius': $(sel.radius).val() + 'px'
            };

            if ($(sel.borderStyle).val() !== 'none') {
                const style = $(sel.borderStyle).val();
                const width = $(sel.borderWidth).val() + 'px';
                const color = $(sel.borderColor).val();

                css['--border'] = `${width} ${style} ${color}`;
            }

            if ($(sel.shadow).val() !== 'none') {
                const offsetH = $(sel.offsetH).val() + 'px';
                const offsetV = $(sel.offsetV).val() + 'px';
                const blur = $(sel.blur).val() + 'px';
                const spread = $(sel.spread).val() + 'px';
                const shadowColor = $(sel.shadowColor).val();

                css['--shadow'] = `${offsetH} ${offsetV} ${blur} ${spread} ${shadowColor}`;
            }

            return css;

        }

        function contentCss() {
            const sel = {
                width: '[data-field="content_width"]',
                unit: '[data-field="content_width_unit"]',
                size: '[data-field="content_size"]',
                line: '[data-field="content_line_height"]',
                color: '[data-field="text_color"]',
                bg: '[data-field="bg_color"]',
                font: '[data-field="content_font"]',
                height: '[data-field="content_height"]',
                heightUnit: '[data-field="content_height_unit"]',
                padding: '[data-field="content_padding"]',
            };

            let css = {
                '--text-block': $(sel.width).val() + $(sel.unit).val(),
                '--text-size': $(sel.size).val() + 'px',
                '--text-line': $(sel.line).val() + 'px',
                '--text-color': $(sel.color).val(),
                '--text-background': $(sel.bg).val(),
                '--text-font': $(sel.font).val(),
                '--text-padding': $(sel.padding).val()  + 'px',
            };

            if ($(sel.heightUnit) === 'auto') {
                css['--text-height'] = 'auto';
            } else {
                css['--text-height'] = $(sel.height).val() + $(sel.heightUnit).val();
            }

            return css;

        }

        function locationCss() {
            let top = 'auto';
            let right = 'auto';
            let bottom = 'auto';
            let left = 'auto';

            const sel = {
                topOn: '[data-field="include_herd_top"]',
                top: '[data-field="herd_top"]',
                topUnit: '[data-field="herd_top_unit"]',
                bottomOn: '[data-field="include_herd_bottom"]',
                bottom: '[data-field="herd_bottom"]',
                bottomUnit: '[data-field="herd_bottom_unit"]',
                leftOn: '[data-field="include_herd_left"]',
                left: '[data-field="herd_left"]',
                leftUnit: '[data-field="herd_left_unit"]',
                rightOn: '[data-field="include_herd_right"]',
                right: '[data-field="herd_right"]',
                rightUnit: '[data-field="herd_right_unit"]',
            };

            if ($(sel.topOn).is(':checked')) {
                top = $(sel.top).val() + $(sel.topUnit).val();
            }
            if ($(sel.bottomOn).is(':checked')) {
                bottom = $(sel.bottom).val() + $(sel.bottomUnit).val();
            }
            if ($(sel.leftOn).is(':checked')) {
                left = $(sel.left).val() + $(sel.leftUnit).val();
            }
            if ($(sel.rightOn).is(':checked')) {
                right = $(sel.right).val() + $(sel.rightUnit).val();
            }

            const location = `${top} ${right} ${bottom}  ${left}`;

            return {'--inset': location};
        }

        function titleCss() {
            const sel = {
                color: '[data-field="title_color"]',
                align: '[data-field="title_align"]',
                line: '[data-field="title_line_height"]',
                font: '[data-field="title_font"]',
                weight: '[data-field="title_font_weight"]',
                style: '[data-field="title_font_style"]',
                size: '[data-field="title_size"]',
            };

            let css = {
                '--title-font': $(sel.font).val(),
                '--title-size': $(sel.size).val() + 'px',
                '--title-line': $(sel.line).val() + 'px',
                '--title-weight': $(sel.weight).val(),
                '--title-style': $(sel.style).val(),
                '--title-align': $(sel.align).val(),
                '--title-color': $(sel.color).val(),
            };

            return css;
        }

        function iconCss() {
            const sel = {
                width: '[data-field="icon_width"]',
                size: '[data-field="icon_size"]',
                background: '[data-field="icon_background"]',
                color: '[data-field="icon_color"]',
            };

            let css = {
                '--img-block': $(sel.width).val() + 'px',
                '--img-size': $(sel.size).val() + 'px',
                '--img-background': $(sel.background).val(),
                '--img-color': $(sel.color).val(),
            };

            return css;
        }

        function closeCss() {
            const sel = {
                show: '[data-field="show_close"]',
                size: '[data-field="close_size"]',
                color: '[data-field="close_color"]',
                colorHover: '[data-field="close_h_color"]',
                offsetX: '[data-field="close_offset_x"]',
                offsetY: '[data-field="close_offset_y"]',
            };

            let css = {
                '--close-size': $(sel.size).val() + 'px',
                '--close-color': $(sel.color).val(),
                '--close-h-color': $(sel.colorHover).val(),
                '--close-inset-top': $(sel.offsetY).val() + 'px',
                '--close-inset-right': $(sel.offsetX).val() + 'px',
            };

            $(closeBtn).hide(0);

            if ($(sel.show).is(':checked')) {
                $(closeBtn).show(0);
            }


            return css;
        }

        return {
            run: run
        };

    }

    $.fn.wowNotifocationLiveBuilder();

    $('.wpie-color').wpColorPicker({
        change: function (event, ui) {
            $.fn.wowNotifocationLiveBuilder().run();
        }
    });
}(jQuery));