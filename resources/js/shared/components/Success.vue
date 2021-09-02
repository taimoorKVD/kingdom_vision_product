<template>
    <div class="text-center success">
        <i class="bi bi-hand-thumbs-up-fill" style="font-size: 100px"> </i>
        <h1 class="mt-4">
            <slot> </slot>
        </h1>
    </div>
</template>

<script>
    export default {
        name: "Success.vue"
    }
</script>

<style scoped>

</style>
