<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function getQuantityAttribute()
    {
        return optional($this->pivot)->quantity;
    }
}
