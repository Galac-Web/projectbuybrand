import { config as vue } from './vue/config';

require('./main/plugins/d3.v2');
require('./main/graph');
require('./main/main');

require('./bootstrap');
require('./functions');
// require('./jquery');
// require('./crop');

if (vue.using) {
    require('./vue/bootstrap');
}

if (process.env.NODE_ENV === 'production') {
    require('./copyright');
}