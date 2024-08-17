<div class="our-works-container">
    <?foreach ($arResult['ITEMS'] as $arItem):?>
        <a href="<?=\CFile::GetPath($arItem)?>" data-fancybox="our_works" class="image-container">
            <img src="<?=\CFile::ResizeImageGet($arItem, array('width'=>490, 'height'=>315), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true)['src']?>" alt="">
        </a>
    <?endforeach;?>
</div>