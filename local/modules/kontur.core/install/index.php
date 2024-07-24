<?
use Bitrix\Main\Application;
use Bitrix\Main\EventManager;
use Bitrix\Main\Loader;
use Bitrix\Main\Entity\Base;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;
use Bitrix\Main\IO\Directory;
use Bitrix\Main\Config\Option;
IncludeModuleLangFile(__FILE__);

// Orm
use konturCore\Orm\SettingsOrderFieldTable;

Class Kontur_Core extends CModule
{
    var $MODULE_ID = "kontur.core";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $errors;

    function __construct(){
        //$arModuleVersion = array();
        $this->MODULE_VERSION = "0.0.1";
        $this->MODULE_VERSION_DATE = "23.07.2024";
        $this->MODULE_NAME = 'kontur-Landing';
        $this->MODULE_DESCRIPTION = 'kontur: готовое решение "Ремонт квартир"';
    }

    function DoInstall(){
        global $APPLICATION;

        RegisterModule($this->MODULE_ID);

        $this->InstallDB();
        $this->InstallEvents();
        $this->InstallFiles();

        $APPLICATION->includeAdminFile(
            "Установочное сообщение",
            __DIR__ . '/instalInfo.php'
        );
        return true;
    }

    function DoUninstall(){
        global $APPLICATION;

        $this->UnInstallDB();
        $this->UnInstallEvents();
        $this->UnInstallFiles();

        UnRegisterModule($this->MODULE_ID);
        $APPLICATION->includeAdminFile(
            "Сообщение деинсталяции",
            __DIR__ . '/deInstalInfo.php'
        );
        return true;
    }

    function InstallDB(){
        Loader::includeModule($this->MODULE_ID);

        if (!Application::getConnection()->isTableExists(SettingsOrderFieldTable::getTableName())) {
            SettingsOrderFieldTable::getEntity()->createDbTable();
            SettingsOrderFieldTable::add([
                'NAME' => 'Большой слайдер',
                'PROP_CODE' => 'LANDING_BLOCK_ORDER',
                'VALUE_CODE' => 'BIG_SLIDER',
                'SORT' => '0',
                'ACTIVITY' => true,
            ]);
            SettingsOrderFieldTable::add([
                'NAME' => 'Преиимущества',
                'PROP_CODE' => 'LANDING_BLOCK_ORDER',
                'VALUE_CODE' => 'ADVANTAGES',
                'SORT' => '1',
                'ACTIVITY' => true,
            ]);
            SettingsOrderFieldTable::add([
                'NAME' => 'О компании',
                'PROP_CODE' => 'LANDING_BLOCK_ORDER',
                'VALUE_CODE' => 'ABOUT_COMPANY',
                'SORT' => '2',
                'ACTIVITY' => true,
            ]);
            SettingsOrderFieldTable::add([
                'NAME' => 'Услуги',
                'PROP_CODE' => 'LANDING_BLOCK_ORDER',
                'VALUE_CODE' => 'SERVICES',
                'SORT' => '3',
                'ACTIVITY' => true,
            ]);
            SettingsOrderFieldTable::add([
                'NAME' => 'Дизайн проект',
                'PROP_CODE' => 'LANDING_BLOCK_ORDER',
                'VALUE_CODE' => 'DESIGN_PROJECT',
                'SORT' => '4',
                'ACTIVITY' => true,
            ]);
            SettingsOrderFieldTable::add([
                'NAME' => 'Наши работы',
                'PROP_CODE' => 'LANDING_BLOCK_ORDER',
                'VALUE_CODE' => 'OUT_WORKS',
                'SORT' => '5',
                'ACTIVITY' => true,
            ]);
            SettingsOrderFieldTable::add([
                'NAME' => 'Видео отзывы',
                'PROP_CODE' => 'LANDING_BLOCK_ORDER',
                'VALUE_CODE' => 'VIDEO_REVIEWS',
                'SORT' => '6',
                'ACTIVITY' => true,
            ]);
            SettingsOrderFieldTable::add([
                'NAME' => 'Акции',
                'PROP_CODE' => 'LANDING_BLOCK_ORDER',
                'VALUE_CODE' => 'SALES',
                'SORT' => '7',
                'ACTIVITY' => true,
            ]);
            SettingsOrderFieldTable::add([
                'NAME' => 'Блок обратной связи',
                'PROP_CODE' => 'LANDING_BLOCK_ORDER',
                'VALUE_CODE' => 'FEEDBACK',
                'SORT' => '8',
                'ACTIVITY' => true,
            ]);
            SettingsOrderFieldTable::add([
                'NAME' => 'Отзывы',
                'PROP_CODE' => 'LANDING_BLOCK_ORDER',
                'VALUE_CODE' => 'REVIEWS',
                'SORT' => '9',
                'ACTIVITY' => true,
            ]);
            SettingsOrderFieldTable::add([
                'NAME' => 'Варианты работ',
                'PROP_CODE' => 'LANDING_BLOCK_ORDER',
                'VALUE_CODE' => 'WORK_OPTIONS',
                'SORT' => '10',
                'ACTIVITY' => true,
            ]);
        };
        
        return true;
    }
    
    function UnInstallDB(){
        Loader::includeModule($this->MODULE_ID);

        /**/
        if (Application::getConnection()->isTableExists(SettingsOrderFieldTable::getTableName())) {
            Application::getConnection()->dropTable(SettingsOrderFieldTable::getTableName());
        }
        
        return true;
    }

    function InstallEvents(){
        EventManager::getInstance()->registerEventHandler(
            'main',
            'OnBuildGlobalMenu',
            $this->MODULE_ID,
            'konturCore\\EventHandler',
            'OnBuildGlobalMenuHandler'
        );
        /*
        EventManager::getInstance()->registerEventHandler(
            'main',
            'OnBeforeEndBufferContent',
            $this->MODULE_ID,
            'ik\multiregional\EventHandler',
            'OnBeforeEndBufferContentHandler'
        );
        */
    }

    function UnInstallEvents(){
        
        EventManager::getInstance()->unRegisterEventHandler(
            "main",
            "OnBuildGlobalMenu",
            $this->MODULE_ID,
            'konturCore\\EventHandler',
            'OnBuildGlobalMenuHandler'
        );
        /*
        EventManager::getInstance()->unRegisterEventHandler(
            'main',
            'OnBeforeEndBufferContent',
            $this->MODULE_ID,
            'ik\multiregional\EventHandler',
            'OnBeforeEndBufferContentHandler'
        );
        */
    }

    function InstallFiles(){
        CopyDirFiles(
            __DIR__ . '/admin/settings',
            Application::getDocumentRoot() . '/bitrix/admin',
            true,
            true
        );
        return true;
    }

    function UnInstallFiles(){
        Directory::deleteDirectory(
            Application::getDocumentRoot() . '/bitrix/admin/KonturCoreSettings.php'
        );
        return true;
    }
}