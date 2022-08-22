import { createApp } from 'vue';
import { config } from './config';

if (config.components.auto) {
    const files = require.context('./', true, /\.vue$/i);
    files.keys().map(key => {
        config.components.list[config.components.prefix + key.split('/').pop().split('.')[0] + config.components.postfix] = files(key).default;
        // console.info(config.components.prefix + key.split('/').pop().split('.')[0] + config.components.postfix, key);
    });

}

createApp({
    components: config.components.list
}).mount(config.element);