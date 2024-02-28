<template>
    <Head title="Welcome" />
    <LayoutAuthenticated>

    </LayoutAuthenticated>
</template>

<script setup>
import { Head } from "@inertiajs/vue3";
import Button from "@/Components/Button.vue";
import {Edit} from "@element-plus/icons-vue";
import {reactive} from "vue";
import ModalComp from "@/Components/ModalComp.vue";
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";

const state = reactive({
    showModal: false,
});
</script>

<style scoped lang="scss">

</style>