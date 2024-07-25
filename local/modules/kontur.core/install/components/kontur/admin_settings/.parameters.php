<?require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
use \Bitrix\Main\Loader;
use \Bitrix\Iblock\SectionTable;
use \Bitrix\Iblock\ElementTable;
use \Bitrix\Iblock\PropertyTable;
Loader::includeModule('iblock');

$arComponentParameters = array(
    "GROUPS" => array(
        "BASE" => array(
            "NAME" => "основные настройки",
        ),
    ),
    "PARAMETERS" => array(
        "SETTINGS" => array(
            "PARENT" => "BASE",
            "NAME" => "Свойства",
            "TYPE" => "LIST",
            "ADDITIONAL_VALUES" => "Y",
        ),
    ),
);
?>