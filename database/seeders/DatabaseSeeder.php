<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\Repair;
use App\Models\SparePart;
use App\Models\User;
use App\Models\Vehicle;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a single user with role 'user'
        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'ezzoujarys@gmail.com',
            'role' => 'user',
            'password' => Hash::make('Test2024@'), // Ensure password is hashed
        ]);

        // Create 10 users with factory
        User::factory(10)->create();

        // Create an admin user
        User::factory()->admin()->create();

        // Create clients
        Client::factory()->count(10)->create();

        // Create vehicles
        Vehicle::factory()->count(20)->create();

        // Create repairs
        Repair::factory()->count(30)->create();

        // Create spare parts
        SparePart::factory()->count(50)->create();

        // Create invoices
        Invoice::factory()->count(15)->create();
    }
}