# Laravel 12 Inventory Management API

Proyek ini merupakan API sederhana untuk mengelola data Admin, Item, Category, dan Supplier menggunakan Laravel 12.

## Langkah Pembuatan Aplikasi

1. Inisialisasi projek Laravel 12 menggunakan Laragon.
2. Membuka Visual Studio Code.
3. Menginstalasikan route API dan Laravel/Sanctum pada project Laravel dengan `php artisan install:api`.
4. Membuat migrations untuk Admin, Item, Category, dan Supplier beserta model menggunakan `php artisan make:model NamaModel -m`.
5. Menambahkan kolom `username`, `password`, dan `email` pada migrations `create_admins_table`.
6. Menambahkan kolom `name`, `description`, dan `created_by` (Constrained dengan `id(admins)`) pada migrations `create_categories_table`.
7. Menambahkan kolom `name`, `contact_info`, dan `created_by` (Constrained dengan `id(admins)`) pada migrations `create_suppliers_table`.
8. Menambahkan kolom `name`, `description`, `price`, `quantity`, `category_id` (Constrained dengan `id(categories)`), `supplier_id` (Constrained dengan `id(suppliers)`), dan `created_by` (Constrained dengan `id(admins)`) pada migrations `create_items_table`.
9. Melakukan migrasi dengan command `php artisan migrate` untuk melakukan migrasi ke database MySQL.
10. Membuat seeder untuk `admins`, `categories`, `items`, dan `suppliers`.
11. Melakukan seeding menggunakan `php artisan db:seed`.
12. Melakukan penambahan kode `$fillable` untuk setiap model.
13. Melakukan penambahan kode fungsi `createdBy()` yang menyatakan bahwa `created_by` belongsTo tabel `admins` pada model `Item`, `Category`, dan `Supplier`.
14. Menambahkan kode fungsi `category()` dan `supplier()` yang menyatakan bahwa `supplier_id` belongsTo tabel `suppliers` dan `category_id` belongsTo tabel `categories`.
15. Membuat `ItemController`, `CategoryController`, dan `SupplierController`.
16. Membuat kode fungsi `index()` pada `ItemController`, `CategoryController`, dan `SupplierController` sebagai fungsi yang dapat dipanggil untuk melakukan read pada data yang dimiliki dari tabel `items`, `categories`, atau `suppliers`.
17. Menambahkan route untuk semua akses pada `index()` di `ItemController`, `SupplierController`, dan `CategoryController` di `routes/api.php`.
18. Mengujikan kode pada Postman.
19. Menambahkan kode fungsi `store()` pada `ItemController`, `CategoryController`, dan `SupplierController` sebagai fungsi yang dipanggil ketika melakukan create pada tabel `items`, `categories`, atau `suppliers`.
20. Menambahkan route untuk semua akses pada `store()` di `ItemController`, `SupplierController`, dan `CategoryController` di `routes/api.php`.
21. Mengujikan kode pada Postman.
22. Menambahkan fungsi `summary()` pada `ItemController` untuk menampilkan ringkasan stok barang termasuk stok total, total nilai stok (harga x jumlah), dan rata-rata harga barang.
23. Menambahkan route-nya di `routes/api.php`.
24. Mengujikan kode pada Postman.
25. Menambahkan fungsi `lowStock()` pada `ItemController` untuk menampilkan daftar barang yang stoknya di bawah ambang batas tertentu (misalkan di bawah 5 unit).
26. Menambahkan route-nya di `routes/api.php`.
27. Mengujikan kode pada Postman.
28. Membuat `Dockerfile` dan `docker-compose.yml`.
29. Melakukan `docker-compose up -d`.
30. Menguji dengan Postman.

---

## Tools & Teknologi

- Laravel 12
- Sanctum Authentication
- MySQL
- Docker & Docker Compose
- Postman (untuk pengujian API)
- Visual Studio Code
- Laragon (development environment)

## Author

_Dibuat dengan ❤️ menggunakan Laravel_

