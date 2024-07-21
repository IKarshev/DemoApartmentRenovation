<?if( !empty($arResult['ITEMS']) ):?>
    <section class="services" id="design-project">
        <div class="container">
            <div class="title_h2">
                <p class="h2 center"><?=GetMessage('DESIGN_PROJECT_TITLE');?></p>
            </div>
            <div class="services__box">

                <?foreach ($arResult['ITEMS'] as $arkey => $arItem):
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $arItem["EDIT_LINK_TEXT"]);
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $arItem["DELETE_LINK_TEXT"], array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));	
                    $wow_delay = 0.2;
                    ?>

                    <div id="<?=$this->GetEditAreaID($arItem['ID'])?>" class="services__block wow fadeIn" data-wow-duration="1s" data-wow-delay="<?=$wow_delay?>s">
                        <div class="img">
                            <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="">
                        </div>
                        <div class="content">
                            <p class="price"><?=$arItem['PROPERTIES']['PRICE']['VALUE']?> <span class="day"><?=$arItem['PROPERTIES']['EXECUTION_TIME']['VALUE']?></span></p>
                            <p class="title"><?=$arItem['NAME']?></p>
                            <?if( isset($arItem['PROPERTIES']['RECOMMENDATIONS']['VALUE']) && !empty($arItem['PROPERTIES']['RECOMMENDATIONS']['VALUE']) ):?>
                                <p class="h5"><?=GetMessage('RECOMEND_FOR');?></p>
                                <ul class="ul">
                                    <?foreach ($arItem['PROPERTIES']['RECOMMENDATIONS']['VALUE'] as $recommendation):?>
                                        <li class="li"><?=$recommendation?></li>
                                    <?endforeach;?>
                                </ul>
                            <?endif;?>
                        </div>
                        <div class="bottom">
                            <button class="btn open_modal"><?=GetMessage('ORDER_CALL');?></button>
                            <a href="#" class="link"><?=GetMessage('MORE_DETAILED');?></a>
                        </div>
                    </div>

                <?
                $wow_delay += 0.4;
                endforeach;?>

            </div>
        </div>
    </section>
<?endif;?>