<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Тестовое задание:

Сделать форму обратной связи.
При сохранении заявки использовать паттерн фабрика.
Реализовать структуру, чтобы можно было добавлять новые места для хранения заявок, например другая база данных или email.
Изначально реализовать сохранение в базу и в файл. Саму структуру базы можно не делать.

Поля: имя, телефон, само обращение. Валидация данных на бекенде.

Что необходимо использовать:
- PHP 7
- ООП (для создания заявки и места для хранения заявки)
- Фреймворк Laravel или mvc фреймворк
- DDD для организации приложения (не обязательно)
- Обязательно Vuejs

## Реализация тестового задания

- Установлен Laravel 8, поскольку 9 версия поддерживает php с 8 версии;
- Установлен Vue 3, Bootstrap 5, Axios
- База данных, помимо предустановленных содержит таблицу orders, в которую пишутся все заявки с фронта, можно отключить.
- Кофигурация записи (файл, БД или другое) меняется в конфигурационном файле feedback.php
- Развертывание стандартное, без сидов, лишних пакетов типа UI или авторизации не устанавливалось.
- Главная страница, сразу форма отзывов с валидацией, которую в отдельный класс тоже не стал выносить за ненадобностью.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
