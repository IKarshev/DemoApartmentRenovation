<?
\Bitrix\Main\Loader::includeModule('kontur.core');

if( CSite::InDir('/index.php') ){
    $arResult['SECTIONS'] = \konturCore\Orm\SettingsOrderFieldTable::GetSectionsDispay("LANDING_BLOCK_ORDER");
}
?>