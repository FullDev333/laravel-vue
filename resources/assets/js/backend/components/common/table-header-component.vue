<template>
    <el-row class="filter-container">
        <slot></slot>
        <slot name="search">
            <el-button type="primary" icon="search" @click="getList">搜索</el-button>
        </slot>
        <slot name="create">
            <el-button type="primary" icon="plus" @click="create">添加</el-button>
        </slot>
    </el-row>
</template>
<script>
    export default {
        methods: {
            create(val) {
                this.$emit('create');
            },
            getList(val) {
                this.$emit('getList');
            },
        }
    }
</script>