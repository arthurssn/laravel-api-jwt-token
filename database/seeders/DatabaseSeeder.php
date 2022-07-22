<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        if ((User::select('name')->where('name', 'admin')->count()) == 0) {
            \App\Models\User::factory()->create([
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('mypassword')
            ]);
        }

        $this->call([
            CategorySeeder::class,
            PostSeeder::class
        ]);
    }
}