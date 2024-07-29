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
            include( __DIR__ . '/db/SettingsOrderFieldTable_data.php' );
        };
        
        return true;
    }
    
    function UnInstallDB(){
        Loader::includeModule($this->MODULE_ID);

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
        CopyDirFiles(
            __DIR__ . '/components',
            Application::getDocumentRoot() . '/bitrix/components',
            true,
            true
        );
        CopyDirFiles(
            __DIR__ . '/assets/admin',
            Application::getDocumentRoot() . '/bitrix/themes/.default/icons/kontur.core',
            true,
            true
        );
        CopyDirFiles(
            __DIR__ . '/themes',
            Application::getDocumentRoot() . '/bitrix/themes/.default',
            true,
            true
        );
        return true;
    }

    function UnInstallFiles(){
        Directory::deleteDirectory(
            Application::getDocumentRoot() . '/bitrix/admin/KonturCoreSettings.php'
        );
        Directory::deleteDirectory(
            Application::getDocumentRoot() . '/bitrix/components/kontur'
        );
        Directory::deleteDirectory(
            Application::getDocumentRoot() . '/bitrix/themes/.default/icons/kontur.core'
        );
        Directory::deleteDirectory(
            Application::getDocumentRoot() . '/bitrix/themes/.default/kontur.core.css'
        );
        return true;
    }
}