<template>
    <ApolloQuery :query="$options.query">
        <template slot-scope="{result: {loading, data, error }}">
            <div v-if="loading">Loading...</div>
            <div v-else-if="data">{{ data }}</div>
        </template>
    </ApolloQuery>
</template>

<script>
    import gql from 'graphql-tag';

    export default {
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
