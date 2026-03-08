<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Problem;
use App\Models\Skill;

class Lesson8Skill3Seeder extends Seeder
{
    public function run()
    {
        $skill = Skill::where('slug', 'fraction_power')->first();
        if (!$skill) {
            $this->command->error('❌ Skill not found!');
            return;
        }

        $problems = [];

        // Easy: из 4.185
        $easy = [
            ['(1/2)²', '1/4', '4.185А'],
            ['(1/2)³', '1/8', '4.185Б'],
            ['(1/2)⁴', '1/16', '4.185В'],
            ['(2/3)³', '8/27', '4.185Г'],
            ['(4/5)²', '16/25', '4.185Д'],
            ['(1 1/2)²', '9/4 = 2 1/4', '4.185Е'],
            ['(1/3)²', '1/9', '4.185З'],
        ];

        foreach ($easy as $data) {
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => $data[0],
                'correct_answer' => $data[1],
                'solution' => 'Возводим числитель и знаменатель в степень отдельно',
                'hints' => '(a/b)^n = a^n / b^n',
                'difficulty_level' => 'easy',
                'points' => 1,
                'metadata' => json_encode(['from_textbook' => $data[2]])
            ];
        }

        // Генерация easy (73)
        for ($i = 0; $i < 73; $i++) {
            $num = rand(1, 5);
            $den = rand(2, 6);
            $power = rand(2, 3);
            $result_num = pow($num, $power);
            $result_den = pow($den, $power);
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => "($num/$den)^$power",
                'correct_answer' => "$result_num/$result_den",
                'solution' => "($num/$den)^$power = $num^$power / $den^$power = $result_num/$result_den",
                'hints' => 'Возведи числитель и знаменатель в степень отдельно',
                'difficulty_level' => 'easy',
                'points' => 1,
                'metadata' => json_encode(['power' => $power])
            ];
        }

        // Medium (80): степени 3-4
        for ($i = 0; $i < 80; $i++) {
            $num = rand(2, 7);
            $den = rand(3, 10);
            $power = rand(3, 4);
            $result_num = pow($num, $power);
            $result_den = pow($den, $power);
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => "($num/$den)^$power",
                'correct_answer' => "$result_num/$result_den",
                'solution' => "$num^$power = $result_num, $den^$power = $result_den",
                'hints' => 'Вычисли степени числителя и знаменателя',
                'difficulty_level' => 'medium',
                'points' => 2,
                'metadata' => json_encode(['power' => $power])
            ];
        }

        // Hard (39): степени 4-5, смешанные
        for ($i = 0; $i < 39; $i++) {
            $whole = rand(1, 3);
            $num = rand(1, 4);
            $den = rand(2, 5);
            $power = rand(2, 3);
            $improper = $whole * $den + $num;
            $result_num = pow($improper, $power);
            $result_den = pow($den, $power);
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => "($whole $num/$den)^$power",
                'correct_answer' => "$result_num/$result_den",
                'solution' => "Преобразуем: $whole $num/$den = $improper/$den, затем ($improper/$den)^$power = $result_num/$result_den",
                'hints' => 'Сначала преобразуй смешанное число в неправильную дробь',
                'difficulty_level' => 'hard',
                'points' => 3,
                'metadata' => json_encode(['power' => $power])
            ];
        }

        // Olympiad: (1/2)^10
        $problems[] = [
            'skill_id' => $skill->id,
            'problem_text' => 'Вычислите (1/2)^10 без калькулятора',
            'correct_answer' => '1/1024',
            'solution' => '(1/2)^10 = 1^10 / 2^10 = 1 / 1024. Проверка: 2^10 = 2^5 × 2^5 = 32 × 32 = 1024',
            'hints' => '2^10 = (2^5)^2, а 2^5 = 32',
            'difficulty_level' => 'hard',
            'points' => 5,
            'metadata' => json_encode(['type' => 'olympiad', 'from_textbook' => 'custom'])
        ];

        foreach ($problems as $problem) {
            Problem::create($problem);
        }

        $this->command->info('✅ Lesson 8, Skill 8.3 seeded: 200 problems');
    }
}
