<?
use konturCore\Orm\SettingsOrderFieldTable;
\Bitrix\Main\Loader::includeModule('kontur.core');

SettingsOrderFieldTable::add([
    'NAME' => 'Большой слайдер',
    'PROP_CODE' => 'LANDING_BLOCK_ORDER',
    'VALUE_CODE' => 'BIG_SLIDER',
    'SORT' => '0',
    'DEFAULT_SORT' => '0',
    'ACTIVITY' => true,
]);
SettingsOrderFieldTable::add([
    'NAME' => 'Преиимущества',
    'PROP_CODE' => 'LANDING_BLOCK_ORDER',
    'VALUE_CODE' => 'ADVANTAGES',
    'SORT' => '1',
    'DEFAULT_SORT' => '1',
    'ACTIVITY' => true,
]);
SettingsOrderFieldTable::add([
    'NAME' => 'О компании',
    'PROP_CODE' => 'LANDING_BLOCK_ORDER',
    'VALUE_CODE' => 'ABOUT_COMPANY',
    'SORT' => '2',
    'DEFAULT_SORT' => '2',
    'ACTIVITY' => true,
]);
SettingsOrderFieldTable::add([
    'NAME' => 'Услуги',
    'PROP_CODE' => 'LANDING_BLOCK_ORDER',
    'VALUE_CODE' => 'SERVICES',
    'SORT' => '3',
    'DEFAULT_SORT' => '3',
    'ACTIVITY' => true,
]);
SettingsOrderFieldTable::add([
    'NAME' => 'Дизайн проект',
    'PROP_CODE' => 'LANDING_BLOCK_ORDER',
    'VALUE_CODE' => 'DESIGN_PROJECT',
    'SORT' => '4',
    'DEFAULT_SORT' => '4',
    'ACTIVITY' => true,
]);
SettingsOrderFieldTable::add([
    'NAME' => 'Наши работы',
    'PROP_CODE' => 'LANDING_BLOCK_ORDER',
    'VALUE_CODE' => 'OUT_WORKS',
    'SORT' => '5',
    'DEFAULT_SORT' => '5',
    'ACTIVITY' => true,
]);
SettingsOrderFieldTable::add([
    'NAME' => 'Видео отзывы',
    'PROP_CODE' => 'LANDING_BLOCK_ORDER',
    'VALUE_CODE' => 'VIDEO_REVIEWS',
    'SORT' => '6',
    'DEFAULT_SORT' => '6',
    'ACTIVITY' => true,
]);
SettingsOrderFieldTable::add([
    'NAME' => 'Акции',
    'PROP_CODE' => 'LANDING_BLOCK_ORDER',
    'VALUE_CODE' => 'SALES',
    'SORT' => '7',
    'DEFAULT_SORT' => '7',
    'ACTIVITY' => true,
]);
SettingsOrderFieldTable::add([
    'NAME' => 'Блок обратной связи',
    'PROP_CODE' => 'LANDING_BLOCK_ORDER',
    'VALUE_CODE' => 'FEEDBACK',
    'SORT' => '8',
    'DEFAULT_SORT' => '8',
    'ACTIVITY' => true,
]);
SettingsOrderFieldTable::add([
    'NAME' => 'Отзывы',
    'PROP_CODE' => 'LANDING_BLOCK_ORDER',
    'VALUE_CODE' => 'REVIEWS',
    'SORT' => '9',
    'DEFAULT_SORT' => '9',
    'ACTIVITY' => true,
]);
SettingsOrderFieldTable::add([
    'NAME' => 'Варианты работ',
    'PROP_CODE' => 'LANDING_BLOCK_ORDER',
    'VALUE_CODE' => 'WORK_OPTIONS',
    'SORT' => '10',
    'DEFAULT_SORT' => '10',
    'ACTIVITY' => true,
]);
?>