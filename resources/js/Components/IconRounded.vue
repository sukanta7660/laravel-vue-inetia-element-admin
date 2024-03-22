<template>
    <BaseIcon
        :icon="icon"
        size="24"
        :w="w"
        :h="h"
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
    w: {
        type: String,
        default: 'w-12'
    },
    h: {
        type: String,
        default: 'h-12'
    },
    bg: Boolean
});
</script>

<style scoped lang="scss">

</style>