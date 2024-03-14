<template>
    <a href="#" rel="noopener" v-if="!hasLink" @click.prevent>
        <slot/>
    </a>

    <a v-else-if="isExternalLink" :href="href" target="_blank" rel="noopener">
        <slot/>
    </a>

    <Link v-else :href="href" :class="classes">
        <slot/>
    </Link>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";
import {computed} from "vue";
import {isExternal} from "@/utils/validate";

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
        default: false,
    }
});

const classes = computed(() => props.active ? 'active' : '');

const isExternalLink = computed(() => isExternal(props.href));

const hasLink = computed(() => {

    if (props.href === '') {
        return false;
    }

    if (props.href === '<nolink>') {
        return false;
    }

    return true;
});
</script>