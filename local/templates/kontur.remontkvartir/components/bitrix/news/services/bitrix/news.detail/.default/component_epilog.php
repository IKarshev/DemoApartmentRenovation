<?
$APPLICATION->SetEditArea($this->GetEditAreaId($arResult["ID"]),  array());
$arButtons = CIBlock::GetPanelButtons(
    $arResult["IBLOCK_ID"],                          
    $arResult["ID"],                                 
    0,                                              
    array("SECTION_BUTTONS" => false, "SESSID" => false)
);
$this->AddEditAction(
    $arResult["ID"],
    $arButtons["edit"]["edit_element"]["ACTION_URL"],
    $arButtons["edit"]["edit_element"]["TEXT"]
);
?>