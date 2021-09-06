<template>
    <div>
        <nav-bar> </nav-bar>
        <div v-if="success">
            <header class="bg-dark py-5">
                <div class="container px-4 px-lg-5 my-5">
                    <div class="text-center text-white">
                        <h1 class="display-4 fw-bolder">Congratulations</h1>
                    </div>
                </div>
            </header>
            <div class="container mt-5 mb-5">
            <success>
                <p class="text-center">Thank you for purchasing</p>
                <router-link :to="{ name: 'Home' }" class="btn btn-outline-dark"> Shop more </router-link>
            </success>
        </div>
        </div>
        <div v-else>
            <header class="bg-dark py-5">
                <div class="container px-4 px-lg-5 my-5">
                    <div class="text-center text-white">
                        <h1 class="display-4 fw-bolder">Basket</h1>
                        <p class="lead fw-normal text-white-50 mb-0">See what you have it.</p>
                    </div>
                </div>
            </header>
            <div class="container mt-4 mb-5" v-if="itemsInBasket">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title">Checkout Details</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="first_name">First Name</label>
                                        <input id="first_name" type="text" class="form-control" name="first_name" v-model="customer.first_name" :class="[{ 'is-invalid' : errorFor('customer.first_name') }]">
                                        <v-error :errors="errorFor('customer.first_name')"> </v-error>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="last_name">Last Name</label>
                                        <input id="last_name" type="text" class="form-control" name="last_name" v-model="customer.last_name" :class="[{ 'is-invalid' : errorFor('customer.last_name') }]">
                                        <v-error :errors="errorFor('customer.last_name')"> </v-error>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" v-model="customer.email" :class="[{ 'is-invalid' : errorFor('customer.email') }]">
                                        <v-error :errors="errorFor('customer.email')"> </v-error>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 form-group">
                                        <label for="street">Street</label>
                                        <input id="street" type="text" class="form-control" name="street" v-model="customer.street" :class="[{ 'is-invalid' : errorFor('customer.street') }]">
                                        <v-error :errors="errorFor('customer.street')"> </v-error>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="zip">Zipcode</label>
                                        <input id="zip" type="text" class="form-control" name="zip" v-model="customer.zip" :class="[{ 'is-invalid' : errorFor('customer.zip') }]">
                                        <v-error :errors="errorFor('customer.zip')"> </v-error>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="country">Country</label>
                                        <input id="country" type="text" class="form-control" name="country" v-model="customer.country" :class="[{ 'is-invalid' : errorFor('customer.country') }]">
                                        <v-error :errors="errorFor('customer.country')"> </v-error>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="state">State</label>
                                        <input id="state" type="text" class="form-control" name="state" v-model="customer.state" :class="[{ 'is-invalid' : errorFor('customer.state') }]">
                                        <v-error :errors="errorFor('customer.state')"> </v-error>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="city">City</label>
                                        <input id="city" type="text" class="form-control" name="city" v-model="customer.city" :class="[{ 'is-invalid' : errorFor('customer.city') }]">
                                        <v-error :errors="errorFor('customer.city')"> </v-error>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <button type="submit" class="btn btn-secondary btn-block btn-lg" @click.prevent="order" :disabled="loading">Purchase</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h6 class="card-title">Your Cart</h6>
                                    <h6 class="badge badge-secondary text-uppercase">
                                        <span v-if="itemsInBasket">{{ itemsInBasket }}</span>
                                    </h6>
                                </div>
                            </div>
                            <div class="card-body">
                                <transition-group name="fade" v-if="itemsInBasket">
                                    <div v-for="item in basket" :key="item.id">
                                        <div class="pt-2 pb-2 d-flex justify-content-between">
                                <span>
                                    <router-link :to="{ name: 'ProductShow', params: {id: item.id} }" class="text-secondary text-decoration-none"> {{ item.name }} </router-link>
                                </span>
                                            <span class="font-weight-bold">${{ item.price}}</span>
                                        </div>
                                        <div class="pt-2 pb-2 text-right">
                                            <button class="btn btn-sm btn-outline-secondary" @click="removeFromBasket(item.id)">
                                                <i class="bi-trash"> </i>
                                            </button>
                                        </div>
                                    </div>
                                </transition-group>
                                <h6 class="text-center" v-else>Your cart is empty.</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-5 mb-5" v-else>
                <div class="jumbotron jumbotron-fluid text-center">
                    <i class="bi-cart-x-fill" style="font-size: 100px"> </i>
                    <p>Empty</p>
                    <router-link :to="{ name: 'Home' }" class="btn btn-outline-dark"> Shop now </router-link>
                </div>
            </div>
        </div>
        <app-footer> </app-footer>
    </div>
</template>

<script>
    import { mapState, mapGetters } from "vuex";
    import validationError from "../shared/mixins/validationError";
    import {isLoggedIn} from "../shared/utilities/auth";
    export default {
        name: "Basket.vue",
        mixins:[validationError],
        data() {
            return {
                loading: false,
                purchaseAttempted: false,
                customer: {
                    first_name: null,
                    last_name: null,
                    email: null,
                    street: null,
                    zip: null,
                    country: null,
                    state: null,
                    city: null,
                }
            };
        },
        computed: {
            ...mapGetters(['itemsInBasket']),
            ...mapState({
                basket: state => state.basket.items
            }),
            success() {
                return !this.loading && 0 === this.itemsInBasket && this.purchaseAttempted;
            }
        },
        methods: {
            async order() {
                this.loading = true;
                this.purchaseAttempted = false;
                this.errors = null;
                try {
                    await axios.post('/kingdom_vision/api/checkout',{
                        customer: this.customer,
                        products: this.basket,
                        user: this.$store.getters.loggedUser
                    });
                    await this.$store.dispatch('emptyBasket');
                    this.purchaseAttempted = true;
                } catch(err) {
                    this.errors = err.response && err.response.data.errors;
                }
                this.loading = false;
            },
            removeFromBasket(id) {
                this.$store.dispatch('removeFromBasket', id);
                if(isLoggedIn()) {
                    axios.post('/kingdom_vision/api/cart/delete', {
                        product: id,
                        user: this.$store.getters.loggedUser
                    });
                }
            },
        }
    }
</script>

<style scoped>
    h6.badge{
        font-size: 100%;
    }
</style>
