<template>
    <template v-if="icon">
        <SvgIcon
            v-if="props.icon.startsWith('mdi')"
            type="mdi" :path="menuIcon"
            class="sub-el-icon"
            :size="20"
        />
        <el-icon v-else class="sub-el-icon">
            <component :is="menuIcon" />
        </el-icon>
    </template>
    <span v-if="title">{{ title }}</span>
</template>

<script setup>
import * as elIcons from "@element-plus/icons-vue";
import SvgIcon from '@jamescoyle/vue-icon'
import * as mdiIcons from "@mdi/js";
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

    if (props.icon.startsWith('mdi')) {
        return mdiIcons[props.icon];
    }

    return elIcons[props.icon];
});
</script>
