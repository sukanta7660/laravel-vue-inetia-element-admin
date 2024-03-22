<template>
    <section
        class="flex items-center justify-between"
        :class="{'mb-4': !main}"
    >
        <div class="flex items-center justify-start">
            <IconRounded
                v-if="main && icon"
                :icon="icon"
                type="light"
                class="mr-3"
                bg
            />
            <BaseIcon
                v-else-if="icon"
                :icon="icon"
                class="mr-2"
                size="20"
            />
            <h1
                :class="main ? 'text-3xl' : 'text-2xl'"
                class="leading-tight font-bold"
            >
                {{ title }}
            </h1>
        </div>

        <slot v-if="hasSlot" />
    </section>
</template>

<script setup>
import {computed, defineProps, useSlots} from 'vue';
import BaseIcon from "@/Components/BaseIcon.vue";
import IconRounded from "@/Components/IconRounded.vue";

const props = defineProps({
    title: {
        type: String,
        required: true,
    },
    icon: {
        type: String,
        default: null,
    },
    main: Boolean
});

const hasSlot = computed(() => useSlots().default);

</script>

<style scoped lang="scss">

</style>