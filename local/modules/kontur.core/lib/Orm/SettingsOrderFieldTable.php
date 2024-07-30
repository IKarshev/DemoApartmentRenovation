<?
namespace konturCore\Orm;

use Bitrix\Main\ModuleManager;
use Bitrix\Main\Entity;
use Bitrix\Main\Application;

class SettingsOrderFieldTable extends Entity\DataManager{
	public static function getTableName()
	{
		return 'KonturSettingsOrder';
	}
	public static function getMap()
	{
		return array(
			new Entity\IntegerField('ID', array('primary'=>true,'autocomplete'=>true)),
			new Entity\StringField('NAME'),
            new Entity\StringField('PROP_CODE'),
            new Entity\StringField('VALUE_CODE'),
			new Entity\StringField('SORT'),
            new Entity\StringField('DEFAULT_SORT'),
            new Entity\BooleanField('ACTIVITY'),
		);
	}

    /**
     * Получаем значения по коду настройки
     * @param string $propCode — код настройки
     */
    public static function GetPropValues(string $propCode)
    {
        return self::getList([
            'select' => ['*'],
            'filter' => [
                'PROP_CODE' => $propCode,
            ]
        ])->fetchAll();
    }

    /**
     * Изменяем активность
     * 
     * @param array $arFields — массив с настройками
     * @param string $FieldCode — код настройки
     */
    public static function ChangeActivity(array $arFields, string $FieldCode)
    {
        $CurrentItems = self::GetPropValues($FieldCode);
        foreach ($CurrentItems as $arItem) {
            $activity = (in_array($arItem['VALUE_CODE'], $arFields));
            self::update( $arItem['ID'], ['ACTIVITY' => $activity] );
        };
    }

    /**
     * Изменяем активность
     * 
     * @param array $arFields — массив с Кодами значений в порядке сортировки
     * @param string $FieldCode — код настройки
     */
    public static function ChangeSort(array $arFields, string $FieldCode)
    {
        $CurrentItems = self::GetPropValues($FieldCode);
        foreach ($CurrentItems as $arkey => $arItem) {
            self::update( $arItem['ID'], ['SORT' => array_search($arItem['VALUE_CODE'], $arFields)] );
        };
    }

    /**
     * Устанавливаем настройки по-умолчанию
     * @param string $FieldCode — код настройки
     */
    public static function ResetToDefault( string $FieldCode )
    {
        $CurrentItems = self::GetPropValues($FieldCode);
        foreach ($CurrentItems as $arItem) {
            self::update($arItem['ID'], [
                'SORT' => $arItem['DEFAULT_SORT'],
                'ACTIVITY' => true,
            ]);
        }
    }

    /**
     * Получаем коды всех активных разделов по сортировке
     * @param string $FieldCode — код настройки
     */
    public static function GetSectionsDispay( string $PropCode )
    {
        return array_column(self::getList([
            'select' => ['VALUE_CODE'],
            'filter' => [
                'ACTIVITY' => true,
                'PROP_CODE' => $PropCode,
            ],
            'order' => ['SORT' => 'ASC'],
        ])->fetchAll(), 'VALUE_CODE');
    }

    /**
     * Создание нового элемента
     * 
     * @param string $Name — наименование
     * @param string $PropCode — код настройки
     * @param string $ValueCode — наименование
     * 
     */
    public static function CreateNewElement(string $Name, string $PropCode, string $ValueCode)
    {
        self::add([
            'NAME' => $Name,
            'PROP_CODE' => $PropCode,
            'VALUE_CODE' => $ValueCode,
            'SORT' => 500,
            'DEFAULT_SORT' => 500,
            'ACTIVITY' => true,
        ]);
    }

}
?>