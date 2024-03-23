<template>
    <SvgIcon
        v-if="props.icon.startsWith('mdi')"
        type="mdi"
        :path="sectionIcon"
        class="sub-el-icon"
        viewbox="0 0 24 24"
        :size="size"
    />
    <el-icon
        v-else
        :color="color"
        :size="size"
    >
        <component :is="sectionIcon" />
    </el-icon>
</template>

<script setup>
import SvgIcon from "@jamescoyle/vue-icon";
import * as elIcons from "@element-plus/icons-vue";
import * as mdiIcons from "@mdi/js";
import {computed} from "vue";

const props = defineProps({
    icon: {
        type: [String, Object],
        required: true
    },
    w: {
        type: String,
        default: 'w-6'
    },
    h: {
        type: String,
        default: 'h-6'
    },
    size: {
        type: [String, Number],
        default: 16
    },
    color: {
        type: String,
        default: '#111'
    }
});

const sectionIcon = computed(() => {
    if (!props.icon) {
        return null;
    }

    if (props.icon.startsWith('mdi')) {
        return mdiIcons[props.icon];
    }

    return elIcons[props.icon];
});

</script>

<style scoped lang="scss">

</style>