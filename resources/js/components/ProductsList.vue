<template>
    <div class="text-center">
        <h2>Products For Sale</h2>

        <div class="row">
            <div class="col-6" v-for="product in products" :key="product.id">
                <ProductButton v-bind="product" />
            </div>
        </div>
       
    </div>
</template>

<script>
    import ProductButton from './ProductButton';

    export default {
        components: {
            ProductButton,
        },

        props: {
            products: Array,
        }
    }
</script>
