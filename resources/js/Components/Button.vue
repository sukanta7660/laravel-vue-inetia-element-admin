<template>
    <el-button
        v-if="props.tag === 'button'"
        :type="props.type"
        :size="props.size"
        :plain="props.plain"
        :round="props.round"
        :circle="props.circle"
        :loading="props.loading"
        :disabled="props.disabled"
        :tag="props.tag"
        :href="props.href"
        :autofocus="props.autofocus"
        :native-type="props.nativeType"
        :block="props.block"
        @click="handleClick"
    >
        <BaseIcon
            v-if="props.icon"
            :icon="props.icon"
        />

        <span v-if="props.title">{{ props.title }}</span>

        <slot/>

    </el-button>

    <Link v-else :href="props.href">
        <el-button
            :type="props.type"
            :size="props.size"
            :plain="props.plain"
            :round="props.round"
            :circle="props.circle"
            :loading="props.loading"
            :disabled="props.disabled"
        >
            <BaseIcon
                v-if="props.icon"
                :icon="props.icon"
            />

            <span v-if="props.title">{{ props.title }}</span>

            <slot/>
        </el-button>
    </Link>
</template>

<script setup>
import BaseIcon from "@/Components/BaseIcon.vue";
import {Link} from "@inertiajs/vue3";

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
    },
    tag: {
        type: String,
        default: 'button',
    },
    href: {
        type: String,
        default: '#',
    },
    title: {
        type: String,
        default: '',
    },
});

const emit = defineEmits(['click']);

const handleClick = () => {
    emit('click');
};

</script>

<style scoped>

</style>