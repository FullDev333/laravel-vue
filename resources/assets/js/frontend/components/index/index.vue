<template>
    <div class="index-container">
        <div class="banner">
            <div class="block">
                <el-carousel trigger="click" height="280px">
                    <el-carousel-item v-for="item in 2" :key="item" align="center">
                        <div class="introduce">
                            <p class="large-title">从高质量的视频中学习 Laravel 和 Web 开发</p>
                            <p class="small-title">最持久的教学理念</p>
                            <p class="type-select">
                                <el-button type="success"><i class="fa fa-thumbs-up"></i>开始学习</el-button>
                                <el-button type="success"><i class="fa fa-star"></i>加入我们</el-button>
                            </p>
                        </div>
                    </el-carousel-item>
                </el-carousel>
            </div>
        </div>
        <div class="content-container">
            <div class="card">
                <el-tabs type="border-card">
                    <el-tab-pane>
                        <span slot="label"><i class="el-icon-date"></i> 我的行程</span>
                        <div class="detail-card">
                            <el-row :gutter="20">
                                <el-col :span="6" v-for="(o, index) in 10" :key="o" class="video-detail">
                                    <el-card :body-style="{ padding: '0px' }">
                                        <router-link to="/video/detail">
                                            <div class="video-thumb">
                                                <img src="/images/focus_weixin.png" class="image video-image">
                                                <div class="video-mask"><span><i class="fa fa-play"></i></span></div>
                                            </div>
                                            <div class="video-intro">
                                                <h4>laravel基础教程（<strong>53</strong>课时）</h4>
                                                <div class="bottom clearfix">
                                                    <time class="time">2017-07-21</time>
                                                    <el-button type="info" size="small" class="button">免费观看</el-button>
                                                </div>
                                            </div>
                                        </router-link>
                                    </el-card>
                                </el-col>
                            </el-row>
                        </div>
                    </el-tab-pane>
                    <el-tab-pane label="消息中心">消息中心</el-tab-pane>
                    <el-tab-pane label="角色管理">角色管理</el-tab-pane>
                    <el-tab-pane label="定时任务补偿">定时任务补偿</el-tab-pane>
                </el-tabs>
            </div>
        </div>
    </div>
</template>
<style rel="stylesheet/scss" lang="scss" scoped>
.el-row {
    margin-bottom: 20px;
    &:last-child {
        margin-bottom: 0;
    }
}

.index-container {
    .content-container {
        border: none;
    }
    .banner {
        background-color: #475669;
        color: #fff;
        font-weight: bold;
        .introduce {
            padding-top: 50px;
        }
        .large-title {
            font-size: 40px;
            margin-bottom: 30px;
        }
        .small-title {
            font-size: 20px;
            margin-bottom: 20px;
        }
        .type-select {
            button {
                margin: 10px 20px;
                padding-left: 20px;
                padding-right: 20px;
                i {
                    -webkit-transition: -webkit-transform 0.4s ease-out;
                    -moz-transition: -moz-transform 0.4s ease-out;
                    transition: transform 0.4s ease-out;
                    margin-right: 10px;
                }
            }
            button:active,
            button:focus {
                outline: none !important;
            }
            button:hover i {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
    }
    .video-detail {
        margin-bottom: 20px;
        .video-thumb {
            position: relative;
            cursor: pointer;
            .video-image {
                width: 100%;
            }
            .video-mask {
                position: absolute;
                left: 0;
                top: 0;
                background: rgba(0, 0, 0, 0.5);
                width: 100%;
                height: 100%;
                display: none;
                span {
                    width: 100%;
                    height: 100%;
                    display: table;
                    i {
                        font-size: 4rem;
                        display: table-cell;
                        vertical-align: middle;
                        text-align: center;
                        color: #eee;
                    }
                }
            }
        }
        .video-thumb:hover .video-mask {
            display: block;
        }
        .video-intro {
            padding: 14px;
            color: #777;
            h4 {
                font-weight: normal;
                padding-bottom: 3px;
                span {
                    color: #D9534F;
                    font-size: 14px;
                }
            }
            .bottom {
                button {
                    float: right;
                }
            }
        }
    }
}
</style>
<script type="text/javascript">
export default {
    data() {
        return {

        };
    }
}
</script>