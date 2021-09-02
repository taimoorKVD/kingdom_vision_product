<template>
    <div class="text-center error">
        <i class="fas fa-bomb"> </i>
        <h1 class="mt-4">We've encountered a problem</h1>
        <h3>Unfortunately, we cannot further proceed</h3>
    </div>
</template>

<script>
    export default {
        name: "FatalError.vue"
    }
</script>

<style scoped>
    .error{
        color: #999;
        font-size: 10rem;
    }
</style>
