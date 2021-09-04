# shopentuk

## how to run in local 
- make sure you already install nodejs, php, mysql, and composer
- open your project in terminal/ cmd (2 instances)
- copy .env.example to .env
- edit .env with your config details
### run in first terminal (this command will run php server on local)
- npm install
- npm run dev
- composer install
- php artisan key:generate
- php artisan migrate:fresh --seed
- php artisan serve
### run in second terminal (this command will activate games auto run)
- php artisan schedule:work
