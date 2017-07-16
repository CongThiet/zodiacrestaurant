<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Mô tả
  Một website về nhà hàng, nơi khách hàng có để đặt món mọi lúc mọi nơi, chỉ cần truy cập trang web của cửa hàng.
  Khách hàng có thể chọn các mon ăn yêu thích của mình.
  Nhà hàng có thể xử lý yêu cầu và quản lý món ăn của cửa hàng mình.

## Website
http://zodiacrestaurant.hol.es/

## Test trên website
  website chia thành 3 cấp độ level
  - *1: admin-chủ cửa hàng*: Tài khoản test: ```tranvananuet@gmail.com - 123456```
  - *2: nhân viên*: Tài khoản test: ```herolhp96@gmail.com - 123456```
  - *3: khách hàng*: Tài khoản mặc định khi 1 thành viên đăng kí trên website


## Ngôn ngữ
  HTML, CSS, JS, PHP

## Framework
  Laravel

## Database
  Mysql

## Import Database
- Tạo một database, import file ```restaurant_db.sql```.

## Run
1. Clone the directory
2. Composer Update
  ```composer update```
3. Set Up Database Connection
  - Sửa cấu hình trong file ```.env.example``` và ```config/database.php``` 
    <li>DB_DATABASE= tên database</li>
    <li>DB_USERNAME=tên người dùng đc quyền truy cập database</li>
    <li>DB_PASSWORD= mật khẩu người dùng được quyền truy cập database</li>
4. Setup the Key
  ```php artisan key:generate```
5. Run The Website
  ```php artisan serve```