# 🎓 Vitrich Educational Platform

Образовательная платформа для обучения математике с автоматической генерацией уроков, тестами и системой отслеживания прогресса студентов.

## ✨ Основные возможности

### Для учителей
- 📚 Создание и управление уроками по математике
- 📝 Автоматическая генерация контрольных работ
- 📊 Система оценивания и статистика успеваемости
- 👥 Управление группами и студентами
- 📈 Детальная аналитика прогресса учеников

### Для студентов
- 📖 Интерактивные уроки с теорией и примерами
- ✏️ Прохождение тестов и контрольных работ
- 🏆 Отслеживание личной статистики
- 📊 Просмотр оценок и результатов

## 🚀 Быстрый старт

### Требования
- PHP >= 8.1
- MySQL >= 8.0
- Composer
- Node.js >= 18.x

### Установка

1. **Клонирование оригинального репозитория и копирование файлов**
   ```bash
   # Клонируем оригинальный репозиторий
   git clone https://github.com/vitrich/lar.git vitrich-temp
   
   # Клонируем новый репозиторий
   git clone https://github.com/vitrich/vitrich-educational-platform.git
   cd vitrich-educational-platform
   
   # Копируем все файлы из оригинального репозитория (кроме .git)
   rsync -av --exclude='.git' ../vitrich-temp/ .
   
   # Удаляем временную папку
   rm -rf ../vitrich-temp
   
   # Коммитим скопированные файлы
   git add .
   git commit -m "Copy all files from vitrich/lar repository"
   git push origin main
   ```

2. **Установка зависимостей**
   ```bash
   composer install
   npm install
   ```

3. **Настройка окружения**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Настройка базы данных** (отредактируйте `.env`)
   ```env
   DB_DATABASE=vitrich_platform
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Миграции и демо-данные**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Запуск**
   ```bash
   npm run dev        # В одном терминале
   php artisan serve  # В другом терминале
   ```

Приложение доступно по адресу: **http://localhost:8000**

### Тестовые аккаунты

После выполнения `php artisan db:seed`:

| Роль | Username | Password |
|------|----------|----------|
| Учитель-админ | v | teacher123 |
| Учитель | shulyaeff | teacher123 |
| Студент | basket | student123 |

## 📖 Документация

- [Инструкция по развертыванию](DEPLOYMENT.md)
- [Changelog](CHANGELOG.md)
- [Функции для учителей](TEACHER_FEATURES.md)

## 🛠 Технологический стек

- **Backend:** Laravel 11.x
- **Frontend:** Blade Templates, TailwindCSS
- **Database:** MySQL 8.0
- **Build:** Vite

## 📁 Структура проекта

```
vitrich-educational-platform/
├── app/
│   ├── Http/Controllers/    # Контроллеры
│   ├── Models/              # Eloquent модели
│   └── Services/            # Бизнес-логика
├── database/
│   ├── migrations/          # Миграции БД
│   └── seeders/             # Сидеры для демо-данных
├── resources/
│   ├── views/               # Blade шаблоны
│   └── js/                  # JavaScript файлы
├── routes/
│   ├── web.php              # Web маршруты
│   └── api.php              # API маршруты
└── public/                  # Публичные файлы
```

## 🤝 Участие в разработке

Мы приветствуем вклад в проект! Пожалуйста:

1. Форкните репозиторий
2. Создайте feature branch (`git checkout -b feature/AmazingFeature`)
3. Закоммитьте изменения (`git commit -m 'Add some AmazingFeature'`)
4. Запушьте в branch (`git push origin feature/AmazingFeature`)
5. Откройте Pull Request

## 📝 Лицензия

MIT License - см. файл [LICENSE](LICENSE)

## 👨‍💻 Автор

**Витриченко В. Э.**

- GitHub: [@vitrich](https://github.com/vitrich)

## 🙏 Благодарности

- Laravel Framework
- TailwindCSS
- Все контрибьюторы проекта