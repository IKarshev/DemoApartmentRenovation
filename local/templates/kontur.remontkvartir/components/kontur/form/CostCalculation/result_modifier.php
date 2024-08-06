<?
foreach ($arResult['PROPS'] as $arkey => $arItem) {
    switch ($arItem['CODE']) {
        case 'NAME':
            $arResult['PROPS'][$arkey]['PLACEHOLDER'] = "Имя";
            break;
        case 'PHONE_NUMBER':
            $arResult['PROPS'][$arkey]['PLACEHOLDER'] = "+7 (XXX) XXX XX XX";
            break;
        case 'MESSAGE':
            $arResult['PROPS'][$arkey]['PLACEHOLDER'] = "Опишите ваши пожелания к ремонту";
            break;
    }
}
?>