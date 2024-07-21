<?if( !empty($arResult['ITEMS']) ):?>
    <section class="stock wow fadeIn" id="sales" data-wow-duration="1s" data-wow-delay="0.2s">
        <div class="container">
            <div class="title_h2">
                <p class="h2 center"><?=GetMessage("STOCK_TITLE");?></p>
            </div>
            <div class="stock__box">
                <?foreach ($arResult['ITEMS'] as $arkey => $arItem):
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $arItem["EDIT_LINK_TEXT"]);
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $arItem["DELETE_LINK_TEXT"], array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));	
                    ?>
                    <div class="stock__block" id="<?=$this->GetEditAreaID($arItem['ID'])?>">
                        <p class="title"><?=$arItem['NAME']?></p>
                        <p class="text"><?=$arItem['PREVIEW_TEXT']?></p>
                    </div>
                <?endforeach;?>
            </div>
        </div>
    </section>
<?endif;?>