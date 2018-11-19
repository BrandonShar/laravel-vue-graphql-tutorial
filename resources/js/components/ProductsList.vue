<template>
    <div class="text-center">
        <h2>Products For Sale</h2>

        <div class="row">
            <div class="col-6" v-for="product in products" :key="product.id">
                <ProductButton v-bind="filter($options.components.ProductButton.fragment, product)" />
            </div>
        </div>
       
    </div>
</template>

<script>
    import gql from 'graphql-tag';
    import {filter} from 'graphql-anywhere';
    import ProductButton from './ProductButton';

    export default {
        components: {
            ProductButton,
        },

        props: {
            products: Array,
        },

        methods: {
            filter,
        },

        fragment: gql`
            fragment ProductsList on Query {
                products {
                    id
                    ...ProductButton
                }
            }

            ${ProductButton.fragment}
        `,
    }
</script>
