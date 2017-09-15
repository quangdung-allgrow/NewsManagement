<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected $seeders = [
        NewCategoriesSeeder::class,
        RolesTableSeeder::class,
        UserTableSeeder::class,
    ];

    protected $development = [
        FakeDataSeeder::class,
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->seed($this->seeders);

        if (collect(['local', 'testing'])->contains(config('app.env'))) {
            $this->seed($this->development);
        }
    }

    private function seed(array $classes) {
        foreach ($classes as $class) {
            $this->call($class);
        }
    }
}
