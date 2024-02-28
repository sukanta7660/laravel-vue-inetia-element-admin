<template>
    <div :class="{ 'has-logo': showLogo }">
        <Logo v-if="showLogo" :collapse="isCollapse" />
        <el-scrollbar wrap-class="scrollbar-wrapper">
            <el-menu
                :default-active="activeMenu"
                :collapse="isCollapse"
                background-color="#304156"
                text-color="#bfcbd9"
                :unique-opened="false"
                active-text-color="#409EFF"
                :collapse-transition="false"
                mode="vertical"
            >
                <SidebarItem
                    v-for="item in sidebarItems"
                    :key="item.path"
                    :item="item"
                    :base-path="item.path"
                />
            </el-menu>
        </el-scrollbar>
    </div>
</template>

<script setup>
import { useStore } from "vuex";
import Logo from "./SidebarLogo.vue";
import SidebarItem from "./SidebarItem.vue";
import { computed } from "vue";
// import { useRoute, useRouter } from 'vue-router'
// import variablesV from "@/assets/scss/variable.scss";

const store = useStore();
// const router = useRouter()
// const route = useRoute()

const sidebarItems = [];

const sidebar = computed(() => store.getters.sidebar)
// const routes = computed(() => router.options.routes)

const activeMenu = computed(() => {
    // const { meta, path } = route
    // if set path, the sidebar will highlight the path you set
    // if (meta.activeMenu) {
    //     return meta.activeMenu
    // }
    // return path

    return '';
})
const showLogo = computed(() => store.state.settings.sidebarLogo)
const isCollapse = computed(() => !sidebar.value.opened)
// const variables = computed(() => variablesV)
</script>
