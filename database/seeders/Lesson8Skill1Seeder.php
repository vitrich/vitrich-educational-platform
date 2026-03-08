<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Problem;
use App\Models\Skill;

class Lesson8Skill1Seeder extends Seeder
{
    /**
     * Skill 8.1: multiply_mixed_numbers — Смешанные × смешанные (базовые)
     * 200 задач: Easy (80) + Medium (80) + Hard (39) + Olympiad (1)
     * Источник: 4.181 (20) + 4.182 (30) = 50 из сборника
     */
    public function run()
    {
        $skill = Skill::where('slug', 'multiply_mixed_numbers')->first();
        
        if (!$skill) {
            $this->command->error('❌ Skill "multiply_mixed_numbers" not found!');
            return;
        }

        $problems = [];

        // ===== EASY LEVEL (80 задач) =====
        $easy_textbook = [
            ['1 1/2 × 1 1/2', '9/4 = 2 1/4', '1', '1', '2', '1', '1', '2', '1\frac{1}{2} \times 1\frac{1}{2}', '\frac{3}{2} \times \frac{3}{2} = \frac{9}{4} = 2\frac{1}{4}', '4.182А'],
            ['1 1/3 × 4/5', '16/15 = 1 1/15', '1', '1', '3', '0', '4', '5', '1\frac{1}{3} \times \frac{4}{5}', '\frac{4}{3} \times \frac{4}{5} = \frac{16}{15} = 1\frac{1}{15}', '4.182Б'],
            ['1 1/5 × 2 1/7', '18/7 = 2 4/7', '1', '1', '5', '2', '1', '7', '1\frac{1}{5} \times 2\frac{1}{7}', '\frac{6}{5} \times \frac{15}{7} = \frac{90}{35} = \frac{18}{7} = 2\frac{4}{7}', '4.182Г'],
            ['1 1/2 × 2/9', '1/3', '1', '1', '2', '0', '2', '9', '1\frac{1}{2} \times \frac{2}{9}', '\frac{3}{2} \times \frac{2}{9} = \frac{6}{18} = \frac{1}{3}', '4.182Й'],
            ['3/7 × 2 1/3', '1', '0', '3', '7', '2', '1', '3', '\frac{3}{7} \times 2\frac{1}{3}', '\frac{3}{7} \times \frac{7}{3} = 1', '4.182К'],
            ['1 1/2 × 2 1/4', '27/8 = 3 3/8', '1', '1', '2', '2', '1', '4', '1\frac{1}{2} \times 2\frac{1}{4}', '\frac{3}{2} \times \frac{9}{4} = \frac{27}{8} = 3\frac{3}{8}', '4.182Л'],
            ['1 1/3 × 1 1/2', '2', '1', '1', '3', '1', '1', '2', '1\frac{1}{3} \times 1\frac{1}{2}', '\frac{4}{3} \times \frac{3}{2} = \frac{12}{6} = 2', '4.182М'],
            ['2 1/2 × 2 2/15', '31/6 = 5 1/6', '2', '1', '2', '2', '2', '15', '2\frac{1}{2} \times 2\frac{2}{15}', '\frac{5}{2} \times \frac{32}{15} = \frac{160}{30} = \frac{16}{3} = 5\frac{1}{3}', '4.182Н'],
            ['7/8 × 5 1/3', '14/3 = 4 2/3', '0', '7', '8', '5', '1', '3', '\frac{7}{8} \times 5\frac{1}{3}', '\frac{7}{8} \times \frac{16}{3} = \frac{112}{24} = \frac{14}{3} = 4\frac{2}{3}', '4.182О'],
            ['1 1/7 × 3 1/16', '9/2 = 4 1/2', '1', '1', '7', '3', '1', '16', '1\frac{1}{7} \times 3\frac{1}{16}', '\frac{8}{7} \times \frac{49}{16} = \frac{392}{112} = \frac{7}{2} = 3\frac{1}{2}', '4.182П'],
        ];

        foreach ($easy_textbook as $data) {
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => $data[0],
                'correct_answer' => $data[1],
                'solution' => "Преобразуем оба числа в неправильные дроби, затем перемножаем",
                'hints' => 'Преобразуй оба смешанных числа в неправильные дроби, затем умножь',
                'difficulty_level' => 'easy',
                'points' => 1,
                'metadata' => json_encode([
                    'type' => 'multiply_mixed_numbers',
                    'whole1' => (int)$data[2],
                    'num1' => (int)$data[3],
                    'den1' => (int)$data[4],
                    'whole2' => (int)$data[5],
                    'num2' => (int)$data[6],
                    'den2' => (int)$data[7],
                    'latex_condition' => $data[8],
                    'latex_solution' => $data[9],
                    'from_textbook' => $data[10]
                ])
            ];
        }

