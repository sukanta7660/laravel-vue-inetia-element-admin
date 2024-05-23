<template>
    <div :class="{ 'has-logo': showLogo }">
        <Logo v-if="showLogo" :collapse="isCollapse" />
        <el-scrollbar wrap-class="scrollbar-wrapper">
            <el-menu
                :default-active="url"
                :collapse="isCollapse"
                background-color="#304156"
                text-color="#bfcbd9"
                :unique-opened="true"
                active-text-color="#409EFF"
                :collapse-transition="false"
                mode="vertical"
            >
                <SidebarItem
                    v-for="(item, key) in menu"
                    :menu-key="key"
                    :item="item"
                />
            </el-menu>
        </el-scrollbar>
    </div>
</template>

<script setup>
import { useStore } from "vuex";
import Logo from "./SidebarLogo.vue";
import SidebarItem from "./SidebarItem.vue";
import {computed, reactive} from "vue";
import {usePage} from "@inertiajs/vue3";

const store = useStore();

const sidebarItems = [];

const sidebar = computed(() => store.getters.sidebar)

const {url} = usePage();

let menu = reactive({});
menu = computed(() => usePage().props.navigation.menu)

const activeMenu = computed(() => {
    return '';
})
const showLogo = computed(() => store.state.settings.sidebarLogo)
const isCollapse = computed(() => !sidebar.value.opened)
</script>
