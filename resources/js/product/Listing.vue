<template>
    <div class="card h-100">
        <!-- product image-->
        <img class="card-img-top" src="http://lorempixel.com/400/200/sports" alt="..."/>
        <!-- product details-->
        <div class="card-body p-4">
            <div class="text-center">
                <!-- product name-->
                <h5 class="fw-bolder">{{ name }}</h5>
                <!-- product price-->
                ${{ price }}
            </div>
        </div>
        <!-- product actions-->
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center">
                <router-link :to="{ name: 'ProductShow', params: { id } }" class="btn btn-outline-dark mt-auto">
                    View
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Listing.vue",
        props: {
            'name':String,
            'price': Number,
            'id': Number
        },
        mounted() {

        },
    }
</script>

<style scoped>

</style>
