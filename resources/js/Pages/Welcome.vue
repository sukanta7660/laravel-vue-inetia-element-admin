<template>
    <Head title="Welcome" />
    <div>
        <h1>Welcome to your new app!</h1>

        <Button
            type="primary"
            @click="() => {console.log('clicked')}"
            :icon="Edit"
            disabled
        >
            Get Started
        </Button>
    </div>
</template>

<script setup>
import { Head } from "@inertiajs/vue3";
import Button from "@/Components/Button.vue";
import {Edit} from "@element-plus/icons-vue";
</script>

<style scoped lang="scss">

</style>