<template>
    <el-table
        :data="props.data"
        style="width: 100%"
    >
        <el-table-column
            v-for="column in props.columns"
            :key="column.prop"
            :prop="column.prop"
            :label="column.label"
            :width="column.width"
            :fixed="column.fixed"
            :formatter="column.formatter"
        />

        <slot name="actions" slot-scope="{ row }">
            <el-table-column
                label="Actions"
                width="180"
                fixed
            >
                <Button
                    icon="Edit"
                    size="small"
                    @click="handleClick(row)"
                />
            </el-table-column>
        </slot>
    </el-table>
</template>

<script setup>
import Button from "@/Components/Button.vue";

const props = defineProps({
    data: {
        type: Array,
        required: true
    },
    columns: {
        type: Array,
        required: true
    },
});

const handleClick = (row) => {
    console.log(row);
};
</script>

<style scoped lang="scss">

</style>