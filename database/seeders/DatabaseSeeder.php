<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BoardUser;
use App\Models\User;
use App\Models\Board;
use App\Models\Ticket;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->users();
        $this->admin();
    }

    private function users()
    {
        User::factory()
        ->count(20)
        ->hasAttached(Board::factory()->count(8)->has(Ticket::factory()->count(10)))
        ->create();
    }

    private function admin()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'role' =>'admin'
        ]);
    }
}
