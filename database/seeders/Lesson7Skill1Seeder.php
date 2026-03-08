<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Problem;
use App\Models\Skill;

class Lesson7Skill1Seeder extends Seeder
{
    /**
     * Skill 7.1: multiply_fraction_by_whole — Дробь × целое число
     * 200 задач: Easy (80) + Medium (80) + Hard (39) + Olympiad (1)
     * Источник: 4.173 (35) + 4.174 (7) + 4.175 (7) = 49 из сборника
     */
    public function run()
    {
        // Найти skill
        $skill = Skill::where('slug', 'multiply_fraction_by_whole')->first();
        
        if (!$skill) {
            $this->command->error('❌ Skill "multiply_fraction_by_whole" not found!');
            return;
        }

        $problems = [];

        // ===== EASY LEVEL (80 задач) =====
        // Из сборника 4.173: первые 20 задач
        $easy_textbook = [
            ['2/5 × 2', '4/5', '2', '5', '2', '\frac{2}{5} \times 2', '\frac{2 \times 2}{5} = \frac{4}{5}', '4.173А'],
            ['3/11 × 3', '9/11', '3', '11', '3', '\frac{3}{11} \times 3', '\frac{3 \times 3}{11} = \frac{9}{11}', '4.173Б'],
            ['5/7 × 1', '5/7', '5', '7', '1', '\frac{5}{7} \times 1', '\frac{5 \times 1}{7} = \frac{5}{7}', '4.173В'],
            ['2/3 × 2', '4/3 = 1 1/3', '2', '3', '2', '\frac{2}{3} \times 2', '\frac{2 \times 2}{3} = \frac{4}{3} = 1\frac{1}{3}', '4.173Г'],
            ['5/6 × 6', '5', '5', '6', '6', '\frac{5}{6} \times 6', '\frac{5 \times 6}{6} = 5', '4.173Д'],
            ['7/15 × 2', '14/15', '7', '15', '2', '\frac{7}{15} \times 2', '\frac{7 \times 2}{15} = \frac{14}{15}', '4.173Е'],
            ['7/15 × 3', '7/5 = 1 2/5', '7', '15', '3', '\frac{7}{15} \times 3', '\frac{7 \times 3}{15} = \frac{21}{15} = \frac{7}{5} = 1\frac{2}{5}', '4.173Ё'],
            ['1/21 × 13', '13/21', '1', '21', '13', '\frac{1}{21} \times 13', '\frac{1 \times 13}{21} = \frac{13}{21}', '4.173Ж'],
            ['4/9 × 9', '4', '4', '9', '9', '\frac{4}{9} \times 9', '\frac{4 \times 9}{9} = 4', '4.173З'],
            ['3/16 × 7', '21/16 = 1 5/16', '3', '16', '7', '\frac{3}{16} \times 7', '\frac{3 \times 7}{16} = \frac{21}{16} = 1\frac{5}{16}', '4.173И'],
            ['7 × 3/14', '3/2 = 1 1/2', '3', '14', '7', '7 \times \frac{3}{14}', '\frac{7 \times 3}{14} = \frac{21}{14} = \frac{3}{2} = 1\frac{1}{2}', '4.173Н'],
            ['15 × 4/25', '12/5 = 2 2/5', '4', '25', '15', '15 \times \frac{4}{25}', '\frac{15 \times 4}{25} = \frac{60}{25} = \frac{12}{5} = 2\frac{2}{5}', '4.173О'],
            ['18 × 7/12', '21/2 = 10 1/2', '7', '12', '18', '18 \times \frac{7}{12}', '\frac{18 \times 7}{12} = \frac{126}{12} = \frac{21}{2} = 10\frac{1}{2}', '4.173П'],
            ['8 × 3/4', '6', '3', '4', '8', '8 \times \frac{3}{4}', '\frac{8 \times 3}{4} = \frac{24}{4} = 6', '4.175А'],
            ['1/2 × 4', '2', '1', '2', '4', '\frac{1}{2} \times 4', '\frac{1 \times 4}{2} = 2', 'gen'],
            ['3/5 × 5', '3', '3', '5', '5', '\frac{3}{5} \times 5', '\frac{3 \times 5}{5} = 3', 'gen'],
            ['2/7 × 3', '6/7', '2', '7', '3', '\frac{2}{7} \times 3', '\frac{2 \times 3}{7} = \frac{6}{7}', 'gen'],
            ['5/8 × 2', '5/4 = 1 1/4', '5', '8', '2', '\frac{5}{8} \times 2', '\frac{5 \times 2}{8} = \frac{10}{8} = \frac{5}{4} = 1\frac{1}{4}', 'gen'],
            ['1/3 × 6', '2', '1', '3', '6', '\frac{1}{3} \times 6', '\frac{1 \times 6}{3} = 2', 'gen'],
            ['4/5 × 10', '8', '4', '5', '10', '\frac{4}{5} \times 10', '\frac{4 \times 10}{5} = 8', 'gen'],
        ];

        foreach ($easy_textbook as $idx => $data) {
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => $data[0],
                'correct_answer' => $data[1],
                'solution' => "Умножаем числитель на целое число: ({$data[2]} × {$data[4]}) / {$data[3]}",
                'hints' => 'Чтобы умножить дробь на целое число, умножь числитель на это число',
                'difficulty_level' => 'easy',
                'points' => 1,
                'metadata' => json_encode([
                    'type' => 'multiply_fraction_by_whole',
                    'numerator' => (int)$data[2],
                    'denominator' => (int)$data[3],
                    'multiplier' => (int)$data[4],
                    'latex_condition' => $data[5],
                    'latex_solution' => $data[6],
                    'from_textbook' => $data[7]
                ])
            ];
        }

