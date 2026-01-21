<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $subjects = [
            'Mathematics',
            'Physics',
            'Chemistry',
            'Biology',
            'English',
            'Spanish',
            'French',
            'History',
            'Computer Science',
            'Music',
            'Art',
            'Business'
        ];

        foreach ($subjects as $subject) {
            Subject::create(['name' => $subject]);
        }
    }
}
