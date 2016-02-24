<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Topics
        factory(App\Topic::class)->create([
            'name'  => 'Mathematics',
            'slug'  => 'mathematics',
            'color' => '#B30000',
        ]);
        factory(App\Topic::class)->create([
            'name'  => 'Electronics',
            'slug'  => 'electronics',
            'color' => '#0B008A',
        ]);
        factory(App\Topic::class)->create([
            'name'  => 'Chemistry',
            'slug'  => 'chemistry',
            'color' => '#007810',
        ]);
        factory(App\Topic::class)->create([
            'name'  => 'Physics',
            'slug'  => 'physics',
            'color' => '#5E0078',
        ]);
        factory(App\Topic::class, rand(50, 60))->create();
    }
}
