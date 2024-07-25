<?if( !empty($arResult['SETTINGS']) ):?>
    <div class="settigs-container">
        <form action="" id="Kontur-Core-Settings">
            <?foreach ($arResult['SETTINGS'] as $FieldKey => $Field):?>
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
                            <a href="?reset_sort=<?=$Field['CODE']?>" class="reset-default">Восстановить по умолчанию</a>
                        </div>
                        <?break;
                }?>
            <?endforeach;?>

            <div class="button_container">
                <button type="submit">Сохранить</button>
            </div>

        </form>
    </div>
<?endif;?>