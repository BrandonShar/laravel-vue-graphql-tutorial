<template>
    <ApolloQuery :query="$options.query">
        <template slot-scope="{result: {loading, data, error }}">
            <div v-if="loading">Loading...</div>
            <div v-else-if="data" class="row">
                <ProductsList v-bind="filter($options.components.ProductsList.fragment, data)" class="col-sm-4" />
                <ShoppingCart v-bind="filter($options.components.ShoppingCart.fragment, data.me)" class="col-sm-8" />
            </div>
        </template>
    </ApolloQuery>
</template>

<script>
    import gql from 'graphql-tag';
    import {filter} from 'graphql-anywhere';
    import ProductsList from './ProductsList';
    import ShoppingCart from './ShoppingCart';

    export default {
        components: {
            ProductsList,
            ShoppingCart,
        },

        methods: {
            filter,
        },

        query: gql`
            query ShoppingCartPage {
                me {
                    id
                    ...ShoppingCart
                }
                ...ProductsList
            }

            ${ShoppingCart.fragment}
            ${ProductsList.fragment}
        `
    }
</script>
