<?php

namespace Database\Seeders;

use App\Models\Board;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com'
        ]);
        

        Board::factory(5)->create([
            'user_id' => $user->id
        ]);

        // Boards::create([
        //     'title' => 'Laravel Developer',
        //     'tags' => 'laravel, vue, javascript',
        //     'company' => 'Wayne Enterprises',
        //     'location' => 'Gotham, NY',
        //     'email' => 'email3@email.com',
        //     'website' => 'https://www.wayneenterprises.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        // ]);

        // Boards::create([
        //     'title' => 'Backend Developer',
        //     'tags' => 'laravel, php, api',
        //     'company' => 'Skynet Systems',
        //     'location' => 'Newark, NJ',
        //     'email' => 'email4@email.com',
        //     'website' => 'https://www.skynet.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        // ]);
    }
}
