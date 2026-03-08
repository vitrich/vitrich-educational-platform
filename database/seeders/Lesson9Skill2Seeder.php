<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Problem;
use App\Models\Skill;

class Lesson9Skill2Seeder extends Seeder
{
    public function run()
    {
        $skill = Skill::where('slug', 'expressions_with_brackets')->first();
        if (!$skill) {
            $this->command->error('❌ Skill not found!');
            return;
        }

        $problems = [];

        // Easy: из 4.187
        $easy = [
            ['(3/4 + 5/6) × 3 + (5/6 - 3/4) × 4', '15 1/6', '4.187А'],
            ['(2 3/5 + 1 5/7) × 14 - (2 1/2 - 3/8) × 4', '51', '4.187В'],
        ];

        foreach ($easy as $data) {
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => $data[0],
                'correct_answer' => $data[1],
                'solution' => 'Сначала выполняем действия в скобках, затем умножение',
                'hints' => 'Порядок действий: скобки → умножение → сложение/вычитание',
                'difficulty_level' => 'easy',
                'points' => 1,
                'metadata' => json_encode(['from_textbook' => $data[2]])
            ];
        }

        // Генерация easy (78)
        for ($i = 0; $i < 78; $i++) {
            $n1 = rand(1, 5); $d1 = rand(2, 6);
            $n2 = rand(1, 5); $d2 = rand(2, 6);
            $mult = rand(2, 10);
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => "($n1/$d1 + $n2/$d2) × $mult",
                'correct_answer' => (($n1 * $d2 + $n2 * $d1) * $mult / ($d1 * $d2)),
                'solution' => "Складываем дроби в скобках, затем умножаем",
                'hints' => 'Сначала выполни действие в скобках',
                'difficulty_level' => 'easy',
                'points' => 1,
                'metadata' => json_encode(['type' => 'simple_brackets'])
            ];
        }

        // Medium (80): вложенные скобки
        for ($i = 0; $i < 80; $i++) {
            $n1 = rand(2, 8); $d1 = rand(3, 10);
            $n2 = rand(2, 8); $d2 = rand(3, 10);
            $mult1 = rand(2, 8);
            $mult2 = rand(2, 8);
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => "($n1/$d1 × $mult1 + $n2/$d2) × $mult2",
                'correct_answer' => (($n1 * $mult1 / $d1 + $n2 / $d2) * $mult2),
                'solution' => "Сначала умножение внутри скобок, затем сложение, затем внешнее умножение",
                'hints' => 'Выполняй действия слева направо, учитывая приоритет операций',
                'difficulty_level' => 'medium',
                'points' => 2,
                'metadata' => json_encode(['type' => 'nested_operations'])
            ];
        }

        // Hard (39): сложные выражения из 4.187
        for ($i = 0; $i < 39; $i++) {
            $w1 = rand(1, 5); $n1 = rand(1, 5); $d1 = rand(2, 8);
            $w2 = rand(1, 5); $n2 = rand(1, 5); $d2 = rand(2, 8);
            $mult = rand(3, 12);
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => "($w1 $n1/$d1 - $w2 $n2/$d2) × $mult",
                'correct_answer' => ((($w1 * $d1 + $n1) / $d1 - ($w2 * $d2 + $n2) / $d2) * $mult),
                'solution' => "Преобразуем смешанные числа, вычитаем, умножаем",
                'hints' => 'Сначала преобразуй смешанные числа в неправильные дроби',
                'difficulty_level' => 'hard',
                'points' => 3,
                'metadata' => json_encode(['type' => 'complex_mixed'])
            ];
        }

        // Olympiad: CLVII
        $problems[] = [
            'skill_id' => $skill->id,
            'problem_text' => 'Все натуральные числа от 1 до 1000 записали в следующем порядке: сначала были выписаны в порядке возрастания числа, сумма цифр которых равна 1, затем, также в порядке возрастания, числа с суммой цифр 2, потом — числа, сумма цифр которых равна 3 и т.д. На каком месте оказалось число 996?',
            'correct_answer' => '985',
            'solution' => 'Сумма цифр 996: 9+9+6=24. Сначала идут все числа с суммой цифр 1-23. Подсчитываем количество чисел для каждой суммы цифр от 1 до 23 методом комбинаторики (размещение с повторениями). Затем среди чисел с суммой 24 находим позицию 996 (числа идут по возрастанию: 699, 789, 798, 879, 888, 897, 969, 978, 987, 996). Итоговая позиция: 985',
            'hints' => 'Сначала посчитай, сколько чисел с суммой цифр меньше 24, затем найди позицию 996 среди чисел с суммой 24',
            'difficulty_level' => 'hard',
            'points' => 5,
            'metadata' => json_encode(['type' => 'olympiad', 'from_textbook' => 'CLVII', 'topic' => 'combinatorics'])
        ];

        foreach ($problems as $problem) {
            Problem::create($problem);
        }

        $this->command->info('✅ Lesson 9, Skill 9.2 seeded: 200 problems');
    }
}
