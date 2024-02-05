<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Question::create([
            'label' => "Combien de chats avez-vous ?",
            'type' => 'libre',
        ]);

        Question::create([
            'label' => "Si oui, quel age a-t-il ?",
            'type' => 'libre',
        ]);
    }
}
