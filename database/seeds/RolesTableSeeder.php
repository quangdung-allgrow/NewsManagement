<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class RolesTableSeeder extends Seeder
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

        $roles = Sentinel::getRoleRepository();

        // Create an Admin group
        $roles->createModel()->create(
            [
                'name' => 'Admin',
                'slug' => 'admin',
            ]
        );

        // Save the permissions
        $role = Sentinel::findRoleBySlug('admin');
        $role->permissions = [
            'dashboard.index' => true,
            /* New */
            'news.index' => true,
            'news.create' => true,
            'news.store' => true,
            'news.edit' => true,
            'news.update' => true,
            'news.destroy' => true,
            'news.show' => true,
        ];
        $role->save();

    }

    private function resetTable() {
        DB::statement('DELETE FROM roles');
        DB::statement('ALTER TABLE roles AUTO_INCREMENT=1');
    }
}
