<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Arif H Rezaldy',
            'email' => 'ahrezaldy@gmail.com',
            'avatar' => 'https://lh3.googleusercontent.com/a/ACg8ocKPaddhTF-3E6UKtQBujFp2fNS5gjC3kWWB249Vtl9K4_AV17w=s96-c',
            'role' => User::ROLE_ADMIN,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Category::create([
            'name' => 'E-Book',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Service::create([
            'name' => 'Google Drive',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
