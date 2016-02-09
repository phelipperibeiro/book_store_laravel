<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Category::class)->create([
           'name'=>'Art'
        ]);

        factory(\App\Models\Category::class)->create([
            'name'=>'Tech'
        ]);

        factory(\App\Models\Category::class)->create([
            'name'=>'Business'
        ]);
    }
}
