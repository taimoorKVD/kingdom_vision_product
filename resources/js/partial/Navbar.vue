<template>
    <div>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Kingdom Vision</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item">
                            <router-link :to="{name: 'Home'}" class="nav-link active">Store</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{name: 'About'}" class="nav-link">About</router-link>
                        </li>
                        <!--<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li>-->
                    </ul>
                    <form class="d-flex" v-if="itemsInBasket">
                        <router-link class="btn btn-outline-dark" :to="{name:'Basket'}">
                            <i class="bi-cart-fill"> </i>
                            <span class="badge bg-dark text-white rounded-pill">{{ itemsInBasket }}</span>
                        </router-link>
                    </form>
                    <div class="ml-1"  v-if="!isLoggedIn">
                        <router-link class="btn btn-outline-dark" :to="{name:'login'}">
                        Login
                        </router-link>
                        <router-link class="btn btn-outline-dark" :to="{name:'register'}">
                            Register
                        </router-link>
                    </div>
                    <div class="ml-1" v-if="isLoggedIn">
                        <a href="javascript:void(0)" class="btn btn-outline-dark" @click.prevent="logout">
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- End Navigation-->
    </div>
</template>

<script>
    import {mapGetters, mapState} from "vuex";
    export default {
        name: "navbar.vue",
        data() {
            return {

            };
        },
        computed: {
            ...mapState({
                isLoggedIn: 'isLoggedIn',
            }),
            ...mapGetters({
                itemsInBasket: 'itemsInBasket',
            }),
        },
        methods: {
          async logout() {
              try {
                  await axios.post("/kingdom_vision/admin/logout");
                  await this.$store.dispatch("logout");
              } catch(error) {
                  await this.$store.dispatch("logout");
              }
          }
        },
    }
</script>

<style scoped>

</style>
