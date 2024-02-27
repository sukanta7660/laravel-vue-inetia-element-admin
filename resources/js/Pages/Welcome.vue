<script setup>
import { useForm, Head } from '@inertiajs/inertia-vue3';

const form = useForm({
    name: 'sukanta',
    email: 'spurkayastha83@gmail.com',
    password: '123456',
    password_confirmation: '123456',
});
const clickHandler = async () => {
    form.post(route('demo.store'));
}
</script>

<template>
    <Head title="Welcome" />
    <div class="test-class">
        <h1>
            Welcome to your new Inertia app! With Vue 3 and Vite ⚡️and laravel 10.
        </h1>
        <el-button type="primary" @click="clickHandler">Primary</el-button>
    </div>
</template>

<style lang="scss">
.test-class {
    h1 {
        color: red;
        text-align: center;
    }
}
</style>