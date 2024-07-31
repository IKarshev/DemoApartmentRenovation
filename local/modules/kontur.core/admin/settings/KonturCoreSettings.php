<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php"); // первый общий пролог
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php"); // второй общий пролог
// require Classes
use \Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Grid\Options as GridOptions;
use Bitrix\Main\UI\PageNavigation;

use konturCore\Helper;

// require modules
Loader::includeModule('kontur.core');

$APPLICATION->SetTitle( Loc::getMessage('GLOBAL_MENU_TAB_NAME') );
CJSCore::Init(array("jquery"));
?>

<?$APPLICATION->IncludeComponent(
	"kontur:admin_settings",
	"",
	Array(
		"SETTINGS" => [
            "LOGO" => [
                'NAME' => 'Логотип',
                'CODE' => 'LOGO',
                'TYPE' => 'FILE',
                'MULTIPLE' => 'N',
            ],
            "COLOR_PRIMARY" => [
                'NAME' => 'Основной цвет',
                'CODE' => 'COLOR_PRIMARY',
                'TYPE' => 'COLOR',
            ],
            "COLOR_SECONDARY" => [
                'NAME' => 'Второстепенный цвет',
                'CODE' => 'COLOR_SECONDARY',
                'TYPE' => 'COLOR',
            ],
            "COLOR_MAIN_TEXT" => [
                'NAME' => 'Основной цвет текста',
                'CODE' => 'COLOR_MAIN_TEXT',
                'TYPE' => 'COLOR',
            ],
            "LANDING_BLOCK_ORDER" => [
                "NAME" => 'Порядок блоков на главной странице',
                "CODE" => 'LANDING_BLOCK_ORDER',
                "TYPE" => 'DRAG',
                /*
                "VALUES" => [
                    [
                        "NAME" => "Большой слайдер",
                        "CODE" => "BIG_SLIDER",
                    ],
                    [
                        "NAME" => "Преиимущества",
                        "CODE" => "ADVANTAGES",
                    ],
                    [
                        "NAME" => "О компании",
                        "CODE" => "ABOUT_COMPANY",
                    ],
                    [
                        "NAME" => "Услуги",
                        "CODE" => "SERVICES",
                    ],
                    [
                        "NAME" => "Дизайн проект",
                        "CODE" => "DESIGN_PROJECT",
                    ],
                    [
                        "NAME" => "Наши работы",
                        "CODE" => "OUT_WORKS",
                    ],
                    [
                        "NAME" => "Видео отзывы",
                        "CODE" => "VIDEO_REVIEWS",
                    ],
                    [
                        "NAME" => "Акции",
                        "CODE" => "SALES",
                    ],
                    [
                        "NAME" => "Блок обратной связи",
                        "CODE" => "FEEDBACK",
                    ],
                    [
                        "NAME" => "Отзывы",
                        "CODE" => "REVIEWS",
                    ],
                    [
                        "NAME" => "Варианты работ",
                        "CODE" => "WORK_OPTIONS",
                    ],
                ],
                */
            ],

        ],
	)
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");?>