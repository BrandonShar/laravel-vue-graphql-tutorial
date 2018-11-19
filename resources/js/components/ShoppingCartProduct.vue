<template>
    <tr>
        <td>{{ name }}</td>
        <td class="text-right">{{ quantity.toFixed(2) }}</td>
        <td class="text-right">{{ savings.toFixed(2) }}</td>
        <td class="text-right">{{ price.toFixed(2) }}</td>
    </tr>
</template>

<script>
    import gql from 'graphql-tag';

    export default {
        props: {
            name: String,
            id: String,
            quantity: Number,
            price: Number,
            savings: Number,
        },

        fragment: gql`
            fragment ShoppingCartProduct on ShoppingCartProduct {
                id
                name
                quantity
                savings
                price
            }
        `,
    }
</script>
