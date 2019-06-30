<?php

use Illuminate\Database\Seeder;
use DesignByCode\Admin\Models\Category;


class CategoriesSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = [
            [
                'name' => 'Two Wheel Tiller Tractors'
            ],
            [
                'name' => 'Cultivator'
            ],
            [
                'name' => 'Mini Tractors'
            ],
            [
                'name' => 'Scythe Mower / Lucerne Cutter'
            ],
            [
                'name' => 'Mini Tractors Attachments'
            ],
            [
                'name' => 'Wood Chippers'
            ],
            [
                'name' => 'BT330 Two Wheel Tractor Attachments'
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }


    }
}
