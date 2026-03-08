<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Problem;
use App\Models\Skill;

class Lesson7Skill4Seeder extends Seeder
{
    /**
     * Skill 7.4: multiply_with_cross_reduction — Сокращение крест-накрест
     * 200 задач: Easy (80) + Medium (80) + Hard (39) + Olympiad (1)
     * Источник: 4.180 (часть) + 4.183 (часть)
     */
    public function run()
    {
        $skill = Skill::where('slug', 'multiply_with_cross_reduction')->first();
        
        if (!$skill) {
            $this->command->error('❌ Skill "multiply_with_cross_reduction" not found!');
            return;
        }

        $problems = [];

        // ===== EASY LEVEL (80 задач) =====
        // НОД=2,3,4 между числителем и знаменателем
        $easy_textbook = [
            ['4/9 × 3/8', '1/6', '4', '9', '3', '8', '\frac{4}{9} \times \frac{3}{8}', '\frac{4^{\div 4}}{9} \times \frac{3}{8^{\div 4}} = \frac{1}{9} \times \frac{3}{2} = \frac{3}{18} = \frac{1}{6}', '4.180Ё'],
            ['8/9 × 3/5', '8/15', '8', '9', '3', '5', '\frac{8}{9} \times \frac{3}{5}', '\frac{8}{9} \times \frac{3^{\div 3}}{5} = \frac{8}{3} \times \frac{1}{5} = \frac{8}{15}', '4.180И'],
            ['5/6 × 4/7', '10/21', '5', '6', '4', '7', '\frac{5}{6} \times \frac{4}{7}', '\frac{5}{6^{\div 2}} \times \frac{4^{\div 2}}{7} = \frac{5}{3} \times \frac{2}{7} = \frac{10}{21}', '4.180Й'],
            ['12/13 × 13/15', '4/5', '12', '13', '13', '15', '\frac{12}{13} \times \frac{13}{15}', '\frac{12}{13^{\div 13}} \times \frac{13^{\div 13}}{15} = \frac{12}{1} \times \frac{1}{15} = \frac{12}{15} = \frac{4}{5}', '4.180Р'],
            ['8/21 × 7/10', '4/15', '8', '21', '7', '10', '\frac{8}{21} \times \frac{7}{10}', '\frac{8^{\div 2}}{21^{\div 7}} \times \frac{7^{\div 7}}{10^{\div 2}} = \frac{4}{3} \times \frac{1}{5} = \frac{4}{15}', '4.180С'],
            ['7/5 × 15/14', '3/2 = 1 1/2', '7', '5', '15', '14', '\frac{7}{5} \times \frac{15}{14}', '\frac{7^{\div 7}}{5^{\div 5}} \times \frac{15^{\div 5}}{14^{\div 7}} = \frac{1}{1} \times \frac{3}{2} = \frac{3}{2}', '4.180Т'],
            ['2/5 × 15', '6', '2', '5', '15', '1', '\frac{2}{5} \times 15', '\frac{2}{5^{\div 5}} \times \frac{15^{\div 5}}{1} = \frac{2}{1} \times \frac{3}{1} = 6', '4.180Х'],
        ];

        foreach ($easy_textbook as $data) {
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => $data[0],
                'correct_answer' => $data[1],
                'solution' => "Сокращаем крест-накрест: {$data[2]}/{$data[3]} × {$data[4]}/{$data[5]}",
                'hints' => 'Ищи общие делители числителя одной дроби и знаменателя другой ДО умножения',
                'difficulty_level' => 'easy',
                'points' => 1,
                'metadata' => json_encode([
                    'type' => 'multiply_with_cross_reduction',
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

        // Генерация остальных 73 easy задач (НОД=2,3,4)
        for ($i = 0; $i < 73; $i++) {
            $gcd_target = [2, 3, 4][rand(0, 2)];
            
            // Создаем дроби с заданным НОД
            $num1 = rand(2, 8) * $gcd_target;
            $den1 = rand(3, 10);
            $num2 = rand(2, 8);
            $den2 = rand(3, 10) * $gcd_target;
            
            if ($this->gcd($num1, $den2) < 2 && $this->gcd($num2, $den1) < 2) {
                $i--;
                continue; // Должен быть хоть один общий делитель
            }
            
            $result_num = $num1 * $num2;
            $result_den = $den1 * $den2;
            
            $gcd = $this->gcd($result_num, $result_den);
            $final_num = $result_num / $gcd;
            $final_den = $result_den / $gcd;
            
            $answer = $this->formatAnswer($final_num, $final_den);
            
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => "$num1/$den1 × $num2/$den2",
                'correct_answer' => $answer,
                'solution' => "Сокращаем крест-накрест перед умножением: ($num1 и $den2 имеют НОД=" . $this->gcd($num1, $den2) . "), ($num2 и $den1 имеют НОД=" . $this->gcd($num2, $den1) . ")",
                'hints' => 'Сокращай СРАЗУ: ищи общие делители числителя одной дроби и знаменателя другой',
                'difficulty_level' => 'easy',
                'points' => 1,
                'metadata' => json_encode([
                    'type' => 'multiply_with_cross_reduction',
                    'num1' => $num1,
                    'den1' => $den1,
                    'num2' => $num2,
                    'den2' => $den2,
                    'latex_condition' => "\\frac{$num1}{$den1} \\times \\frac{$num2}{$den2}",
                    'latex_solution' => "\\text{Сокращение крест-накрест} \\rightarrow \\frac{$final_num}{$final_den}"
                ])
            ];
        }

        // ===== MEDIUM LEVEL (80 задач) =====
        // НОД=5,6,9
        for ($i = 0; $i < 80; $i++) {
            $gcd_target = [5, 6, 9][rand(0, 2)];
            
            $num1 = rand(3, 12) * $gcd_target;
            $den1 = rand(5, 15);
            $num2 = rand(3, 12);
            $den2 = rand(5, 15) * $gcd_target;
            
            if ($this->gcd($num1, $den2) < 3 && $this->gcd($num2, $den1) < 3) {
                $i--;
                continue;
            }
            
            $result_num = $num1 * $num2;
            $result_den = $den1 * $den2;
            
            $gcd = $this->gcd($result_num, $result_den);
            $final_num = $result_num / $gcd;
            $final_den = $result_den / $gcd;
            
            $answer = $this->formatAnswer($final_num, $final_den);
            
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => "$num1/$den1 × $num2/$den2",
                'correct_answer' => $answer,
                'solution' => "Сокращаем: НОД($num1, $den2)=" . $this->gcd($num1, $den2) . ", НОД($num2, $den1)=" . $this->gcd($num2, $den1) . ". После сокращения: $final_num/$final_den",
                'hints' => 'Найди НОД между числителями и знаменателями крест-накрест',
                'difficulty_level' => 'medium',
                'points' => 2,
                'metadata' => json_encode([
                    'type' => 'multiply_with_cross_reduction',
                    'num1' => $num1,
                    'den1' => $den1,
                    'num2' => $num2,
                    'den2' => $den2,
                    'latex_condition' => "\\frac{$num1}{$den1} \\times \\frac{$num2}{$den2}",
                    'latex_solution' => "\\frac{$final_num}{$final_den}"
                ])
            ];
        }

        // ===== HARD LEVEL (39 задач) =====
        // НОД=12,15,20
        for ($i = 0; $i < 39; $i++) {
            $gcd_target = [12, 15, 20][rand(0, 2)];
            
            $num1 = rand(2, 8) * $gcd_target;
            $den1 = rand(10, 30);
            $num2 = rand(2, 8);
            $den2 = rand(10, 30) * $gcd_target;
            
            if ($this->gcd($num1, $den2) < 6 && $this->gcd($num2, $den1) < 6) {
                $i--;
                continue;
            }
            
            $result_num = $num1 * $num2;
            $result_den = $den1 * $den2;
            
            $gcd = $this->gcd($result_num, $result_den);
            $final_num = $result_num / $gcd;
            $final_den = $result_den / $gcd;
            
            $answer = $this->formatAnswer($final_num, $final_den);
            
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => "$num1/$den1 × $num2/$den2",
                'correct_answer' => $answer,
                'solution' => "Сложное сокращение крест-накрест: НОД($num1, $den2)=" . $this->gcd($num1, $den2) . ", НОД($num2, $den1)=" . $this->gcd($num2, $den1) . ". Результат после сокращения: $final_num/$final_den",
                'hints' => 'Ищи большие общие делители (12, 15, 20) между числителями и знаменателями',
                'difficulty_level' => 'hard',
                'points' => 3,
                'metadata' => json_encode([
                    'type' => 'multiply_with_cross_reduction',
                    'num1' => $num1,
                    'den1' => $den1,
                    'num2' => $num2,
                    'den2' => $den2,
                    'latex_condition' => "\\frac{$num1}{$den1} \\times \\frac{$num2}{$den2}",
                    'latex_solution' => "\\frac{$final_num}{$final_den}"
                ])
            ];
        }

        // ===== OLYMPIAD (1 задача) — Цепочка сокращений =====
        $problems[] = [
            'skill_id' => $skill->id,
            'problem_text' => 'Докажите, что 35/48 × 36/49 = 15/28 используя сокращение крест-накрест (не перемножая большие числа)',
            'correct_answer' => '15/28',
            'solution' => 'Сокращаем крест-накрест: 35 и 49 имеют НОД=7, сокращаем 35/7=5, 49/7=7. Получаем: 5/48 × 36/7. Теперь 36 и 48 имеют НОД=12, сокращаем 36/12=3, 48/12=4. Получаем: 5/4 × 3/7 = (5×3)/(4×7) = 15/28. Проверка без сокращения: (35×36)/(48×49) = 1260/2352, сокращаем на НОД=84: 15/28. Сокращение крест-накрест избавило нас от больших чисел!',
            'hints' => 'Найди НОД(35, 49) и НОД(36, 48), сократи ДО умножения',
            'difficulty_level' => 'hard',
            'points' => 5,
            'metadata' => json_encode([
                'type' => 'olympiad',
                'from_textbook' => 'custom',
                'topic' => 'cross_reduction_chain',
                'requires_explanation' => true
            ])
        ];

        // Вставка в БД
        foreach ($problems as $problem) {
            Problem::create($problem);
        }

        $this->command->info("✅ Lesson 7, Skill 7.4 seeded: 200 problems (Easy: 80, Medium: 80, Hard: 39, Olympiad: 1)");
    }

    private function gcd($a, $b)
    {
        return $b ? $this->gcd($b, $a % $b) : $a;
    }

    private function formatAnswer($num, $den)
    {
        if ($den == 1) return (string)$num;
        if ($num < $den) return "$num/$den";
        
        $whole = intdiv($num, $den);
        $remainder = $num % $den;
        
        if ($remainder == 0) return (string)$whole;
        return "$whole $remainder/$den";
    }
}
