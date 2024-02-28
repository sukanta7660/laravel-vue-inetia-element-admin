import { createStore } from 'vuex';

import getters from '@/store/getters';
import app from '@/store/modules/app';
import settings from "@/store/modules/settings";

const store = createStore({
    modules: {
        app,
        settings
    },
    getters
});

export default store;