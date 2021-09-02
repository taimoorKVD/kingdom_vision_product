<template>
    <div>
        <!-- Nav Bar -->
        <nav-bar> </nav-bar>

        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Store</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Explore the way you like</p>
                </div>
            </div>
        </header>

        <div class="text-center mt-4">
            <h1 class="text-secondary">Our Products</h1>
        </div>

        <!-- Section-->
        <product> </product>

        <!-- Footer-->
        <app-footer> </app-footer>
    </div>
</template>

<script>
    export default {
        name: "Home.vue",
    };
</script>
