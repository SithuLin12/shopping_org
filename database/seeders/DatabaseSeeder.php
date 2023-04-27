<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // user
        User::create([
            'name' => 'userone',
            'email' => 'userone@gmail.com',
            'password' => Hash::make('password')
        ]);

        // admin
        Admin::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password')
        ]);

        // category
        $category = ['Tshirt','Mobile','Earphone','Hat'];
        foreach($category as $c){
            Category::create([
                'slug' => Str::slug($c),
                'name' => $c,
            ]);
        }

        // brand
        $brand = ['Sansung','Oppo','LV','Huawei'];
        foreach($brand as $b){
            Brand::create([
                'slug' => Str::slug($b),
                'name' => $b,
            ]);
        }

         // color
         $color = ['red','green','blue','black'];
         foreach($color as $b){
             Color::create([
                 'slug' => Str::slug($b),
                 'name' => $b,
             ]);
         }

        // supplier
        Supplier::create([
            'name' => 'sithulin',
            'image' => 'supplier.png',
        ]);
    }
}
