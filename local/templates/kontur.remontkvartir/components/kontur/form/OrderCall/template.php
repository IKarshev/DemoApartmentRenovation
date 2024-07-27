<?require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");?>

<!-- <pre><?//print_r( $arParams );?></pre> -->

<?if( $arParams["POPUP"]=="Y" ):?>
    <a href="" class="open_popup" data-popup="Popup_<?=$arResult['form_id']?>"><?=$arParams['POPUP_BTN_TITLE']?></a>
<?endif;?>

<div id="Popup_<?=$arResult['form_id']?>" class="form form_default" <?=($arParams["POPUP"]=="Y") ? "style='display:none'" : ""?> >
    
    <div class="form_head">
        <div class="title"><?=$arParams["FORM_TITLE"]?></div>
    </div>

    <div class="form_body">
        <form id="<?=$arResult["form_id"]?>" method="post" action="" enctype="multipart/form-data">

            <?foreach ($arResult["PROPS"] as $arkey => $arItem):?>
                <?switch ($arItem["PROPERTY_TYPE"]) {
                    case 'STRING'?>
                        
                        <div class="input <?=$arItem["PROPERTY_TYPE"];?>">
                            <input <?=($arItem["IS_REQUIRED"]=='Y')?"required":""?> data-mask="<?=$arItem["MASK"]?>" name="<?=$arItem["CODE"]?>" type="text" placeholder="<?=$arItem["PLACEHOLDER"]?>">
                        </div>     
                        
                        <?break;
                    case 'LIST'?>

                        <div class="input <?=$arItem["PROPERTY_TYPE"];?>">
                            <select name="<?=$arItem["CODE"]?>" id="<?=$arItem["CODE"]?>">
                                <option value="" selected disabled>Выберите пункт</option>

                                <?foreach ($arItem["LIST_ITEMS"] as $ListKey => $ListItem):?>
                                    <option value="<?=$ListItem["ID"]?>"><?=$ListItem["VALUE"]?></option>
                                <?endforeach;?>
                            </select>
                        </div>
                    
                        <?break;
                    case 'FILE'?>

                        <div class="input <?=$arItem["PROPERTY_TYPE"];?>">
                            <span class="title"><?=$arItem["NAME"]?></span>
                            <label for="<?=$arItem["CODE"]?>" >выберите файл</label>
                            <input type="file" name="<?=$arItem["CODE"]?><?=($arItem["MULTIPLE"] == "Y")? '[]' : ''?>" id="<?=$arItem["CODE"]?>" <?=($arItem["MULTIPLE"] == "Y")? 'multiple' : ''?>>
                        </div>
                    
                        <?break;
                    case 'CHECKBOX'?>

                    <div class="input <?=$arItem["PROPERTY_TYPE"];?>">
                        <span class="title"><?=$arItem["NAME"]?></span>

                        <?foreach ($arItem["LIST_ITEMS"] as $checkboxKey => $checkboxItem):?>
                            <div class="checkbox_cont">
                                <input type="checkbox" name="<?=$arItem["CODE"]?>[]" value="<?=$checkboxItem['ID']?>" id="<?=$checkboxItem["XML_ID"]?>">
                                <label for="<?=$checkboxItem["XML_ID"]?>"><?=$checkboxItem["VALUE"]?></label>
                            </div>
                        <?endforeach;?>
                    
                    </div>     
                
                    <?break;
                    case "TEXT_AREA"?>
                        
                        <div class="input <?=$arItem["PROPERTY_TYPE"];?>">
                            <textarea id="<?=$arItem["CODE"]?>" <?=($arItem["IS_REQUIRED"]=='Y')?"required":""?> data-mask="<?=$arItem["MASK"]?>" name="<?=$arItem["CODE"]?>" type="text" placeholder="Введите <?=$arItem["PLACEHOLDER"]?>"></textarea>
                        </div>      
            
                    <?break;                    
                }?>
            <?endforeach;?>

            <pre><?=$arParams['RECAPTCHA_SITE_KEY']?></pre>

            <?if( $arParams["RECAPTCHA"] == "Y" ):?>
                <script src="https://www.google.com/recaptcha/api.js?render=<?=$arParams['RECAPTCHA_SITE_KEY']?>"></script>
            <?endif;?>

            <div class="error_placement"></div>
            <button class="btn" type="submit">Отправить</button>
            <p class="text">
                <?=\Bitrix\Main\Localization\Loc::getMessage('ORDER_CALL_POLICE_MSG', [
                    '#POLICE_LINK#' => $arParams['POLICE_LINK'],
                ])?>
            </p>

        </form>
    </div>

</div>


<script>
    <?// импорт переменных в js?>
	var form_id = <?=CUtil::PhpToJSObject($arResult["form_id"])?>;
    var propertys = <?=CUtil::PhpToJSObject($arResult["PROPS"])?>;
    var ERROR_MESSAGES = <?=CUtil::PhpToJSObject($arParams["ERROR_MESSAGES"])?>;

    if(typeof form_id !== "undefined" && typeof propertys !== "undefined" ){
        var ValidateSettings = {
            rules: {},
            messages : {},
            errorElement : "div",
            errorPlacement : function(error, element) {
                $(element).closest(".form_body").find(".error_placement").append(error);
            },
            submitHandler : function(form, event){
                event.preventDefault();    
            
                var request = BX.ajax.runComponentAction('kontur:form', 'Send_Form', {
                    mode: 'class',
                    data: new FormData( document.getElementById(`${form_id}`) ),
                }).then(function(response){
                    $(`#${form_id}`).find('button[type=submit]').html('Заявка отправленна').prop('disabled', true);
                });
            },

        };
        propertys.forEach(function(item, i, arr) {
            var code = (item.PROPERTY_TYPE != "CHECKBOX") ? item.CODE : `${item.CODE}[]`;

            ValidateSettings["rules"][`${code}`] = {
                "required": (item.IS_REQUIRED == "Y") ? true : false,
                "email" : (item.MASK == "EMAIL") ? true : false,
            };
            ValidateSettings["messages"][`${code}`] = {
                "required": `${ERROR_MESSAGES[item.PROPERTY_TYPE]} ${item.NAME}`,
                "email": `${ERROR_MESSAGES["EMAIL_VALIDATE"]} ${item.NAME}`,
            };
        });
        
        // Установка масок
        $(`#${form_id} input[data-mask=PHONE]`).inputmask("mask", {"mask": "+7 (999) 999-99 99"});
        $(`#${form_id}`).validate(ValidateSettings);


        $(".open_popup").on("click", function(event){
            event.preventDefault();
            var target_popup_id = $(this).data("popup");
            $.fancybox.open({
                'src': `#${target_popup_id}`,
                'type': 'inline',
            });

        });

    };
</script>