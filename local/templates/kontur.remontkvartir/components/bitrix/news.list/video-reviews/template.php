<?if( !empty($arResult['ITEMS']) ):?>
    <section class="reviews wow fadeIn" id="reviews" data-wow-duration="1s" data-wow-delay="0.2s">
        <div class="container">
            <div class="title_h2">
                <p class="h2 center"><?=GetMessage("VIDEO_REVIEWS_TITLE")?></p>
            </div>
            <div class="reviews__box">
                <?foreach ($arResult['ITEMS'] as $arkey => $arItem):
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $arItem["EDIT_LINK_TEXT"]);
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $arItem["DELETE_LINK_TEXT"], array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));	
                    ?>
                    <?if( $arItem['PROPERTIES']['YOUTUBE_VIDEO_ID']['VALUE'] != "" ):?>
                        <div class="reviews__video"  id="<?=$this->GetEditAreaID($arItem['ID'])?>">
                            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?=$arItem['PROPERTIES']['YOUTUBE_VIDEO_ID']['VALUE']?>" title="<?=$arItem['NAME']?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    <?endif;?>
                <?endforeach;?>
            </div>
        </div>
    </section>
<?endif;?>