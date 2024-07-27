<?
\Bitrix\Main\Loader::includeModule('kontur.core');

if( CSite::InDir('/index.php') ){
    $arResult['SECTIONS'] = \konturCore\Orm\SettingsOrderFieldTable::GetSectionsDispay("LANDING_BLOCK_ORDER");
}

$arParams['USE_RECAPTCHA'] = (\Bitrix\Main\Config\Option::get('kontur.core', 'GoogleRecaptchaActivity') == 'Y') ? 'Y' : 'N';
if( $arParams['USE_RECAPTCHA'] == 'Y' ){
    $this->__component->arResult['USE_RECAPTCHA'] = $arParams['USE_RECAPTCHA'];
    $this->__component->arResult['RECAPTCHA_SITE_KEY'] = \Bitrix\Main\Config\Option::get('kontur.core', 'GoogleRecaptchaSiteKey');
    $this->__component->SetResultCacheKeys(['USE_RECAPTCHA', 'RECAPTCHA_SITE_KEY']);
}
?>