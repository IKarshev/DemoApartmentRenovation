<?if( !empty($arResult['ITEMS']) ):?>
    <section class="reviews_slider wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
        <div class="title_h2">
            <p class="h2 center"><?=GetMessage('REVIEWS_TITLE');?></p>
        </div>
        <div class="reviews_slider__wrap">
            <?foreach ($arResult['ITEMS'] as $arkey => $arItem):
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $arItem["EDIT_LINK_TEXT"]);
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $arItem["DELETE_LINK_TEXT"], array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));	
                ?>
                <div class="reviews_slider__block" id="<?=$this->GetEditAreaID($arItem['ID'])?>">
                    <div class="wrap">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="17" viewBox="0 0 26 17" fill="none">
                                <path d="M11.0901 0.538086H3.83608L0.736084 16.6581H9.60208L11.0901 0.538086ZM25.7221 0.538086H18.4681L15.3681 16.6581H24.2341L25.7221 0.538086Z" fill="#FFDC60"/>
                            </svg>
                        </div>
                        <p class="date"><?=$arItem['DISPLAY_ACTIVE_FROM']?></p>
                        <p class="name"><?=$arItem['NAME']?></p>
                        <p class="text"><?=$arItem['PREVIEW_TEXT']?></p>
                    </div>
                </div>
            <?endforeach;?>
        </div>
    </section>
<?endif;?>