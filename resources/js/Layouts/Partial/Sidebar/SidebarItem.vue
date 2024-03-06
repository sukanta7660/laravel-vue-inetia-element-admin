<template>
    <div v-if="item.is_active">
        <template v-if="!item.children">
            <SidebarLink :href="item.link">
                <el-menu-item
                    :class="{ 'submenu-title-noDropdown': !isNest }"
                >
                    <Item
                        icon="Edit"
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
            index="1"
            popper-append-to-body
        >
            <template #title>
                <Item
                    icon="EditPen"
                    :title="item.name"
                />
            </template>
            <SidebarItem
                v-for="child in item.children"
                :key="child.link"
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
    }
});
</script>