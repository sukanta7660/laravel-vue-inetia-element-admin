<template>
    <el-dialog
        :title="props.title"
        v-model="props.visible"
        :width="props.width"
        :top="props.top"
        :modal="props.modal"
        :lock-scroll="props.lockScroll"
        :custom-class="props.customClass"
        :close-on-click-modal="props.closeOnClickModal"
        :close-on-press-escape="props.closeOnPressEscape"
        :show-close="props.showClose"
        @update:visible="updateVisible"
    >
        <slot name="header" />
        <slot />
        <slot name="footer" />
    </el-dialog>
</template>

<script setup>
import { defineProps, ref } from 'vue';

const props = defineProps({
    title: {
        type: String,
        default: '',
    },
    visible: {
        type: Boolean,
        default: false,
    },
    width: {
        type: String,
        default: '50%',
    },
    top: {
        type: String,
        default: '15vh',
    },
    modal: {
        type: Boolean,
        default: true,
    },
    lockScroll: {
        type: Boolean,
        default: true,
    },
    customClass: {
        type: String,
        default: '',
    },
    closeOnClickModal: {
        type: Boolean,
        default: true,
    },
    closeOnPressEscape: {
        type: Boolean,
        default: true,
    },
    showClose: {
        type: Boolean,
        default: true,
    },
});

const updateVisible = (val) => {
    emit('update:visible', val);
};

const emit = defineEmits(['update:visible']);

</script>

<style scoped lang="scss">
</style>
