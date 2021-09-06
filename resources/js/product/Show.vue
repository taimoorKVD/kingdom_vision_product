<template>
    <div>
        <nav-bar> </nav-bar>

        <!-- Header-->
        <header class="bg-light">
                <img class="card-img-top" src="http://lorempixel.com/400/200/sports" alt="..."/>
        </header>

        <div v-if="loading">
            <p class="text-success text-center">Please wait, data is loading...</p>
        </div>
        <div v-else>
            <div class="container mt-4 mb-3">
                    <!-- product details-->
                        <div class="text-center">
                            <!-- product name-->
                            <h5 class="fw-bolder">{{ product.name }}</h5>
                            <!-- product price-->
                            ${{ product.price }}
                        </div>
                    <!-- product actions-->
                        <div class="text-center mt-2">
                            <div v-if="alreadyInBasket">
                                <router-link :to="{ name: 'Home' }" class="btn btn-outline-dark mt-auto">
                                    Back
                                </router-link>
                                <transition>
                                    <button class="btn btn-outline-dark" @click="removeFromBasket">Remove</button>
                                </transition>
                                <!--<div class="mt-4 text-muted warning">Seems like you've already added this object to the basket. </div>-->
                            </div>
                            <div v-else>
                                <router-link :to="{ name: 'Home' }" class="btn btn-outline-dark mt-auto">
                                    Back
                                </router-link>
                                <button class="btn btn-outline-dark mt-auto" @click="addToBasket()" :disabled="alreadyInBasket">
                                    Add
                                </button>
                            </div>
                        </div>
            </div>
        </div>
        <app-footer> </app-footer>
    </div>
</template>

<script>
    import {mapGetters, mapState} from "vuex";
    import {isLoggedIn} from "../shared/utilities/auth";

    export default {
        name: "Show.vue",

        data() {
            return {
                product: null,
                loading:false,
            }
        },
        created() {
            this.loading = true;
            axios.get(`/kingdom_vision/api/products/${this.$route.params.id}`)
                .then(
                    response => {
                        this.product = response.data;
                        this.loading = false;
                    }
                );
        },
        computed: {
            alreadyInBasket() {
                if (null === this.product) {
                    return false;
                }
                return this.$store.getters.alreadyInBasket(this.product.id)
            },
        },
        methods: {
            async addToBasket() {
                await this.$store.dispatch('addToBasket', this.product);

                if(isLoggedIn()) {
                    await axios.post('/kingdom_vision/api/cart',{
                        product: this.product,
                        user: this.$store.getters.loggedUser
                    });
                }
            },
            removeFromBasket() {
              this.$store.dispatch('removeFromBasket', this.product.id);
                if(isLoggedIn()) {
                    axios.post('/kingdom_vision/api/cart/delete', {
                        product: this.product,
                        user: this.$store.getters.loggedUser
                    });
                }
            },
        },
    }
</script>

<style scoped>

</style>
