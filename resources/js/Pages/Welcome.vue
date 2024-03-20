<template>
    <Head title="Welcome" />
    <LayoutAuthenticated>
        <SectionMain>
            <h1 class="text-3xl font-semibold text-gray-800 leading-tight">Dashboard</h1>
            <p class="mt-4 text-gray-600">You're logged in!</p>
        </SectionMain>
    </LayoutAuthenticated>
</template>

<script setup>
import { Head } from "@inertiajs/vue3";
import Button from "@/Components/Button.vue";
import { Edit } from "@element-plus/icons-vue";
import {reactive} from "vue";
import ModalComp from "@/Components/ModalComp.vue";
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";
import SectionMain from "@/Components/SectionMain.vue";
import SectionTitle from "@/Components/SectionTitle.vue";

const state = reactive({
    showModal: false,
});
</script>

<style scoped lang="scss">

</style>