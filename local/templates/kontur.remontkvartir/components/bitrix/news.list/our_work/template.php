<?if( !empty($arResult['ITEMS']) ):?>
    <section class="our_work wow fadeIn" id="our-works" data-wow-duration="1s" data-wow-delay="0.2s">
        <div class="container">
            <div class="title_h2">
                <p class="h2 center"><?=GetMessage("OUR_WORK_TITLE");?></p>
            </div>
            <div class="our_work__slider">
                <?foreach ($arResult['ITEMS'] as $arkey => $arItem):
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $arItem["EDIT_LINK_TEXT"]);
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $arItem["DELETE_LINK_TEXT"], array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <?if( !empty($arItem['PROPERTIES']['PHOTO']['VALUE']) ):?>
                        <div id="<?=$this->GetEditAreaID($arItem['ID'])?>" class="our_work__grid">
                            <?foreach ($arItem['PROPERTIES']['PHOTO']['VALUE'] as $PhotoKey => $PhotoItem):?>
                                <a href="<?=\CFile::GetPath($PhotoItem);?>" data-fancybox="our_work" class="our_work__block block<?=$PhotoKey+1;?>">
                                    <img src="<?=\CFile::ResizeImageGet($PhotoItem, array('width'=>357, 'height'=>430), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true)['src'];?>" alt="">
                                </a>
                            <?endforeach;?>
                        </div>
                    <?endif;?>

                <?endforeach;?>
            </div>

            <div class="our_work__grid_mobile">
                <div class="our_work__grid">
                    <?foreach ($arResult['ITEMS'] as $arkey => $arItem):?>
                        <?foreach ($arItem['PROPERTIES']['PHOTO']['VALUE'] as $PhotoKey => $PhotoItem):?>
                            <a href="<?=\CFile::GetPath($PhotoItem);?>" data-fancybox="our_work_mobile" class="our_work__block block<?=$PhotoKey+1;?>?>">
                                <img src="<?=\CFile::ResizeImageGet($PhotoItem, array('width'=>900, 'height'=>600), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true)['src'];?>" alt="">
                            </a>
                        <?endforeach;?>
                    <?endforeach;?>
                </div>
            </div>
            
        </div>
    </section>
<?endif;?>