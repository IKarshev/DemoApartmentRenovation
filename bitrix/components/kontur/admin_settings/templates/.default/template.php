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
                                <ul class="draggable-list" data-field_code="<?=$Field['CODE']?>">
                                    <?foreach ($Field['VALUES'] as $ItemKey => $ItemValue):
                                        $DefaultItems[] = $ItemValue['CODE'];
                                        ?>
                                        <li class="draggable-list-item" data-count="<?=$ItemValue['CODE']?>">
                                            <div class="count"><?=$ItemKey+1?></div>
                                            <div class="name"><?=$ItemValue['NAME']?></div>
                                            <div class="code"><?=$ItemValue['CODE']?></div>
                                            <input class="activity" type="checkbox" name="<?=$Field['CODE']."_ACTIVITY[]"?>" value="<?=$ItemValue['CODE']?>" <?=($ItemValue['ACTIVITY']) ? 'checked' : ''?>>
                                            <a href="javascript:void(0);" class="detele_item">
                                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13.4099 12.0002L17.7099 7.71019C17.8982 7.52188 18.004 7.26649 18.004 7.00019C18.004 6.73388 17.8982 6.47849 17.7099 6.29019C17.5216 6.10188 17.2662 5.99609 16.9999 5.99609C16.7336 5.99609 16.4782 6.10188 16.2899 6.29019L11.9999 10.5902L7.70994 6.29019C7.52164 6.10188 7.26624 5.99609 6.99994 5.99609C6.73364 5.99609 6.47824 6.10188 6.28994 6.29019C6.10164 6.47849 5.99585 6.73388 5.99585 7.00019C5.99585 7.26649 6.10164 7.52188 6.28994 7.71019L10.5899 12.0002L6.28994 16.2902C6.19621 16.3831 6.12182 16.4937 6.07105 16.6156C6.02028 16.7375 5.99414 16.8682 5.99414 17.0002C5.99414 17.1322 6.02028 17.2629 6.07105 17.3848C6.12182 17.5066 6.19621 17.6172 6.28994 17.7102C6.3829 17.8039 6.4935 17.8783 6.61536 17.9291C6.73722 17.9798 6.86793 18.006 6.99994 18.006C7.13195 18.006 7.26266 17.9798 7.38452 17.9291C7.50638 17.8783 7.61698 17.8039 7.70994 17.7102L11.9999 13.4102L16.2899 17.7102C16.3829 17.8039 16.4935 17.8783 16.6154 17.9291C16.7372 17.9798 16.8679 18.006 16.9999 18.006C17.132 18.006 17.2627 17.9798 17.3845 17.9291C17.5064 17.8783 17.617 17.8039 17.7099 17.7102C17.8037 17.6172 17.8781 17.5066 17.9288 17.3848C17.9796 17.2629 18.0057 17.1322 18.0057 17.0002C18.0057 16.8682 17.9796 16.7375 17.9288 16.6156C17.8781 16.4937 17.8037 16.3831 17.7099 16.2902L13.4099 12.0002Z" fill="#2D2D2D"/>
                                                </svg>
                                            </a>
                                        </li>
                                    <?endforeach;?>

                                    <li class="draggable-list-item add_new_section">
                                        <a href="javascript:void(0);" class="add_new_section-btn">Добавить новый раздел</a>
                                    </li>

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