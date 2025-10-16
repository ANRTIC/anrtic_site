<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $role1 = Role::create(["name" => "SUPER_ADMIN"]);
        $role2 = Role::create(["name" => "WEB_MASTER"]);
        $role3 = Role::create(["name" => "ADMIN"]);
        $role4 = Role::create(["name" => "AGENT"]);

        // SUPER_ADMIN
        $user1 = User::factory()->create([
            "first_name" => "SUPER_ADMIN",
            "last_name" => "SUPER_ADMIN", 
            "email" => "anrtic@admin.km",
        ]);
        // WEB_MASTER
        $user2 = User::factory()->create([
            "first_name" => "WEB_MASTER",
            "last_name" => "WEB_MASTER",
            "email" => "contact@anrtic.km"
        ]);
        // ADMIN
        $user3 = User::factory()->create([
            "first_name" => "Chabane",
            "last_name" => "MOHAMED",
            "email" => "chabane.mohamed@anrtic.km"
        ]);
        // AGENT
        $user4 = User::factory()->create([
            "first_name" => "Nibrasse",
            "last_name" => "FOUAD",
            "email" => "nibrasse0108@gmail.com"
        ]);


        $user1->assignRole($role1);
        $user2->assignRole($role2);
        $user3->assignRole($role3);
        $user4->assignRole($role4);
        
    }
}
