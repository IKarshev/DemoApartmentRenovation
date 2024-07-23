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

        /*
        if (!Application::getConnection()->isTableExists(RegionsTable::getTableName())) {
            RegionsTable::getEntity()->createDbTable();
        };
        */
        return true;
    }
    
    function UnInstallDB(){
        Loader::includeModule($this->MODULE_ID);

        /*
        if (Application::getConnection()->isTableExists(RegionsTable::getTableName())) {
            Application::getConnection()->dropTable(RegionsTable::getTableName());
        }
        */
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