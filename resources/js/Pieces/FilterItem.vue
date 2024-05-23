<template>
    <div>
        <table style="width: 100%">
            <tr v-for="(filterItem, filterIndex) in filterArray" :key="filterIndex">
                <td style="width: 140px;">
                    <template v-if="filterItem.item_key">
                        {{ filterOptions[filterItem.item_key].label }}
                    </template>
                    <template v-else>
                        <el-select
                            v-model="filterItem.item_key" placeholder="Select Filter Group"
                            @change="maybeChangeOperator(filterItem)"
                        >
                            <el-option
                                v-for="(filterItem, filterKey) in filterOptions"
                                :key="filterKey"
                                :label="filterItem.label"
                                :value="filterKey"
                            />
                        </el-select>
                    </template>
                </td>
                <td style="width: 140px;">
                    <template v-if="filterItem.item_key">
                        <el-select
                            v-if="getFilterOptionType(filterItem) === 'options'"
                            v-model="filterItem.item_values"
                            size="small"
                            :multiple="true"
                            placeholder="Select Options"
                        >
                            <el-option
                                v-for="(option, optionKey) in filterOptions[filterItem.item_key]?.options"
                                :key="optionKey"
                                :label="option"
                                :value="optionKey"
                            />
                        </el-select>
                        <div v-if="getFilterOptionType(filterItem) === 'text'" class="fla_inline_inputs">
                            <el-select v-model="filterItem.operator" size="small" class="fla_inline_operator">
                                <el-option
                                    v-for="(option, optionKey) in textOptions"
                                    :key="optionKey"
                                    :label="option"
                                    :value="optionKey"
                                />
                            </el-select>
                            <el-input
                                v-model="filterItem.item_values" size="small" placeholder="Search Value"
                                type="text"
                            />
                        </div>
                        <div v-if="getFilterOptionType(filterItem) === 'number'" class="fla_inline_inputs">
                            <el-select v-model="filterItem.operator" size="small" class="fla_inline_operator">
                                <el-option
                                    v-for="(option, optionKey) in numberOptions"
                                    :key="optionKey"
                                    :label="option"
                                    :value="optionKey"
                                />
                            </el-select>
                            <el-input
                                v-model="filterItem.item_values" size="small" placeholder="Search Value"
                                type="number"
                            />
                        </div>
                    </template>
                </td>
                <td style="width: 30px;padding-left: 20px;">
                    <el-button class="action_item" type="danger" size="small" @click="removeFilter(filterIndex)">
                        <el-icon class="action_item">
                            <Delete/>
                        </el-icon>
                    </el-button>
                </td>
            </tr>
        </table>

        <div class="fla_filter_items_footer">
            <el-button class="fla_add_filter_btn" size="small" @click="addNewFilter()">
                <el-icon>
                    <Plus/>
                </el-icon>
                Add
            </el-button>
            <el-button class="fla_apply_filter_btn" size="small" @click="applyFilters()">Apply</el-button>
        </div>
    </div>
</template>

<script setup>
import {isEmpty, each} from 'lodash';
import {Delete, Plus} from '@element-plus/icons-vue';
import {onMounted, ref} from "vue";

const props = defineProps({
    filters: {
        type: [Object, Array],
        default: () => ({}),
    },

    filterOptions: {
        type: [Object, Array],
        default: () => ({}),
    }
});

const emit = defineEmits(['updateFilters']);

const getFilterOptionType = (filterKey) => {
    return props.filterOptions[filterKey.item_key]?.type;
};

const filterArray = ref([]);

const textOptions = {
    includes: 'Includes',
    not_includes: 'Not Includes'
};

const numberOptions = {
    '=': 'equal',
    '!=': 'not equal',
    'gt': 'greater than',
    'lt': 'less than'
};

const mountComponent = () => {

    if (isEmpty(props.filters)) {

        filterArray.value.push({
            item_key: '',
            item_values: [],
            operator: 'IN'
        });

        return;
    }

    each(props.filters, (filter, filterKey) => {
        filterArray.value.push({
            item_key: filterKey,
            item_values: filter.value,
            operator: filter.operator
        });
    });
};

onMounted(mountComponent);

const maybeChangeOperator = (filterItem) => {

    if (props.filterOptions[filterItem.item_key]?.type === 'number') {
        filterItem.operator = '=';
        filterItem.item_values = [];
        return;
    }

    if (props.filterOptions[filterItem.item_key]?.type === 'text') {
        filterItem.operator = 'includes';
        filterItem.item_values = '';
        return;
    }

    if (props.filterOptions[filterItem.item_key]?.type === 'options') {
        filterItem.operator = 'IN';
        filterItem.item_values = '';
        return;
    }
};

const addNewFilter = () => {
    filterArray.value.push({
        item_key: '',
        item_values: [],
        operator: 'IN'
    });
};

const removeFilter = (filterIndex) => {
    filterArray.value.splice(filterIndex, 1);
};

const applyFilters = () => {
    const filters = {};

    each(filterArray.value, (filterItem) => {
        if (filterItem.item_key) {
            filters[filterItem.item_key] = {
                value: filterItem.item_values,
                operator: filterItem.operator
            };
        }
    });

    emit('updateFilters', filters);
};
</script>

<style scoped lang="scss">

</style>