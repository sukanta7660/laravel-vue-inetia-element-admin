<template>
    <div class="search-box">
        <el-input
            type="text"
            v-model="state.inputData"
            :placeholder="props.placeholder"
            :size="props.size"
            :prefix-icon="Search"
        />
    </div>
</template>

<script setup>
import {reactive, watch} from "vue";
import {Search} from "@element-plus/icons";

const props = defineProps({
    modelValue: {
        required: false
    },
    placeholder: {
        type: String,
        default: 'Type to search'
    },
    size: {
        type: String,
        default: 'default'
    }
});

const emit = defineEmits(['update:modelValue']);

const state = reactive({
    inputData: props.modelValue
});

watch(() => state.inputData, (nv) => {
    emit('update:modelValue', nv)
})
</script>

<style scoped lang="scss">
.search-box {
    padding: 20px
}
</style>