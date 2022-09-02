import Select2 from '../select2';

require('../select2')

window.Select2 = Select2;

window.form = {
    init () {
        if ($('[data-editor]').exists()) {
            for (let editor of $('[data-editor]')) {
                CKEDITOR.replace(editor, {
                    height: $(editor).data('type') === 'description' ? 400 : '15em',
                    skin: 'n1theme',
                    toolbar: CKEDITOR_TOOLBARS.lite,
                    filebrowserUploadUrl: `${ app.uploads.ckeditor.url }?folder=${ $(editor).data('folder') }`,
                    filebrowserUploadMethod: 'form',
                });
            }
        }
        if ($('[data-type="time"]').exists()) {
            for (let time of $('[data-type="time"]')) {
                new Inputmask({alias: 'datetime', inputFormat: mask.time.format, hourFormat: mask.time.hourFormat, max: '24:00', placeholder: mask.time.format.replace(/[a-zA-Z]/g, mask.time.placeholder)}).mask(time);
            }
        }
        if ($('[data-type="deadline"]').exists()) {
            for (let deadline of $('[data-type="deadline"]')) {
                $(deadline).datepicker({
                    autoHide: true,
                    language: 'ru-RU',
                    format: mask.deadline.format,
                    startDate: new Date(),
                    zIndex: 999999,
                });
                Inputmask({alias: 'datetime', inputFormat: mask.deadline.format, placeholder: mask.deadline.format.replace(/[a-zA-Z]/g, mask.deadline.placeholder)}).mask(deadline);
            }
        }
        if ($('input[type="file"]').exists()) {
            let inputs = $('input[type="file"]');

            for (let input of inputs) {
                let preview = $(input).closest('.custom-file').siblings('.upload-preview')
                let extension = filename => {
                    let array = filename.split('.');
                    return array[array.length - 1];
                };

                $(input).on('change', function (e) {
                    if (preview.exists()) {
                        preview.html('');
                    }

                    for (let file of e.target.files) {
                        let reader = new FileReader();

                        $(this).siblings('label').text(file.name.substring(0, 25) + (file.name.length > 25 ? `... (.${ extension(file.name).toLowerCase() })` : ''))

                        reader.onload = () => {
                            if (preview.exists()) {
                                preview.prepend(`<img src="${ reader.result }" class="img-preview img-preview-md">`);
                            }
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
        }
    }
};

window.template = {
    load: (tpl) => {
        let index = $(`[data-template="${ tpl }"]`).length;
        let container = $(`[data-template-container="${ tpl }"]`);

        $.ajax({
            url: '/dashboard/templates/',
            type: 'GET',
            data: {
                template: tpl,
                index: index,
            },
        }).done(r => {
            container.append(r);
            form.init();
            Select2.init();
        });
    },
};

$(function () {
    form.init();

    if (JSON.parse(localStorage.getItem('dashboard.sidebarToggled'))) {
        let sidebarToggle = $('#sidebarToggle');

        if (sidebarToggle.exists()) {
            sidebarToggle.trigger('click');
        }
    };

    if ($('[data-ajax-form="true"]').exists() && $('#form_modal').exists()) {
        let form_modal = $('#form_modal');

        form_modal.find('#form_save').on('click', function (e) {
            form_modal.find('.modal-body form').trigger('submit');
        });

        $('[data-ajax-form="true"]').on('click', function (e) {
            e.preventDefault();

            let url = $(this).attr('href');

            $.ajax({
                url: url,
                type: 'GET',
                async: false,
            }).done(r => {
                form_modal.find('.modal-body').html(r);

                form.init();
                Select2.init();

                form_modal.modal('show');
            });
        });
    }
});