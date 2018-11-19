<template>
    <ApolloQuery :query="$options.query">
        <template slot-scope="{result: {loading, data, error }}">
            <div v-if="loading">Loading...</div>
            <div v-else-if="data" class="row">
                <ProductsList :products="data.products" class="col-sm-4" />
                <ShoppingCart :shopping-cart="data.me.shoppingCart" class="col-sm-8" />
            </div>
        </template>
    </ApolloQuery>
</template>

<script>
    import gql from 'graphql-tag';
    import ProductsList from './ProductsList';
    import ShoppingCart from './ShoppingCart';

    export default {
        components: {
            ProductsList,
            ShoppingCart,
        },

        query: gql`
            query ShoppingCartPage {
                me {
                    id
                    shoppingCart {
                        id
                        total
                        totalBeforeSavings
                        savings
                        products {
                            id
                            name
                            price
                            savings
                            quantity
                        }
                    }
                }
                products {
                    id
                    name
                    price
                    savings
                }
            }
        `
    }
</script>
