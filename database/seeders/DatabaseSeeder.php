<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\About;
use App\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'Address'=>'Aungban',
            'role'=>'admin',
            'phone'=> '09448977540',
            'password'=> Hash::make('12345678'),
        ]);
        About::create([
            'description' => "Since then, our courteous and committed team members have always ensured a pleasant and enjoyable tour for the clients. This arduous effort has enabled TMS to be recognized as a dependable Travel Solutions provider with three offices Delhi. We have got packages to suit the discerning traveler's budget and savor. Book your dream vacation online. Supported quality and proposals of our travel consultants, we have a tendency to welcome you to decide on from holidays packages and customize them according to your plan."
        ]);
        Contact::create([
            'address' => 'Taunggyi(Shan State)',
            'email' => 'example.com',
            'phone' => '09xxxxxxx',
        ]);
    }
}
