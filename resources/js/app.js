
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// 加载ui组件样式和注册部分全局组件
import {Loading, Message} from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
Vue.use(Loading);
Vue.use(Message);
Vue.prototype.$loading = Loading;
Vue.prototype.$message = Message;

// 引入路由
import router from './route';

// 加载配置文件
import config from './config';

// 引入首页
import App from './App.vue';

// 将辅助函数设置为全局
import mixins from './mixins'
Vue.mixin(mixins);

// 加载http全局
import * as http from './api/http';
Vue.prototype.$http = http;

// 路由前置
let loadingObj;
router.beforeEach((to, from, next) => {
    to.matched.some((record, index, arr) => {
        if (index === arr.length - 1) {
            document.title = record.meta.title ? record.meta.title : config.webTitle
        }
    })
    let $vue = new Vue();
    loadingObj = $vue.$loading.service();
    next()
});
// 路由后置
router.afterEach((to, from, next) => {
    setTimeout(function(){
        loadingObj.close();
    }, 500)
})

new Vue({
    el: '#app',
    router,
//    store,
    render: h => h(App)
});