

## Laravel Vue

Данное приложение является редактором форм.

Также принимает запросы в формате API: JSON-RPC v2.0 при помощи пакета sajya/server.

Сделал на Laravel и Vue.js, создания форм со стороны laravel, а заполнения форм на Vue.js

Дамп базы хранится в папке database.

----
Запустить можно локально:

cd database 

make file database.sqlite 

cd ..

cp .env.example .env

composer update

php artisan migrate


php artisan serve (обязательно должен быть http://127.0.0.1:8000)

----


Для приложения site:


cd frontend

frontend > npm install

frontend > npm start

Runs the app in the development mode.\
Open http://localhost:8080 to view it in your browser.

------
###От себя
Спасибо за тест,
Тест очень интересный и необычный. 
Хотелось бы написать по паттернам и учесть маленькие детали,
но к сожелению связи с дедлайном на работе многое упустил.
