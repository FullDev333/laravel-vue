<template>
    <div class="container">
        <Herader-component></Herader-component>
        <div class="app-main" style="clear: both;">
            <router-view></router-view>
        </div>
        <Footer-component></Footer-component>
    </div>
</template>
<style type="text/scss" scope="scope">
</style>
<script type="text/javascript">
import HeaderComponent from './header-component.vue';
import FooterComponent from './footer-component.vue';
export default {
    components: {
        'Herader-component': HeaderComponent,
        'Footer-component': FooterComponent
    },
    data() {
        return {};
    },
    mounted() {
    },
    methods: {

    }
}
</script>