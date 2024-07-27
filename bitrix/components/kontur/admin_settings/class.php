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
        return [
            'ResetOption' => [
                'prefilters' => [],
                'postfilters' => []
            ]
        ];
    }

    /**
     * Сохраняем данные формы
     */
    public function saveSettings(){

        if( !empty($_REQUEST) ){
            if( isset($_GET['reset_sort']) && trim($_GET['reset_sort']) != "" ){
                SettingsOrderFieldTable::ResetToDefault($_GET['reset_sort']);
                return;
            }



            foreach ($this->arParams['SETTINGS'] as $ParamFieldKey => $ParamFieldValue) {
                foreach ($_REQUEST as $RequestFieldKey => $RequestFieldValue) {
                    if( strpos($ParamFieldKey, $RequestFieldKey) === false ) continue;

                    switch ($ParamFieldValue['TYPE']) {
                        case 'DRAG':
                            // Сохраняем настройки активности
                            if( strpos($RequestFieldKey, '_ACTIVITY') !== false ){
                                SettingsOrderFieldTable::ChangeActivity($RequestFieldValue, $ParamFieldKey);
                            }
                            // Сохраняем сортировку
                            if( strpos($RequestFieldKey, '_SORT') !== false ){
                                SettingsOrderFieldTable::ChangeSort( json_decode($RequestFieldValue), $ParamFieldKey);
                            }

                            break;
                        case 'COLOR':
                            // Сохраняем цвет
                            \Bitrix\Main\Config\Option::set('kontur.core', $RequestFieldKey, $RequestFieldValue);
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
                        // Устанавливаем активность
                        $GragValueItem['ACTIVITY'] = array_shift(array_filter($AllItems, function($value) use ($GragValueItem) {
                            return ( $value['VALUE_CODE'] == $GragValueItem['CODE'] );
                        }))['ACTIVITY'];

                        // Устанавливаем сортировку
                        $GragValueItem['SORT'] = array_shift(array_filter($AllItems, function($value) use ($GragValueItem) {
                            return ( $value['VALUE_CODE'] == $GragValueItem['CODE'] );
                        }))['SORT'];
                    }

                    // Сортируем по указанной сортировке
                    usort($arItem['VALUES'], function ($a, $b) {
                        return $a['SORT'] <=> $b['SORT'];
                    });
                    break;
                case 'COLOR':
                    $arItem['VALUE'] = \Bitrix\Main\Config\Option::get('kontur.core', $arItem['CODE']);
                    break;
            }
        };

        return $this->arResult;
    }

    public function ResetOptionAction(){
        $request = Application::getInstance()->getContext()->getRequest();
        // получаем файлы, post
        $post = $request->getPostList();
        $files = $request->getFileList()->toArray();
        
        if( isset($post['OPTION_CODE']) && trim($post['OPTION_CODE']) != "" ){
            $DefaultValue = \Bitrix\Main\Config\Option::delete('kontur.core', ['name' => $post['OPTION_CODE']]);
        }
    }

}