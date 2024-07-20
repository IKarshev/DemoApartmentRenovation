# Демо готового решения "365+ ремонт квартир"

## Описание проекта

Проект поддерживает редакции "Старт" и выше.

Для удобства разработки используются [миграции Баз Данных](https://github.com/arrilot/bitrix-migrations?tab=readme-ov-file)

## Процесс установки тестовой копии:

1. Клонировать репозиторий.
2. Скопировать папку `/upload/` с боевого сайта.
3. Создать `.htaccess` в корне сайта.
4. Перенести базу данных с помощью резервного копирования и bitrix скрипта `restore.php` .
5. Создать `/bitrix/.settings_extra.php` и прописать там доступы к базе данных:

```bash
<?php
return array (
	'connections' => array (
		'value' => array (
			'default' => array (
				'className' => '\\Bitrix\\Main\\DB\\MysqliConnection',
				'host' => "",
				'database' => "",
				'login' => "",
				'password' => "",
				'options' => 2,
			),
		),
	),
    	'exception_handling' => array(
        	'value' => array(
                'debug' => true,
        	)
    	),
);
```