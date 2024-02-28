<template>
    <el-breadcrumb class="app-breadcrumb" separator="/">
        <transition-group name="breadcrumb">
            <el-breadcrumb-item>Home</el-breadcrumb-item>
            <el-breadcrumb-item>Dashboard</el-breadcrumb-item>
        </transition-group>
    </el-breadcrumb>
</template>

<script setup>

</script>

<style lang="scss" scoped>
.app-breadcrumb.el-breadcrumb {
    display: inline-block;
    font-size: 14px;
    line-height: 50px;
    margin-left: 8px;

    .no-redirect {
        color: #97a8be;
        cursor: text;
    }
}
</style>
