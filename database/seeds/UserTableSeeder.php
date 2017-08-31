<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->resetTable();

        $user = Sentinel::create([
        		'email' => 'admin@gmail.com',
                'password' => 'admin',
                'first_name' => 'Join',
                'last_name' => 'Cerna',
        	]);

         // Activate the admin directly
        $activation = Activation::create($user);
        Activation::complete($user, $activation->code);

        // Find the group using the group id
        $adminGroup = Sentinel::findRoleBySlug('admin');

        // Assign the group to the user
        $adminGroup->users()->attach($user);

    }

    private function resetTable() {
        DB::statement('DELETE FROM throttle');
        DB::statement('ALTER TABLE throttle AUTO_INCREMENT=1');

        DB::statement('DELETE FROM persistences');
        DB::statement('ALTER TABLE persistences AUTO_INCREMENT=1');

        DB::statement('DELETE FROM role_users');
        DB::statement('ALTER TABLE role_users AUTO_INCREMENT=1');

        DB::statement('DELETE FROM activations');
        DB::statement('ALTER TABLE activations AUTO_INCREMENT=1');

        DB::statement('DELETE FROM users');
        DB::statement('ALTER TABLE users AUTO_INCREMENT=1');
    }
}
