<?if( !empty($arResult['ITEMS']) ):?>
    <section class="banner">
        <div class="banner__slider">
            
            <?foreach ($arResult['ITEMS'] as $arkey => $arItem):
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $arItem["EDIT_LINK_TEXT"]);
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $arItem["DELETE_LINK_TEXT"], array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="banner__wrap" id="<?=$this->GetEditAreaID($arItem['ID'])?>">
                    <div class="banner__block">
                        <div class="content">
                            <div class="container">
                                <div class="wrap">
                                    <p class="banner__h1 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s"><?=$arItem['NAME']?></p>
                                    <p class="banner__text wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s"><?=$arItem['PREVIEW_TEXT']?></p>
                                    <div class="banner__btns wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                                        <button class="banner__call open_modal"><?=GetMessage('ORDER_CALL')?></button>
                                        <a href="#list" class="banner__list">
                                            <?=GetMessage('PRICE_LIST')?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="9" viewBox="0 0 21 9" fill="none">
                                                <path d="M20.8536 4.14645C21.0488 4.34171 21.0488 4.65829 20.8536 4.85355L17.6716 8.03553C17.4763 8.2308 17.1597 8.2308 16.9645 8.03553C16.7692 7.84027 16.7692 7.52369 16.9645 7.32843L19.7929 4.5L16.9645 1.67157C16.7692 1.47631 16.7692 1.15973 16.9645 0.964466C17.1597 0.769204 17.4763 0.769204 17.6716 0.964466L20.8536 4.14645ZM0.5 5C0.223858 5 0 4.77614 0 4.5C0 4.22386 0.223858 4 0.5 4V5ZM20.5 5H0.5V4H20.5V5Z" fill="#4E433D"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="img wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">
                            <img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="">
                        </div>
                    </div>
                </div>
            <?endforeach;?>

        </div>
    </section>
<?endif;?>