<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Problem;
use App\Models\Skill;

class Lesson8Skill2Seeder extends Seeder
{
    public function run()
    {
        $skill = Skill::where('slug', 'multiply_with_simplification')->first();
        if (!$skill) {
            $this->command->error('❌ Skill not found!');
            return;
        }

        $problems = [];

        // Easy: 4.183 примеры с упрощением
        $easy = [
            ['125 × 4 1/25', '505', '4.183А'],
            ['13/51 × 17', '13/3 = 4 1/3', '4.183Б'],
            ['7/15 × 40', '56/3 = 18 2/3', '4.183В'],
            ['5/21 × 35', '25/3 = 8 1/3', '4.183Г'],
            ['12/19 × 76', '48', '4.183Д'],
        ];

        foreach ($easy as $data) {
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => $data[0],
                'correct_answer' => $data[1],
                'solution' => 'Сокращаем до умножения, упрощаем вычисления',
                'hints' => 'Ищи общие делители для сокращения ДО умножения',
                'difficulty_level' => 'easy',
                'points' => 1,
                'metadata' => json_encode(['from_textbook' => $data[2]])
            ];
        }

        // Генерация easy (75 задач)
        for ($i = 0; $i < 75; $i++) {
            $num = rand(3, 15);
            $den = rand(5, 30);
            $mult = rand(5, 50);
            $gcd = $this->gcd($den, $mult);
            if ($gcd > 1) {
                $problems[] = [
                    'skill_id' => $skill->id,
                    'problem_text' => "$num/$den × $mult",
                    'correct_answer' => ($num * $mult / $den),
                    'solution' => "Сокращаем $den и $mult на НОД=$gcd",
                    'hints' => 'Найди НОД знаменателя и множителя',
                    'difficulty_level' => 'easy',
                    'points' => 1,
                    'metadata' => json_encode(['type' => 'simplification'])
                ];
            }
        }

        // Medium (80)
        for ($i = 0; $i < 80; $i++) {
            $whole = rand(2, 10);
            $num = rand(1, 10);
            $den = rand(5, 50);
            $mult = rand(10, 100);
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => "$whole $num/$den × $mult",
                'correct_answer' => (($whole * $den + $num) * $mult / $den),
                'solution' => 'Преобразуем, сокращаем, умножаем',
                'hints' => 'Сначала преобразуй в неправильную дробь',
                'difficulty_level' => 'medium',
                'points' => 2,
                'metadata' => json_encode(['type' => 'mixed_simplification'])
            ];
        }

        // Hard (39)
        for ($i = 0; $i < 39; $i++) {
            $num = rand(20, 100);
            $den = rand(50, 200);
            $mult = rand(50, 500);
            $problems[] = [
                'skill_id' => $skill->id,
                'problem_text' => "$num/$den × $mult",
                'correct_answer' => ($num * $mult / $den),
                'solution' => 'Сложное сокращение больших чисел',
                'hints' => 'Разложи на простые множители для сокращения',
                'difficulty_level' => 'hard',
                'points' => 3,
                'metadata' => json_encode(['type' => 'complex_simplification'])
            ];
        }

        // Olympiad: 125 × 4 1/25 (4.183А расширенная)
        $problems[] = [
            'skill_id' => $skill->id,
            'problem_text' => 'Вычисли 125 × 4 1/25 используя мощное сокращение (покажи два способа: с сокращением и без)',
            'correct_answer' => '505',
            'solution' => 'Способ 1 (без сокращения): 125 × 101/25 = 12625/25 = 505. Способ 2 (с сокращением): 125 и 25 сокращаем на 25 → 5 × 101 = 505. Сокращение упростило вычисления!',
            'hints' => 'Найди НОД(125, 25) и сократи ДО умножения',
            'difficulty_level' => 'hard',
            'points' => 5,
            'metadata' => json_encode(['type' => 'olympiad', 'from_textbook' => '4.183А_extended'])
        ];

        foreach ($problems as $problem) {
            Problem::create($problem);
        }

        $this->command->info('✅ Lesson 8, Skill 8.2 seeded: 200 problems');
    }

    private function gcd($a, $b) { return $b ? $this->gcd($b, $a % $b) : $a; }
}
