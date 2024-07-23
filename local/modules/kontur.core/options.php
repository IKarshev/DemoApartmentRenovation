<?
use konturCore\Options;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\HttpApplication;
use Bitrix\Main\Config\Option;

Loc::loadMessages(__FILE__);
$request = HttpApplication::getInstance()->getContext()->getRequest();
$module_id = htmlspecialcharsbx($request["mid"] != "" ? $request["mid"] : $request["id"]);
\Bitrix\Main\Loader::includeModule($module_id);

$Options = new Options();
if ( $request->isPost() ){//save settings
    $Options->save_option( $_POST );
};
$current_options = $Options->get_option();

$aTabs = array(
    array(
        "DIV" => "edit",
        "TAB"=> Loc::getMessage("FALBAR_TOTOP_OPTIONS_TAB_NAME"),
        "TITLE" => Loc::getMessage("FALBAR_TOTOP_OPTIONS_TAB_NAME"),
        "OPTIONS" => array(
            Loc::getMessage("API_SETTINGS"), // Заголовок настроек
            array( // Настройка
                "test_api",
                Loc::getMessage("IS_TEST_MODE"),
                "",
                array("checkbox")
            ),
            array( // Настройка
                "extEntityId",
                Loc::getMessage("EXTENTITYID"),
                "",
                array("text")
            ),
            Loc::getMessage("FALBAR_TOTOP_OPTIONS_TAB_APPEARANCE"),
        )
    ),
);


// формируем табы
$aTabs = $Options->fill_params( $aTabs );
$tabControl = new CAdminTabControl(
    "tabControl",
    $aTabs
);  
$tabControl->Begin();
?>

<form id="KonturCoreOptions" action="<? echo($APPLICATION->GetCurPage()); ?>?mid=<? echo($module_id); ?>&lang=<? echo(LANG); ?>" method="post">
    <?foreach($aTabs as $aTab){
        if($aTab["OPTIONS"]){
            $tabControl->BeginNextTab();
            __AdmSettingsDrawList($module_id, $aTab["OPTIONS"]);
        }
    }
    $tabControl->Buttons();
    ?>

    <input type="submit" name="apply_" value="<? echo(Loc::GetMessage("FALBAR_TOTOP_OPTIONS_INPUT_APPLY")); ?>" class="adm-btn-save" />
    <input type="submit" name="default" value="<? echo(Loc::GetMessage("FALBAR_TOTOP_OPTIONS_INPUT_DEFAULT")); ?>" />

    <?=bitrix_sessid_post();?>
</form>
<?$tabControl->End();?>