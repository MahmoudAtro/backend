<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Office;
use App\Models\User;
use App\Models\Money;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $user = Office::create([
        //     'name_office' => 'mahmoud office',
        //     'address'=>'Giza',
        //     'country' => 'Syria',
        //     'amount' => 12000

        // ]);

        $user = \App\Models\User::factory()->create([
            'name' => 'mahmoud',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('ss123456'),
        ]);

        //create role
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleLeader = Role::create(['name' => 'leader']);

        // create Permission
        $createoffice   = Permission::create(['name' => 'create office']);
        $createtrans = Permission::create(['name' => 'create trans']);
        $showoffice = Permission::create(['name'=>'show office']);
        $showtrans  = Permission::create(['name'=>'show trans']);


        $roleAdmin->givePermissionTo([$createoffice , $createtrans , $showoffice , $showtrans]);
        $roleLeader->givePermissionTo($showtrans);

        $user->assignRole('admin');
    }
}
