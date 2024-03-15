<template>
    <section
        class="p-6 min-h-[calc(100vh-7rem)]"
        :class="containerMaxW"
    >
        <slot />
    </section>
</template>

<script setup>
import { containerMaxW } from "@/utils/config.js";
</script>

<style scoped lang="scss">

</style>