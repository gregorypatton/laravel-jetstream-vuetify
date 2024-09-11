<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\EtlConfig;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create roles and permissions
        $role = Role::create(['name' => 'admin']);
        $permission = Permission::create(['name' => 'etl-config']);
        $role->givePermissionTo($permission);

        // Seed users
        $users = collect([
            User::factory()->create([
                'id' => 1,
                'name' => 'Greg Patton',
                'email' => 'gregory@patton.dev',
                'phone' => 5555555555,
                'seller_id' => 3,
                'changed_by' => 1,
                'password' => Hash::make('password1')
            ]),
            User::factory()->create([
                'id' => 2,
                'name' => 'Todd Doner',
                'email' => 'todd@donerindustries.dev',
                'phone' => 5555555555,
                'seller_id' => 3,
                'changed_by' => 1,
                'password' => Hash::make('password1')
            ])
        ]);
        $users->each(function ($user) {
            EtlConfig::factory(10)->create([
                'seller_id' => $user->seller_id,
                'changed_by' => $user->id,
            ]);
        });
        // Assign roles to users
        $users->each(function ($user) {
            $user->assignRole('admin');
        });
    }
}
