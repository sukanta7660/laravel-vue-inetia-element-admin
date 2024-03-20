<template>
    <Head title="Dashboard" />
    <LayoutAuthenticated>
        <SectionMain>
            <h1 class="text-3xl font-semibold text-gray-800 leading-tight">Admin Dashboard</h1>
            <p class="mt-4 text-gray-600">You're logged in!</p>
        </SectionMain>
    </LayoutAuthenticated>
</template>
<script setup>
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";
import {Head} from "@inertiajs/vue3";
import SectionMain from "@/Components/SectionMain.vue";
</script>