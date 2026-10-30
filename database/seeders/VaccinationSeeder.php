<?php

namespace Database\Seeders;

use App\Models\Vaccination;
use Illuminate\Database\Seeder;

class VaccinationSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['patient_name' => 'Tsukishiro Yanagi', 'purok' => 'Purok 2', 'vaccine' => 'BCG', 'dose' => '1st dose', 'scheduled_at' => '2026-10-30', 'status' => 'Scheduled'],
            ['patient_name' => 'Hoshimi Miyabi', 'purok' => 'Purok 5', 'vaccine' => 'Pentavalent', 'dose' => '2nd dose', 'scheduled_at' => '2026-11-02', 'status' => 'Scheduled'],
            ['patient_name' => 'Zhuang Fangyi', 'purok' => 'Purok 1', 'vaccine' => 'OPV', 'dose' => '1st dose', 'scheduled_at' => '2026-11-04', 'status' => 'Scheduled'],
            ['patient_name' => 'Zhong Michu', 'purok' => 'Purok 3', 'vaccine' => 'MMR', 'dose' => '1st dose', 'scheduled_at' => '2026-11-06', 'status' => 'Done'],
            ['patient_name' => 'Tang Han Qiu', 'purok' => 'Purok 4', 'vaccine' => 'Anti-Flu', 'dose' => 'Annual', 'scheduled_at' => '2026-11-09', 'status' => 'Overdue'],
            ['patient_name' => 'Sai Winnie Argoncillo', 'purok' => 'Purok 6', 'vaccine' => 'Hepatitis B', 'dose' => 'Booster', 'scheduled_at' => '2026-11-16', 'status' => 'Scheduled'],
        ];

        foreach ($rows as $row) {
            Vaccination::create($row);
        }
    }
}
