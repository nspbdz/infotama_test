1. nyalakan xampp
2. composer install
3. .env example rename .env
4. buat database sesuaikan dengan nama di dalam env
example:
DB_DATABASE=infotama_test
DB_USERNAME=isi username
DB_PASSWORD=isi password

5. php artisan migrate:fresh --seed
6. php artisan serve

akses di
http://127.0.0.1:8000/
