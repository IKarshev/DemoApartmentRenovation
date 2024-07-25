<?
if( isset($arResult['SECTIONS']) && !empty($arResult['SECTIONS']) ){
    foreach ($arResult['SECTIONS'] as $SectionCode) {
        $APPLICATION->ShowViewContent($SectionCode);
    }
}
?>