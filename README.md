# Как открыть мой проект

### Диаграмма базы данных

<img src="C:\OSPanel\domains\basic\web\image\diagrama.png">

### Описание проекта "No_ozone"

Проект для онлайн-магазина "No_ozone":

- База данных, состоящая из 13 связанных таблиц.

- Разделение на административную сторону и сторону пользователя

- Проект создан на языке программирования PHP на Framework Yii2.

### Команды для установки проекта "No_ozone"

1- Скачиваем проект с GitHub `https://github.com/Nikatseplyaeva/no_ozone.git`

<img src="C:\OSPanel\domains\basic\web\image\github.png">

2- Устанавливаем OSPanel

3- Проверяем, есть ли в OSPanel Composer:

- Запускаем OSPanel и заходим в Console
- Пишем в командной строке: `composer -v`
- Если Composer отсутствует, то пишем следующее
  ```
  curl -sS https://getcomposer.org/installer 
  | php mv composer.phar /usr/local/bin/composer
  ```

4- Дальше устанавливаем Yii2:

Пишем в командной строке 
```
composer create-project --prefer-dist yiisoft/yii2-app-basic basic
```

5- Теперь открываем basic, который находится в C:\OSPanel\domains и меняем его на скаченный basic с GitHub

Все, наш проект доступен для открытия:

<img src="C:\OSPanel\domains\basic\web\image\basic.png">

или по ссылке `http://basic:8080/`.

### Импорт базы данных

1- Скачиваем с GitHub файл `no_ozone.sql` и переходим в PhpMyAdmin `http://127.0.0.1:8080/openserver/phpmyadmin/index.php`

2- Вводим логин root

3- Создаем новую базу данных с именем "no_ozone" и таким сравнением:

<img src="C:\OSPanel\domains\basic\web\image\bd1.png">

4- Переходим в импорт и вставляем наш скаченный с GitHub файл `no_ozone.sql`

Наша база данных подключена.

### Спецификация для запуска

Перед запуском необходимо удостовериться в настройках OSPanel, что выбраны правильные модули.

Убедитесь, что во вкладке Модули у вас стоят такие же версии.

<img src="C:\OSPanel\domains\basic\web\image\spec.png">





