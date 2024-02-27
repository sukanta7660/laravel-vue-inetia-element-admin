<template>
    <el-button
        :type="props.type"
        :size="props.size"
        :plain="props.plain"
        :round="props.round"
        :circle="props.circle"
        :loading="props.loading"
        :disabled="props.disabled"
        :icon="props.icon"
        :autofocus="props.autofocus"
        :native-type="props.nativeType"
        :block="props.block"
        @click="handleClick"
    >

        <slot/>

    </el-button>
</template>

<script setup>
const props = defineProps({
    type: {
        type: String,
        default: 'default',
    },
    size: {
        type: String,
        default: 'default',
    },
    plain: {
        type: Boolean,
        default: false,
    },
    round: {
        type: Boolean,
        default: false,
    },
    circle: {
        type: Boolean,
        default: false,
    },
    loading: {
        type: Boolean,
        default: false,
    },
    disabled: {
        type: Boolean,
        default: false,
    },
    icon: {
        type: [String, Object],
        default: () => null,
    },
    autofocus: {
        type: Boolean,
        default: false,
    },
    nativeType: {
        type: String,
        default: 'button',
    },
    block: {
        type: Boolean,
        default: false,
    }
});

const emit = defineEmits(['click']);

const handleClick = () => {
    emit('click');
};

</script>

<style scoped>

</style>