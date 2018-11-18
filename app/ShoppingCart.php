<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function getTotalAttribute()
    {
        return $this->totalBeforeSavings - $this->savings;
    }

    public function getTotalBeforeSavingsAttribute()
    {
        return $this->products->map(function ($product) {
            return $product->price * $product->pivot->quantity;
        })->sum();
    }

    public function getSavingsAttribute()
    {
        return $this->products->map(function ($product) {
            return $product->savings * $product->pivot->quantity;
        })->sum();
    }

    public function addProduct($product)
    {
        if ($attachedProduct = $this->products()->whereId($product->id)->first()) {
            $this->products()->updateExistingPivot($product, ['quantity' => $attachedProduct->pivot->quantity + 1]);
        } else {
            $this->products()->attach($product);
        }

        return $this->fresh();
    }
}
