<?php

namespace Database\Seeders;

use App\Models\AssessmentQuestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssessmentQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'question' => 'How would you rate your overall mood over the past week?',
                'type' => 'scale',
                'options' => null,
                'order' => 1,
            ],
            [
                'question' => 'How well have you been sleeping?',
                'type' => 'scale',
                'options' => null,
                'order' => 2,
            ],
            [
                'question' => 'How would you rate your stress level?',
                'type' => 'scale',
                'options' => null,
                'order' => 3,
            ],
            [
                'question' => 'How would you rate your ability to concentrate?',
                'type' => 'scale',
                'options' => null,
                'order' => 4,
            ],
            [
                'question' => 'How often have you felt down or hopeless?',
                'type' => 'scale',
                'options' => null,
                'order' => 5,
            ],
            [
                'question' => 'How would you rate your energy levels?',
                'type' => 'scale',
                'options' => null,
                'order' => 6,
            ],
            [
                'question' => 'How would you rate your interest in activities you usually enjoy?',
                'type' => 'scale',
                'options' => null,
                'order' => 7,
            ],
            [
                'question' => 'How would you rate your social interactions?',
                'type' => 'scale',
                'options' => null,
                'order' => 8,
            ],
            [
                'question' => 'How would you rate your ability to manage daily responsibilities?',
                'type' => 'scale',
                'options' => null,
                'order' => 9,
            ],
            [
                'question' => 'How would you rate your overall satisfaction with life?',
                'type' => 'scale',
                'options' => null,
                'order' => 10,
            ],
        ];

        foreach ($questions as $question) {
            AssessmentQuestion::create($question);
        }
    }
}
