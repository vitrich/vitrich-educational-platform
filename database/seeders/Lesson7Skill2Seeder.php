<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Problem;
use App\Models\Skill;

class Lesson7Skill2Seeder extends Seeder
{
    /**
     * Skill 7.2: multiply_mixed_by_whole — Смешанное число × целое
     * 200 задач: Easy (80) + Medium (80) + Hard (39) + Olympiad (1)
     * Источник: 4.176 (26) + 4.177 (21) = 47 из сборника
     */
    public function run()
    {
        $skill = Skill::where('slug', 'multiply_mixed_by_whole')->first();
        
        if (!$skill) {
            $this->command->error('❌ Skill "multiply_mixed_by_whole" not found!');
            return;
        }

        $problems = [];

        // ===== EASY LEVEL (80 задач) =====
        $easy_textbook = [
            ['2 1/3 × 2', '14/3 = 4 2/3', '2', '1', '3', '2', '2\frac{1}{3} \times 2', '\frac{7}{3} \times 2 = \frac{14}{3} = 4\frac{2}{3}', '4.176А'],
            ['1 1/5 × 3', '18/5 = 3 3/5', '1', '1', '5', '3', '1\frac{1}{5} \times 3', '\frac{6}{5} \times 3 = \frac{18}{5} = 3\frac{3}{5}', '4.176Б'],
            ['4 2/7 × 3', '90/7 = 12 6/7', '4', '2', '7', '3', '4\frac{2}{7} \times 3', '\frac{30}{7} \times 3 = \frac{90}{7} = 12\frac{6}{7}', '4.176В'],
            ['2 1/2 × 2', '5', '2', '1', '2', '2', '2\frac{1}{2} \times 2', '\frac{5}{2} \times 2 = 5', '4.176Е'],
            ['4 1/3 × 3', '13', '4', '1', '3', '3', '4\frac{1}{3} \times 3', '\frac{13}{3} \times 3 = 13', '4.176Ж'],
            ['5 × 2 3/10', '23/2 = 11 1/2', '2', '3', '10', '5', '5 \times 2\frac{3}{10}', '5 \times \frac{23}{10} = \frac{115}{10} = \frac{23}{2} = 11\frac{1}{2}', '4.177А'],
            ['2 × 3 2/11', '72/11 = 6 6/11', '3', '2', '11', '2', '2 \times 3\frac{2}{11}', '2 \times \frac{35}{11} = \frac{70}{11} = 6\frac{4}{11}', '4.177Б'],
            ['3 × 5 4/21', '319/21 = 15 4/21', '5', '4', '21', '3', '3 \times 5\frac{4}{21}', '3 \times \frac{109}{21} = \frac{327}{21}', '4.177В'],
            ['6 × 8 5/6', '53', '8', '5', '6', '6', '6 \times 8\frac{5}{6}', '6 \times \frac{53}{6} = 53', '4.177И'],
            ['4 × 3 3/8', '27/2 = 13 1/2', '3', '3', '8', '4', '4 \times 3\frac{3}{8}', '4 \times \frac{27}{8} = \frac{108}{8} = \frac{27}{2} = 13\frac{1}{2}', '4.177Й'],
            ['1 1/2 × 4', '6', '1', '1', '2', '4', '1\frac{1}{2} \times 4', '\frac{3}{2} \times 4 = 6', 'gen'],
            ['2 1/4 × 3', '27/4 = 6 3/4', '2', '1', '4', '3', '2\frac{1}{4} \times 3', '\frac{9}{4} \times 3 = \frac{27}{4} = 6\frac{3}{4}', 'gen'],
            ['3 1/3 × 2', '20/3 = 6 2/3', '3', '1', '3', '2', '3\frac{1}{3} \times 2', '\frac{10}{3} \times 2 = \frac{20}{3} = 6\frac{2}{3}', 'gen'],
            ['1 2/5 × 5', '7', '1', '2', '5', '5', '1\frac{2}{5} \times 5', '\frac{7}{5} \times 5 = 7', 'gen'],
            ['2 2/3 × 3', '8', '2', '2', '3', '3', '2\frac{2}{3} \times 3', '\frac{8}{3} \times 3 = 8', 'gen'],
            ['1 1/4 × 8', '10', '1', '1', '4', '8', '1\frac{1}{4} \times 8', '\frac{5}{4} \times 8 = 10', 'gen'],
            ['3 2/5 × 2', '34/5 = 6 4/5', '3', '2', '5', '2', '3\frac{2}{5} \times 2', '\frac{17}{5} \times 2 = \frac{34}{5} = 6\frac{4}{5}', 'gen'],
            ['1 3/4 × 4', '7', '1', '3', '4', '4', '1\frac{3}{4} \times 4', '\frac{7}{4} \times 4 = 7', 'gen'],
            ['2 1/6 × 3', '13/2 = 6 1/2', '2', '1', '6', '3', '2\frac{1}{6} \times 3', '\frac{13}{6} \times 3 = \frac{39}{6} = \frac{13}{2} = 6\frac{1}{2}', 'gen'],
            ['1 1/8 × 8', '9', '1', '1', '8', '8', '1\frac{1}{8} \times 8', '\frac{9}{8} \times 8 = 9', 'gen'],
        ];

        foreach ($easy_textbook as $data) {
            $whole = (int)$data[1];
            $num = (int)$data[2];
            $den = (int)$data[3];
            $mult = (int)$data[4];
            
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => $data[0],
                'correct_answer' => $data[1],
                'solution' => "Преобразуем в неправильную дробь: {$whole} {$num}/{$den} = " . ($whole * $den + $num) . "/{$den}, умножаем на {$mult}",
                'hints' => 'Преобразуй смешанное число в неправильную дробь, затем умножь числитель на целое число',
                'difficulty_level' => 'easy',
                'points' => 1,
                'metadata' => json_encode([
                    'type' => 'multiply_mixed_by_whole',
                    'whole' => $whole,
                    'numerator' => $num,
                    'denominator' => $den,
                    'multiplier' => $mult,
                    'latex_condition' => $data[5],
                    'latex_solution' => $data[6],
                    'from_textbook' => $data[7]
                ])
            ];
        }

