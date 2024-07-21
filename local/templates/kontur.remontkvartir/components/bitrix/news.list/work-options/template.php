<?if( !empty($arResult['ITEMS']) ):?>
    <section class="lists" id="list">
        <div class="container">
            <div class="lists__box">

                <?foreach ($arResult['ITEMS'] as $arkey => $arItem):
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], $arItem["EDIT_LINK_TEXT"]);
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], $arItem["DELETE_LINK_TEXT"], array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    $wow_delay = 0.2;
                    ?>

                    <div id="<?=$this->GetEditAreaID($arItem['ID'])?>" class="lists__block wow fadeIn" data-wow-duration="1s" data-wow-delay="<?=$wow_delay?>s">
                        <p class="title"><?=$arItem['NAME']?></p>

                        <?if( $arItem['PROPERTIES']['OPTIONS']['VALUE'] ):?>
                            <ul class="ul">
                                <?foreach ($arItem['PROPERTIES']['OPTIONS']['VALUE'] as $option):?>
                                    <li class="li"><a href="#"><?=$option?></a></li>
                                <?endforeach;?>
                            </ul>
                        <?endif;?>
                    </div>
                <?
                $wow_delay += 0.4;
                endforeach;?>

            </div>
        </div>
    </section>
<?endif;?>