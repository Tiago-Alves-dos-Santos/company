<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Facade\ServiceFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(2)->create();
        \App\Models\User::create([
            'name' => 'Tiago Alves dos Santos de Oliveira',
            'email' => 'tiagooliveiraaso@gmail.com',
            'password' => bcrypt('02022001'),
            'email_verified_at' => now(),
            'level_access' => 'first'
        ]);
        $this->startTagsWithContents();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }

    private function startTagsWithContents()
    {
       $tagsContentSeeder = new TagsContentSeeder();
       $tagsContentSeeder->run();
    }
}
