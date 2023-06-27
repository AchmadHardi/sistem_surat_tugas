<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Jabatan;
use App\Models\User;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\Jabatan::create([
            'name' => 'staff',
            'class' => 'ekonomi',
        ]);

        \App\Models\Jabatan::create([
            'name' => 'supervisor',
            'class' => 'ekonomi_premium',
        ]);

        \App\Models\Jabatan::create([
            'name' => 'manager',
            'class' => 'bisnis',
        ]);

        \App\Models\Jabatan::create([
            'name' => 'direktur',
            'class' => 'first_class',
        ]);

        User::create([
            'email' => 'test@gmail.com',
            'password' => bcrypt('test')
        ]);

        Position::create([
            'id' => 4,
            'name' => 'Director',
            'ticket_class' => 'First Class',
            'position_id' => 4,
        ]);

        Position::create([
            'id' => 3,
            'name' => 'Manager',
            'ticket_class' => 'Bussiness',
            'position_id' => 4,
        ]);

        Position::create([
            'id' => 2,
            'name' => 'Supervisor',
            'ticket_class' => 'Economy Premium',
            'position_id' => 3,
        ]);

        Position::create([
            'id' => 1,
            'name' => 'Staff',
            'ticket_class' => 'Economy',
            'position_id' => 3,
        ]);

        Employee::create([
            'nik' => '123',
            'name' => 'yudha',
            'position_id' => 4,
            'email' => 'yudha@gmail.com',
            'password' => bcrypt('amancuy'),
        ]);

        Status::create([
            'name' => 'Non-Active'
        ]);

        Status::create([
            'name' => 'Active'
        ]);

        Status::create([
            'name' => 'Sold'
        ]);

        // CARA CREATE MANY TO MANY
        Employee::first()->statuses()->attach([Status::first()->id => [
            'airline_name' => 'Air Asia',
            'price' => 1000000,
            'seats' => 1,
            'origin' => 'Jakarta',
            'destination' => 'Surabaya',
            'departure_date' => Date::now()->format('Y-m-d'),
            'arrival_date' => Date::now()->format('Y-m-d'),
            'departure_time' => Date::now()->format('h:i A'),
            'arrival_time' => Date::now()->format('h:i A'),
        ]]);

        Employee::first()->tickets()->attach(Ticket::first()->id);
    }
}
