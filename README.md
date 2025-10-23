# 🧩 HORUS-RISKI-EXAM

![PHP](https://img.shields.io/badge/PHP-8.x-blue?logo=php)
![Laravel](https://img.shields.io/badge/Laravel-9.x-red?logo=laravel)
![MySQL](https://img.shields.io/badge/MySQL-8.x-blue?logo=mysql)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-purple?logo=bootstrap)


Proyek ini merupakan implementasi **CRUD User Management System** berbasis **Laravel 9**, menggunakan **MySQL** sebagai database dan **Blade + Bootstrap** sebagai frontend framework.  
Aplikasi ini mendukung proses **registrasi, login, update, dan delete user**, serta menerapkan **autentikasi middleware** untuk mengamankan halaman dashboard.

---

## 🚀 1. Fitur Utama

### 🔐 Autentikasi Pengguna
- Registrasi akun baru melalui endpoint `/users/register`.
- Login menggunakan username dan password.
- Validasi dilakukan di sisi **client dan server**.

### 📋 CRUD User
- Menampilkan semua data pengguna (tanpa password).
- Update dan hapus data user.
- Hanya pengguna yang **sudah login** yang bisa mengakses halaman dashboard.

### 🎨 Tampilan (Frontend)
- Menggunakan **Laravel Blade** sebagai template engine.
- Menggunakan **Bootstrap 5** untuk layout responsif dan tampilan modern.
- Validasi form di sisi klien dengan JavaScript + Regex.

## 🗄️2. Desain Database

Nama Database: horus_riski_db

## 📋 Tabel: users
Kolom	            Tipe Data	            Keterangan
id	                BIGINT  (AI)	        Primary Key
username	        VARCHAR(50)	            Unik, Wajib diisi
password	        VARCHAR(255)	        Disimpan dalam bentuk hash
email	            VARCHAR(100)	        Unik, Wajib diisi
nama	            VARCHAR(100)	        Wajib diisi
created_at	        TIMESTAMP	            Default waktu saat ini
updated_at	        TIMESTAMP	            Otomatis diperbarui Laravel

## 🔗3. Endpoint REST API
Method	        Endpoint	        Deskripsi	
POST	        /users/register	    Registrasi pengguna baru	
POST	        /users/login	    Autentikasi pengguna	
GET	            /users	            Mendapatkan semua data user	
PUT	            /users/{id}	        Update data user berdasarkan ID	
DELETE	        /users/{id}	        Hapus user berdasarkan ID

## 💡4. Alur Aplikasi

1. Halaman Login
- Pengguna memasukkan username & password.
- Jika berhasil → diarahkan ke Dashboard.
- Jika gagal → muncul pesan “Username atau password salah”.

2. Halaman Registrasi
- Semua field wajib diisi.
- Jika registrasi berhasil → notifikasi sukses → diarahkan ke Login.
- Jika gagal → pesan error seperti “Username sudah digunakan”.

3. Dashboard
- Menampilkan semua pengguna.
- Dapat melakukan Search, Update, dan Delete.
- Hanya bisa diakses jika pengguna sudah login (middleware auth).

4. Halaman Update User
- Data user terisi otomatis.
- Pengguna dapat mengubah nama, username, atau email.
- Setelah update → kembali ke Dashboard.

## ⚙️ 5. Cara Instalasi
**🧰 Persyaratan**
- PHP 8.x
- Composer
- MySQL 

**🔧 Langkah-Langkah Instalasi**

1. Clone Repository
- git clone https://github.com/username/horus-riski-exam.git
- cd horus-riski-exam/backend

2. Install Dependensi Laravel
- composer install
- Salin File .env
- cp .env.example .env

Lalu sesuaikan konfigurasi database:
- DB_DATABASE=horus_riski_db
- DB_USERNAME=root
- DB_PASSWORD=


4. Generate Key & Migrasi Database
- php artisan key:generate
- php artisan migrate

5. Jalankan Server
- php artisan serve
- Akses di: 👉 http://localhost:8000

## 📦 6. Teknologi yang Digunakan
Komponen	    Teknologi / Versi
Backend	        PHP 8.x, Laravel 9.x
Database	    MySQL
Frontend	    Laravel Blade, Bootstrap 5
Auth System	    Laravel Auth Middleware
Security	    Laravel CSRF Protection

## 👨‍💻 7. Developer
- Nama: M. Riski Syafrullah
- Project: HORUS User Management Exam
- Framework: Laravel 9
- Database: MySQL
- Frontend: Bootstrap + Blade

## 📜 Lisensi
Proyek ini dibuat untuk keperluan ujian teknikal dan pembelajaran.
Diperbolehkan untuk dikembangkan kembali dengan mencantumkan sumber.
