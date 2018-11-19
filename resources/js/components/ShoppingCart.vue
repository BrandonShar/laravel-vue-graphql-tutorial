<template>
    <div>
        <h2 class="text-center">Shopping Cart</h2>
        <ShoppingCartProductsList v-bind="filter($options.components.ShoppingCartProductsList.fragment, shoppingCart)" />
        <ShoppingCartTotals v-bind="filter($options.components.ShoppingCartTotals.fragment, shoppingCart)" />
    </div>
</template>

<script>
    import gql from 'graphql-tag';
    import {filter} from 'graphql-anywhere';
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

        methods: {
            filter,
        },

        fragment: gql`
            fragment ShoppingCart on User {
                shoppingCart {
                    id
                    ...ShoppingCartProductsList
                    ...ShoppingCartTotals
                }
            }

            ${ShoppingCartProductsList.fragment}
            ${ShoppingCartTotals.fragment}
        `,
    }
</script>

<style scoped>
    .col-sm-8 {
        padding-left: 20px;
    }
</style>
