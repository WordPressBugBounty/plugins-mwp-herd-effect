'use strict'

jQuery(document).ready(function ($) {

    $.fn.wowFullEditor = function () {

        this.each(function (index, element) {
            const newId = 'wpie-fulleditor-' + (index + 1);
            $(element).attr('id', newId);
            $(element).css({'border': 'none', 'width': '100%'});
                wp.editor.initialize(
                    newId,
                    {
                        tinymce: {
                            wpautop: false,
                            plugins: 'lists wplink hr charmap textcolor colorpicker paste tabfocus wordpress wpautoresize wpeditimage wpemoji wpgallery wplink wptextpattern codemirror table',
                            toolbar1: 'code | bold italic underline subscript superscript blockquote | bullist numlist | alignleft aligncenter alignright alignjustify | link unlink | wp_adv',
                            toolbar2: 'strikethrough hr | forecolor backcolor | pastetext removeformat charmap | outdent indent | undo redo wp_help ',
                            toolbar3: 'formatselect fontselect fontsizeselect | table',
                            toolbar4: 'variable_1 variable_2 variable_3 variable_4 variable_5 | amount',
                            codemirror: {
                                indentOnInit: true, // Whether or not to indent code on init.
                                fullscreen: false,   // Default setting is false
                                path: notification_obj.plugin_url + 'admin/assets/js/vendors/codemirror', // Path to CodeMirror distribution
                                width: 800,         // Default value is 800
                                height: 600,        // Default value is 550
                                saveCursorPosition: true,    // Insert caret marker
                            },
                            setup: function (editor) {
                                editor.addButton('variable_1', {
                                    text: '[variable_1]',
                                    tooltip: 'Variable 1',
                                    onclick: function () {
                                        editor.insertContent('[variable_1]');
                                    }
                                });
                                editor.addButton('variable_2', {
                                    text: '[variable_2]',
                                    tooltip: 'Variable 2',
                                    onclick: function () {
                                        editor.insertContent('[variable_2]');
                                    }
                                });
                                editor.addButton('variable_3', {
                                    text: '[variable_3]',
                                    tooltip: 'Variable 3',
                                    onclick: function () {
                                        editor.insertContent('[variable_3]');
                                    }
                                });
                                editor.addButton('variable_4', {
                                    text: '[variable_4]',
                                    tooltip: 'Variable 4',
                                    onclick: function () {
                                        editor.insertContent('[variable_4]');
                                    }
                                });
                                editor.addButton('variable_5', {
                                    text: '[variable_5]',
                                    tooltip: 'Variable 5',
                                    onclick: function () {
                                        editor.insertContent('[variable_5]');
                                    }
                                });
                                editor.addButton('amount', {
                                    text: '[amount]',
                                    tooltip: 'Variable amount',
                                    onclick: function () {
                                        editor.insertContent('[amount]');
                                    }
                                });
                            }
                        },
                        quicktags: {
                            buttons: "strong,em,link,block,del,ins,img,ul,ol,li,code,more,close",
                        },
                        mediaButtons: false,
                    }
                );
        });
    };

    $.fn.wowTextEditor = function () {
        this.each(function (index, element) {
            const newId = 'wpie-shorteditor-' + (index + 1);
            $(element).attr('id', newId);
            $(element).css({'border-top': 'none', 'min-height': '2'});

            wp.editor.initialize(newId, {
                tinymce: false, // This disables Visual mode
                quicktags: {
                    buttons: "strong,em,link,block,del,ins,img,ul,ol,li,code,more,close,fullscreen"
                },
                mediaButtons: false,
            });
        });
    };

    $.fn.wowIconPicker = function () {
        this.fontIconPicker({
            theme: 'fip-darkgrey',
            emptyIcon: false,
            allCategoryText: 'Show all',
        });
    };

    $.fn.wowImageDownload = function (){
        const input = $(this).find('input');
        const addon = $(this).find('.wpie-field__label.is-addon');
        $(addon).html('<span class="wpie-icon wpie_icon-file-download is-pointer"></span>');
        var custom_uploader;

        $(addon).on('click', function (e){
            if (custom_uploader) {
                custom_uploader.open();
                return;
            }

            custom_uploader = wp.media.frames.file_frame = wp.media({
                title: 'Choose Image',
                button: {
                    text: 'Choose Image'
                },
                multiple: false  // Set to true to allow multiple files to be selected
            });

            // When an image is selected in the media manager...
            custom_uploader.on('select', function() {
                // Get media attachment details from the frame state
                var attachment = custom_uploader.state().get('selection').first().toJSON();

                // Send the attachment URL to our custom input field.
                $(input).val(attachment.url);
            });

            // Open the media manager.
            custom_uploader.open();
        });

    };


});