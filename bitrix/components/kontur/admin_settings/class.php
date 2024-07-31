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

        ob_start();
        print_r($_REQUEST);
        $debug = ob_get_contents();
        ob_end_clean();
        $fp = fopen($_SERVER['DOCUMENT_ROOT'].'/lk-params2.log', 'w+');
        fwrite($fp, $debug);
        fclose($fp);

        $repeatCode = [];
        if( !empty($_REQUEST) ){
            // Сбрасываем сортировку по умолчанию
            if( isset($_GET['reset_sort']) && trim($_GET['reset_sort']) != "" ){
                SettingsOrderFieldTable::ResetToDefault($_GET['reset_sort']);
                return;
            }

            // Удаляем файл
            if( isset($_REQUEST['mfi_mode']) && $_REQUEST['mfi_mode'] == 'delete' ){
                $Field = str_replace( 'mfi', '', $_REQUEST['controlID']);
                \Bitrix\Main\Config\Option::delete('kontur.core', ['name' => $Field]);
            }

            foreach ($this->arParams['SETTINGS'] as $ParamFieldKey => $ParamFieldValue) {
                foreach ($_REQUEST as $RequestFieldKey => $RequestFieldValue) {
                    if( strpos($RequestFieldKey, $ParamFieldKey) === false ) continue;

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
                        case 'FILE':
                            \Bitrix\Main\Config\Option::set('kontur.core', $RequestFieldKey, $RequestFieldValue);
                            break;
                    }

                    // Создаем новое значение для DRAG
                    if( strpos($RequestFieldKey, 'new_') !== false && !in_array($RequestFieldKey, $repeatCode) ){
                        $FieldCode = str_replace( ['new_','_name', '_code'], '', $RequestFieldKey );
                        $FieldValueName = $_REQUEST['new_'.$FieldCode.'_name'];
                        $FieldValueCode = $_REQUEST['new_'.$FieldCode.'_code'];
                        $repeatCode = array_merge($repeatCode, [
                            'new_'.$FieldCode.'_name',
                            'new_'.$FieldCode.'_code'
                        ]);
                        
                        foreach ($FieldValueName as $arkey => $arItem) {
                            SettingsOrderFieldTable::CreateNewElement($FieldCode, $FieldValueName[$arkey], $FieldValueCode[$arkey]);
                        }

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
                    $arItem['VALUES'] = $AllItems;


                    /* 
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
                    */

                    // Сортируем по указанной сортировке
                    usort($arItem['VALUES'], function ($a, $b) {
                        return $a['SORT'] <=> $b['SORT'];
                    });
                    break;
                case 'COLOR':
                    $arItem['VALUE'] = \Bitrix\Main\Config\Option::get('kontur.core', $arItem['CODE']);
                    break;
                case 'FILE':
                    $arItem['VALUE'] = \Bitrix\Main\Config\Option::get('kontur.core', $arItem['CODE']) ?? [];
                    break;
            }
        };

        return $this->arResult;
    }

    /**
     * Устанавливаем значение по-умолчанию
     */
    public function ResetOptionAction(){
        $request = Application::getInstance()->getContext()->getRequest();
        // получаем файлы, post
        $post = $request->getPostList();
        $files = $request->getFileList()->toArray();
        
        if( isset($post['OPTION_CODE']) && trim($post['OPTION_CODE']) != "" ){
            $DefaultValue = \Bitrix\Main\Config\Option::delete('kontur.core', ['name' => $post['OPTION_CODE']]);
        }
        
        return true;
    }

    /**
     * Устанавливаем значение по-умолчанию
     */
    public function DeleteDraggableItemAction(){
        $request = Application::getInstance()->getContext()->getRequest();
        // получаем файлы, post
        $post = $request->getPostList();
        $files = $request->getFileList()->toArray();
        
        if( isset($post['PROPERTY_ID']) && trim($post['PROPERTY_ID'])!="" ){
            SettingsOrderFieldTable::delete( (int) $post['PROPERTY_ID'] );
        }
        
        return true;
    }
}