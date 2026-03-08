<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;
use App\Models\Section;

class LessonFourToSixSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('Удаление уроков 4-6...');
        
        Lesson::whereIn('lesson_number', [4, 5, 6])->delete();
        
        $this->command->info('Создание новых уроков 4-6...');
        
        $sectionId = Section::where('grade', 5)->first()?->id ?? 1;
        
        // Урок 4: Сложение и вычитание дробей
        Lesson::create([
            'section_id' => $sectionId,
            'lesson_number' => 4,
            'name' => 'adding-subtracting-fractions',
            'title' => 'Сложение и вычитание дробей',
            'description' => 'Операции с дробями с одинаковыми и разными знаменателями',
            'theory_content' => $this->getLesson4Theory(),
            'practice_content' => $this->getLesson4Practice(),
            'order_number' => 4,
            'grade' => 5,
            'is_active' => true,
            'allow_retry' => true,
        ]);

        // Урок 5: Умножение и деление дробей
        Lesson::create([
            'section_id' => $sectionId,
            'lesson_number' => 5,
            'name' => 'multiplying-dividing-fractions',
            'title' => 'Умножение и деление дробей',
            'description' => 'Правила умножения и деления обыкновенных дробей',
            'theory_content' => $this->getLesson5Theory(),
            'practice_content' => $this->getLesson5Practice(),
            'order_number' => 5,
            'grade' => 5,
            'is_active' => true,
            'allow_retry' => true,
        ]);

        // Урок 6: Египетские дроби (оставляем как есть)
        $this->command->info('✓ Уроки 4-5 созданы, урок 6 не изменён');
    }

    private function getLesson4Theory(): string
    {
        return '<h3>Сложение и вычитание дробей</h3>

<h4>Одинаковые знаменатели:</h4>
<p>Складываем/вычитаем числители, знаменатель оставляем.</p>
<p><strong>Пример:</strong> ²⁄₇ + ³⁄₇ = ⁵⁄₇</p>
<p><strong>Пример:</strong> ⁵⁄₉ - ²⁄₉ = ³⁄₉ = ¹⁄₃</p>

<h4>Разные знаменатели:</h4>
<p>Приводим к общему знаменателю (НОК), затем складываем/вычитаем.</p>

<h4>Пример:</h4>
<p>¹⁄₃ + ¹⁄₄</p>
<p>НОК(3, 4) = 12</p>
<p>¹⁄₃ = ⁴⁄₁₂, ¹⁄₄ = ³⁄₁₂</p>
<p>⁴⁄₁₂ + ³⁄₁₂ = ⁷⁄₁₂</p>

<h4>Важно!</h4>
<p>Всегда сокращайте результат.</p>';
    }

    private function getLesson4Practice(): string
    {
        return '<h3>Практика</h3>
<h4>Задача 1</h4>
<p>Вычислите: ³⁄₈ + ²⁄₈</p>

<h4>Задача 2</h4>
<p>Вычислите: ¹⁄₂ + ¹⁄₃</p>

<h4>Задача 3</h4>
<p>Вычислите: ⁵⁄₆ - ¹⁄₄</p>';
    }

    private function getLesson5Theory(): string
    {
        return '<h3>Умножение и деление дробей</h3>

<h4>Умножение:</h4>
<p>Перемножаем числители, перемножаем знаменатели.</p>
<p><strong>Формула:</strong> a/b · c/d = (a·c)/(b·d)</p>
<p><strong>Пример:</strong> ²⁄₃ · ³⁄₅ = ⁶⁄₁₅ = ²⁄₅</p>

<h4>Деление:</h4>
<p>Умножаем на обратную дробь.</p>
<p><strong>Формула:</strong> a/b : c/d = a/b · d/c</p>
<p><strong>Пример:</strong> ³⁄₄ : ²⁄₅ = ³⁄₄ · ⁵⁄₂ = ¹⁵⁄₈ = 1⁷⁄₈</p>

<h4>Важно!</h4>
<p>При делении переворачиваем делитель и умножаем.</p>';
    }

    private function getLesson5Practice(): string
    {
        return '<h3>Практика</h3>
<h4>Задача 1</h4>
<p>Вычислите: ²⁄₅ · ³⁄₇</p>

<h4>Задача 2</h4>
<p>Вычислите: ⁴⁄₉ : ²⁄₃</p>

<h4>Задача 3</h4>
<p>Вычислите: ⁵⁄₆ · ³⁄₁₀</p>';
    }
}
