<template>
    <div class="cart-totals">
        <h3>Totals</h3>
        <table class="table">
            <tr>
                <td>Total Before Savings</td>
                <td class="text-right">${{ totalBeforeSavings.toFixed(2) }}</td>
            </tr>
            <tr>
                <td>Savings</td>
                <td class="text-right">${{ savings.toFixed(2) }}</td>
            </tr>
            <tr>
                <td class="final-total">Total</td>
                <td class="final-total text-right">${{ total.toFixed(2) }}</td>
            </tr>
        </table>
    </div>
</template>

<script>
    import gql from 'graphql-tag';

    export default {
        props: {
            totalBeforeSavings: Number,
            savings: Number,
            total: Number,
        },

        fragment: gql`
            fragment ShoppingCartTotals on ShoppingCart {
                totalBeforeSavings
                savings
                total
            }
        `,
    }
</script>

<style scoped>
    table {
        margin-bottom: 0;
    }

   .cart-totals {
        padding: 10px;
        background-color: white;
        margin-top: 14px;
    }

    .final-total {
        font-weight: bold;
        font-size: 1.1em;
    }
</style>
