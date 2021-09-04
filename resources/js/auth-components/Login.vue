<template>
    <div>
        <nav-bar> </nav-bar>
        <div class="container w-50 mt-4">
            <div class="card">
                <div class="card-header">
                    <h6>Login</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" class="form-control" name="email" placeholder="Enter your email" v-model="email" :class="[{ 'is-invalid': errorFor('email') }]">
                        <v-error :errors="errorFor('email')"> </v-error>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Enter your password" v-model="password" :class="[{ 'is-invalid': errorFor('password') }]">
                        <v-error :errors="errorFor('password')"> </v-error>
                    </div>

                    <button type="submit" class="btn btn-secondary btn-lg btn-block" :disabled="loading" @click.prevent="login">Login</button>
                    <hr>
                    <div>
                        No account yet?
                        <router-link :to="{name:'register'}" class="font-weight-bold">Register</router-link>
                    </div>
                    <div>
                        Forgot password?
                        <router-link :to="{name:'Home'}" class="font-weight-bold">Reset password</router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import validateErrors from '../shared/mixins/validationError';
    import { logIn } from "../shared/utilities/auth";

    export default {
        mixins: [validateErrors],
        name: "Login.vue",
        data() {
            return {
                email: null,
                password: null,
                loading: false
            };
        },
        methods: {
            async login() {
                this.loading = true;
                this.errors = null;
                try {
                    await axios.get('/kingdom_vision/sanctum/csrf-cookie');
                    await axios.post("/kingdom_vision/admin/login", {
                        email: this.email,
                        password: this.password
                    });
                    logIn();
                    await this.$store.dispatch("loadUser");
                    await this.$router.push({name: "Home"});
                } catch (error) {
                    this.errors = error.response && error.response.data.errors;
                }
                this.loading = false;
            },
        }
    }
</script>

<style scoped>

</style>
