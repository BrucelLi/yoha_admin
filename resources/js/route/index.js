import Vue from 'vue';
import Router from 'vue-router';
import config from '../config';

// 路由前缀
const routePrefix = config.routePrefix;

//==================
//  路由分组
//==================
// 容器
const Container = r => require.ensure([], () => r(require('../views/Container.vue')), 'Container');

// 登录
const Login = r => require.ensure([], () => r(require('../views/login/Login')), 'Login');

// 首页相关路由
import home from './home';
// 测试路由
import test from './test';

Vue.use(Router);

let routesArr = [
    {
        path: '',
        redirect: routePrefix,
    },
    {
        path: routePrefix,
        name: 'main',
        meta: {
            title: 'yoha管理后台'
        },
        component: Container,
        children: [
            {
                path: 'login',
                name: 'login',
                meta: {
                    title: 'yoha管理后台'
                },
                component:Login
            },
            home,
            test
        ],
    }
];


export default new Router({
    mode: 'history',
    routes: routesArr
});
