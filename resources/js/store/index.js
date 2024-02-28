import { createStore } from 'vuex';

import getters from './getters';
import app from './modules/app.js';

const store = createStore({
    modules: {
        app,
    },
    getters
});

export default store;