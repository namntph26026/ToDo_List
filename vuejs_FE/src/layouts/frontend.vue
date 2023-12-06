<template>
    <TheHeader />
    <router-view></router-view>
    <TheFooter />
</template>

<script>
    import TheHeader from '../components/frontend/TheHeader.vue';
    import TheFooter from '../components/frontend/TheFooter.vue'
    export default {
        components: {
            TheHeader,
            TheFooter
        }
    }
</script>
