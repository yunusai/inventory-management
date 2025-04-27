<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        $adminId = DB::table('admins')->first()->id;

        DB::table('suppliers')->insert([
            [
                'name' => 'Tech Supplier Inc.',
                'contact_info' => 'tech@supplier.com',
                'created_by' => $adminId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fashion Co.',
                'contact_info' => 'fashion@supplier.com',
                'created_by' => $adminId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Book Distributor',
                'contact_info' => 'books@supplier.com',
                'created_by' => $adminId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
