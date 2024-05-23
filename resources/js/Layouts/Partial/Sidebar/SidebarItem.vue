<template>
    <div v-if="item.is_active">
        <template v-if="!item.children">
            <SidebarLink :href="item?.link">
                <el-menu-item
                    :class="{ 'submenu-title-noDropdown': !isNest }"
                    :index="menuKey"
                >
                    <Item
                        :icon="item.icon"
                    />
                    <template #title>
                        {{ item.name }}
                    </template>
                </el-menu-item>
            </SidebarLink>
        </template>

        <el-sub-menu
            v-else
            ref="subMenu"
            :index="menuKey"
            popper-append-to-body
        >
            <template #title>
                <Item
                    :icon="item.icon"
                    :title="item.name"
                />
            </template>
            <SidebarItem
                v-for="(child, key) in item.children"
                :is-nest="true"
                :item="child"
                class="nest-menu"
            />
        </el-sub-menu>
    </div>
</template>

<script setup>
import SidebarLink from "@/Layouts/Partial/Sidebar/SidebarLink.vue";
import Item from "@/Layouts/Partial/Sidebar/BaseItem.vue";

const props = defineProps({
    item: {
        type: Object,
        required: true,
    },
    isNest: {
        type: Boolean,
        default: false,
    },
    menuKey: {
        type: String,
        default: 0,
    },
});
</script>