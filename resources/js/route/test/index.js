// 测试
const test= r => require.ensure([], () => r(require('../../views/test/Test.vue')), 'test')

export default {
    path:'test',
    name:'test',
    meta:{
        'title':'首页'
    },
    component:test,
}