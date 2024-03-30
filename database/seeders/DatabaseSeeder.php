<?php

namespace Database\Seeders;

use App\Models\ColorMethod;
use App\Models\ColorNameMethod;
use App\Models\User;
use App\Models\Style;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $styles = [
            ["style_name" => "Hair Punk", "desc" => "Week Style Kekinian"],
            ["style_name" => "Yellow Rainbow", "desc" => "Week Style Kidz Zaman Now"],
            ["style_name" => "Relic Style", "desc" => "Week Style Classic"]
        ];
        $colorMethods = [
            ["name" => "Roasted", "description" => "Pengolahan warna dengan dibakar"],
            ["name" => "Boiled", "description" => "Pengolahan warna dengan di rebus"],
            ["name" => "Printed", "description" => "Pengolahan warna dengan di print"]
        ];
        $colorMethodIds = [];
        foreach ($colorMethods as $data) {
            $colorMethod = ColorMethod::create($data);
            $colorMethodIds[$data['name']] = $colorMethod->id;
        }
        // Seed data for color_name_methods table with foreign key references
        $colorNameMethods = [
            ["name" => "Red Classic", "color_method" => $colorMethodIds['Roasted']],
            ["name" => "Blue Marin", "color_method" => $colorMethodIds['Roasted']],
            ["name" => "Dark Morron", "color_method" => $colorMethodIds['Boiled']],
            ["name" => "Grey Water", "color_method" => $colorMethodIds['Printed']]
        ];

        // Create color_name_methods records

        foreach ($styles as $data) {
            Style::create($data);
        }
        foreach ($colorNameMethods as $data) {
            ColorNameMethod::create($data);
        }
    }
}
