<?php

use Illuminate\Database\Seeder;

class NewCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('DELETE FROM news');
        DB::statement('ALTER TABLE news auto_increment=1');
    	DB::statement('DELETE FROM news_categories');
    	DB::statement('ALTER TABLE news_categories auto_increment=1');

        DB::table('news_categories')->insert([
            [
        		'id' => 1,
        		'parent_id' => -1,
        		'title' => 'UnCategories',
        	]
        ]);
    }
}