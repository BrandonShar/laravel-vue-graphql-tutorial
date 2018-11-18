<?php

use App\Product;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(User::class)->create([
            'email' => 'brandon.shar@icloud.com',
        ]);

        $user->shoppingCart()->create();

        factory(Product::class, 10)->create();
    }
}
