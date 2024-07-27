<?
use Bitrix\Main\Page\Asset;
if( CSite::InDir('/index.php') ){
    include( \Bitrix\Main\Application::getDocumentRoot() . '/index_page.php' );
};

if( $arResult['USE_RECAPTCHA'] == 'Y' ){
    Asset::getInstance()->addJs("https://www.google.com/recaptcha/api.js?render=".$arResult['RECAPTCHA_SITE_KEY']);
};
?>