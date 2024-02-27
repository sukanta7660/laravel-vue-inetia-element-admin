<template>
    <Head title="Welcome" />
    <div>
        <h1>Welcome to your new app!</h1>

        <Button
            type="primary"
            @click="() => {state.showModal = !state.showModal;}"
            :icon="Edit"
        >
            Get Started
        </Button>
    </div>

    <ModalComp
        v-model:visible="state.showModal"
        title="Welcome to your new app!"
        width="500"
        top="100"
        :modal="true"
        :lock-scroll="false"
        :custom-class="'modal-class'"
        :close-on-click-modal="false"
        :close-on-press-escape="false"
        :show-close="false"
    >
        <p>
            This is a modal component.
        </p>
    </ModalComp>
</template>

<script setup>
import { Head } from "@inertiajs/vue3";
import Button from "@/Components/Button.vue";
import {Edit} from "@element-plus/icons-vue";
import {reactive} from "vue";
import ModalComp from "@/Components/ModalComp.vue";

const state = reactive({
    showModal: false,
});
</script>

<style scoped lang="scss">

</style>