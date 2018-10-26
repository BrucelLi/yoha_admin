// 主体
const Home = r => require.ensure([], () => r(require('../../views/home/Home.vue')), 'Main')


export default  {
    path:'',
    name:'home',
    meta:{
        'title':'首页'
    },
    component:Home,
}