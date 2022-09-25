## Тестовое задание на позицию Backend PHP Developer в компанию Mello Interactive B.V.

[Текст задания](/public/Backend_PHP_Developer_Laravel_Test_Assignment_Email_Mello_Recruitment.pdf)  

### Схема развертывания

- Установить Docker и Docker-compose
- Клонировать проект
```bash
git clone https://github.com/sachkov/mello.git
```
- Перейти в папку mello
```bash
cd mello
```
- Переименовать **.env.example** в **.env**
```bash
cp .env.example .env
```
- В зависимости от конфигурации вашей системы возможно необходимо будет изменить адрес локальной сети для подключения к БД, параметр *DB_HOST* в файле **.env**.  
- Собрать проект и запустить проложение
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
- Остановить контейнеры: команда **stop**
```bash
./stop
```
- Запустить контейнеры: команда **stop**
```bash
./up
```
