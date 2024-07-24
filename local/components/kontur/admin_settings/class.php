<?require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
session_start();
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\SystemException;
use Bitrix\Main\Loader;
use Bitrix\Main\Type\Date;

use Bitrix\Main\Engine\Contract\Controllerable;
use Bitrix\Main\Engine\ActionFilter;

use \Bitrix\Main\Application;
use \Bitrix\Iblock\SectionTable;
use \Bitrix\Iblock\ElementTable;
use \Bitrix\Iblock\PropertyTable;

use konturCore\Orm\SettingsOrderFieldTable;

Loader::includeModule('iblock');
Loader::includeModule('kontur.core');

class KonturAdminSettings extends CBitrixComponent implements Controllerable{

    public function configureActions(){
        // сбрасываем фильтры по-умолчанию
        return [];
    }

    /**
     * Сохраняем данные формы
     */
    public function saveSettings(){

        if( !empty($_REQUEST) ){
            foreach ($this->arParams['SETTINGS'] as $ParamFieldKey => $ParamFieldValue) {
                foreach ($_REQUEST as $RequestFieldKey => $RequestFieldValue) {
                    if( strpos($ParamFieldKey, $RequestFieldKey) !== false ) continue;

                    switch ($ParamFieldValue['TYPE']) {
                        case 'DRAG':
                            // Сохраняем настройки активности
                            if( strpos($RequestFieldKey, '_ACTIVITY') !== false ){
                                SettingsOrderFieldTable::ChangeActivity($RequestFieldValue, $ParamFieldKey);
                            }

                            break;
                    }



                }
            }
        };

    }

    public function executeComponent(){// подключение модулей (метод подключается автоматически)
        try{
            // Сохраняем данные формы
            $this->saveSettings();
            // Проверка подключения модулей
            $this->checkModules();
            // формируем arResult
            $this->getResult();
            // подключение шаблона компонента
            $this->includeComponentTemplate();
        }
        catch (SystemException $e){
            ShowError($e->getMessage());
        }
    }

    protected function checkModules(){// если модуль не подключен выводим сообщение в catch (метод подключается внутри класса try...catch)
        if (!Loader::includeModule('iblock')){
            throw new SystemException(Loc::getMessage('IBLOCK_MODULE_NOT_INSTALLED'));
        }
    }


    public function onPrepareComponentParams($arParams){//обработка $arParams (метод подключается автоматически)        
        return $arParams;
    }

    protected function getResult(){ // подготовка массива $arResult (метод подключается внутри класса try...catch)
        $this->arResult = $this->arParams;

        foreach ($this->arResult['SETTINGS'] as $arkey => &$arItem) {
            switch ($arItem['TYPE']) {
                case 'DRAG':
                    $AllItems = SettingsOrderFieldTable::GetPropValues($arItem['CODE']);
                    foreach ($arItem['VALUES'] as $GragValuekey => &$GragValueItem) {
                        // $this->arResult['SETTINGS'][$arkey]['VALUES'][$GragValuekey]['ACTIVITY']
                        $GragValueItem['ACTIVITY'] = array_shift(array_filter($AllItems, function($value) use ($GragValueItem) {
                            return ( $value['VALUE_CODE'] == $GragValueItem['CODE'] );
                        }))['ACTIVITY'];
                    }

                    break;
            }
        };

        
        return $this->arResult;
    }

}