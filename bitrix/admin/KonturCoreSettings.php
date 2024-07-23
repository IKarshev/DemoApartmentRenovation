<?
if( file_exists($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/kontur.core/admin/settings/KonturCoreSettings.php") ){
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/kontur.core/admin/settings/KonturCoreSettings.php");
} elseif( file_exists($_SERVER["DOCUMENT_ROOT"]."/local/modules/kontur.core/admin/settings/KonturCoreSettings.php") ){
    require($_SERVER["DOCUMENT_ROOT"]."/local/modules/kontur.core/admin/settings/KonturCoreSettings.php");
};
?>