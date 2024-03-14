<template>
    <template v-if="icon">
        <el-icon class="sub-el-icon">
            <component :is="menuIcon" />
        </el-icon>
<!--        <svg-icon v-else :icon-class="icon"></svg-icon>-->
    </template>
    <span v-if="title">{{ title }}</span>
</template>

<script setup>
import * as icons from "@element-plus/icons-vue";
import {computed} from "vue";

const props = defineProps({
    icon: {
        type: String,
        default: '',
    },
    title: {
        type: String,
        default: '',
    },
});

const menuIcon = computed(() => {
    if (!props.icon) {
        return null;
    }

    return icons[props.icon];
});
</script>
