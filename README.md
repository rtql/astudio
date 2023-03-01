




	
**Admin default account**
- Email: admin@gmail.com
- Password: password123

------------

**Install**


git clone https://github.com/rtql/astudio


composer install --ignore-platform-reqs

cp .env.example .env

php artisan key:generate

php artisan migrate --seed

php artisan storage:link
