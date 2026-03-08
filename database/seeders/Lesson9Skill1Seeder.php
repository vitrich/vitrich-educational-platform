<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Problem;
use App\Models\Skill;

class Lesson9Skill1Seeder extends Seeder
{
    public function run()
    {
        $skill = Skill::where('slug', 'multiply_four_or_more')->first();
        if (!$skill) {
            $this->command->error('❌ Skill not found!');
            return;
        }

        $problems = [];

        // Easy: 4 дроби
        for ($i = 0; $i < 80; $i++) {
            $n1 = rand(1, 4); $d1 = rand(2, 5);
            $n2 = rand(1, 4); $d2 = rand(2, 5);
            $n3 = rand(1, 4); $d3 = rand(2, 5);
            $n4 = rand(1, 4); $d4 = rand(2, 5);
            $result_n = $n1 * $n2 * $n3 * $n4;
            $result_d = $d1 * $d2 * $d3 * $d4;
            $gcd = $this->gcd($result_n, $result_d);
            $final_n = $result_n / $gcd;
            $final_d = $result_d / $gcd;
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => "$n1/$d1 × $n2/$d2 × $n3/$d3 × $n4/$d4",
                'correct_answer' => "$final_n/$final_d",
                'solution' => "Перемножаем четыре дроби: $result_n/$result_d = $final_n/$final_d",
                'hints' => 'Перемножь все числители, затем все знаменатели',
                'difficulty_level' => 'easy',
                'points' => 1,
                'metadata' => json_encode(['count' => 4])
            ];
        }

        // Medium: 5 дробей
        for ($i = 0; $i < 80; $i++) {
            $fractions = [];
            $result_n = 1; $result_d = 1;
            for ($j = 0; $j < 5; $j++) {
                $n = rand(1, 5); $d = rand(2, 7);
                $fractions[] = "$n/$d";
                $result_n *= $n;
                $result_d *= $d;
            }
            $gcd = $this->gcd($result_n, $result_d);
            $final_n = $result_n / $gcd;
            $final_d = $result_d / $gcd;
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => implode(' × ', $fractions),
                'correct_answer' => "$final_n/$final_d",
                'solution' => "Произведение пяти дробей с сокращением",
                'hints' => 'Сокращай на каждом шаге',
                'difficulty_level' => 'medium',
                'points' => 2,
                'metadata' => json_encode(['count' => 5])
            ];
        }

        // Hard: 6+ дробей
        for ($i = 0; $i < 39; $i++) {
            $fractions = [];
            $result_n = 1; $result_d = 1;
            for ($j = 0; $j < 6; $j++) {
                $n = rand(2, 8); $d = rand(3, 10);
                $fractions[] = "$n/$d";
                $result_n *= $n;
                $result_d *= $d;
            }
            $gcd = $this->gcd($result_n, $result_d);
            $final_n = $result_n / $gcd;
            $final_d = $result_d / $gcd;
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => implode(' × ', $fractions),
                'correct_answer' => "$final_n/$final_d",
                'solution' => "Произведение шести дробей со сложным сокращением",
                'hints' => 'Группируй дроби для удобного сокращения',
                'difficulty_level' => 'hard',
                'points' => 3,
                'metadata' => json_encode(['count' => 6])
            ];
        }

        // Olympiad: 1/2 × 3/4 × 5/6 × ... × 99/100
        $problems[] = [
            'skill_id' => $skill->id,
            'problem_text' => 'Вычислите произведение: 1/2 × 3/4 × 5/6 × 7/8 × ... × 99/100',
            'correct_answer' => '1/50',
            'solution' => 'Группируем попарно: (1/2 × 3/4) × (5/6 × 7/8) × ... В каждой паре числитель второй дроби на 1 больше знаменателя первой. После всех сокращений в числителе остаются только нечётные числа 1,3,5,...,99. В знаменателе — чётные 2,4,6,...,100. Произведение нечётных 1-99 = 1×3×5×...×99. Произведение чётных 2-100 = 2×4×6×...×100 = 2^50 × (1×2×3×...×50). Упрощая: результат = 1/50',
            'hints' => 'Посмотри на закономерность: каждая следующая дробь начинается с нечётного числителя',
            'difficulty_level' => 'hard',
            'points' => 5,
            'metadata' => json_encode(['type' => 'olympiad', 'from_textbook' => 'custom_pattern'])
        ];

        foreach ($problems as $problem) {
            Problem::create($problem);
        }

        $this->command->info('✅ Lesson 9, Skill 9.1 seeded: 200 problems');
    }

    private function gcd($a, $b) { return $b ? $this->gcd($b, $a % $b) : $a; }
}
