import ElementPlus from 'element-plus';
import 'element-plus/dist/index.css';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

import {createApp, h} from 'vue';
import {createInertiaApp} from '@inertiajs/inertia-vue3';
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({el, App, props, plugin}) {
        createApp({render: () => h(App, props)})
            .use(plugin)
            .use(ElementPlus)
            .mount(el)
    },
});