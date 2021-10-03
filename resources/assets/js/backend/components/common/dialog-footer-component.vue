<template>
    <div class="dialog-footer" style="text-align: right;">
        <el-button type="primary" :loading="this.$store.state.submitLoading" @click="submit">确 定</el-button>
        <el-button @click="close">取 消</el-button>
    </div>
</template>
<script>
    export default {
        methods: {
            submit(formName) {
                this.$emit('submit', formName);
            },
            close() {
                this.$emit('close');
            },
        }
    }
</script>