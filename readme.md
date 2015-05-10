## Admin-RH

This is a small system for Human Resources Management.

## Requirements

- PHP >=5.5
- MySQL
- Composer

## Installation

### Clone this repository

```
git clone https://github.com/pau87x/Admin-RH.git
```
### Execute  `composer install`

### Configure the database connection information

Edit the `config/database.php` file to suit your needs.

### Import the script adminrh_cities.sql 

This script is used for states from México, you can change.

### Run the migrations and seeds

```
php artisan migrate
php artisan db:seed
```

###Demo 

[Link](http://104.236.208.94/)

Email: admin@admin.com
Password: admin


