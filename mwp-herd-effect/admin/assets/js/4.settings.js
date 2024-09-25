'use strict';

jQuery(document).ready(function ($) {

    const selectors = {
        settings: '#wpie-settings',
        color_picker: '.wpie-color',
        checkbox: '.wpie-field input[type="checkbox"]',
        full_editor: '.wpie-fulleditor',
        item_heading: '.wpie-item .wpie-item_heading',
        image_download: '.wpie-image-download',

        image_type: '[data-field="image_type"]',
        shadow: '[data-field="shadow"]',
        border_style: '[data-field="border_style"]',
        show_close: '[data-field="show_close"]',
        sec_step: '[data-field="sec_step"]',

    };


    function set_up() {
        $(selectors.full_editor).wowFullEditor();

        $('.wpie-icon-box select').fontIconPicker({
            theme: 'fip-darkgrey', emptyIcon: false, allCategoryText: 'Show all',
        });

        $(selectors.color_picker).wpColorPicker();
        $(selectors.image_download).wowImageDownload();
        $(selectors.checkbox).each(set_checkbox);

        $(selectors.image_type).each(image_type);
        $(selectors.shadow).each(shadow);
        $(selectors.border_style).each(border_style);
        $(selectors.show_close).each(show_close);
        $(selectors.sec_step).each(sec_step);

    }

    function initialize_events() {
        $(selectors.settings).on('change', selectors.checkbox, set_checkbox);
        $(selectors.settings).on('click', selectors.item_heading, item_toggle);

        $(selectors.settings).on('change', selectors.image_type, image_type);
        $(selectors.settings).on('change', selectors.shadow, shadow);
        $(selectors.settings).on('change', selectors.border_style, border_style);
        $(selectors.settings).on('change', selectors.show_close, show_close);
        $(selectors.settings).on('change', selectors.sec_step, sec_step);
    }

    //region Main
    function initialize() {
        set_up();
        initialize_events();
    }

    // Set the checkboxes
    function set_checkbox() {
        const next = $(this).next('input[type="hidden"]');
        if ($(this).is(':checked')) {
            next.val('1');
        } else {
            next.val('0');
        }
    }

    function item_toggle() {
        const parent = get_parent_fields($(this), '.wpie-item');
        const val = $(parent).attr('open') ? '0' : '1';
        $(parent).find('.wpie-item__toggle').val(val);
    }

    function get_parent_fields($el, $class = '.wpie-fields') {
        return $el.closest($class);
    }

    function get_field_box($el, $class = '.wpie-field') {
        return $el.closest($class);
    }
    //endregion

    //region Plugin

    function image_type() {
        const parent = get_parent_fields($(this));
        const box = get_field_box($(this));
        const type = $(this).val();
        const fields = parent.find('[data-field-box]').not(box);
        fields.addClass('is-hidden');

        const typeFieldMapping = {
            icon: ['menu_icon'],
            custom: ['herd_custom_link'],
            emoji: ['image_emoji'],
            class: ['image_emoji'],
        }

        if (typeFieldMapping[type]) {
            const fieldsToShow = typeFieldMapping[type];
            fieldsToShow.forEach(field => {
                parent.find(`[data-field-box="${field}"]`).removeClass('is-hidden');
            });
        }
    }

    function shadow() {
        const parent = get_parent_fields($(this));
        const box = get_field_box($(this));
        const type = $(this).val();
        const fields = parent.find('[data-field-box]').not(box);
        fields.addClass('is-hidden');
        if (type !== 'none') {
            fields.removeClass('is-hidden');
        }
    }
    function border_style() {
        const parent = get_parent_fields($(this));
        const box = get_field_box($(this));
        const radius = $('[data-field-box="border_radius"]');
        const type = $(this).val();
        const fields = parent.find('[data-field-box]').not(box).not(radius);
        fields.addClass('is-hidden');
        if (type !== 'none') {
            fields.removeClass('is-hidden');
        }
    }

    function show_close() {
        const parent = get_parent_fields($(this));
        const box = get_field_box($(this));
        const fields = parent.find('[data-field-box]').not(box);
        fields.addClass('is-hidden');
        if ($(this).is(':checked')) {
            fields.removeClass('is-hidden');
        }
    }

    function sec_step() {
        const type = $(this).val();
        const parent = get_parent_fields($(this));
        const box = get_field_box($(this));
        const fields = parent.find('[data-field-box]').not(box);
        fields.addClass('is-hidden');
        const typeFieldMapping = {
            stable: ['speed'],
            random: ['speed_min', 'speed_max'],
        }

        if (typeFieldMapping[type]) {
            const fieldsToShow = typeFieldMapping[type];
            fieldsToShow.forEach(field => {
                parent.find(`[data-field-box="${field}"]`).removeClass('is-hidden');
            });
        }
    }

    //endregion

    initialize();
});