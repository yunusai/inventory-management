<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        $adminId = DB::table('admins')->first()->id;
        $categoryIds = DB::table('categories')->pluck('id')->toArray();
        $supplierIds = DB::table('suppliers')->pluck('id')->toArray();

        DB::table('items')->insert([
            [
                'name' => 'Laptop',
                'description' => 'Gaming Laptop',
                'price' => 1200.50,
                'quantity' => 10,
                'category_id' => $categoryIds[0], // Electronics
                'supplier_id' => $supplierIds[0], // Tech Supplier Inc.
                'created_by' => $adminId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'T-Shirt',
                'description' => 'Cotton T-Shirt',
                'price' => 15.99,
                'quantity' => 50,
                'category_id' => $categoryIds[1], // Clothing
                'supplier_id' => $supplierIds[1], // Fashion Co.
                'created_by' => $adminId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Novel',
                'description' => 'Fiction Novel',
                'price' => 9.99,
                'quantity' => 30,
                'category_id' => $categoryIds[2], // Books
                'supplier_id' => $supplierIds[2], // Book Distributor
                'created_by' => $adminId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
