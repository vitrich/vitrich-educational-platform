<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Problem;
use App\Models\Skill;

class Lesson7Skill3Seeder extends Seeder
{
    /**
     * Skill 7.3: multiply_proper_fractions — Дробь × дробь (простые)
     * 200 задач: Easy (80) + Medium (80) + Hard (39) + Olympiad (1)
     * Источник: 4.179 (10) + 4.180 (21) = 31 из сборника
     */
    public function run()
    {
        $skill = Skill::where('slug', 'multiply_proper_fractions')->first();
        
        if (!$skill) {
            $this->command->error('❌ Skill "multiply_proper_fractions" not found!');
            return;
        }

        $problems = [];

        // ===== EASY LEVEL (80 задач) =====
        $easy_textbook = [
            ['1/2 × 1/3', '1/6', '1', '2', '1', '3', '\frac{1}{2} \times \frac{1}{3}', '\frac{1 \times 1}{2 \times 3} = \frac{1}{6}', '4.179А'],
            ['1/3 × 1/2', '1/6', '1', '3', '1', '2', '\frac{1}{3} \times \frac{1}{2}', '\frac{1 \times 1}{3 \times 2} = \frac{1}{6}', '4.179Б'],
            ['1/3 × 1/5', '1/15', '1', '3', '1', '5', '\frac{1}{3} \times \frac{1}{5}', '\frac{1 \times 1}{3 \times 5} = \frac{1}{15}', '4.179В'],
            ['1/6 × 1/2', '1/12', '1', '6', '1', '2', '\frac{1}{6} \times \frac{1}{2}', '\frac{1 \times 1}{6 \times 2} = \frac{1}{12}', '4.179Г'],
            ['2/3 × 1/3', '2/9', '2', '3', '1', '3', '\frac{2}{3} \times \frac{1}{3}', '\frac{2 \times 1}{3 \times 3} = \frac{2}{9}', '4.179Д'],
            ['3/4 × 1/5', '3/20', '3', '4', '1', '5', '\frac{3}{4} \times \frac{1}{5}', '\frac{3 \times 1}{4 \times 5} = \frac{3}{20}', '4.179Е'],
            ['5/6 × 1/5', '1/6', '5', '6', '1', '5', '\frac{5}{6} \times \frac{1}{5}', '\frac{5 \times 1}{6 \times 5} = \frac{5}{30} = \frac{1}{6}', '4.179Ж'],
            ['2/3 × 5/7', '10/21', '2', '3', '5', '7', '\frac{2}{3} \times \frac{5}{7}', '\frac{2 \times 5}{3 \times 7} = \frac{10}{21}', '4.179З'],
            ['1/7 × 1/2', '1/14', '1', '7', '1', '2', '\frac{1}{7} \times \frac{1}{2}', '\frac{1 \times 1}{7 \times 2} = \frac{1}{14}', '4.179И'],
            ['1/3 × 2/7', '2/21', '1', '3', '2', '7', '\frac{1}{3} \times \frac{2}{7}', '\frac{1 \times 2}{3 \times 7} = \frac{2}{21}', '4.180А'],
            ['1/2 × 5/6', '5/12', '1', '2', '5', '6', '\frac{1}{2} \times \frac{5}{6}', '\frac{1 \times 5}{2 \times 6} = \frac{5}{12}', '4.180Б'],
            ['3/4 × 1/4', '3/16', '3', '4', '1', '4', '\frac{3}{4} \times \frac{1}{4}', '\frac{3 \times 1}{4 \times 4} = \frac{3}{16}', '4.180В'],
            ['8/9 × 1/3', '8/27', '8', '9', '1', '3', '\frac{8}{9} \times \frac{1}{3}', '\frac{8 \times 1}{9 \times 3} = \frac{8}{27}', '4.180Г'],
            ['3/5 × 1/2', '3/10', '3', '5', '1', '2', '\frac{3}{5} \times \frac{1}{2}', '\frac{3 \times 1}{5 \times 2} = \frac{3}{10}', '4.180Д'],
            ['1/2 × 1/3', '1/6', '1', '2', '1', '3', '\frac{1}{2} \times \frac{1}{3}', '\frac{1 \times 1}{2 \times 3} = \frac{1}{6}', '4.180Е'],
            ['2/3 × 7/5', '14/15', '2', '3', '7', '5', '\frac{2}{3} \times \frac{7}{5}', '\frac{2 \times 7}{3 \times 5} = \frac{14}{15}', '4.180Ж'],
            ['4/5 × 5/7', '4/7', '4', '5', '5', '7', '\frac{4}{5} \times \frac{5}{7}', '\frac{4 \times 5}{5 \times 7} = \frac{20}{35} = \frac{4}{7}', '4.180З'],
            ['3/7 × 2/3', '2/7', '3', '7', '2', '3', '\frac{3}{7} \times \frac{2}{3}', '\frac{3 \times 2}{7 \times 3} = \frac{6}{21} = \frac{2}{7}', '4.180К'],
            ['2/3 × 5/8', '5/12', '2', '3', '5', '8', '\frac{2}{3} \times \frac{5}{8}', '\frac{2 \times 5}{3 \times 8} = \frac{10}{24} = \frac{5}{12}', '4.180Л'],
            ['3/4 × 2/9', '1/6', '3', '4', '2', '9', '\frac{3}{4} \times \frac{2}{9}', '\frac{3 \times 2}{4 \times 9} = \frac{6}{36} = \frac{1}{6}', '4.180П'],
        ];

        foreach ($easy_textbook as $data) {
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => $data[0],
                'correct_answer' => $data[1],
                'solution' => "Перемножаем числители и знаменатели: ({$data[2]} × {$data[4]}) / ({$data[3]} × {$data[5]})",
                'hints' => 'Числители умножаем отдельно, знаменатели отдельно',
                'difficulty_level' => 'easy',
                'points' => 1,
                'metadata' => json_encode([
                    'type' => 'multiply_proper_fractions',
                    'num1' => (int)$data[2],
                    'den1' => (int)$data[3],
                    'num2' => (int)$data[4],
                    'den2' => (int)$data[5],
                    'latex_condition' => $data[6],
                    'latex_solution' => $data[7],
                    'from_textbook' => $data[8]
                ])
            ];
        }

