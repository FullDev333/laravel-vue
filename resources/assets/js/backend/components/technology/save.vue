<template>
    <div class="app-container">
         <el-form :model="form" :rules="rules" ref="form" label-width="100px">
            <el-form-item label="标题" prop="title">
                <el-input v-model="form.title" placeholder="请输入文章标题"></el-input>
            </el-form-item>
            <el-row :gutter="24">
                <el-col :span="12">
                    <el-form-item label="类别" prop="category_id">
                        <el-select v-model="form.category_id" placeholder="请选择文章类别">
                        <el-option v-for="item in options.categoryOptions" :key="item.id" :label="item.name" :value="item.id + ''"></el-option>
                        </el-select>
                    </el-form-item>
                </el-col>
                <el-col :span="12">
                    <el-form-item label="作者" prop="auther">
                        <el-input v-model="form.auther" placeholder="请输入文章作者"></el-input>
                    </el-form-item>
                </el-col>
            </el-row>
            <el-row :gutter="24">
                <el-col :span="12">
                    <el-form-item label="来源" prop="source">
                        <el-input v-model="form.source" placeholder="请输入文章来源"></el-input>
                    </el-form-item>
                </el-col>
                <el-col :span="12">
                    <el-form-item label="阅读量" prop="reading">
                        <el-input v-model.number="form.reading" placeholder="请输入文章阅读量"></el-input>
                    </el-form-item>
                </el-col>
            </el-row>
            <el-row :gutter="24">
                <el-col :span="12">
                    <el-form-item label="状态" prop="status">
                        <el-select v-model="form.status" placeholder="请选择文章状态">
                        <el-option v-for="item in options.statusOptions" :key="item.value" :label="item.text" :value="item.value"></el-option>
                        </el-select>
                    </el-form-item>
                </el-col>
            </el-row>
            <el-form-item label="内容" prop="content">
                <quillEditor v-model="form.content"></quillEditor>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="toLink('/technology/index')">返回</el-button>
                <el-button type="primary" @click="submit('form')">保存</el-button>
            </el-form-item>
            
        </el-form>
    </div>
</template>
<script type="text/javascript">
    import { quillEditor } from 'vue-quill-editor';
    import { get, save } from '../../request.js';
    export default {
        components: {
            quillEditor
        },
        data() {
            return {
                form: {
                    id: this.$route.params.id,
                    category_id: '',
                    title: '',
                    auther: '',
                    source: '',
                    reading: 0,
                    content: '',
                    status: ''
                },
                options: {
                    categoryOptions: [],
                    statusOptions: []
                },
                rules: {
                    category_id: [
                        { required: true, message: '请选择文章类别', trigger: 'blur' }
                    ],
                    title: [
                        { required: true, message: '请输入文章标题', trigger: 'blur' }
                    ],
                    auther: [
                        { required: true, message: '请输入文章作者', trigger: 'blur' }
                    ],
                    source: [
                        { required: true, message: '请输入文章来源', trigger: 'blur' }
                    ],
                    reading: [
                        { type: 'number', message: '阅读量必须为数字'}
                    ],
                    content: [
                        { required: true, message: '请输入文章内容', trigger: 'blur' }
                    ],
                    status: [
                        { required: true, message: '请选择文章状态', trigger: 'blur' }
                    ],
                }
            }
        },
        mounted() {
            this.getOriginalData();
        },
        methods: {
            getOriginalData() {
                let _this = this;
                if(_this.form.id) {
                    get('/backend/technologys/' + _this.form.id).then(data => {
                        _this.form = Vue.copyObj(data.data.data);
                        _this.form.reading = data.data.data.reading;
                        _this.options.statusOptions = data.data.statusOptions;
                        _this.options.categoryOptions = data.data.categoryOptions;
                    });
                } else {
                    get('/backend/technology/options').then(data => {
                        _this.options.statusOptions = data.data.statusOptions;
                        _this.options.categoryOptions = data.data.categoryOptions;
                    });
                }
            },
            getOptions() {
                let _this = this;
                get('/backend/technology/options').then(data => {
                    _this.options.statusOptions = data.data.statusOptions;
                    _this.options.categoryOptions = data.data.categoryOptions;
                });
            },
            submit(formName) {
                let _this = this;
                _this.$refs[formName].validate((valid) => {
                    if (valid) {
                        if (!_this.form.id) {
                            var method = 'post', url = '/backend/technologys', params = {'data': _this.form};
                        } else {
                            var method = 'put', url = '/backend/technologys/' + _this.form.id, params = {'data': _this.form};
                        }
                        save(method, url, params).then(data => {
                            _this.$store.state.submitLoading = false;
                            if(!data.status) {
                                _this.$message.error(data.message);
                                return false;
                            }
                            _this.$message.success(data.message);
                            _this.formVisible = false;
                            _this.toLink('/technology/index');
                        });
                    }
                });
            },
            toLink(url) {
                this.$router.push({ path: url });
            }
        }
    }
</script>