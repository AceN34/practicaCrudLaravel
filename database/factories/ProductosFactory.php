<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Productos>
 */
class ProductosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            "nombre" => $this->faker->randomElement([
                "Pan", "Leche", "Queso", "Manzana", "Plátano", "Arroz", "Pasta",
                "Pollo", "Carne de vacuno", "Pescado", "Tomate", "Zanahoria", "Aceite de oliva",
                "Cereal", "Yogur", "Chocolate", "Galletas", "Miel", "Café", "Té", "Helado de Menta",
                "Pizza", "Mango", "Lay's Campesinas", "Pringles"
            ]),
            "codigo" => $this->faker->unique()->numberBetween(1000, 9999),
            "unidades" => $this->faker->randomNumber(2),
            "familia" => $this->faker->randomElement([
                "Snacks", "Bebidas", "Helado", "Congelados", "Salsas",
                "Higiene", "Pastas y Arroces", "Fruta"
            ])
        ];
    }
}
