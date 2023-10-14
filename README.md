#### Клонирование репозитория
```
git clone https://github.com/maximishchenko/altezza-mebel altezza-mebel
```
#### Инициализация окружения
```
php init
```

#### Установка пакетов
```
composer install
```

#### Применение миграций базы данных
```
php yii migrate
```

#### Загрузка наборов тестовых данных
```
php yii fixture/load "*"
```

#### Сборка фронтенда
```
php yii asset assets.php frontend/config/assets-prod.php
```