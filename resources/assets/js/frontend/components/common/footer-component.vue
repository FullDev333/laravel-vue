<template>
    <div class="web-footer">
        <div class="footer-container">
            <el-row :gutter="10" style="margin: 0;">
                <el-col :xs="10" :sm="10" :md="10" :lg="10">
                    <div class="describe introduction">
                        <h4 class="title">网站介绍</h4>
                        <p>我们是 PHP 和 Laravel 开发者社区，致力于为 PHP 和 Laravel 开发者提供一个分享创造、结识伙伴、协同互助的平台。</p>
                        <p class="add-friends">
                            <a class='qq' href="javascript:;"><i class="fa fa-qq"></i></a>
                            <a class='weixin' href="javascript:;"><i class="fa fa-weixin"></i></a>
                            <a class='weibo' href="javascript:;"><i class="fa fa-weibo"></i></a>
                        </p>
                    </div>
                </el-col>
                <el-col :xs="8" :sm="8" :md="8" :lg="8">
                    <div class="describe statistical">
                        <h4 class="title">网站统计</h4>
                        <div class="all-statistical">
                            <ul>
                                <li><a href="javascript:;">视频总数：<span>113</span> 个</a></li>
                                <li><a href="javascript:;">文章总数：<span>98</span> 篇</a></li>
                                <li><a href="javascript:;">访客总数：<span>31133</span> 个</a></li>
                                <li><a href="javascript:;">会员总数：<span>3098</span> 个</a></li>
                                <li><a href="javascript:;">点赞总数：<span>5013</span> 个</a></li>
                                <li><a href="javascript:;">评论总数：<span>713</span> 个</a></li>
                            </ul>
                        </div>
                    </div>
                </el-col>
                <el-col :xs="6" :sm="6" :md="6" :lg="6">
                    <div class="describe share">
                        <h4 class="title">关注微信</h4>
                        <p class="share-weixin"><img src="/images/focus_weixin.png"></p>
                    </div>
                </el-col>
            </el-row>
        </div>
    </div>
</template>
<style rel="stylesheet/scss" lang="scss" scoped>
.web-footer {
    background-color: #222;
    border-color: #090909;
    position: relative;
    border: 1px solid transparent;
    padding: 30px 0 50px 0;
    .footer-container {
        width: 1280px;
        margin: 0 auto;
        .describe {
            color: #9D9D9D;
            padding-right: 30px;
            .title {
                font-size: 17px;
                font-weight: normal;
                line-height: 17px;
                margin-bottom: 10px;
            }
            .add-friends {
                padding: 14px 0;
                a {
                    display: inline-block;
                    height: 45px;
                    width: 45px;
                    line-height: 45px;
                    border-radius: 50%;
                    text-align: center;
                    margin-right: 18px;
                    color: #FBFCFC;
                    background: #B3C3C0;
                    i {
                        font-size: 18px;
                        line-height: 45px;
                    }
                }
                a:hover {
                    color: #FFFFFF;
                }
                a.qq:hover {
                    background: #2F84BC;
                }
                a.weixin:hover {
                    background: #2CB942;
                }
                a.weibo:hover {
                    background: #D83337;
                }
            }
            .all-statistical {
                ul {

                    li {
                        float: left;
                        width: 50%;
                        line-height: 20px;
                        a {
                            font-size: 12px;
                            color: #9D9D9D;
                        }
                        a:hover {
                            text-decoration: underline;
                        }
                    }
                }
            }
            .share-weixin img {
                width: 130px;
                max-width: 130%;
            }
        }
    }
}
</style>
<script type="text/javascript">
export default {
    data() {
        return {};
    },
    mounted() {},
    methods: {

    }
}
</script>