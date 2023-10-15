#### Клонирование репозитория
```
git clone https://github.com/maximishchenko/altezza-mebel altezza-mebel
```

#### Установка пакетов
```
composer install
```

#### Инициализация окружения
```
php init
```

#### Указать параметры подключения к БД и отправки сообщений (Email и Telegram) в файлах:

```
common/config/common-local.php
common/config/params-local.php
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