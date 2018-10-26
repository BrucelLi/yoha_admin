<template>
    <div>
        <div class="test">这是公共头</div>
        <div v-on:click="getTest('test.send')" style="width: 100%; background-color: red">点击</div>
        <div>{{info}}</div>
    </div>
</template>

<script>
    export default {
        name: "HeadNavComponent",
        data () {
            return {
                info:'李小龙'
            }
        },
        methods:{
            getTest(msg) {
                console.info(this.info);
                this.$http.get(msg).then(r => this.info = r.data.name);
                console.info(this.info);
                console.info('777');
            }
        }
    }
</script>

<style scoped lang="stylus">
    @import "../assets/css/common.styl"
</style>