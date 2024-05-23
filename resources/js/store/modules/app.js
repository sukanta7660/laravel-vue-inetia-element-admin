import Store from '@/store';

const state = () => {
    return {
        sidebar: {
            opened: true,
            withoutAnimation: false
        },
        device: 'desktop'
    };
};

const mutations = {
    TOGGLE_SIDEBAR: (state) => {
        state.sidebar.opened = !state.sidebar.opened
        state.sidebar.withoutAnimation = false
        // if (state.sidebar.opened) {
        //     Store.set('sidebarStatus', 1)
        // } else {
        //     Store.set('sidebarStatus', 0)
        // }
    },
    CLOSE_SIDEBAR: (state, withoutAnimation) => {
        // Store.set('sidebarStatus', 0)
        state.sidebar.opened = false
        state.sidebar.withoutAnimation = withoutAnimation
    },
    TOGGLE_DEVICE: (state, device) => {
        state.device = device
    },
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