## Requirements

#### Framework :
- Laravel 9.11
#### Programming language:
- PHP >= 8.1
#### PHP extension :
- php_openssl enabled
- php_pdo_mysql enabled
- php_mbstring enabled
- php_zip enabled
- php_dbase enabled
- php_rar enabled
- php_xml enabled
- php_gd2 enabled
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP extension
- JSON PHP Extension
- Tokenizer PHP Extension
#### DB:
- MySql >= 8.0
- Redis
#### Other :
* Composer
* Node V16
* Server: Nginx / Apache / ...
* Supervisor / nohup

## Installation
##### 1. Clone & install
You must clone the project from a repository. For clone the project enter the next command:
```bash
git clone git@git....git
cd example-app
git checkout <example-app>
composer install
php artisan key:generate
```
Git branches:
* `master` - production branch


##### 2. Configure `.env`

* Copy **.env.example** in a bash `cp .env.example .env` or in an other terminal `php -r "file_exists('.env') || copy('.env.example', '.env');"`
* Configure the **.env** to your needs


##### 3. Create database
```mysql
create database app_db;
```

##### 4. Configuration of the .env file
```bash
#database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=app_db
DB_USERNAME=<mysql-user-name-whith-grant-privileges>
DB_PASSWORD=<mysql-user-password-whith-grant-privileges>

#email
MAIL_MAILER=smtp
MAIL_HOST=<smtp.mailtrap.io>
MAIL_PORT=2525
MAIL_USERNAME=<username>
MAIL_PASSWORD=<password>
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

##### 5. Run migrations 
```bash
php artisan migrate
```

##### 6. Run seeder 
```bash
php artisan db:seed
```

##### 7. Generate storage link 
```bash
php artisan storage:link
```

## Supervisor Configuration
Supervisor is a process monitor for the Linux operating system, and will automatically restart your  queue:work process if it fails. To install Supervisor on Ubuntu, you may use the following command:
```bash
sudo apt-get install supervisor
```
Supervisor configuration files are typically stored in the /etc/supervisor/conf.d directory. Within this directory, you may create any number of configuration files that instruct supervisor how your processes should be monitored. For example, let's create a laravel-worker.conf file that starts and monitors a  queue:work process:
```bash
[program:laravel-worker]
process_name=%(program_name)s_%(process_num)02d
; command=php /path/to/app.com/artisan queue:work --sleep=3 --tries=3
autostart=true
autorestart=true
user=www-data
numprocs=8
redirect_stderr=true
stdout_logfile=/path/to/app.com/worker.log
```
if you are not using Laravel Horizon then comment out the command `command=php /path/to/app.com/artisan horizon` and uncomment command `command=php /path/to/app.com/artisan queue:work --sleep=3 --tries=3`


Once the configuration file has been created, you may update the Supervisor configuration and start the processes using the following commands:

```bash
sudo supervisorctl reread

sudo supervisorctl update

sudo supervisorctl start laravel-worker:*
```
For more information on Supervisor, consult the [Supervisor documentation](http://supervisord.org/index.html)

###### Laravel Documentation - [here](https://laravel.com/docs/9.x/)

## Front-end

#### Install modules:

```bash
npm install
```

#### Build command
```bash
npm run watch // for develop or npm run dev
npm run prod // for production
```

## Build with SAIL

```bush
./vendor/bin/sail up -d
// or use docker compose file
docker-compose up -d 
```
with sail we have configured supervisor (runing server and queue)
###### Laravel sail documentation - [here](https://laravel.com/docs/9.x/sail)


## Developer
Crafted with ♥ by Serhii Khomych
