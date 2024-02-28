import Store from '@/store';

const state = () => {
    return {
        sidebar: {
            opened: true,
            withoutAnimation: false
        }
    };
};

const mutations = {
    //
};

const actions = {
    toggleSidebar({ commit }) {
        commit('TOGGLE_SIDEBAR');
    },

    closeSidebar({ commit }) {
        commit('CLOSE_SIDEBAR');
    },

    toggleDevice({ commit }, device) {
        commit('TOGGLE_DEVICE', device)
    },
};

export default {
    namespaced: true,
    state,
    mutations,
    actions
}