<template>
    <div class="shopping-cart">
        <h3>Products</h3>
        <table class="table">
            <tr>
                <th>Name</th>
                <th class="text-right">Quantity</th>
                <th class="text-right">Savings (per unit)</th>
                <th class="text-right">Price (per unit)</th>
            </tr>
            <ShoppingCartProduct v-for="product in products" :key="product.id" v-bind="product" />
        </table>
    </div>
</template>

<script>
    import ShoppingCartProduct from './ShoppingCartProduct';

    export default {
        components: {
            ShoppingCartProduct,
        },

        props: {
            products: Array,
        }
    }
</script>

<style scoped>
    table {
        margin-bottom: 0;
    }

    th {
        font-weight: bold;
    }

   .shopping-cart {
        padding: 10px;
        background-color: white;
        margin-top: 13px;
    }
</style>
