# Soundcloud parser
---
composer install

Mysql упакован в docker-compose и находится на 3312 порту: 

`docker-compose up`

Для начала надо накатить миграции:
`./vendor/bin/doctrine-migrations migrate`

Чтобы запустить парсер:`php index.php <Имя исполнителя>`

(например если https://soundcloud.com/aljoshakonstanty, то имя aljoshakonstanty)

---
Парсер парсит только, то что выдает curl, а из-за наличия js и всяких подгрузок он выводит не всё 

Для полного парсинга soundcloud надо использовать puppeteer и node.js 