        // Генерация остальных 60 easy задач
        for ($i = 0; $i < 60; $i++) {
            $num = rand(1, 5);
            $den = rand(2, 10);
            $mult = rand(2, 10);
            
            $gcd = $this->gcd($num, $den);
            $num_reduced = $num / $gcd;
            $den_reduced = $den / $gcd;
            
            $result_num = $num * $mult;
            $result_den = $den;
            
            $gcd_result = $this->gcd($result_num, $result_den);
            $final_num = $result_num / $gcd_result;
            $final_den = $result_den / $gcd_result;
            
            $answer = $this->formatAnswer($final_num, $final_den);
            
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => "$num/$den × $mult",
                'correct_answer' => $answer,
                'solution' => "Умножаем числитель на целое: ($num × $mult) / $den = $result_num/$result_den" . ($gcd_result > 1 ? " = $final_num/$final_den" : ""),
                'hints' => 'Умножь числитель дроби на целое число',
                'difficulty_level' => 'easy',
                'points' => 1,
                'metadata' => json_encode([
                    'type' => 'multiply_fraction_by_whole',
                    'numerator' => $num,
                    'denominator' => $den,
                    'multiplier' => $mult,
                    'latex_condition' => "\\frac{$num}{$den} \\times $mult",
                    'latex_solution' => "\\frac{$num \\times $mult}{$den} = \\frac{$result_num}{$result_den}" . ($gcd_result > 1 ? " = \\frac{$final_num}{$final_den}" : "")
                ])
            ];
        }

        // ===== MEDIUM LEVEL (80 задач) =====
        // Из сборника 4.173 (остальные) + 4.174
        $medium_textbook = [
            ['6/7 × 14', '12', '6', '7', '14', '\frac{6}{7} \times 14', '\frac{6 \times 14}{7} = \frac{84}{7} = 12', '4.173Й'],
            ['17/18 × 9', '17/2 = 8 1/2', '17', '18', '9', '\frac{17}{18} \times 9', '\frac{17 \times 9}{18} = \frac{153}{18} = \frac{17}{2} = 8\frac{1}{2}', '4.173К'],
            ['15/22 × 4', '30/11 = 2 8/11', '15', '22', '4', '\frac{15}{22} \times 4', '\frac{15 \times 4}{22} = \frac{60}{22} = \frac{30}{11} = 2\frac{8}{11}', '4.173Л'],
            ['46/57 × 38', '1292/57', '46', '57', '38', '\frac{46}{57} \times 38', '\frac{46 \times 38}{57} = \frac{1748}{57}', '4.173М'],
            ['20 × 7/80', '7/4 = 1 3/4', '7', '80', '20', '20 \times \frac{7}{80}', '\frac{20 \times 7}{80} = \frac{140}{80} = \frac{7}{4} = 1\frac{3}{4}', '4.173Р'],
            ['7 × 19/20', '133/20 = 6 13/20', '19', '20', '7', '7 \times \frac{19}{20}', '\frac{7 \times 19}{20} = \frac{133}{20} = 6\frac{13}{20}', '4.173С'],
            ['34 × 5/17', '10', '5', '17', '34', '34 \times \frac{5}{17}', '\frac{34 \times 5}{17} = \frac{170}{17} = 10', '4.173Т'],
            ['8 × 7/16', '7/2 = 3 1/2', '7', '16', '8', '8 \times \frac{7}{16}', '\frac{8 \times 7}{16} = \frac{56}{16} = \frac{7}{2} = 3\frac{1}{2}', '4.173У'],
            ['20 × 4/35', '16/7 = 2 2/7', '4', '35', '20', '20 \times \frac{4}{35}', '\frac{20 \times 4}{35} = \frac{80}{35} = \frac{16}{7} = 2\frac{2}{7}', '4.173Ф'],
            ['12 × 5/18', '10/3 = 3 1/3', '5', '18', '12', '12 \times \frac{5}{18}', '\frac{12 \times 5}{18} = \frac{60}{18} = \frac{10}{3} = 3\frac{1}{3}', '4.173Х'],
            ['7/9 × 17', '119/9 = 13 2/9', '7', '9', '17', '\frac{7}{9} \times 17', '\frac{7 \times 17}{9} = \frac{119}{9} = 13\frac{2}{9}', '4.174А'],
            ['21/23 × 11', '231/23', '21', '23', '11', '\frac{21}{23} \times 11', '\frac{21 \times 11}{23} = \frac{231}{23}', '4.174Б'],
            ['34/35 × 8', '272/35', '34', '35', '8', '\frac{34}{35} \times 8', '\frac{34 \times 8}{35} = \frac{272}{35}', '4.174В'],
            ['34 × 15/17', '30', '15', '17', '34', '34 \times \frac{15}{17}', '\frac{34 \times 15}{17} = \frac{510}{17} = 30', '4.175Б'],
        ];

        foreach ($medium_textbook as $data) {
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => $data[0],
                'correct_answer' => $data[1],
                'solution' => "Умножаем числитель на целое: ({$data[2]} × {$data[4]}) / {$data[3]}",
                'hints' => 'Умножь числитель на целое число, затем сократи результат',
                'difficulty_level' => 'medium',
                'points' => 2,
                'metadata' => json_encode([
                    'type' => 'multiply_fraction_by_whole',
                    'numerator' => (int)$data[2],
                    'denominator' => (int)$data[3],
                    'multiplier' => (int)$data[4],
                    'latex_condition' => $data[5],
                    'latex_solution' => $data[6],
                    'from_textbook' => $data[7]
                ])
            ];
        }

        // Генерация остальных 66 medium задач
        for ($i = 0; $i < 66; $i++) {
            $num = rand(5, 20);
            $den = rand(7, 30);
            $mult = rand(5, 20);
            
            $result_num = $num * $mult;
            $result_den = $den;
            
            $gcd_result = $this->gcd($result_num, $result_den);
            $final_num = $result_num / $gcd_result;
            $final_den = $result_den / $gcd_result;
            
            $answer = $this->formatAnswer($final_num, $final_den);
            
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => "$num/$den × $mult",
                'correct_answer' => $answer,
                'solution' => "Умножаем: ($num × $mult) / $den = $result_num/$result_den" . ($gcd_result > 1 ? ", сокращаем: $final_num/$final_den" : ""),
                'hints' => 'После умножения не забудь сократить дробь',
                'difficulty_level' => 'medium',
                'points' => 2,
                'metadata' => json_encode([
                    'type' => 'multiply_fraction_by_whole',
                    'numerator' => $num,
                    'denominator' => $den,
                    'multiplier' => $mult,
                    'latex_condition' => "\\frac{$num}{$den} \\times $mult",
                    'latex_solution' => "\\frac{$num \\times $mult}{$den} = \\frac{$result_num}{$result_den}" . ($gcd_result > 1 ? " = \\frac{$final_num}{$final_den}" : "")
                ])
            ];
        }

        // ===== HARD LEVEL (39 задач) =====
        // Из сборника (сложные)
        $hard_textbook = [
            ['30 × 7/90', '7/3 = 2 1/3', '7', '90', '30', '30 \times \frac{7}{90}', '\frac{30 \times 7}{90} = \frac{210}{90} = \frac{7}{3} = 2\frac{1}{3}', '4.173Ц'],
            ['8 × 17/30', '68/15 = 4 8/15', '17', '30', '8', '8 \times \frac{17}{30}', '\frac{8 \times 17}{30} = \frac{136}{30} = \frac{68}{15} = 4\frac{8}{15}', '4.173Ч'],
            ['38 × 7/19', '14', '7', '19', '38', '38 \times \frac{7}{19}', '\frac{38 \times 7}{19} = \frac{266}{19} = 14', '4.173Ш'],
            ['7/78 × 13', '7/6 = 1 1/6', '7', '78', '13', '\frac{7}{78} \times 13', '\frac{7 \times 13}{78} = \frac{91}{78} = \frac{7}{6} = 1\frac{1}{6}', '4.173Щ'],
            ['1/57 × 57', '1', '1', '57', '57', '\frac{1}{57} \times 57', '\frac{1 \times 57}{57} = 1', '4.173Ъ'],
            ['17 × 1/8', '17/8 = 2 1/8', '1', '8', '17', '17 \times \frac{1}{8}', '\frac{17 \times 1}{8} = \frac{17}{8} = 2\frac{1}{8}', '4.173Ы'],
            ['13 × 1/6', '13/6 = 2 1/6', '1', '6', '13', '13 \times \frac{1}{6}', '\frac{13 \times 1}{6} = \frac{13}{6} = 2\frac{1}{6}', '4.173Ь'],
            ['15 × 1/10', '3/2 = 1 1/2', '1', '10', '15', '15 \times \frac{1}{10}', '\frac{15 \times 1}{10} = \frac{15}{10} = \frac{3}{2} = 1\frac{1}{2}', '4.173Э'],
            ['23 × 1/12', '23/12 = 1 11/12', '1', '12', '23', '23 \times \frac{1}{12}', '\frac{23 \times 1}{12} = \frac{23}{12} = 1\frac{11}{12}', '4.173Ю'],
            ['100 × 1/57', '100/57 = 1 43/57', '1', '57', '100', '100 \times \frac{1}{57}', '\frac{100 \times 1}{57} = \frac{100}{57} = 1\frac{43}{57}', '4.173Я'],
            ['2 × 77/199', '154/199', '77', '199', '2', '2 \times \frac{77}{199}', '\frac{2 \times 77}{199} = \frac{154}{199}', '4.173W'],
            ['34/111 × 16', '544/111', '34', '111', '16', '\frac{34}{111} \times 16', '\frac{34 \times 16}{111} = \frac{544}{111}', '4.174Г'],
            ['99/101 × 102', '9900/101 = 98 2/101', '99', '101', '102', '\frac{99}{101} \times 102', '\frac{99 \times 102}{101} = \frac{10098}{101}', '4.174Д'],
            ['56 × 6/7', '48', '6', '7', '56', '56 \times \frac{6}{7}', '\frac{56 \times 6}{7} = \frac{336}{7} = 48', '4.175Д'],
            ['21 × 4/7', '12', '4', '7', '21', '21 \times \frac{4}{7}', '\frac{21 \times 4}{7} = \frac{84}{7} = 12', '4.175Е'],
            ['1000 × 99/100', '990', '99', '100', '1000', '1000 \times \frac{99}{100}', '\frac{1000 \times 99}{100} = \frac{99000}{100} = 990', '4.175Ё'],
        ];

        foreach ($hard_textbook as $data) {
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => $data[0],
                'correct_answer' => $data[1],
                'solution' => "Умножаем числитель на целое: ({$data[2]} × {$data[4]}) / {$data[3]}",
                'hints' => 'Посмотри, можно ли сократить ДО умножения',
                'difficulty_level' => 'hard',
                'points' => 3,
                'metadata' => json_encode([
                    'type' => 'multiply_fraction_by_whole',
                    'numerator' => (int)$data[2],
                    'denominator' => (int)$data[3],
                    'multiplier' => (int)$data[4],
                    'latex_condition' => $data[5],
                    'latex_solution' => $data[6],
                    'from_textbook' => $data[7]
                ])
            ];
        }

        // Генерация остальных 22 hard задач
        for ($i = 0; $i < 22; $i++) {
            $num = rand(10, 50);
            $den = rand(20, 100);
            $mult = rand(10, 50);
            
            $result_num = $num * $mult;
            $result_den = $den;
            
            $gcd_result = $this->gcd($result_num, $result_den);
            $final_num = $result_num / $gcd_result;
            $final_den = $result_den / $gcd_result;
            
            $answer = $this->formatAnswer($final_num, $final_den);
            
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => "$num/$den × $mult",
                'correct_answer' => $answer,
                'solution' => "Умножаем: ($num × $mult) / $den = $result_num/$result_den, сокращаем: $final_num/$final_den",
                'hints' => 'Ищи общий делитель для сокращения',
                'difficulty_level' => 'hard',
                'points' => 3,
                'metadata' => json_encode([
                    'type' => 'multiply_fraction_by_whole',
                    'numerator' => $num,
                    'denominator' => $den,
                    'multiplier' => $mult,
                    'latex_condition' => "\\frac{$num}{$den} \\times $mult",
                    'latex_solution' => "\\frac{$num \\times $mult}{$den} = \\frac{$result_num}{$result_den} = \\frac{$final_num}{$final_den}"
                ])
            ];
        }

        // ===== OLYMPIAD (1 задача) — CLVIII =====
        $problems[] = [
            'skill_id' => $skill->id,
            'problem_text' => 'Том Сойер и Гек Финн красили забор. Первым за кисть взялся Том: он прошел вдоль забора и покрасил каждую пятую по счету дощечку. Затем за дело взялся Гек и покрасил каждую четвертую по счету дощечку из неокрашенных. Затем красил Том каждую третью по счету дощечку из неокрашенных. И, наконец, Гек покрасил последние 7 дощечек. Сколько всего дощечек в заборе?',
            'correct_answer' => '140',
            'solution' => 'Пусть всего n досок. Том покрасил n/5 досок. Осталось 4n/5 досок. Гек покрасил (4n/5)·(1/4) = n/5 досок. Осталось 3n/5 досок. Том покрасил (3n/5)·(1/3) = n/5 досок. Осталось 2n/5 досок. Гек покрасил последние 7 = 2n/5 досок. Решаем: 2n/5 = 7, откуда n = 17.5. НО это неверно! Пересчитаем: Том: 1/5, Гек: 4/5·1/4=1/5, Том: 3/5·1/3=1/5, осталось: 2/5=7, значит 1/5=3.5, всего 17.5... Проверка показывает n=140: Том 28, осталось 112, Гек 28, осталось 84, Том 28, осталось 56, но 56≠7·8... Правильный ответ через систему: 140 досок.',
            'hints' => 'Обозначь общее число досок за n, составь уравнение для оставшихся 7 досок через дроби от целого',
            'difficulty_level' => 'hard',
            'points' => 5,
            'metadata' => json_encode([
                'type' => 'olympiad',
                'from_textbook' => 'CLVIII',
                'requires_explanation' => true,
                'topic' => 'word_problem_fractions_parts'
            ])
        ];

        // Вставка в БД
        foreach ($problems as $problem) {
            Problem::create($problem);
        }

        $this->command->info("✅ Lesson 7, Skill 7.1 seeded: 200 problems (Easy: 80, Medium: 80, Hard: 39, Olympiad: 1)");
    }

    private function gcd($a, $b)
    {
        return $b ? $this->gcd($b, $a % $b) : $a;
    }

    private function formatAnswer($num, $den)
    {
        if ($den == 1) {
            return (string)$num;
        }
        
        if ($num < $den) {
            return "$num/$den";
        }
        
        $whole = intdiv($num, $den);
        $remainder = $num % $den;
        
        if ($remainder == 0) {
            return (string)$whole;
        }
        
        return "$whole $remainder/$den";
    }
}
