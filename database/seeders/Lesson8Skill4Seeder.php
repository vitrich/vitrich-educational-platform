<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Problem;
use App\Models\Skill;

class Lesson8Skill4Seeder extends Seeder
{
    public function run()
    {
        $skill = Skill::where('slug', 'multiply_three_fractions')->first();
        if (!$skill) {
            $this->command->error('❌ Skill not found!');
            return;
        }

        $problems = [];

        // Easy: из 4.186
        $easy = [
            ['3/4 × 5/6 × 8/15', '2/3', '4.186А'],
            ['1/2 × 2/3 × 3/4', '1/4', '4.186В'],
        ];

        foreach ($easy as $data) {
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => $data[0],
                'correct_answer' => $data[1],
                'solution' => 'Перемножаем все числители, затем все знаменатели, сокращаем',
                'hints' => 'Можно сокращать крест-накрест на любом этапе',
                'difficulty_level' => 'easy',
                'points' => 1,
                'metadata' => json_encode(['from_textbook' => $data[2]])
            ];
        }

        // Генерация easy (78)
        for ($i = 0; $i < 78; $i++) {
            $n1 = rand(1, 5); $d1 = rand(2, 6);
            $n2 = rand(1, 5); $d2 = rand(2, 6);
            $n3 = rand(1, 5); $d3 = rand(2, 6);
            $result_n = $n1 * $n2 * $n3;
            $result_d = $d1 * $d2 * $d3;
            $gcd = $this->gcd($result_n, $result_d);
            $final_n = $result_n / $gcd;
            $final_d = $result_d / $gcd;
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => "$n1/$d1 × $n2/$d2 × $n3/$d3",
                'correct_answer' => "$final_n/$final_d",
                'solution' => "($n1×$n2×$n3)/($d1×$d2×$d3) = $result_n/$result_d = $final_n/$final_d",
                'hints' => 'Перемножь все числители, затем все знаменатели',
                'difficulty_level' => 'easy',
                'points' => 1,
                'metadata' => json_encode(['type' => 'three_fractions'])
            ];
        }

        // Medium (80): с сокращением
        for ($i = 0; $i < 80; $i++) {
            $n1 = rand(2, 10); $d1 = rand(3, 12);
            $n2 = rand(2, 10); $d2 = rand(3, 12);
            $n3 = rand(2, 10); $d3 = rand(3, 12);
            $result_n = $n1 * $n2 * $n3;
            $result_d = $d1 * $d2 * $d3;
            $gcd = $this->gcd($result_n, $result_d);
            $final_n = $result_n / $gcd;
            $final_d = $result_d / $gcd;
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => "$n1/$d1 × $n2/$d2 × $n3/$d3",
                'correct_answer' => "$final_n/$final_d",
                'solution' => "Сокращение между тремя дробями: $result_n/$result_d = $final_n/$final_d",
                'hints' => 'Ищи общие делители между числителями и знаменателями',
                'difficulty_level' => 'medium',
                'points' => 2,
                'metadata' => json_encode(['type' => 'three_fractions_reduction'])
            ];
        }

        // Hard (39): сложное сокращение
        for ($i = 0; $i < 39; $i++) {
            $n1 = rand(5, 20); $d1 = rand(10, 30);
            $n2 = rand(5, 20); $d2 = rand(10, 30);
            $n3 = rand(5, 20); $d3 = rand(10, 30);
            $result_n = $n1 * $n2 * $n3;
            $result_d = $d1 * $d2 * $d3;
            $gcd = $this->gcd($result_n, $result_d);
            $final_n = $result_n / $gcd;
            $final_d = $result_d / $gcd;
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => "$n1/$d1 × $n2/$d2 × $n3/$d3",
                'correct_answer' => "$final_n/$final_d",
                'solution' => "Сложное сокращение трёх дробей",
                'hints' => 'Сокращай поэтапно, не перемножай сразу большие числа',
                'difficulty_level' => 'hard',
                'points' => 3,
                'metadata' => json_encode(['type' => 'complex_three'])
            ];
        }

        // Olympiad: 6/7 × 7/8 × 8/9 × 9/10 × 10/11 (4.186Г)
        $problems[] = [
            'skill_id' => $skill->id,
            'problem_text' => 'Вычислите: 6/7 × 7/8 × 8/9 × 9/10 × 10/11',
            'correct_answer' => '6/11',
            'solution' => 'Телескопическое сокращение: 7 в числителе 7/8 сокращается с 7 в знаменателе 6/7. Аналогично 8, 9, 10. Остаётся: (6×7×8×9×10)/(7×8×9×10×11) = 6/11',
            'hints' => 'Обрати внимание: числитель каждой следующей дроби = знаменателю предыдущей',
            'difficulty_level' => 'hard',
            'points' => 5,
            'metadata' => json_encode(['type' => 'olympiad', 'from_textbook' => '4.186Г'])
        ];

        foreach ($problems as $problem) {
            Problem::create($problem);
        }

        $this->command->info('✅ Lesson 8, Skill 8.4 seeded: 200 problems');
    }

    private function gcd($a, $b) { return $b ? $this->gcd($b, $a % $b) : $a; }
}
