<template>
    <el-card class="card-box mt-5">

        <template #header>
            <div class="card-header">
                <div class="card-title">
                    <h2>{{ props.title }}</h2>
                </div>
                <div class="card-tools">
                    <slot name="header-tools"/>
                </div>
            </div>
        </template>

        <div class="card-content">
            <slot/>
        </div>

        <template #footer>
            <slot name="footer"/>
        </template>

    </el-card>
</template>

<script setup>
import {computed, ref} from "vue";

const props = defineProps({
    title: {
        type: String,
        required: true
    },
    hasTable: Boolean
});

const cardBoxPadding = computed(() => {
    return props.hasTable ? '0' : '20px';
});

const style = getComputedStyle(document.body);
document.documentElement.style.setProperty('--card-box-padding', cardBoxPadding.value);
</script>

<style lang="scss">
:root {
    --card-box-padding: 0;
}

$cardBoxPadding: var(--card-box-padding);

.el-card {
    &.card-box {
        .el-card__header {
            background: #f6f7fa;

            .card-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .card-title {
                margin: 0;

                h2 {
                    font-size: 1.3rem !important;
                    font-weight: 700;
                }
            }

            .card-tools {
                display: flex;
                gap: 10px;
            }
        }

        .el-card__body {
            padding: $cardBoxPadding;
        }
    }
}
</style>