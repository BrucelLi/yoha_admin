<template>
    <div style="width: 100%; height: 900px;">
        <div>
            test---登录
        </div>
        <div class="web_bg" :style="note">
            登录
        </div>
    </div>
</template>

<script>
    export default {
        name: "Login",
        data() {
            return {
                note: {
                    backgroundImage: "url(" + require("../../../../public/img/timg.jpg") + ")",
                },
            }
        },
    }
</script>

<style scoped lang="stylus">
</style>