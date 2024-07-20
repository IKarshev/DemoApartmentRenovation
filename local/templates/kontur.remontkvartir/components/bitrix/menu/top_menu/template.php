
<?if( !empty($arResult) ):?>
    <div class="header__navbar">
        <ul class="ul">
            <?foreach ($arResult as $arkey => $arItem):?>
                <li class="li">
                    <a href="<?=$arItem['LINK']?>" class="item"><?=$arItem['TEXT']?></a>
                </li>
            <?endforeach;?>
        </ul>
    </div>
<?endif;?>