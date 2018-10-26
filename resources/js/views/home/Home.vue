<template>
    <div>
        <head-nav></head-nav>
        <router-link :to="{ name: 'home', params: { userId: 123 }}">Home</router-link>
        <router-link :to="{ name: 'test', params: { userId: 123 }}">test</router-link>
        <router-link :to="{ name: 'login', params: { userId: 123 }}">login</router-link>
        <router-view></router-view>
        <foot-nav></foot-nav>
    </div>
</template>

<script>
    import HeadNav from '../../components/HeadNavComponent';
    import FootNav from '../../components/FootNavComponent';

    export default {
        name: "Home",
        components: {
            HeadNav,
            FootNav
        },
    }
</script>

<style scoped>

</style>