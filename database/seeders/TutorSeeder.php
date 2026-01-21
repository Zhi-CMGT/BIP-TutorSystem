<?php

namespace Database\Seeders;

use App\Models\Tutor;
use App\Models\Subject;
use App\Models\Level;
use Illuminate\Database\Seeder;

class TutorSeeder extends Seeder
{
    public function run(): void
    {
        $tutors = [
            [
                'name' => 'Sarah Johnson',
                'email' => 'sarah.johnson@example.com',
                'subject_id' => Subject::where('name', 'Mathematics')->first()->id,
                'level_id' => Level::where('name', 'Expert')->first()->id,
                'experience_years' => 8,
                'hours_available' => 20,
                'bio' => 'PhD in Mathematics with extensive teaching experience',
                'rating' => 4.9,
                'reviews_count' => 127,
                'hours_this_week' => 12,
                'status' => 'approved',
            ],
            [
                'name' => 'Michael Chen',
                'email' => 'michael.chen@example.com',
                'subject_id' => Subject::where('name', 'Computer Science')->first()->id,
                'level_id' => Level::where('name', 'Expert')->first()->id,
                'experience_years' => 6,
                'hours_available' => 20,
                'bio' => 'Software engineer and coding instructor',
                'rating' => 4.8,
                'reviews_count' => 93,
                'hours_this_week' => 15,
                'status' => 'approved',
            ],
            [
                'name' => 'Emma Rodriguez',
                'email' => 'emma.rodriguez@example.com',
                'subject_id' => Subject::where('name', 'Spanish')->first()->id,
                'level_id' => Level::where('name', 'Intermediate')->first()->id,
                'experience_years' => 4,
                'hours_available' => 15,
                'bio' => 'Native Spanish speaker, certified language teacher',
                'rating' => 4.7,
                'reviews_count' => 68,
                'hours_this_week' => 8,
                'status' => 'approved',
            ],
            [
                'name' => 'David Park',
                'email' => 'david.park@example.com',
                'subject_id' => Subject::where('name', 'Physics')->first()->id,
                'level_id' => Level::where('name', 'Expert')->first()->id,
                'experience_years' => 10,
                'hours_available' => 20,
                'bio' => 'Former university professor, loves making physics fun',
                'rating' => 5.0,
                'reviews_count' => 145,
                'hours_this_week' => 20,
                'status' => 'approved',
            ],
        ];

        foreach ($tutors as $tutor) {
            Tutor::create($tutor);
        }
    }
}
