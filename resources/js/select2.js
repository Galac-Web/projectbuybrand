import translation from './config';

require('select2');
$.fn.select2.defaults.set('minimumResultsForSearch', -1);
$.fn.select2.defaults.set('theme', 'bootstrap4');
$.fn.select2.defaults.set('templateSelection', (data) => {
    let text = $(data.element).attr('data-text');
    return !!text ? text : data.text;
});
$.fn.select2.defaults.set('language', {
    noResults: () => {
        return translation.select2.search;
    }
});

const Select2 = {
    init () {
        if ($('[data-select]').exists()) {
            $('[data-select]').each(function () {
                var config = {};

                if ($(this).data('search')) {
                    config.minimumResultsForSearch = 1;

                    $(this).on('select2:open', function (e) {
                        let search = document.querySelector('.select2-search__field');

                        search.setAttribute('placeholder', $(this).data('search-placeholder'));
                        search.focus();
                    });
                }

                $(this).select2(config);
            });
        }
    }
};

$(function () {
    Select2.init();
})

export default Select2;