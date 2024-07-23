<?if( !empty($arParams['SETTINGS']) ):?>
    <div class="settigs-container">
        <form action="" id="Kontur-Core-Settings">
            <?foreach ($arParams['SETTINGS'] as $FieldKey => $Field):?>
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
                                        <input class="activity" type="checkbox" name="<?=$ItemValue['CODE'].'_'.$ItemKey+1?>" checked>
                                    </li>
                                <?endforeach;?>
                                <input type="hidden" name="<?=$Field['CODE']?>" value='<?=json_encode($DefaultItems);?>'>
                            </ul>
                        </div>
                        <?break;
                }?>
            <?endforeach;?>
        </form>
    </div>
<?endif;?>