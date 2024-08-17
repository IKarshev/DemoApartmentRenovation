<?
$Items = [];
foreach ($arResult['ITEMS'] as $PhotoAlbum){
    foreach ($PhotoAlbum['PROPERTIES']['PHOTO']['VALUE'] as $arItem){
        $Items[]=$arItem;
        if(count($Items) >= $arParams['NEWS_COUNT']) break;
    }
    if(count($Items) >= $arParams['NEWS_COUNT']) break;
}
$arResult['ITEMS'] = $Items;
?>