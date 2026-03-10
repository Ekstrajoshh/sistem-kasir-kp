<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Table;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Default Admin User
        User::create([
            'name' => 'Admin Kasir',
            'email' => 'admin@cafe.com',
            'password' => Hash::make('password'),
        ]);

        // Sample Categories
        $coffee = Category::create(['name' => 'Coffee']);
        $tea = Category::create(['name' => 'Tea']);
        $food = Category::create(['name' => 'Food']);

        // Sample Menus
        Menu::create([
            'category_id' => $coffee->id,
            'name' => 'Espresso',
            'description' => 'Single shot of espresso',
            'price' => 15000,
            'is_available' => true
        ]);

        Menu::create([
            'category_id' => $coffee->id,
            'name' => 'Cappuccino',
            'description' => 'Espresso with steamed milk foam',
            'price' => 25000,
            'is_available' => true
        ]);

        Menu::create([
            'category_id' => $tea->id,
            'name' => 'Matcha Latte',
            'description' => 'Japanese green tea latte',
            'price' => 28000,
            'is_available' => true
        ]);

        // Sample Tables
        for ($i = 1; $i <= 5; $i++) {
            Table::create([
                'table_number' => 'T-0' . $i,
                'capacity' => 2,
                'status' => 'available'
            ]);
        }
        
        Table::create([
            'table_number' => 'VIP-01',
            'capacity' => 6,
            'status' => 'available'
        ]);
    }
}
