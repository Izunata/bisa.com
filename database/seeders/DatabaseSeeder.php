<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Project;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['name' => 'Product Design', 'slug' => 'product-design', 'category' => 'Design', 'level' => 'Pemula', 'description' => 'Rancang produk digital yang berguna, mudah dipakai, dan punya alasan untuk ada.', 'color' => '#E6FFB8', 'estimated_hours' => 32, 'learners_count' => 1240],
            ['name' => 'Data Analytics', 'slug' => 'data-analytics', 'category' => 'Data', 'level' => 'Pemula', 'description' => 'Ubah data mentah menjadi keputusan yang lebih tajam.', 'color' => '#D9F2FF', 'estimated_hours' => 40, 'learners_count' => 980],
            ['name' => 'Digital Marketing', 'slug' => 'digital-marketing', 'category' => 'Business', 'level' => 'Menengah', 'description' => 'Bangun strategi pertumbuhan yang bisa diukur dari ide sampai hasil.', 'color' => '#FFE7C2', 'estimated_hours' => 28, 'learners_count' => 760],
        ];
        foreach ($skills as $data) {
            $skill = Skill::create($data);
            $module = Module::create(['skill_id' => $skill->id, 'title' => 'Fondasi ' . $skill->name, 'description' => 'Kenali cara berpikir dan tools yang dipakai praktisi.', 'position' => 1]);
            $module->lessons()->createMany([
                ['title' => 'Mulai dari masalah yang tepat', 'type' => 'article', 'duration_minutes' => 8, 'position' => 1],
                ['title' => 'Latihan pertama', 'type' => 'practice', 'duration_minutes' => 20, 'position' => 2],
            ]);
            Project::create(['skill_id' => $skill->id, 'title' => 'Project pertama ' . $skill->name, 'brief' => 'Buktikan pemahamanmu lewat project yang bisa masuk portfolio.', 'difficulty' => 'Pemula', 'estimated_hours' => 4]);
        }
        User::firstOrCreate(['email' => 'demo@bisa.id'], ['name' => 'Alya Pratama', 'password' => Hash::make('password'), 'streak_days' => 7, 'xp' => 1240]);
    }
}