        // Генерация остальных 60 easy задач
        for ($i = 0; $i < 60; $i++) {
            $num1 = rand(1, 5);
            $den1 = rand(2, 6);
            $num2 = rand(1, 5);
            $den2 = rand(2, 6);
            
            if ($num1 >= $den1 || $num2 >= $den2) continue; // Только правильные
            
            $result_num = $num1 * $num2;
            $result_den = $den1 * $den2;
            
            $gcd = $this->gcd($result_num, $result_den);
            $final_num = $result_num / $gcd;
            $final_den = $result_den / $gcd;
            
            $answer = "$final_num/$final_den";
            
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => "$num1/$den1 × $num2/$den2",
                'correct_answer' => $answer,
                'solution' => "Перемножаем: ($num1 × $num2) / ($den1 × $den2) = $result_num/$result_den" . ($gcd > 1 ? ", сокращаем: $final_num/$final_den" : ""),
                'hints' => 'Перемножь числители, затем знаменатели',
                'difficulty_level' => 'easy',
                'points' => 1,
                'metadata' => json_encode([
                    'type' => 'multiply_proper_fractions',
                    'num1' => $num1,
                    'den1' => $den1,
                    'num2' => $num2,
                    'den2' => $den2,
                    'latex_condition' => "\\frac{$num1}{$den1} \\times \\frac{$num2}{$den2}",
                    'latex_solution' => "\\frac{$num1 \\times $num2}{$den1 \\times $den2} = \\frac{$result_num}{$result_den}" . ($gcd > 1 ? " = \\frac{$final_num}{$final_den}" : "")
                ])
            ];
        }

        // ===== MEDIUM LEVEL (80 задач) =====
        for ($i = 0; $i < 80; $i++) {
            $num1 = rand(3, 12);
            $den1 = rand(5, 20);
            $num2 = rand(3, 12);
            $den2 = rand(5, 20);
            
            if ($num1 >= $den1 || $num2 >= $den2) {
                $i--;
                continue;
            }
            
            $result_num = $num1 * $num2;
            $result_den = $den1 * $den2;
            
            $gcd = $this->gcd($result_num, $result_den);
            $final_num = $result_num / $gcd;
            $final_den = $result_den / $gcd;
            
            $answer = "$final_num/$final_den";
            
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => "$num1/$den1 × $num2/$den2",
                'correct_answer' => $answer,
                'solution' => "Перемножаем: ($num1 × $num2) / ($den1 × $den2) = $result_num/$result_den, сокращаем: $final_num/$final_den",
                'hints' => 'После умножения обязательно сократи результат',
                'difficulty_level' => 'medium',
                'points' => 2,
                'metadata' => json_encode([
                    'type' => 'multiply_proper_fractions',
                    'num1' => $num1,
                    'den1' => $den1,
                    'num2' => $num2,
                    'den2' => $den2,
                    'latex_condition' => "\\frac{$num1}{$den1} \\times \\frac{$num2}{$den2}",
                    'latex_solution' => "\\frac{$num1 \\times $num2}{$den1 \\times $den2} = \\frac{$result_num}{$result_den} = \\frac{$final_num}{$final_den}"
                ])
            ];
        }

        // ===== HARD LEVEL (39 задач) =====
        for ($i = 0; $i < 39; $i++) {
            $num1 = rand(8, 25);
            $den1 = rand(10, 50);
            $num2 = rand(8, 25);
            $den2 = rand(10, 50);
            
            if ($num1 >= $den1 || $num2 >= $den2) {
                $i--;
                continue;
            }
            
            $result_num = $num1 * $num2;
            $result_den = $den1 * $den2;
            
            $gcd = $this->gcd($result_num, $result_den);
            $final_num = $result_num / $gcd;
            $final_den = $result_den / $gcd;
            
            $answer = "$final_num/$final_den";
            
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => "$num1/$den1 × $num2/$den2",
                'correct_answer' => $answer,
                'solution' => "Перемножаем: ($num1 × $num2) / ($den1 × $den2) = $result_num/$result_den. Сокращаем на НОД($result_num, $result_den) = $gcd. Результат: $final_num/$final_den",
                'hints' => 'Ищи общий делитель числителя и знаменателя после умножения',
                'difficulty_level' => 'hard',
                'points' => 3,
                'metadata' => json_encode([
                    'type' => 'multiply_proper_fractions',
                    'num1' => $num1,
                    'den1' => $den1,
                    'num2' => $num2,
                    'den2' => $den2,
                    'latex_condition' => "\\frac{$num1}{$den1} \\times \\frac{$num2}{$den2}",
                    'latex_solution' => "\\frac{$num1 \\times $num2}{$den1 \\times $den2} = \\frac{$result_num}{$result_den} = \\frac{$final_num}{$final_den}"
                ])
            ];
        }

        // ===== OLYMPIAD (1 задача) — Телескопическое произведение =====
        $problems[] = [
            'skill_id' => $skill->id,
            'problem_text' => 'Вычислите: 1/2 × 2/3 × 3/4 × 4/5 × ... × 23/24 × 24/25',
            'correct_answer' => '1/25',
            'solution' => 'Телескопическое сокращение: в произведении числитель 2 в дроби 2/3 сокращается со знаменателем 2 в дроби 1/2. Числитель 3 в 3/4 сокращается со знаменателем 3 в 2/3. Таким образом, все числа от 2 до 24 сокращаются. Остается: (1 × 2 × 3 × ... × 24) / (2 × 3 × 4 × ... × 25) = 1/25',
            'hints' => 'Обрати внимание: числитель каждой следующей дроби совпадает со знаменателем предыдущей',
            'difficulty_level' => 'hard',
            'points' => 5,
            'metadata' => json_encode([
                'type' => 'olympiad',
                'from_textbook' => '4.186Д',
                'topic' => 'telescopic_product',
                'requires_explanation' => true
            ])
        ];

        // Вставка в БД
        foreach ($problems as $problem) {
            Problem::create($problem);
        }

        $this->command->info("✅ Lesson 7, Skill 7.3 seeded: 200 problems (Easy: 80, Medium: 80, Hard: 39, Olympiad: 1)");
    }

    private function gcd($a, $b)
    {
        return $b ? $this->gcd($b, $a % $b) : $a;
    }
}
