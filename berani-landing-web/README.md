# Berani Digital Talent Platform

*Place where developers can get projects easily. Platform to help developers grow. Home for new start developers to begin their journey.*

## 📚 About

Platform [`Berani Digital Talent Platform`](https://wiki.beranidigital.id/books/product-talent-platform) adalah platform yang digunakan para developer sebagai tempat untuk berkembang dan menunjukkan kemampuan diri mereka.

Kunjungi website `Berani Digital ID` untuk mengetahui lebih lanjut, Silahkan klik [Berani Digital Talent Platform](https://wiki.beranidigital.id/books/product-talent-platform).

## 🧰 Tools

* PHP versi >8.X.X (Disarankan)
* Composer
* DBMS - MySQL

Apabila terjadi `error` saat proses instalasi, silahkan update PHP dan Composer ke versi yang sudah disarankan.

## 💫 Feature

* Platform dapat memasukkan dan menampilkan data-data pribadi tiap *user*.
* Platform dapat memasukkan dan menampilkan `teknologi-teknologi` yang digunakan oleh tiap *user*.
* Platform memungkinkan pengguna untuk mengunggah *file* penting seperti `CV` dalam bentuk `PDF`, `PNG`, atau `JPEG`

Kunjungi bagian [App View](https://github.com/beranidigital/inventory-system/edit/main/README.md#-app-view) untuk melihat detail fitur yang ada dari tiap halaman pada platform Inventory System

## 📜 Technical
* Platform menggunakan *framework* Laravel dalam pengembangan aplikasi berbasis *web*
* Platform terintegrasi dengan sistem `authentication` dari laravel dan OAuth2 Google client
* Terdapat total jumlah 20 tabel di database yang digunakan pada *branch* `feature/rsu-module`, 19 tabel pada *branch* `feature/talent-credit`, dan 17 tabel pada *branch `feature/main`
* Platform menggunakan library `Bootstrap` untuk bagian *front-end*
* Platform menggunakan livewire `Pharaonic`

## 🛠️ Development

### Pre-Requirement
- Sebelum menggunakan platform, terlebih dahulu perlu menginstall bahasa pemrograman `PHP` dan `Composer`

### Add Remote via GIT
> #### Add Remote to Folder - [GIT Talent Platform Link](https://github.com/beranidigital/berani-talent-platform.git)
Jalankan perintah git untuk menyalin project ke local system
```sh
git remote add talent https://github.com/beranidigital/berani-talent-platform.git
```

### Download Via ZIP
#### Atau download versi ZIP dibawah ini
[Download ZIP Talent Platform](https://github.com/beranidigital/berani-talent-platform/archive/refs/heads/main.zip)

### Talent Platform Setup
#### Create `.env` File
- Jika belum terdapat file .env pada projek, Gunakan file .env.example untuk membuat file `.env` baru. Silahkan atur sesuai keperluan.
```sh
cp .env.example .env
```

#### `.env` File Configuration
- Konfigurasi Database di file `.env`

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=berani_talent_platform
DB_USERNAME=root
DB_PASSWORD=password
```

- Konfigurasi `APP` di file `.env` (Opsional)

```sh
APP_NAME=Talent
APP_ENV=local
APP_KEY=base64:Oi6PGVLIZlDebARvU6HyrBT1E3jBWyH5IfOsgGYnFds=
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000/
```

- Jalankan perintah `generate key`

```sh
php artisan key:generate
```

#### Make Database
- Buat `database` dengan nama yang sesuai dengan nama database yang ada di file `.env`.

#### Migration
- Setelah itu, jalankan perintah `migrate` pada projek ini sehingga dapat membuat tabel-tabel yang diperlukan di database.
```sh
php artisan migrate
```

#### Database Seeder
- Gunakan database seeder yang terdapat di project `talent platform` ini. Jalankan perintah berikut
```sh
php artisan migrate:fresh --seed
```

#### Run Application
- Jalankan perintah untuk menjalankan aplikasi di local system
```sh
php artisan serve
```

## 📊 Database Structure
### Tabel *`framework_libraries`*
| id | name | created_at | updated_at |
|----|------|------------|------------|
|    |      |            |            |

### Tabel *`model_has_permission`*
| permission_id | model_type | model_id |
|---------------|------------|----------|
|               |            |          |

### Tabel *`model_has_roles`*
| permission_id | model_type | model_id |
|---------------|------------|----------|
|               |            |          |

### Tabel *`password_resets`*
| email | token | created_at |
|-------|-------|------------|
|       |       |            |

### Tabel *`permissions`*
| id | name | guard_name | created_at | updated_at |
|----|------|------------|------------|------------|
|    |      |            |            |            |

### Tabel *`personal_access_tokens`*
| id | tokenable_type | tokenable_id | name | token | abilities | last_used_at | created_at | updated_at |
|----|----------------|--------------|------|-------|-----------|--------------|------------|------------|
|    |                |              |      |       |           |              |            |            |

### Tabel *`programming_languages`*
| id | name | created_at | updated_at |
|----|------|------------|------------|
|    |      |            |            |

### Tabel *`role_has_permissions`*
| permission_id | role_id |
|---------------|---------|
|               |         |

### Tabel *`roles`*
| id | name | guard_name | created_at | updated_at |
|----|------|------------|------------|------------|
|    |      |            |            |            |

### Tabel *`tools`*
| id | name | created_at | updated_at |
|----|------|------------|------------|
|    |      |            |            |

### Tabel *`user_credit_histories`*
| id | user_id | withdraw_id | amount | action | status | created_at | updated_at |
|----|---------|-------------|--------|--------|--------|------------|------------|
|    |         |             |        |        |        |            |            |

### Tabel *`user_files`*
| id | user_id | file | created_at | updated_at |
|----|---------|------|------------|------------|
|    |         |      |            |            |

### Tabel *`user_framework_libraries`*
| id | user_id | framework_library_id | created_at | updated_at |
|----|---------|----------------------|------------|------------|
|    |         |                      |            |            |

### Tabel *`user_programming_languages`*
| id | user_id | programming_language_id | created_at | updated_at |
|----|---------|-------------------------|------------|------------|
|    |         |                         |            |            |

### Tabel *`user_rsus`*
| id | user_id | amount | is_converted | created_at | updated_at |
|----|---------|--------|--------------|------------|------------|
|    |         |        |              |            |            |

### Tabel *`user_tools`*
| id | user_id | tool_id | created_at | updated_at |
|----|---------|---------|------------|------------|
|    |         |         |            |            |

### Tabel *`users`*
| id | provider_id | name | email | phone_number | country | city | linkedin | github | avatar | credit | rsu_total | password | remember_token | email_verifed_at |
|----|-------------|------|-------|--------------|---------|------|----------|--------|--------|--------|-----------|----------|----------------|------------------|
|    |             |      |       |              |         |      |          |        |        |        |           |          |                |                  |

### Tabel *`withdraws`*
| id | user_id | bank_name | bank_account_number | bank_account_name | created_at | updated_at |
|----|---------|-----------|---------------------|-------------------|------------|------------|
|    |         |           |                     |                   |            |            |

## ✨ App View
### Landing Page View
- Halaman pertama yang akan dikunjungi oleh *user*
- Terdapat nama dari platform ini dan beberapa paragraf yang mendeskripsikan *talent platform*
- Terdapat *button* bertuliskan "Become Talent" yang dimana *button* tersebut mengarahkan *user* ke halaman *register*

![image](https://user-images.githubusercontent.com/107768550/211184764-a5f42bc8-4c41-4f07-87b8-7f585eb3b856.png)

### Register Page View
- Halaman yang digunakan untuk melakukan *sign up* atau *register* akun pada *talent platform*
- Terdapat dua pilih dalam melakukan *register* pada halaman ini, yaitu:
    - Register dengan mengisi data berupa:
        - *Full Name*
        - *Email*
        - *Password*
        - *Confirm Password*
    - Register dengan akun *google*

![image](https://user-images.githubusercontent.com/107768550/211184803-d1f8ffb4-6e4f-4a1a-9307-3a4e397022c6.png)

### Login Page View
- Halaman yang digunakan untuk melakukan *log in* akun pada *talent platform*
- Terdapat dua pilih dalam melakukan *register* pada halaman ini, yaitu:
    - Register dengan mengisi data berupa:
        - *Email*
        - *Password*
    - Register dengan akun *google*

![image](https://user-images.githubusercontent.com/107768550/211184809-477e6c9b-793b-49d0-8bbe-412a8bcbd102.png)

### Talent Page View
- Halaman yang digunakan untuk memasukkan dan melihat data-data pribadi dan data-data yang akan dilihat oleh *recruiter* atau *Human Resources*
- Terdapat data-data pribadi yang bisa dimasukkan dan ditampilkan, yaitu:
    - *Personal Section*
        - *Full Name*
        - *Email*
        - *Phone Number*
        - *Country*
        - *City*
    - *Technologies Section*
        - *Programming Languages*
        - *Frameworks or Libraries*
        - *Tools*
        - *Files*
    - *Links Section*
        - *LinkedIn*
        - GitHub
    - *RSUs Section*
        - *Total RSUs and Equal*
        - Data terkait *Talent RSUs*
            - *Timestamp*
            - *RSUs ID*
            - *Amount*
            - *Status*
    - *Guide Section*
        - *What is the minimum requirements*?
        - *Are these free*?
        - *Is it going to be paid*?
        
![image](https://user-images.githubusercontent.com/107768550/211184977-46fc7267-f785-425a-95c4-3e050d166493.png)

![image](https://user-images.githubusercontent.com/107768550/211184988-e87e3db3-4f91-494f-8cb8-249e2ec7aea5.png)

![image](https://user-images.githubusercontent.com/107768550/211184995-1725a1fc-129c-4dc9-b127-7b2247a17e10.png)
