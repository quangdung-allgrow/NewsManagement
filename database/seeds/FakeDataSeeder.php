<?php

use Illuminate\Database\Seeder;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class FakeDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->fakeUser();
    	$this->fakeNewsCategories();
    	$this->fakeNews();
    }

    private function fakeUser() {
    	factory(App\Entities\Sentinel\User::class, 2)
    		->create()
    		->each(function($user) {
		         // Activate the admin directly
		        $activation = Activation::create($user);
		        Activation::complete($user, $activation->code);

		        // Find the group using the group id
		        $adminGroup = Sentinel::findRoleBySlug('admin');

		        // Assign the group to the user
		        $adminGroup->users()->attach($user);
    		});
    }

    private function fakeNews() {
    	factory(App\Entities\News::class, 20)->create();
    }

	private function fakeNewsCategories() {
    	factory(App\Entities\NewsCategories::class, 2)->create();
    }    
}
