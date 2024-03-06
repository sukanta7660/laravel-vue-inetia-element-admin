<template>
    <template v-if="icon">
        <el-icon class="sub-el-icon">
            <HomeFilled />
        </el-icon>
<!--        <svg-icon v-else :icon-class="icon"></svg-icon>-->
    </template>
    <span v-if="title">{{ title }}</span>
</template>

<script setup>
import {HomeFilled} from "@element-plus/icons-vue";

defineProps({
    icon: {
        type: String,
        default: '',
    },
    title: {
        type: String,
        default: '',
    },
})
</script>
