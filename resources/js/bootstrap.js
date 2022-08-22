window._ = require('lodash');

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': app.token
        }
    });
} catch (e) {}

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

require('ion-rangeslider');
require('select2');