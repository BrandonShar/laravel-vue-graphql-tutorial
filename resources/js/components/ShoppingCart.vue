<template>
    <div>
        <h2 class="text-center">Shopping Cart</h2>
        <ShoppingCartProductsList :products="shoppingCart.products" />
        <ShoppingCartTotals :total="shoppingCart.total" :total-before-savings="shoppingCart.totalBeforeSavings" :savings="shoppingCart.savings" />
    </div>
</template>

<script>
    import ShoppingCartProductsList from './ShoppingCartProductsList';
    import ShoppingCartTotals from './ShoppingCartTotals';

    export default {
        components: {
            ShoppingCartProductsList,
            ShoppingCartTotals,
        },

        props: {
            shoppingCart: Object,
        },
    }
</script>

<style scoped>
    .col-sm-8 {
        padding-left: 20px;
    }
</style>
