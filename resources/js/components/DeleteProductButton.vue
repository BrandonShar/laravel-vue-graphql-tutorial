<template>
    <ApolloMutation :mutation="$options.mutation" :variables="{productId}">
        <button slot-scope="{mutate, loading}" :disabled="loading" @click="mutate()">&times;</button>
    </ApolloMutation>
</template>

<script>
    import gql from 'graphql-tag';
    import ShoppingCartTotals from './ShoppingCartTotals';
    import {fragment} from './ShoppingCartProductsList';

    export default {

        // Use beforeCreate and require to avoid a circular dependency issue with importing a grandparent component
        beforeCreate() {
            const ShoppingCartProductsListFragment = require('./ShoppingCartProductsList.vue').fragment;

            this.$options.mutation = gql`
                mutation deleteProductButton($productId: ID!) {
                    deleteProductFromShoppingCart(productId: $productId) {
                        shoppingCart {
                            id
                            ...ShoppingCartProductsList
                            ...ShoppingCartTotals
                        }
                    }
                }

                ${ShoppingCartProductsListFragment}
                ${ShoppingCartTotals.fragment}
            `;
        },

        props: {
            productId: String,
        },
    }
</script>

<style scoped>
    button {
        border: none;
        margin-top: -2px;
        margin-bottom: -1px;
        color: #c40000;
        cursor: pointer;
        font-size: 1.1em;
    }

    button:hover {
        font-weight: bold;
    }
</style>