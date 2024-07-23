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
session_start();

Loader::includeModule('iblock');

class KonturAdminSettings extends CBitrixComponent implements Controllerable{

    public function randomString($length = 8) { 
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
        $charactersLength = strlen($characters); 
        $randomString = ''; 
        for ($i = 0; $i < $length; $i++) { 
            $randomString .= $characters[rand(0, $charactersLength - 1)]; 
        } 
        return $randomString; 
    }

    public function generate_form_id($form_prefix) {
        $this->form_postfix = $this->randomString();
        $this->form_id = $form_prefix."_".$this->form_postfix;
        
        return $this->form_id;
    }

    public function validate_string($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function configureActions(){
        // сбрасываем фильтры по-умолчанию
        return [
            'SaveSettings' => [
                'prefilters' => [],
                'postfilters' => []
            ]
        ];
    }

    public function executeComponent(){// подключение модулей (метод подключается автоматически)
        try{
            // Проверка подключения модулей
            $this->checkModules();
            // Генерируем название формы
            $this->form_id = $this->generate_form_id("AdminSettings");
            // формируем arResult
            $this->getResult($this->form_id);
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

    protected function getResult($form_id){ // подготовка массива $arResult (метод подключается внутри класса try...catch)
        // Формируем массив arResult
        $this->arResult["form_id"] = $this->form_id;
        // Передаем параметры в сессию, чтобы получить иметь доступ в ajax
        $_SESSION['arParams'] = $this->arParams;
  
        $PropTypeList = array(
            "S" => "STRING",
            "L" => "LIST",
            "F" => "FILE",
            "C" => "CHECKBOX",
            "HTML" => "TEXT_AREA",
        );

        return $this->arResult;
    }

    public function SaveSettingsAction(){
        $request = Application::getInstance()->getContext()->getRequest();
        // получаем файлы, post
        $post = $request->getPostList();
        $files = $request->getFileList()->toArray();
        // Получаем параметры компонента из сессии
        $this->arParams = $_SESSION['arParams'];

        return $post;
    } 

}