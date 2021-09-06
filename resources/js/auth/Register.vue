<template>
    <div>
        <nav-bar> </nav-bar>

        <div class="container mt-4 w-50">
            <div class="card">
                <div class="card-header">
                    <h6>Register</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input id="name" type="text" class="form-control" name="name" placeholder="Enter your username" v-model="name" :class="[{ 'is-invalid': errorFor('name') }]">
                        <v-error :errors="errorFor('name')"> </v-error>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" class="form-control" name="email" placeholder="Enter your email" v-model="email" :class="[{ 'is-invalid' : errorFor('email') }]">
                        <v-error :errors="errorFor('email')"> </v-error>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Enter your password" v-model="password" :class="[{ 'is-invalid': errorFor('password') }]">
                        <v-error :errors="errorFor('password')"> </v-error>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Re-type your password" v-model="password_confirmation" :class="[{ 'is-invalid': errorFor('password_confirmation') }]">
                        <v-error :errors="errorFor('password_confirmation')"> </v-error>
                    </div>

                    <button type="submit" class="btn btn-secondary btn-lg btn-block" :disabled="loading" @click.prevent="register">Register</button>
                    <hr>
                    <div>
                        Already have account?
                        <router-link :to="{name:'login'}" class="font-weight-bold">Login</router-link>
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
        name: "Register.vue",
        data() {
            return {
                name: null,
                email: null,
                password: null,
                password_confirmation: null,

                loading: false
            };
        },
        methods: {
            async register() {
                this.loading = true;
                this.errors = null;
                const userData = {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation
                };
                try {
                    const response = await axios.post("/kingdom_vision/admin/register", userData);
                    if(201 === response.status) {
                        logIn();
                        await this.$store.dispatch("loadUser");
                        await this.$router.push({name: "Home"});
                    }
                } catch (error) {
                    this.errors = error.response && error.response.data.errors;
                }
                this.loading = false;
            }
        }
    }
</script>

<style scoped>

</style>
