<template>
    <BaseIcon
        :icon="icon"
        :size="size"
        class="rounded-full"
        :class="bg ? colorsBgLight[type] : [colorsText[type], 'bg-gray-50 dark:bg-slate-800']"
    />
</template>

<script setup>
import {colorsText, colorsBgLight} from "@/utils/colors.js";
import BaseIcon from "@/Components/BaseIcon.vue";

const props = defineProps({
    icon: {
        type: String,
        required: true
    },
    type: {
        type: String,
        default: null
    },
    size: {
        type: [String, Number],
        default: 24
    },
    bg: Boolean
});
</script>

<style scoped lang="scss">

</style>