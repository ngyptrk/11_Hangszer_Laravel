<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    protected array $productData = [
        [
            'name' => 'árvíztűrő tükörfúrógép',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque, justo id dapibus convallis, est sapien consequat nibh, ut tristique tellus magna a mi. Vestibulum interdum orci non lectus tincidunt dictum. Etiam facilisis orci a elit facilisis, ac pretium velit dictum. Pellentesque eu auctor diam. Curabitur suscipit leo eu sollicitudin venenatis.',
            'brand' => 'Fender',
            'price' => 649900,
            'quantity' => 1
        ],
        [
            'name' => 'Troublemaker Telecaster',
            'description' => 'Quisque vel tellus nec leo vestibulum molestie. Donec fringilla urna non erat dictum posuere. Nullam luctus convallis facilisis. Praesent elementum varius metus sit amet elementum. Praesent vitae leo non sapien rutrum elementum. Aenean eget hendrerit turpis. Morbi in sagittis quam, varius finibus nisi. Sed eu mi malesuada, semper felis eu, rutrum tellus. Quisque rutrum id dui vitae luctus. Praesent vehicula cursus mollis.',
            'brand' => 'Fender',
            'price' => 469990,
            'quantity' => 3
        ],
        [
            'name' => 'PM-2 Standard Parlor, Natural',
            'description' => 'Nulla mollis arcu magna. Mauris ac commodo turpis, eget placerat ligula. Suspendisse potenti. Nullam congue nisi at quam interdum, eget consectetur sem ultricies. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum scelerisque risus mi, eget lacinia purus sagittis in. Suspendisse blandit eu est a placerat.',
            'brand' => 'Fender',
            'price' => 217500,
            'quantity' => 8
        ],
        [
            'name' => 'Steve Vai Signature JEM77 - Blue Floral Pattern',
            'description' => 'Nunc lorem lacus, commodo a eros a, venenatis eleifend nunc. Pellentesque interdum, odio tincidunt aliquam aliquam, velit nulla tempus tortor, non tempus mi turpis ut risus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus vitae aliquet arcu. Sed pretium, ipsum sed sagittis tempus, magna ligula sollicitudin massa, mollis suscipit arcu arcu sed est. Nam eleifend dui ante, sit amet ultrices dui laoreet ac.',
            'brand' => 'Ibanez',
            'price' => 474775,
            'quantity' => 2
        ],
        [
            'name' => 'J Custom RG8560 Electric Guitar - Sapphire Blue',
            'description' => 'Vivamus eu purus luctus, porta orci et, gravida nulla. Duis elementum lacus eu arcu ullamcorper tincidunt. Integer quis sem et ante mollis finibus vitae et nunc. Sed porttitor interdum ipsum, sit amet varius dui convallis non. Mauris lobortis erat ac urna dictum mollis. Nam luctus urna quis erat venenatis, imperdiet dapibus est sodales. Fusce ornare consequat felis, eu accumsan erat vulputate quis. Donec suscipit consequat mi quis posuere. Donec nulla augue, imperdiet sed orci at, tristique pretium ipsum. Mauris a lacus mauris. Integer pretium fringilla lacus vitae dignissim.',
            'brand' => 'Ibanez',
            'price' => 892800,
            'quantity' => 1
        ],
        [
            'name' => 'Viper-1000 - See Thru Black Cherry Satin',
            'description' => 'Vivamus eu purus luctus, porta orci et, gravida nulla. Duis elementum lacus eu arcu ullamcorper tincidunt. Integer quis sem et ante mollis finibus vitae et nunc. Sed porttitor interdum ipsum, sit amet varius dui convallis non. Mauris lobortis erat ac urna dictum mollis. Nam luctus urna quis erat venenatis, imperdiet dapibus est sodales.',
            'brand' => 'ESP LTD',
            'price' => 329000,
            'quantity' => 4
        ],
        [
            'name' => 'fuvola',
            'description' => 'szépen fütyül',
            'brand' => 'adidas',
            'price' => 320000,
            'quantity' => 20
        ],
        [
            'name' => 'tilinkó',
            'description' => 'blabla',
            'brand' => 'brand',
            'price' => 90000,
            'quantity' => 3
        ],
        [
            'name' => 'hegedű',
            'description' => 'blabla',
            'brand' => 'brand',
            'price' => 2000,
            'quantity' => 10
        ],
        [
            'name' => 'zongora',
            'description' => 'blabla',
            'brand' => 'brand',
            'price' => 60000,
            'quantity' => 3
        ],
        [
            'name' => 'hegedű',
            'description' => 'blabla',
            'brand' => 'brand',
            'price' => 2000,
            'quantity' => 10
        ]
    ];


    protected function withFaker()
    {
        // Manuális beállítás az app config felülírására
        return \Faker\Factory::create('hu_HU');
    }


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Véletlenszerűen kiválasztunk egy elemet a $productData tömbből
        $randomProduct = $this->faker->randomElement($this->productData);
        $randomUniqueNumber = $this->faker->unique()->randomNumber(6, true);
       

        return [
            //         // Fix adatok a kiválasztott elemből
            //'name' => $randomProduct['name'] . ' (' . $this->faker->unique()->city() . ')', // Némi variáció hozzáadása
            'name' => $randomProduct['name'] . ' (' . $randomUniqueNumber . ')', // Némi variáció hozzáadása
            //'description' => $randomProduct['description'],
            'description' => $this->faker->sentence(),
            //'picture' => $randomProduct['picture'],
            //'picture' => $this->faker->imageUrl(),
            'brand' => $randomProduct['brand'] . '('. $randomUniqueNumber . ')',

            // Véletlen adatok a Faker segítségével
            'price' => $this->faker->numberBetween(500, 5000), // Véletlen ár 500 és 5000 között
            'quantity' => $this->faker->numberBetween(0, 1000),   // Véletlen raktárkészlet 0 és 1000 között

        ];
    }
}
