<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;
use App\Models\Section;

class LessonOneToThreeSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('Удаление уроков 1-3...');
        
        Lesson::whereIn('lesson_number', [1, 2, 3])->delete();
        
        $this->command->info('Создание новых уроков 1-3...');
        
        $sectionId = Section::where('grade', 5)->first()?->id ?? 1;
        
        // Урок 1: Основные понятия о дробях
        Lesson::create([
            'section_id' => $sectionId,
            'lesson_number' => 1,
            'name' => 'fraction-basics',
            'title' => 'Основные понятия о дробях',
            'description' => 'Введение в дроби, числитель и знаменатель',
            'theory_content' => $this->getLesson1Theory(),
            'practice_content' => $this->getLesson1Practice(),
            'order_number' => 1,
            'grade' => 5,
            'is_active' => true,
            'allow_retry' => true,
        ]);

        // Урок 2: Сокращение дробей
        Lesson::create([
            'section_id' => $sectionId,
            'lesson_number' => 2,
            'name' => 'reducing-fractions',
            'title' => 'Сокращение дробей',
            'description' => 'НОД и упрощение дробей',
            'theory_content' => $this->getLesson2Theory(),
            'practice_content' => $this->getLesson2Practice(),
            'order_number' => 2,
            'grade' => 5,
            'is_active' => true,
            'allow_retry' => true,
        ]);

        // Урок 3: Сравнение дробей
        Lesson::create([
            'section_id' => $sectionId,
            'lesson_number' => 3,
            'name' => 'comparing-fractions',
            'title' => 'Сравнение дробей',
            'description' => 'Сравнение дробей с одинаковыми и разными знаменателями',
            'theory_content' => $this->getLesson3Theory(),
            'practice_content' => $this->getLesson3Practice(),
            'order_number' => 3,
            'grade' => 5,
            'is_active' => true,
            'allow_retry' => true,
        ]);

        $this->command->info('✓ Уроки 1-3 созданы');
    }

    private function getLesson1Theory(): string
    {
        return '<h3>Основные понятия о дробях</h3>
<p>Дробь — это число, выражающее часть целого.</p>

<h4>Обозначение дроби</h4>
<p>Дробь записывается как <strong>a/b</strong>, где:</p>
<ul>
<li><strong>a</strong> — числитель (количество взятых частей)</li>
<li><strong>b</strong> — знаменатель (на сколько частей разделено целое)</li>
</ul>

<h4>Примеры:</h4>
<p><strong>³⁄₄</strong> — три четверти</p>
<p><strong>⁵⁄₈</strong> — пять восьмых</p>

<h4>Типы дробей:</h4>
<p><strong>Правильная дробь:</strong> числитель < знаменателя (³⁄₅)</p>
<p><strong>Неправильная дробь:</strong> числитель ≥ знаменателя (⁷⁄₅)</p>';
    }

    private function getLesson1Practice(): string
    {
        return '<h3>Практика</h3>
<h4>Задача 1</h4>
<p>Запишите дробь: числитель 3, знаменатель 7</p>

<h4>Задача 2</h4>
<p>Определите числитель и знаменатель дроби ⁵⁄₉</p>

<h4>Задача 3</h4>
<p>Какая из дробей правильная: ⁷⁄₄ или ³⁄₈?</p>';
    }

    private function getLesson2Theory(): string
    {
        return '<h3>Сокращение дробей</h3>
<p>Сокращение дроби — деление числителя и знаменателя на их общий делитель.</p>

<h4>Правило:</h4>
<p>Чтобы сократить дробь, нужно найти <strong>НОД</strong> (наибольший общий делитель) числителя и знаменателя, затем разделить оба на него.</p>

<h4>Пример 1:</h4>
<p>⁸⁄₁₂ = ⁸÷₄⁄₁₂÷₄ = ²⁄₃</p>
<p>НОД(8, 12) = 4</p>

<h4>Пример 2:</h4>
<p>¹⁵⁄₂₅ = ¹⁵÷₅⁄₂₅÷₅ = ³⁄₅</p>
<p>НОД(15, 25) = 5</p>

<h4>Несократимая дробь:</h4>
<p>Дробь, у которой НОД(числитель, знаменатель) = 1</p>
<p>Пример: ³⁄₇</p>';
    }

    private function getLesson2Practice(): string
    {
        return '<h3>Практика</h3>
<h4>Задача 1</h4>
<p>Сократите дробь: ⁶⁄₉</p>

<h4>Задача 2</h4>
<p>Сократите дробь: ¹²⁄₁₈</p>

<h4>Задача 3</h4>
<p>Приведите к несократимому виду: ²⁴⁄₃₆</p>';
    }

    private function getLesson3Theory(): string
    {
        return '<h3>Сравнение дробей</h3>

<h4>Случай 1: Одинаковые знаменатели</h4>
<p>Больше та дробь, у которой больше числитель.</p>
<p><strong>Пример:</strong> ³⁄₇ < ⁵⁄₇</p>

<h4>Случай 2: Одинаковые числители</h4>
<p>Больше та дробь, у которой меньше знаменатель.</p>
<p><strong>Пример:</strong> ⁴⁄₅ > ⁴⁄₉</p>

<h4>Случай 3: Разные числители и знаменатели</h4>
<p>Приводим к общему знаменателю (НОК).</p>
<p><strong>Пример:</strong></p>
<p>Сравните ²⁄₃ и ³⁄₄</p>
<p>НОК(3, 4) = 12</p>
<p>²⁄₃ = ⁸⁄₁₂, ³⁄₄ = ⁹⁄₁₂</p>
<p>⁸⁄₁₂ < ⁹⁄₁₂ ⇒ ²⁄₃ < ³⁄₄</p>';
    }

    private function getLesson3Practice(): string
    {
        return '<h3>Практика</h3>
<h4>Задача 1</h4>
<p>Сравните: ⁵⁄₉ и ⁷⁄₉</p>

<h4>Задача 2</h4>
<p>Сравните: ³⁄₅ и ³⁄₈</p>

<h4>Задача 3</h4>
<p>Сравните: ²⁄₃ и ⁵⁄₆</p>';
    }
}
