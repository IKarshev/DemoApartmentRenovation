<?
namespace konturCore;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Loader;

Loader::includeModule('kontur.core');

/**
 * Вспомогательный класс
 */
Class Helper{
    /**
     * @return string Дирректория ( bitrix || local ), где находится модуль
     */
    public static function GetModuleDirrectory():string{
        $modulePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(__DIR__));
        if (strpos($modulePath, DIRECTORY_SEPARATOR . 'bitrix' . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR) !== false) {
            // Модуль в /bitrix/modules/
            return "bitrix";
        } elseif (strpos($modulePath, DIRECTORY_SEPARATOR . 'local' . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR) !== false) {
            // Модуль в /local/modules/
            return "local";
        };
    }
}
?>