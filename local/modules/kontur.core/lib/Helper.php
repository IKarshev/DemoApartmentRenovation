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
    public static function GetModuleDirrectory():string
    {
        $modulePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(__DIR__));
        if (strpos($modulePath, DIRECTORY_SEPARATOR . 'bitrix' . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR) !== false) {
            // Модуль в /bitrix/modules/
            return "bitrix";
        } elseif (strpos($modulePath, DIRECTORY_SEPARATOR . 'local' . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR) !== false) {
            // Модуль в /local/modules/
            return "local";
        };
    }

    /**
     * @param string $DefaultLogoImg — Путь до логотипа по-умолчанию
     * @return string — Путь до логотипа
     */
    public static function GetLogo(string $DefaultLogoImg = '', int $width = 332, int $height = 53): string
    {
        $LogoImg = \Bitrix\Main\Config\Option::get('kontur.core', 'LOGO');
        return ( is_numeric($LogoImg) ) ? \CFile::ResizeImageGet($LogoImg, array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true)['src'] : $DefaultLogoImg;
        // return ( is_numeric($LogoImg) ) ? \CFile::GetPath($LogoImg) : $DefaultLogoImg;
    }

}
?>