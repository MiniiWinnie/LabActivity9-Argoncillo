<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Nurse Zero',
            'email' => 'nurse.test@gmail.com',
            'password' => Hash::make('lab9test'),
        ]);

        $this->call([
            VaccinationSeeder::class,
        ]);
    }
}
