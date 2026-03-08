<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;
use Carbon\Carbon;

class Lesson789Seeder extends Seeder
{
    /**
     * Seed lessons 7, 8, 9: Multiplication and Division of Fractions
     * lesson_number = real content number (not id)
     */
    public function run()
    {
        $sectionId = 1; // Section "Дроби"
        
        $lessons = [
            // LESSON 7: Multiplication - Basic Operations
            [
                'section_id' => $sectionId,
                'lesson_number' => 7,
                'order_number' => 7,
                'title' => 'Умножение дробей: базовые операции',
                'date' => Carbon::parse('2026-03-09'),
                'subject' => 'Математика',
                'grade' => '5',
                'theory_content' => '
<h3>Основные правила умножения дробей</h3>

<h4>1. Умножение дроби на дробь</h4>
<p>При умножении дробей перемножаем числители и знаменатели:</p>
<p>$$\\frac{a}{b} \\times \\frac{c}{d} = \\frac{a \\times c}{b \\times d}$$</p>

<p><strong>Пример:</strong> $$\\frac{2}{3} \\times \\frac{4}{5} = \\frac{2 \\times 4}{3 \\times 5} = \\frac{8}{15}$$</p>

<h4>2. Умножение дроби на число</h4>
<p>Чтобы умножить дробь на число, умножаем числитель на это число:</p>
<p>$$\\frac{a}{b} \\times n = \\frac{a \\times n}{b}$$</p>

<p><strong>Пример:</strong> $$\\frac{2}{5} \\times 3 = \\frac{2 \\times 3}{5} = \\frac{6}{5} = 1\\frac{1}{5}$$</p>

<h4>3. Сокращение перед умножением</h4>
<p>💡 <strong>Совет:</strong> Сокращай СРАЗУ — числа будут меньше и считать легче!</p>
<p><strong>Пример:</strong> $$\\frac{4}{9} \\times \\frac{6}{8} = \\frac{1}{3} \\times \\frac{2}{2} = \\frac{1}{3}$$</p>

<h4>4. Умножение смешанных чисел</h4>
<p><strong>Алгоритм:</strong></p>
<ol>
  <li>Преобразовать смешанные числа в неправильные дроби</li>
  <li>Перемножить дроби по стандартному правилу</li>
  <li>Сократить результат и преобразовать в смешанное число</li>
</ol>

<p><strong>Пример:</strong> $$2\\frac{1}{3} \\times 1\\frac{1}{2} = \\frac{7}{3} \\times \\frac{3}{2} = \\frac{21}{6} = 3\\frac{1}{2}$$</p>
',
                'duration_minutes' => 40,
                'test_duration_minutes' => 5,
                'is_active' => true,
                'allow_retry' => true,
            ],
            
            // LESSON 8: Multiplication - Advanced Operations
            [
                'section_id' => $sectionId,
                'lesson_number' => 8,
                'order_number' => 8,
                'title' => 'Умножение дробей: сложные операции',
                'date' => Carbon::parse('2026-03-10'),
                'subject' => 'Математика',
                'grade' => '5',
                'theory_content' => '
<h3>Продолжаем изучать умножение дробей</h3>

<h4>1. Возведение дроби в степень</h4>
<p>При возведении дроби в степень возводим числитель и знаменатель:</p>
<p>$$\\left(\\frac{a}{b}\\right)^n = \\frac{a^n}{b^n}$$</p>

<p><strong>Пример:</strong> $$\\left(\\frac{2}{3}\\right)^2 = \\frac{2^2}{3^2} = \\frac{4}{9}$$</p>

<h4>2. Умножение нескольких дробей</h4>
<p>Перемножаем все числители и все знаменатели:</p>
<p>$$\\frac{1}{2} \\times \\frac{3}{4} \\times \\frac{5}{6} = \\frac{1 \\times 3 \\times 5}{2 \\times 4 \\times 6} = \\frac{15}{48} = \\frac{5}{16}$$</p>

<h4>3. Умножение смешанных чисел (детально)</h4>
<p><strong>Алгоритм:</strong></p>
<ol>
  <li>Преобразовать смешанные числа в неправильные дроби</li>
  <li>Перемножить дроби по стандартному правилу</li>
  <li>Сократить результат</li>
  <li>Преобразовать обратно в смешанное число (если нужно)</li>
</ol>

<p><strong>Пример 1:</strong> $$2\\frac{1}{3} \\times 1\\frac{1}{2}$$</p>
<p><strong>Шаг 1:</strong> $$2\\frac{1}{3} = \\frac{7}{3}$$, $$1\\frac{1}{2} = \\frac{3}{2}$$</p>
<p><strong>Шаг 2:</strong> $$\\frac{7}{3} \\times \\frac{3}{2} = \\frac{21}{6}$$</p>
<p><strong>Шаг 3:</strong> $$\\frac{21}{6} = \\frac{7}{2} = 3\\frac{1}{2}$$</p>

<h4>4. Нахождение части от числа</h4>
<p>Чтобы найти $$\\frac{a}{b}$$ от числа n, умножаем: $$n \\times \\frac{a}{b}$$</p>
<p><strong>Пример:</strong> Найти $$\\frac{3}{5}$$ от 20: $$20 \\times \\frac{3}{5} = \\frac{60}{5} = 12$$</p>
',
                'duration_minutes' => 40,
                'test_duration_minutes' => 5,
                'is_active' => true,
                'allow_retry' => true,
            ],
            
            // LESSON 9: Division of Fractions
            [
                'section_id' => $sectionId,
                'lesson_number' => 9,
                'order_number' => 9,
                'title' => 'Деление дробей',
                'date' => Carbon::parse('2026-03-11'),
                'subject' => 'Математика',
                'grade' => '5',
                'theory_content' => '
<h3>Деление дробей</h3>

<h4>1. Основное правило деления дробей</h4>
<p><strong>Правило:</strong> Чтобы разделить дробь на дробь, нужно первую дробь умножить на перевернутую вторую дробь (обратную).</p>
<p>$$\\frac{a}{b} \\div \\frac{c}{d} = \\frac{a}{b} \\times \\frac{d}{c}$$</p>

<p><strong>Пример:</strong> $$\\frac{2}{3} \\div \\frac{4}{5} = \\frac{2}{3} \\times \\frac{5}{4} = \\frac{2 \\times 5}{3 \\times 4} = \\frac{10}{12} = \\frac{5}{6}$$</p>

<h4>2. Обратная дробь</h4>
<p>Обратная дробь для $$\\frac{a}{b}$$ — это $$\\frac{b}{a}$$</p>
<p><strong>Примеры:</strong></p>
<ul>
  <li>Обратная для $$\\frac{3}{4}$$ → $$\\frac{4}{3}$$</li>
  <li>Обратная для $$5 = \\frac{5}{1}$$ → $$\\frac{1}{5}$$</li>
  <li>Обратная для $$2\\frac{1}{3} = \\frac{7}{3}$$ → $$\\frac{3}{7}$$</li>
</ul>

<h4>3. Деление дроби на число</h4>
<p>$$\\frac{a}{b} \\div n = \\frac{a}{b} \\times \\frac{1}{n} = \\frac{a}{b \\times n}$$</p>

<p><strong>Пример:</strong> $$\\frac{6}{7} \\div 3 = \\frac{6}{7 \\times 3} = \\frac{6}{21} = \\frac{2}{7}$$</p>

<h4>4. Деление числа на дробь</h4>
<p>$$n \\div \\frac{a}{b} = n \\times \\frac{b}{a} = \\frac{n \\times b}{a}$$</p>

<p><strong>Пример:</strong> $$4 \\div \\frac{2}{3} = 4 \\times \\frac{3}{2} = \\frac{12}{2} = 6$$</p>

<h4>5. Деление смешанных чисел</h4>
<p><strong>Алгоритм:</strong></p>
<ol>
  <li>Преобразовать смешанные числа в неправильные дроби</li>
  <li>Заменить деление умножением на обратную дробь</li>
  <li>Выполнить умножение и сократить результат</li>
</ol>

<p><strong>Пример:</strong> $$3\\frac{1}{2} \\div 1\\frac{1}{4} = \\frac{7}{2} \\div \\frac{5}{4} = \\frac{7}{2} \\times \\frac{4}{5} = \\frac{28}{10} = \\frac{14}{5} = 2\\frac{4}{5}$$</p>

<h4>6. Проверка деления</h4>
<p>Чтобы проверить деление, умножь результат на делитель — должно получиться делимое:</p>
<p>$$\\frac{5}{6} \\times \\frac{4}{5} = \\frac{20}{30} = \\frac{2}{3}$$ ✓</p>
',
                'duration_minutes' => 40,
                'test_duration_minutes' => 5,
                'is_active' => true,
                'allow_retry' => true,
            ],
        ];
        
        foreach ($lessons as $lessonData) {
            Lesson::create($lessonData);
        }
        
        $this->command->info('✅ Lessons 7-9 seeded successfully!');
        $this->command->info('   - Lesson 7: Multiplication (basic)');
        $this->command->info('   - Lesson 8: Multiplication (advanced)');
        $this->command->info('   - Lesson 9: Division');
    }
}
