<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;
use App\Models\Section;

class LessonSevenToNineSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('Удаление уроков 7-9...');
        
        Lesson::whereIn('lesson_number', [7, 8, 9])->delete();
        
        $this->command->info('Создание новых уроков 7-9...');
        
        $sectionId = Section::where('grade', 5)->first()?->id ?? 1;
        
        // Урок 7
        Lesson::create([
            'section_id' => $sectionId,
            'lesson_number' => 7,
            'name' => 'adding-mixed-numbers',
            'title' => 'Сложение смешанных чисел',
            'description' => 'Правила сложения смешанных чисел',
            'theory_content' => $this->getLesson7Theory(),
            'practice_content' => $this->getLesson7Practice(),
            'order_number' => 7,
            'grade' => 5,
            'is_active' => true,
            'allow_retry' => true,
        ]);

        // Урок 8
        Lesson::create([
            'section_id' => $sectionId,
            'lesson_number' => 8,
            'name' => 'subtracting-mixed-numbers',
            'title' => 'Вычитание смешанных чисел',
            'description' => 'Вычитание смешанных чисел, занимание единицы',
            'theory_content' => $this->getLesson8Theory(),
            'practice_content' => $this->getLesson8Practice(),
            'order_number' => 8,
            'grade' => 5,
            'is_active' => true,
            'allow_retry' => true,
        ]);

        // Урок 9
        Lesson::create([
            'section_id' => $sectionId,
            'lesson_number' => 9,
            'name' => 'multiply-divide-mixed-numbers',
            'title' => 'Умножение и деление смешанных чисел',
            'description' => 'Преобразование в неправильную дробь',
            'theory_content' => $this->getLesson9Theory(),
            'practice_content' => $this->getLesson9Practice(),
            'order_number' => 9,
            'grade' => 5,
            'is_active' => true,
            'allow_retry' => true,
        ]);

        $this->command->info('✓ Уроки 7-9 созданы');
    }

    private function getLesson7Theory(): string
    {
        return '<h3>Сложение смешанных чисел</h3>
<p>Смешанное число состоит из целой и дробной части: 2³⁄₅, 5¾.</p>

<h4>Правило:</h4>
<ol>
<li>Складываем целые части</li>
<li>Складываем дробные части</li>
<li>Если дробь ≥ 1, выделяем целую часть</li>
</ol>

<h4>Примеры:</h4>
<p><strong>Пример 1:</strong> 2³⁄₅ + 1¹⁄₅ = 3⁴⁄₅</p>
<p><strong>Пример 2:</strong> 1²⁄₃ + 2¹⁄₄ = 1⁸⁄₁₂ + 2³⁄₁₂ = 3¹¹⁄₁₂</p>
<p><strong>Пример 3:</strong> 2³⁄₄ + 1²⁄₄ = 3⁵⁄₄ = 4¹⁄₄</p>';
    }

    private function getLesson7Practice(): string
    {
        return '<h3>Практика</h3>
<h4>Задача 1</h4>
<p>Вычислите: 2³⁄₅ + 3¹⁄₅</p>

<h4>Задача 2</h4>
<p>Вычислите: 4²⁄₃ + 2¹⁄₆</p>

<h4>Задача 3</h4>
<p>Вычислите: 5⁵⁄₈ + 3⁷⁄₈</p>';
    }

    private function getLesson8Theory(): string
    {
        return '<h3>Вычитание смешанных чисел</h3>

<h4>Правило:</h4>
<ol>
<li>Приводим дроби к общему знаменателю</li>
<li>Если дробная часть уменьшаемого < дробной части вычитаемого — занимаем 1 из целой части</li>
<li>Вычитаем</li>
</ol>

<h4>Примеры:</h4>
<p><strong>Без занимания:</strong><br>
5⁴⁄₅ - 2²⁄₅ = 3²⁄₅</p>

<p><strong>С занимаем:</strong><br>
4¹⁄₄ - 1³⁄₄ = 3⁵⁄₄ - 1³⁄₄ = 2²⁄₄ = 2¹⁄₂</p>

<p><strong>Разные знаменатели:</strong><br>
5²⁄₃ - 2¹⁄₆ = 5⁴⁄₆ - 2¹⁄₆ = 3³⁄₆ = 3¹⁄₂</p>';
    }

    private function getLesson8Practice(): string
    {
        return '<h3>Практика</h3>
<h4>Задача 1</h4>
<p>Вычислите: 5³⁄₄ - 2¹⁄₄</p>

<h4>Задача 2</h4>
<p>Вычислите: 4¹⁄₃ - 1²⁄₃ (потребуется занять единицу)</p>

<h4>Задача 3</h4>
<p>Вычислите: 6²⁄₅ - 3⁴⁄₅</p>';
    }

    private function getLesson9Theory(): string
    {
        return '<h3>Умножение и деление смешанных чисел</h3>

<h4>Алгоритм:</h4>
<ol>
<li>Преобразуем смешанные числа в неправильные дроби</li>
<li>Выполняем действие</li>
<li>Выделяем целую часть</li>
</ol>

<h4>Умножение:</h4>
<p>2³⁄₄ · 1²⁄₃ = ¹¹⁄₄ · ⁵⁄₃ = ⁵⁵⁄₁₂ = 4⁷⁄₁₂</p>

<h4>Деление:</h4>
<p>3¹⁄₂ : 1¹⁄₄ = ⁷⁄₂ : ⁵⁄₄ = ⁷⁄₂ · ⁴⁄₅ = ²⁸⁄₁₀ = 2⁴⁄₅</p>

<p><strong>Важно:</strong> При делении переворачиваем делитель!</p>';
    }

    private function getLesson9Practice(): string
    {
        return '<h3>Практика</h3>
<h4>Задача 1</h4>
<p>Вычислите: 2³⁄₅ · 3</p>

<h4>Задача 2</h4>
<p>Вычислите: 4¹⁄₂ · 2²⁄₃</p>

<h4>Задача 3</h4>
<p>Вычислите: 5¹⁄₄ : 1³⁄₄</p>';
    }
}
