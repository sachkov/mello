## Тестовое задание на позицию Backend PHP Developer в компанию Mello Interactive B.V.

[Текст задания](/public/Backend_PHP_Developer_Laravel_Test_Assignment_Email_Mello_Recruitment.pdf)  

### Схема развертывания

- Установить Docker и Docker-compose
- Клонировать проект [https://github.com/sachkov/mello](https://github.com/sachkov/mello.git)  
- Переименовать **.env.example** в **.env**
- В зависимости от конфигурации вашей системы возможно необходимо будет изменить адрес локальной сети для подключения к БД, параметр *DB_HOST* в файле **.env**.  
- Запустить сервер (из папки проекта)
```bash
./start
```
- Запустить миграции
```bash
php artisan migrate
```
- Запустить наполнение таблиц
```bash
php artisan db:seed
```

### Не успел добавить:

1. Юнит тесты.  
2. Описание классов и методов docblock.  
