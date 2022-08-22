<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->create([
            'name' => 'Pablo',
            'email' => 'pablorozin91@gmail.com',
            'password' => Hash::make('Pinocho01.'),
        ]);

        $typeBelihands = ProductType::factory()->create([
            'slug' => 'belihands',
            'name' => 'Belihands',
            'price' => 1900,
            'description' => 'Los Belihands son una idea de diseño industrial bajo diseños únicos.<br>Son pequeñas piezas, fabricadas en madera maciza torneada.<br>Su conformación y acabado final se realiza totalmente a mano.<br>Su creación está basada en una superficie de revolución, bajo pautas de diseño que dan a cada personaje su propia identidad.<br>Son piezas decorativas de uso propio, para regalo o colección. No son juguete.',
            'presentation' => 'En estuche de cartulina, con su sticker autoadhesivo desmontable y prospecto contando la historia del club de fútbol que representa.',
            'video_code' => 'ONkZECn6EkM',
        ]);

        $typeImanes = ProductType::factory()->create([
            'slug' => 'imanes',
            'name' => 'Imanes',
            'price' => 700,
        ]);

        $typeStickers = ProductType::factory()->create([
            'slug' => 'tickers',
            'name' => 'Stickers',
            'price' => 400,
        ]);

        $categoryNames = [
            'Fútbol Argentino',
            'Fútbol Inglés',
            'Fútbol Chileno',
            'Selecciones del Mundo',
            'Personajes Populares',
        ];

        $categories = [];

        foreach ($categoryNames as $categoryName) {
            $categories[] = ProductCategory::factory()->create([
                'slug' => str($categoryName)->slug(),
                'name' => $categoryName,
            ]);
        }
        
        for ($i=0; $i < 50; $i++) { 
            $name = fake()->name;
            $slug = Product::max('id') + 1 . '-' . str($name)->slug;

            Product::factory()->create([
                'product_type_id' => $typeBelihands->id,
                'product_category_id' => $categories[rand(0, 4)]->id,
                'slug' => $slug,
                'name' => $name,
                'code' => fake()->word,
                'description' => fake()->text,
                'keywords' => fake()->text,
                'image' => 'https://picsum.photos/600/600',
                'is_new' => rand(0, 1),
                'is_bestseller' => rand(0, 1),
                'offer_price' => [1800, 1500, 1600, null, null, null, null][rand(0, 6)],
            ]);
        }
    }
}