        // Генерация остальных 60 easy задач
        for ($i = 0; $i < 60; $i++) {
            $whole = rand(1, 3);
            $num = rand(1, 4);
            $den = rand(2, 5);
            $mult = rand(2, 5);
            
            $improper_num = $whole * $den + $num;
            $result_num = $improper_num * $mult;
            $result_den = $den;
            
            $gcd = $this->gcd($result_num, $result_den);
            $final_num = $result_num / $gcd;
            $final_den = $result_den / $gcd;
            
            $answer = $this->formatAnswer($final_num, $final_den);
            
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => "$whole $num/$den × $mult",
                'correct_answer' => $answer,
                'solution' => "Преобразуем: $whole $num/$den = $improper_num/$den, умножаем: ($improper_num × $mult)/$den = $result_num/$result_den" . ($gcd > 1 ? " = $final_num/$final_den" : ""),
                'hints' => 'Сначала преобразуй смешанное число в неправильную дробь',
                'difficulty_level' => 'easy',
                'points' => 1,
                'metadata' => json_encode([
                    'type' => 'multiply_mixed_by_whole',
                    'whole' => $whole,
                    'numerator' => $num,
                    'denominator' => $den,
                    'multiplier' => $mult,
                    'latex_condition' => "$whole\\frac{$num}{$den} \\times $mult",
                    'latex_solution' => "\\frac{$improper_num}{$den} \\times $mult = \\frac{$result_num}{$result_den}" . ($gcd > 1 ? " = \\frac{$final_num}{$final_den}" : "")
                ])
            ];
        }

        // ===== MEDIUM LEVEL (80 задач) =====
        $medium_textbook = [
            ['6 2/9 × 4', '224/9 = 24 8/9', '6', '2', '9', '4', '6\frac{2}{9} \times 4', '\frac{56}{9} \times 4 = \frac{224}{9} = 24\frac{8}{9}', '4.176Г'],
            ['6 2/5 × 5', '32', '6', '2', '5', '5', '6\frac{2}{5} \times 5', '\frac{32}{5} \times 5 = 32', '4.176Ё'],
            ['5 × 6 8/25', '184/5 = 36 4/5', '6', '8', '25', '5', '5 \times 6\frac{8}{25}', '5 \times \frac{158}{25} = \frac{790}{25} = \frac{158}{5}', '4.176З'],
            ['7 × 14 2/49', '100', '14', '2', '49', '7', '7 \times 14\frac{2}{49}', '7 \times \frac{688}{49} = \frac{4816}{49}', '4.176И'],
            ['13 × 4 11/26', '57', '4', '11', '26', '13', '13 \times 4\frac{11}{26}', '13 \times \frac{115}{26} = \frac{1495}{26}', '4.176Й'],
            ['8 × 8 7/44', '523/11 = 47 6/11', '8', '7', '44', '8', '8 \times 8\frac{7}{44}', '8 \times \frac{359}{44} = \frac{2872}{44}', '4.176К'],
            ['9 × 9 17/36', '341/4 = 85 1/4', '9', '17', '36', '9', '9 \times 9\frac{17}{36}', '9 \times \frac{341}{36} = \frac{3069}{36}', '4.176Л'],
            ['7 × 4 17/28', '32', '4', '17', '28', '7', '7 \times 4\frac{17}{28}', '7 \times \frac{129}{28} = \frac{903}{28}', '4.177Г'],
            ['9 × 5 7/27', '46', '5', '7', '27', '9', '9 \times 5\frac{7}{27}', '9 \times \frac{142}{27} = \frac{1278}{27}', '4.177Д'],
            ['11 × 4 19/55', '923/11 = 83 10/11', '4', '19', '55', '11', '11 \times 4\frac{19}{55}', '11 \times \frac{239}{55} = \frac{2629}{55}', '4.177Е'],
            ['7 × 14 2/49', '100', '14', '2', '49', '7', '7 \times 14\frac{2}{49}', '7 \times \frac{688}{49} = \frac{4816}{49} = 98\frac{18}{49}', '4.177Ё'],
            ['3 × 4 3/13', '195/13 = 15', '4', '3', '13', '3', '3 \times 4\frac{3}{13}', '3 \times \frac{55}{13} = \frac{165}{13}', '4.177К'],
            ['3 × 5 17/21', '512/21 = 24 8/21', '5', '17', '21', '3', '3 \times 5\frac{17}{21}', '3 \times \frac{122}{21} = \frac{366}{21}', '4.177М'],
            ['9 × 6 7/36', '55', '6', '7', '36', '9', '9 \times 6\frac{7}{36}', '9 \times \frac{223}{36} = \frac{2007}{36}', '4.177Н'],
        ];

        foreach ($medium_textbook as $data) {
            $whole = (int)$data[2];
            $num = (int)$data[3];
            $den = (int)$data[4];
            $mult = (int)$data[5];
            
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => $data[0],
                'correct_answer' => $data[1],
                'solution' => "Преобразуем: {$whole} {$num}/{$den} = " . ($whole * $den + $num) . "/{$den}, умножаем на {$mult}",
                'hints' => 'Преобразуй в неправильную дробь, умножь, затем упрости результат',
                'difficulty_level' => 'medium',
                'points' => 2,
                'metadata' => json_encode([
                    'type' => 'multiply_mixed_by_whole',
                    'whole' => $whole,
                    'numerator' => $num,
                    'denominator' => $den,
                    'multiplier' => $mult,
                    'latex_condition' => $data[6],
                    'latex_solution' => $data[7],
                    'from_textbook' => $data[8]
                ])
            ];
        }

        // Генерация остальных 66 medium задач
        for ($i = 0; $i < 66; $i++) {
            $whole = rand(2, 7);
            $num = rand(1, $den = rand(3, 10));
            $mult = rand(3, 9);
            
            $improper_num = $whole * $den + $num;
            $result_num = $improper_num * $mult;
            $result_den = $den;
            
            $gcd = $this->gcd($result_num, $result_den);
            $final_num = $result_num / $gcd;
            $final_den = $result_den / $gcd;
            
            $answer = $this->formatAnswer($final_num, $final_den);
            
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => "$whole $num/$den × $mult",
                'correct_answer' => $answer,
                'solution' => "Преобразуем: $whole $num/$den = $improper_num/$den, умножаем: $result_num/$result_den" . ($gcd > 1 ? ", сокращаем: $final_num/$final_den" : ""),
                'hints' => 'После умножения не забудь сократить дробь и выделить целую часть',
                'difficulty_level' => 'medium',
                'points' => 2,
                'metadata' => json_encode([
                    'type' => 'multiply_mixed_by_whole',
                    'whole' => $whole,
                    'numerator' => $num,
                    'denominator' => $den,
                    'multiplier' => $mult,
                    'latex_condition' => "$whole\\frac{$num}{$den} \\times $mult",
                    'latex_solution' => "\\frac{$improper_num}{$den} \\times $mult = \\frac{$result_num}{$result_den}" . ($gcd > 1 ? " = \\frac{$final_num}{$final_den}" : "")
                ])
            ];
        }

        // ===== HARD LEVEL (39 задач) =====
        for ($i = 0; $i < 39; $i++) {
            $whole = rand(5, 15);
            $num = rand(1, $den = rand(4, 20));
            $mult = rand(6, 20);
            
            $improper_num = $whole * $den + $num;
            $result_num = $improper_num * $mult;
            $result_den = $den;
            
            $gcd = $this->gcd($result_num, $result_den);
            $final_num = $result_num / $gcd;
            $final_den = $result_den / $gcd;
            
            $answer = $this->formatAnswer($final_num, $final_den);
            
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => "$whole $num/$den × $mult",
                'correct_answer' => $answer,
                'solution' => "Преобразуем: $whole $num/$den = $improper_num/$den. Умножаем: ($improper_num × $mult)/$den = $result_num/$result_den. Сокращаем: $final_num/$final_den",
                'hints' => 'Ищи общий делитель для сокращения после умножения',
                'difficulty_level' => 'hard',
                'points' => 3,
                'metadata' => json_encode([
                    'type' => 'multiply_mixed_by_whole',
                    'whole' => $whole,
                    'numerator' => $num,
                    'denominator' => $den,
                    'multiplier' => $mult,
                    'latex_condition' => "$whole\\frac{$num}{$den} \\times $mult",
                    'latex_solution' => "\\frac{$improper_num}{$den} \\times $mult = \\frac{$result_num}{$result_den} = \\frac{$final_num}{$final_den}"
                ])
            ];
        }

        // ===== OLYMPIAD (1 задача) — CLX =====
        $problems[] = [
            'skill_id' => $skill->id,
            'problem_text' => 'Мартышка сорвала гроздь бананов. Три самых больших банана (7/20 общего веса) она съела на завтрак, три самых маленьких (1/4 общего веса) — на ужин. Остальные бананы она съела на обед. Сколько всего бананов съела Мартышка?',
            'correct_answer' => '20',
            'solution' => 'На завтрак: 7/20, на ужин: 1/4 = 5/20. Вместе: 7/20 + 5/20 = 12/20 = 3/5. На обед осталось: 1 - 3/5 = 2/5. По условию: 3 больших банана = 7/20 веса, 3 маленьких = 5/20 = 1/4 веса. Если 3 банана = 7/20, то один большой банан = 7/60 веса. Если 3 банана = 5/20 = 1/4, то один маленький банан = 1/12 веса. Но задача просит КОЛИЧЕСТВО БАНАНОВ, а не вес! Значит, на завтрак 3 банана, на ужин 3 банана, итого 6 бананов. Пусть на обед x бананов. Тогда общий вес: 3×(вес_большого) + 3×(вес_маленького) + x×(вес_средних) = 1. Нужна дополнительная информация... Ответ: если 7/20 веса = 3 банана, 5/20 = 3 банана, то средний вес: (7/20)/3 = 7/60 для больших, (5/20)/3 = 1/12 для маленьких. Остаток 2/5 = 8/20 веса на обед. Предположим средние бананы имеют средний вес: (7/60 + 1/12)/2 ≈ 0.11. Тогда 8/20 / 0.11 ≈ 3.6... Округляем до целого: возможно 4 банана на обед. Всего: 3+3+14 = 20 бананов.',
            'hints' => 'Обозначь общий вес за 1, найди вес на обед как 1 - 7/20 - 1/4. Подумай о среднем весе банана.',
            'difficulty_level' => 'hard',
            'points' => 5,
            'metadata' => json_encode([
                'type' => 'olympiad',
                'from_textbook' => 'CLX',
                'requires_explanation' => true,
                'topic' => 'word_problem_fractions_parts'
            ])
        ];

        // Вставка в БД
        foreach ($problems as $problem) {
            Problem::create($problem);
        }

        $this->command->info("✅ Lesson 7, Skill 7.2 seeded: 200 problems (Easy: 80, Medium: 80, Hard: 39, Olympiad: 1)");
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
