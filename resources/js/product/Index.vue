<template>
    <div>
        <div v-if="loading">
            <p class="text-success text-center mt-4 mb-4">loading...</p>
        </div>
        <div v-else>
            <section class="py-5">
                <div class="row mb-4 gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center" v-for="row in rows" :key="'row' + row">
                    <div class="col d-flex align-item-stretch" v-for="(product, column) in productsInRow(row)"
                         :key="'row' + row + column">
                        <product-listing v-bind="product"> </product-listing>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Index.vue",

        data(){
            return {
                products: null,
                loading: false,
                columns: 3,
            };
        },

        computed: {
            rows() {
                return this.products != null ? Math.ceil(this.products.length / this.columns) : 0;
            }
        },

        methods: {
            productsInRow(row) {
                return this.products.slice((row - 1) * this.columns, row * this.columns);
            },

            placeholdersInRow(row) {
                return this.columns - this.productsInRow(row).length;
            },
        },

        created() {
            console.log('created.');
            this.loading = true;

            // *** fetch products *** //
            const request = axios.get('api/products').then(response => {
                this.products = response.data;
                this.loading = false;
            });
        },
        mounted() {
            console.log('Component mounted.')
        },
    }
</script>

<style scoped>

</style>
