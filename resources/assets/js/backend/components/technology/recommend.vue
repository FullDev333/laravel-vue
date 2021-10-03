<template>
    <div class="app-container">
      <tableHeader v-on:create="create" v-on:getList="getList">
        <el-input v-model="searchForm.title" placeholder="请输入文章标题" style="width: 200px;"></el-input>
        <el-input v-model="searchForm.auther" placeholder="请输入作者" style="width: 200px;"></el-input>
        <el-select v-model="searchForm.category_id" placeholder="请选择文章类别">
          <el-option label="全部" value=""></el-option>
          <el-option v-for="item in options.categoryOptions" :key="item.id" :label="item.name" :value="item.id"></el-option>
        </el-select>
      </tableHeader>
      <el-table :data="tableData" border style="width: 100%">
        <el-table-column prop="title" label="标题"></el-table-column>
        <el-table-column prop="category_id" label="类别" :formatter="formatCategory"></el-table-column>
        <el-table-column prop="auther" label="作者"></el-table-column>
        <el-table-column prop="reading" label="阅读量"></el-table-column>
        <el-table-column prop="created_at" label="发表时间"></el-table-column>
        <el-table-column prop="status" label="状态" :formatter="formatStatus"></el-table-column>
        <el-table-column  align="center" label="操作" width="250">
            <template scope="scope">
              <el-button size="small" type="info" @click="toLink('/technology/save/' + scope.row.id)">查看详情</el-button>
              <el-button size="small" type="success" @click="toLink('/technology/save/' + scope.row.id)">编辑</el-button>
              <el-button size="small" type="danger" @click="trashed(scope.row.id)">删除</el-button>
            </template>
        </el-table-column>
      </el-table>
      <pagination ref="pagination" v-on:getList="getList"></pagination>
    </div>
</template>
<script>
  import Pagination from '../common/pagination';
  import TableHeader from '../common/tableHeader';
  import DialogFooter from '../common/dialogFooter';
  import {get, trashed, save, fetch} from '../../request.js';
  export default {
    components: {
      'pagination': Pagination,
      'tableHeader': TableHeader,
      'dialogFooter': DialogFooter,
    },
    data() {
      return {
        formTitle: '',
        tableData: [],
        searchForm: {
          title: '',
          auther: '',
          category_id: '',
          status: 2,
        },
        options: {
          statusOptions: [],
          categoryOptions: []
        }
      }
    },
    mounted() {
      this.getList();
    },
    methods: {
      getList() {
        let _this = this;
        let params = {'data': {'searchForm': _this.searchForm}};
        get('/backend/technologys?page=' + _this.$refs.pagination.pageData.current_page, params).then(data => {
          _this.tableData = data.data.lists.data;
          _this.options.statusOptions = data.data.statusOptions;
          _this.options.categoryOptions = data.data.categoryOptions;
          _this.$refs.pagination.pageData.per_page = parseInt(data.data.lists.per_page);
          _this.$refs.pagination.pageData.current_page = parseInt(data.data.lists.current_page);
          _this.$refs.pagination.pageData.total = parseInt(data.data.lists.total);
        })
      },
      trashed(id) {
        let _this = this;
        _this.$confirm('确定删除这篇文章吗').then(() => {
          trashed('/backend/technologys/' + id).then(data => {
              _this.$message.success(data.message);
              Vue.removeOneData(_this.tableData, id);
          });
        });
      },
      formatStatus(row) {
        let text = '-';
        this.options.statusOptions.forEach(function(item) {
          if(row.status == item.value) {
            return text = item.text;
          }
        });
        return text;
      },
      formatCategory(row) {
        let text = '-';
        this.options.categoryOptions.forEach(function(item) {
          if(row.category_id == item.id) {
            return text = item.name;
          }
        });
        return text;
      },
      create() {
        this.toLink('/article/save');
      },
      toLink(url) {
        this.$router.push({ path: url });
      }
    }
  }
</script>