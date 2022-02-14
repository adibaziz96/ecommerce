<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

### Instructions

- Clone this repo into your setup
- run composer install
- run npm install
- create and copy .env.example into .env
- run php artisan optimize:clear
- run php artisan migrate:fresh --seed
- run npm run watch

### Requirements

This project use
 - VueJS
 - TailwindCSS
 - Laravel Framework
 - MySQL

### Credential

#Member
- email: member@member.com
- password: password
- Description: this user role can add to cart, remove from cart, place order and view order history (have discount on product)

#Guest
- email: guest@guest.com
- password: password
- Description: this user role can add to cart, remove from cart, place order and view order history

#Admin
- email: admin@admin.com
- password: password
- Description: this user role can add to cart, remove from cart, place order, view order history and view activity log

For demo can access into this url as below:
