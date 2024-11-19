<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Song;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artist::factory()
            ->count(3)
            ->has(
                Album::factory()
                ->count(3)
                ->hasAttached(
                    Song::factory()->count(7),
                    fn()=>['track_number' => fake()->numberBetween(1, 10)]
                )
            )
            ->create();
    }
}
