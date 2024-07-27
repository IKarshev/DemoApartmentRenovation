<?
$this->addExternalCss($templateFolder . "/css/jquery.minicolors.css");
$this->addExternalJS($templateFolder . "/js/jquery.minicolors.min.js");
$this->addExternalJS($templateFolder . "/js/sortablejs.min.js");
?>
<?if( !empty($arResult['SETTINGS']) ):?>
    <div class="settigs-container">
        <form action="" id="Kontur-Core-Settings">
            <?foreach ($arResult['SETTINGS'] as $FieldKey => $Field):?>
                <div class="input_container">
                    <?switch ($Field['TYPE']) {
                        case 'DRAG':?>
                            <div class="draggable-list-container">
                                <div class="input-title"><?=$Field['NAME']?></div>
                                <ul class="draggable-list">
                                    <?foreach ($Field['VALUES'] as $ItemKey => $ItemValue):
                                        $DefaultItems[] = $ItemValue['CODE'];
                                        ?>
                                        <li class="draggable-list-item" data-count="<?=$ItemValue['CODE']?>">
                                            <div class="count"><?=$ItemKey+1?></div>
                                            <div class="name"><?=$ItemValue['NAME']?></div>
                                            <input class="activity" type="checkbox" name="<?=$Field['CODE']."_ACTIVITY[]"?>" value="<?=$ItemValue['CODE']?>" <?=($ItemValue['ACTIVITY']) ? 'checked' : ''?>>
                                        </li>
                                    <?endforeach;?>
                                    <input class="SORT" type="hidden" name="<?=$Field['CODE'].'_SORT'?>" value='<?=json_encode($DefaultItems);?>'>
                                </ul>
                                <a href="?reset_sort=<?=$Field['CODE']?>" class="reset-default-sort">Восстановить по умолчанию</a>
                            </div>
                            <?break;
                        case 'COLOR':?>
                            <div class="color">
                                <label for="<?=$Field['CODE']?>"><?=$Field['NAME']?></label>
                                <input name="<?=$Field['CODE']?>" id="<?=$Field['CODE']?>" type="text" class="color_picker" value="<?=$Field['VALUE']?>">
                                <a href="javascript:void(0);" class="reset-default" data-prop_code="<?=$Field['CODE']?>">Восстановить по-умолчанию</a>
                            </div>
                            <?break;
                    }?>
                </div>
            <?endforeach;?>

            <div class="button_container">
                <button type="submit">Сохранить</button>
            </div>

        </form>
    </div>
<?endif;?>