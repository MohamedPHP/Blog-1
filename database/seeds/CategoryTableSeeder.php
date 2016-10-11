<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = new Category();
        $cat->name = 'Tech';
        $cat->save();


        $cat = new Category();
        $cat->name = 'Sports';
        $cat->save();


        $cat = new Category();
        $cat->name = 'Social';
        $cat->save();


        $cat = new Category();
        $cat->name = 'Food';
        $cat->save();


    }
}