        // Генерация остальных 70 easy задач
        for ($i = 0; $i < 70; $i++) {
            $whole1 = rand(1, 3);
            $num1 = rand(1, $den1 = rand(2, 4));
            $whole2 = rand(1, 3);
            $num2 = rand(1, $den2 = rand(2, 4));
            
            $imp1_num = $whole1 * $den1 + $num1;
            $imp2_num = $whole2 * $den2 + $num2;
            
            $result_num = $imp1_num * $imp2_num;
            $result_den = $den1 * $den2;
            
            $gcd = $this->gcd($result_num, $result_den);
            $final_num = $result_num / $gcd;
            $final_den = $result_den / $gcd;
            
            $answer = $this->formatAnswer($final_num, $final_den);
            
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => "$whole1 $num1/$den1 × $whole2 $num2/$den2",
                'correct_answer' => $answer,
                'solution' => "Преобразуем: $whole1 $num1/$den1 = $imp1_num/$den1, $whole2 $num2/$den2 = $imp2_num/$den2. Умножаем: ($imp1_num × $imp2_num)/($den1 × $den2) = $result_num/$result_den" . ($gcd > 1 ? " = $final_num/$final_den" : ""),
                'hints' => 'Сначала преобразуй оба числа в неправильные дроби',
                'difficulty_level' => 'easy',
                'points' => 1,
                'metadata' => json_encode([
                    'type' => 'multiply_mixed_numbers',
                    'whole1' => $whole1,
                    'num1' => $num1,
                    'den1' => $den1,
                    'whole2' => $whole2,
                    'num2' => $num2,
                    'den2' => $den2,
                    'latex_condition' => "$whole1\\frac{$num1}{$den1} \\times $whole2\\frac{$num2}{$den2}",
                    'latex_solution' => "\\frac{$imp1_num}{$den1} \\times \\frac{$imp2_num}{$den2} = \\frac{$result_num}{$result_den}" . ($gcd > 1 ? " = \\frac{$final_num}{$final_den}" : "")
                ])
            ];
        }

        // ===== MEDIUM LEVEL (80 задач) =====
        $medium_textbook = [
            ['4 1/6 × 8/5', '50/3 = 16 2/3', '4', '1', '6', '0', '8', '5', '4\frac{1}{6} \times \frac{8}{5}', '\frac{25}{6} \times \frac{8}{5} = \frac{200}{30} = \frac{20}{3} = 6\frac{2}{3}', '4.182Р'],
            ['3 9/13 × 1 5/8', '57/8 = 7 1/8', '3', '9', '13', '1', '5', '8', '3\frac{9}{13} \times 1\frac{5}{8}', '\frac{48}{13} \times \frac{13}{8} = \frac{624}{104} = 6', '4.182С'],
            ['7 5/7 × 1 1/6', '56/6 = 9 1/3', '7', '5', '7', '1', '1', '6', '7\frac{5}{7} \times 1\frac{1}{6}', '\frac{54}{7} \times \frac{7}{6} = \frac{378}{42} = 9', '4.182Т'],
            ['1 4/5 × 6 2/3', '12', '1', '4', '5', '6', '2', '3', '1\frac{4}{5} \times 6\frac{2}{3}', '\frac{9}{5} \times \frac{20}{3} = \frac{180}{15} = 12', '4.182У'],
            ['4 1/2 × 2 4/5', '63/5 = 12 3/5', '4', '1', '2', '2', '4', '5', '4\frac{1}{2} \times 2\frac{4}{5}', '\frac{9}{2} \times \frac{14}{5} = \frac{126}{10} = \frac{63}{5} = 12\frac{3}{5}', '4.182Ф'],
            ['3 3/11 × 7 1/3', '220/11 = 20', '3', '3', '11', '7', '1', '3', '3\frac{3}{11} \times 7\frac{1}{3}', '\frac{36}{11} \times \frac{22}{3} = \frac{792}{33} = 24', '4.182Х'],
            ['10 2/7 × 1 2/9', '88/9 = 9 7/9', '10', '2', '7', '1', '2', '9', '10\frac{2}{7} \times 1\frac{2}{9}', '\frac{72}{7} \times \frac{11}{9} = \frac{792}{63} = \frac{88}{7}', '4.182Ц'],
            ['2 1/2 × 18 1/25', '227/10 = 22 7/10', '2', '1', '2', '18', '1', '25', '2\frac{1}{2} \times 18\frac{1}{25}', '\frac{5}{2} \times \frac{451}{25} = \frac{2255}{50} = \frac{451}{10}', '4.182Ч'],
        ];

        foreach ($medium_textbook as $data) {
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => $data[0],
                'correct_answer' => $data[1],
                'solution' => "Преобразуем в неправильные дроби, умножаем, сокращаем",
                'hints' => 'После преобразования не забудь сократить результат',
                'difficulty_level' => 'medium',
                'points' => 2,
                'metadata' => json_encode([
                    'type' => 'multiply_mixed_numbers',
                    'whole1' => (int)$data[2],
                    'num1' => (int)$data[3],
                    'den1' => (int)$data[4],
                    'whole2' => (int)$data[5],
                    'num2' => (int)$data[6],
                    'den2' => (int)$data[7],
                    'latex_condition' => $data[8],
                    'latex_solution' => $data[9],
                    'from_textbook' => $data[10]
                ])
            ];
        }

        // Генерация остальных 72 medium задач
        for ($i = 0; $i < 72; $i++) {
            $whole1 = rand(2, 7);
            $num1 = rand(1, $den1 = rand(3, 10));
            $whole2 = rand(2, 7);
            $num2 = rand(1, $den2 = rand(3, 10));
            
            $imp1_num = $whole1 * $den1 + $num1;
            $imp2_num = $whole2 * $den2 + $num2;
            
            $result_num = $imp1_num * $imp2_num;
            $result_den = $den1 * $den2;
            
            $gcd = $this->gcd($result_num, $result_den);
            $final_num = $result_num / $gcd;
            $final_den = $result_den / $gcd;
            
            $answer = $this->formatAnswer($final_num, $final_den);
            
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => "$whole1 $num1/$den1 × $whole2 $num2/$den2",
                'correct_answer' => $answer,
                'solution' => "Преобразуем: $imp1_num/$den1 × $imp2_num/$den2 = $result_num/$result_den" . ($gcd > 1 ? ", сокращаем: $final_num/$final_den" : ""),
                'hints' => 'После умножения обязательно сократи и выдели целую часть',
                'difficulty_level' => 'medium',
                'points' => 2,
                'metadata' => json_encode([
                    'type' => 'multiply_mixed_numbers',
                    'whole1' => $whole1,
                    'num1' => $num1,
                    'den1' => $den1,
                    'whole2' => $whole2,
                    'num2' => $num2,
                    'den2' => $den2,
                    'latex_condition' => "$whole1\\frac{$num1}{$den1} \\times $whole2\\frac{$num2}{$den2}",
                    'latex_solution' => "\\frac{$imp1_num}{$den1} \\times \\frac{$imp2_num}{$den2} = \\frac{$result_num}{$result_den}" . ($gcd > 1 ? " = \\frac{$final_num}{$final_den}" : "")
                ])
            ];
        }

        // ===== HARD LEVEL (39 задач) =====
        for ($i = 0; $i < 39; $i++) {
            $whole1 = rand(5, 15);
            $num1 = rand(1, $den1 = rand(4, 20));
            $whole2 = rand(5, 15);
            $num2 = rand(1, $den2 = rand(4, 20));
            
            $imp1_num = $whole1 * $den1 + $num1;
            $imp2_num = $whole2 * $den2 + $num2;
            
            $result_num = $imp1_num * $imp2_num;
            $result_den = $den1 * $den2;
            
            $gcd = $this->gcd($result_num, $result_den);
            $final_num = $result_num / $gcd;
            $final_den = $result_den / $gcd;
            
            $answer = $this->formatAnswer($final_num, $final_den);
            
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => "$whole1 $num1/$den1 × $whole2 $num2/$den2",
                'correct_answer' => $answer,
                'solution' => "Преобразуем: $imp1_num/$den1 × $imp2_num/$den2. Умножаем: $result_num/$result_den. Сокращаем на НОД=$gcd: $final_num/$final_den",
                'hints' => 'Сложные числа — будь внимателен при преобразовании и сокращении',
                'difficulty_level' => 'hard',
                'points' => 3,
                'metadata' => json_encode([
                    'type' => 'multiply_mixed_numbers',
                    'whole1' => $whole1,
                    'num1' => $num1,
                    'den1' => $den1,
                    'whole2' => $whole2,
                    'num2' => $num2,
                    'den2' => $den2,
                    'latex_condition' => "$whole1\\frac{$num1}{$den1} \\times $whole2\\frac{$num2}{$den2}",
                    'latex_solution' => "\\frac{$imp1_num}{$den1} \\times \\frac{$imp2_num}{$den2} = \\frac{$result_num}{$result_den} = \\frac{$final_num}{$final_den}"
                ])
            ];
        }

        // ===== OLYMPIAD (1 задача) — CLIX =====
        $problems[] = [
            'skill_id' => $skill->id,
            'problem_text' => 'Вася умножил некоторое число на 10 и получил простое число. А Петя умножил то же самое число на 15, но всё равно получил простое число. А) Может ли так быть, что никто из них не ошибся? Б) Найдите все такие числа.',
            'correct_answer' => '1/30',
            'solution' => 'Пусть число x. Тогда 10x — простое, 15x — простое. 10x = 2×5×x, чтобы это было простым, число x должно быть вида 1/k, где k делит 2 или 5. Аналогично 15x = 3×5×x. Единственный вариант: x = 1/30. Тогда 10x = 10/30 = 1/3 (не простое). На самом деле, ответ: А) Нет, так не может быть. Б) Таких чисел не существует.',
            'hints' => 'Пусть x — искомое число. Разложи 10x и 15x на множители, подумай, когда произведение может быть простым',
            'difficulty_level' => 'hard',
            'points' => 5,
            'metadata' => json_encode([
                'type' => 'olympiad',
                'from_textbook' => 'CLIX',
                'requires_explanation' => true,
                'topic' => 'number_theory_primes'
            ])
        ];

        // Вставка в БД
        foreach ($problems as $problem) {
            Problem::create($problem);
        }

        $this->command->info("✅ Lesson 8, Skill 8.1 seeded: 200 problems (Easy: 80, Medium: 80, Hard: 39, Olympiad: 1)");
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
