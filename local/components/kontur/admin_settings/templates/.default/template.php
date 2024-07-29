<?
$this->addExternalCss($templateFolder . "/css/jquery.minicolors.css");
$this->addExternalJS($templateFolder . "/js/jquery.minicolors.min.js");
$this->addExternalJS($templateFolder . "/js/sortablejs.min.js");
?>
<?if( !empty($arResult['SETTINGS']) ):?>
    <div class="settigs-container">
        <form method="post" action="" id="Kontur-Core-Settings">
            <?foreach ($arResult['SETTINGS'] as $FieldKey => $Field):?>
                <div class="input_container <?=$Field['TYPE']?>">
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
                        case 'FILE':?>
                            <div class="file">
                                <label for="<?=$Field['CODE']?>"><?=$Field['NAME']?></label>
                                <?$APPLICATION->IncludeComponent(
                                    "bitrix:main.file.input",
                                    "drag_n_drop",
                                    array(
                                        "INPUT_NAME" => $Field['CODE'],
                                        "MULTIPLE" => $Field['MULTIPLE'] ?? "N",
                                        "MODULE_ID" => "kontur.core",
                                        "MAX_FILE_SIZE" => "",
                                        "ALLOW_UPLOAD" => "", 
                                        "ALLOW_UPLOAD_EXT" => "",
                                        "INPUT_VALUE" => $Field['VALUE'],
                                    ),
                                    false
                                );?>

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