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
?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");?>