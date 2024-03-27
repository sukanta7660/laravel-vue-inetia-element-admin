<template>
    <div class="data-filters-main">
        <el-button-group>
            <el-popover
                placement="top-start"
                title="Title"
                :width="200"
                trigger="hover"
                content="this is content, this is content, this is content"
            >
                <template #reference>
                    <el-button>
                        <el-badge :hidden="false" class="topedAbs"/>
                        <el-icon style="margin-right: 5px;">
                            <Filter/>
                        </el-icon>
                        Filters
                        <el-icon class="el-icon--right">
                            <ArrowDown/>
                        </el-icon>
                    </el-button>
                </template>
            </el-popover>
            <el-popover
                placement="top-start"
                title="Title"
                :width="200"
                trigger="click"
                content="this is content, this is content, this is content"
            >
                <template #reference>
                    <el-button>
                        <el-badge :hidden="false" class="topedAbs"/>
                        <el-icon style="margin-right: 5px;">
                            <Filter/>
                        </el-icon>
                        Filters
                        <el-icon class="el-icon--right">
                            <ArrowDown/>
                        </el-icon>
                    </el-button>
                </template>
            </el-popover>
            <el-popover
                placement="bottom-start"
                title="Title"
                :width="200"
                trigger="focus"
                content="this is content, this is content, this is content"
            >
                <template #reference>
                    <el-button>
                        <el-badge :hidden="false" class="topedAbs"/>
                        <el-icon style="margin-right: 5px;">
                            <Filter/>
                        </el-icon>
                        Filters
                        <el-icon class="el-icon--right">
                            <ArrowDown/>
                        </el-icon>
                    </el-button>
                </template>
            </el-popover>
        </el-button-group>
    </div>
</template>

<script setup>
import {reactive} from "vue";
import FilterItem from "@/Pieces/FilterItem.vue";
import {Filter, ArrowDown} from "@element-plus/icons-vue";

const props = defineProps(['filters', 'filterOptions', 'columns', 'sorting']);

const state = reactive({
    columns: props.columns,
});
</script>

<style scoped lang="scss">
.data-filters-main {
    flex: none;
}
</style>