<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); 
use Bitrix\Main\Page\Asset;
?>
<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">
<head>
    <meta charset="<?=LANG_CHARSET;?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?$APPLICATION->ShowTitle();?></title>
    <?
        $APPLICATION->ShowCSS();
        $APPLICATION->ShowHeadStrings();
        $APPLICATION->ShowHeadScripts();
        $APPLICATION->ShowLink("canonical");

        CJSCore::Init(array("jquery"));

        // CSS
        Asset::getInstance()->addCss( SITE_TEMPLATE_PATH . "/css/normalize.css" );
        Asset::getInstance()->addCss( SITE_TEMPLATE_PATH . "/css/animate.css" );
        Asset::getInstance()->addCss( SITE_TEMPLATE_PATH . "/css/slick-theme.css" );
        Asset::getInstance()->addCss( SITE_TEMPLATE_PATH . "/css/slick.css" );
        Asset::getInstance()->addCss( SITE_TEMPLATE_PATH . "/css/jquery.fancybox.min.css" );
        Asset::getInstance()->addCss( SITE_TEMPLATE_PATH . "/css/fonts/Actay/Actay.css" );
        Asset::getInstance()->addCss( SITE_TEMPLATE_PATH . "/css/theme.css" );

        // JS
        Asset::getInstance()->addJs( SITE_TEMPLATE_PATH . "/js/wow.min.js" );
        Asset::getInstance()->addJs( SITE_TEMPLATE_PATH . "/js/slick.min.js" );
        Asset::getInstance()->addJs( SITE_TEMPLATE_PATH . "/js/main.js" );
        Asset::getInstance()->addJs( SITE_TEMPLATE_PATH . "/js/SmoothScroll.js" );
        Asset::getInstance()->addJs( SITE_TEMPLATE_PATH . "/js/jquery.fancybox.min.js" );
        Asset::getInstance()->addJs( SITE_TEMPLATE_PATH . "/js/jquery.inputmask.min.js" );
        Asset::getInstance()->addJs( SITE_TEMPLATE_PATH . "/js/jquery.validate.min.js" );
    ?>
</head>
<body>
    <div id="panel"><?$APPLICATION->ShowPanel();?></div>
    <div class="header_wrap">
        <header class="header">
            <div class="container">
                <div class="header__box">
                    <a href="/" class="header__logo">
                        <img src="<?=SITE_TEMPLATE_PATH?>/images/logo.svg" alt="">
                    </a>
                    <div class="header__wrap">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "top_menu",
                            Array(
                                "ALLOW_MULTI_SELECT" => "N",
                                "CHILD_MENU_TYPE" => "left",
                                "DELAY" => "N",
                                "MAX_LEVEL" => "1",
                                "MENU_CACHE_GET_VARS" => array(""),
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_TYPE" => "N",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "ROOT_MENU_TYPE" => "top",
                                "USE_EXT" => "N"
                            )
                        );?>
                        <div class="header__right">
                            <?$APPLICATION->IncludeFile(
                                '/include/header/header_email.php',
                                [],
                                [
                                    'MODE'      => 'php',
                                    'NAME'      => 'Электронную почту',
                                    'TEMPLATE'  => 'page_inc.php'
                                ]
                            );?>
                            <?$APPLICATION->IncludeFile(
                                '/include/header/header_phone.php',
                                [],
                                [
                                    'MODE'      => 'php',
                                    'NAME'      => 'Номер телефона',
                                    'TEMPLATE'  => 'page_inc.php'
                                ]
                            );?>
                            <?$APPLICATION->IncludeFile(
                                '/include/social_links.php',
                                [],
                                [
                                    'MODE'      => 'php',
                                    'NAME'      => 'Ссылки',
                                    'TEMPLATE'  => 'page_inc.php'
                                ]
                            );?>
                        </div>
                    </div>
                    <button class="header__burgir">
                        <span></span><span></span><span></span>
                    </button>
                </div>
            </div>
        </header>
    </div>
    <div class="modal">
        <div class="consultation__form">
            <div class="close"></div>
            <?$APPLICATION->IncludeComponent(
                "kontur:form",
                "OrderCall",
                Array(
                    "ADD_FORM" => "Y",
                    "EMAIL_MASK" => array("EMAIL"),
                    "FORM_TITLE" => "",
                    "IBLOCK" => "11",
                    "IBLOCKTYPE" => "Forms",
                    "MAIL_TEMPLATE" => "",
                    "PHONE_MASK" => array("PHONE_NUMBER"),
                    "POPUP" => "N",
                    "PROPERTYS" => array("NAME","PHONE_NUMBER","EMAIL"),
                    "SEND_MAIL" => "N",
                    "POLICE_LINK" => '#',
                )
            );?>
        </div>
    </div>
    <main class="main">
    <?if( CSite::InDir('/index.php') ) include( $_SERVER['DOCUMENT_ROOT'] . '/index_page.php' );?>
    <?if( !CSite::InDir('/index.php') ):?>
        <div class="container">
    <?endif;?>