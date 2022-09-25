<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EditorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $editRole = Role::create(['name' => 'Editor']);
        $permission = Permission::create(['name' => 'manage posts']);
        $permission->assignRole($editRole);
 
        $editUser = User::factory()->create([
            'name' => 'hamid',
            'email' => 'hamid@gmail.com',
            'password' => bcrypt('password')
        ]);
        $editUser->assignRole('Editor');
    }
}
