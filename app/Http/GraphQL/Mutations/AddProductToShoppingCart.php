<?php

namespace App\Http\GraphQL\Mutations;

use App\Product;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class AddProductToShoppingCart
{
    public function resolve($rootValue, array $args, GraphQLContext $context)
    {
        return ['shoppingCart' => $context->user()->shoppingCart->addProduct(Product::findOrFail($args['productId']))];
    }
}
