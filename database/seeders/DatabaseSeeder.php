<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Database\Seeders\DataSeeders\BookIntroductions;
use Database\Seeders\DataSeeders\Categories;
use Database\Seeders\DataSeeders\CategoryRelationships;
use Database\Seeders\DataSeeders\Documentaries;
use Database\Seeders\DataSeeders\InternationalDocuments;
use Database\Seeders\DataSeeders\Posts;
use Database\Seeders\DataSeeders\Professors;
use Database\Seeders\DataSeeders\ResearchSubjects;
use Database\Seeders\DataSeeders\SocialMedia;
use Database\Seeders\DataSeeders\TagLabels;
use Database\Seeders\DataSeeders\Tags;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Ybazli\Faker\Facades\Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            PermissionsSeeder::class,
        ]);

    }
}
