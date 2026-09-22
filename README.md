# BISA

Platform belajar berbasis skill dengan alur **Belajar -> Praktik -> Bukti -> Peluang**.

## Setup lokal

Prasyarat: PHP 8.2+, Composer, Node 20+, dan MySQL 8+.

```bash
composer install
copy .env.example .env
php artisan key:generate
# isi DB_DATABASE, DB_USERNAME, dan DB_PASSWORD di .env
php artisan migrate --seed
npm install
npm run dev
php artisan serve
```

Akun demo: `demo@bisa.id` dengan password `password`.

## Struktur MVP

- `app/Models`: User, Skill, Module, Lesson, Enrollment, Project, Submission, Portfolio.
- `database/migrations`: relasi learning path, progress, quiz, project, dan session.
- `resources/js/Pages`: landing, auth, dashboard, katalog skill, dan roadmap skill.
- `routes/web.php`: route publik, auth session, explore, enrollment, dan dashboard.