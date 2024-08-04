<?
if( isset($arResult['DISPLAY_PROPERTIES']['TARIFFS']['LINK_ELEMENT_VALUE']) && !empty($arResult['DISPLAY_PROPERTIES']['TARIFFS']['LINK_ELEMENT_VALUE']) ){
    
    foreach ($arResult['DISPLAY_PROPERTIES']['TARIFFS']['LINK_ELEMENT_VALUE'] as $arkey => $arItem) {
        $IblockClass = \Bitrix\Iblock\Iblock::wakeUp($arItem['IBLOCK_ID'])->getEntityDataClass();
        if (class_exists($IblockClass)){
            $elements = call_user_func( [$IblockClass, 'getList'], [
                'select' => [
                    'ID',
                    'NAME',
                    'CODE',
                    'EXECUTION_TIME_' => 'EXECUTION_TIME',
                    'PRICE_' => 'PRICE',
                    'RECOMMENDATIONS_' => 'RECOMMENDATIONS',
                ],
                'filter' => [
                    'ID' => $arItem['ID'],
                ],
            ])->fetchAll();
    
            $arItem['RECOMMENDATIONS'] = [];
            if( !empty($elements) ){
                foreach ($elements as $element) {
                    $arResult['DISPLAY_PROPERTIES']['TARIFFS']['LINK_ELEMENT_VALUE'][$arkey]['EXECUTION_TIME'] = $element['EXECUTION_TIME_VALUE'];
                    $arResult['DISPLAY_PROPERTIES']['TARIFFS']['LINK_ELEMENT_VALUE'][$arkey]['PRICE'] = $element['PRICE_VALUE'];
                    if( !in_array($element['RECOMMENDATIONS_VALUE'], $arItem['RECOMMENDATIONS']) ){
                        $arResult['DISPLAY_PROPERTIES']['TARIFFS']['LINK_ELEMENT_VALUE'][$arkey]['RECOMMENDATIONS'][] = $element['RECOMMENDATIONS_VALUE'];
                    }
                }
            };
        }
    }
}
?>