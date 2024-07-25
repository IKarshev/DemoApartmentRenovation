<?
\Bitrix\Main\Loader::includeModule('kontur.core');

if( isset($arResult['SECTIONS']) && !empty($arResult['SECTIONS']) ){
    foreach ($arResult['SECTIONS'] as $SectionCode) {
        $APPLICATION->ShowViewContent($SectionCode);
    }
}?>

<style>
    :root {
    --color-primary: <?=\Bitrix\Main\Config\Option::get('kontur.core', 'COLOR_PRIMARY')?>;
    --color-secondary: <?=\Bitrix\Main\Config\Option::get('kontur.core', 'COLOR_SECONDARY')?>;
    --color-main-text: <?=\Bitrix\Main\Config\Option::get('kontur.core', 'COLOR_MAIN_TEXT')?>;
}
</style>