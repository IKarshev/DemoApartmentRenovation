<?if( !empty($arResult['ITEMS']) ):
    $wow_delay = 0.8;
    ?>
    <div class="box">
        <?foreach ($arResult['ITEMS'] as $arkey => $arItem):
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $arItem["EDIT_LINK_TEXT"]);
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $arItem["DELETE_LINK_TEXT"], array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));	
            ?>
            <div id="<?=$this->GetEditAreaID($arItem['ID'])?>" class="block wow fadeInUp" data-wow-duration="1s" data-wow-delay="<?=$wow_delay?>s">
                <div class="icon"><img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt=""></div>
                <p class="h5"><?=$arItem['NAME']?></p>
            </div>
        <?
        $wow_delay += 0.2;
        endforeach;?>
    </div>
<?endif;?>