<template>
    <tr>
        <td>{{ name }}</td>
        <td class="text-right">{{ quantity }}</td>
        <td class="text-right">{{ savings.toFixed(2) }}</td>
        <td class="text-right">{{ price.toFixed(2) }}</td>
        <td><DeleteProductButton :product-id="id" /></td>
    </tr>
</template>

<script>
    import gql from 'graphql-tag';
    import DeleteProductButton from './DeleteProductButton';

    export default {
        components: {
            DeleteProductButton,
        },

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
