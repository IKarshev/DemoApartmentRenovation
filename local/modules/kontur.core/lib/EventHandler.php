<?
namespace konturCore;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Page\Asset;

/**
 * Класс-обработчик событий
 * 
 * @category Class 
 */
Class EventHandler{

    /**
     * Вывод меню в админку
     */
    public static function OnBuildGlobalMenuHandler(&$arGlobalMenu, &$arModuleMenu){
        global $USER;
        if(!$USER->IsAdmin()) return;
    
        $arGlobalMenu["global_menu_KonturCore"] = [
            'menu_id' => 'kontur',
            'text' => 'kontur',
            'title' => 'kontur',
            'url' => 'settingss.php?lang=ru',
            'sort' => 1000,
            'items_id' => 'global_menu_KonturCore',
            'help_section' => 'custom',
            'items' => [
                [
                    'parent_menu' => 'global_menu_KonturCore',
                    'sort'        => 10,
                    'url'         => '/bitrix/admin/KonturCoreSettings.php',
                    'text'        => Loc::getMessage('KONTUR_CORE_SETTINGS_TAB'),
                    'title'       => Loc::getMessage('KONTUR_CORE_SETTINGS_TAB'),
                    'icon'        => '',
                    'page_icon'   => '',
                    'items_id'    => 'menu_custom',
                ],
            ],
        ];
    }

    /**
     * Обработчик 'перед выводом буферизированного контента'
     */
    public static function OnBeforeEndBufferContentHandler(){
        $module_id = pathinfo(dirname(__DIR__))["basename"];

        /**
         * Подключение js/css файлов модуля в административную часть
         */
        if(defined("ADMIN_SECTION") && ADMIN_SECTION === true){
            Asset::getInstance()->addJs("/bitrix/js/".$module_id."/admin.js");
        };
    }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               

}
?>