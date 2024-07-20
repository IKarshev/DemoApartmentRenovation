<?if( !empty($arResult['ITEMS']) ):?>
    <section class="advantages" id="about-company">
        <div class="container">
            <div class="advantages__box">
                <?foreach ($arResult['ITEMS'] as $arkey => $arItem):
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $arItem["EDIT_LINK_TEXT"]);
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $arItem["DELETE_LINK_TEXT"], array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>

                    <div id="<?=$this->GetEditAreaID($arItem['ID'])?>" class="advantages__block wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0s">
                        <div class="icon">
                            <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="">
                        </div>
                        <p class="text"><?=$arItem['NAME']?></p>
                    </div>

                <?endforeach;?>


            </div>
        </div>
    </section>
<?endif;?>