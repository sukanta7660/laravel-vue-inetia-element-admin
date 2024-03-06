<template>
<!--    <component :is="type" v-bind="linkProps(href)">-->
<!--        <slot />-->
<!--    </component>-->
    <Link v-if="!isExternalLink" :href="href" :class="classes">
        <slot />
    </Link>
    <a v-else :href="href" target="_blank" rel="noopener" v-if="isExternal(href)">
        <slot />
    </a>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";
import {computed} from "vue";
import { isExternal } from "@/utils/validate";

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
//
// const type = computed(() => {
//     if (isExternalLink.value) {
//         return 'a';
//     }
//     return 'Link';
// });
//
// const linkProps = (href) => {
//     console.log('isExternalLink.value', isExternalLink.value);
//     if (isExternalLink.value) {
//         return {
//             href: href,
//             target: '_blank',
//             rel: 'noopener',
//         };
//     }
//     return {
//         href: href,
//     };
// };
</script>