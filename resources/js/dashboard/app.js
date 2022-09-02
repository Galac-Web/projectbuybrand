import { config as vue } from '../vue/config';

require('./bootstrap');
require('../functions');
require('./sb-admin-2');
require('./sb-admin-2.sidebar');
require('./ckeditor4');
require('./jquery');

if (vue.using) {
    require('../vue/bootstrap');
}