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

        // JS
        Asset::getInstance()->addJs( SITE_TEMPLATE_PATH . "/js/wow.min.js" );
        Asset::getInstance()->addJs( SITE_TEMPLATE_PATH . "/js/slick.min.js" );
        Asset::getInstance()->addJs( SITE_TEMPLATE_PATH . "/js/main.js" );
        Asset::getInstance()->addJs( SITE_TEMPLATE_PATH . "/js/SmoothScroll.js" );
        Asset::getInstance()->addJs( SITE_TEMPLATE_PATH . "/js/jquery.fancybox.min.js" );
    ?>

    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
   </script>
</head>
<body>
    <div class="header_wrap">
        <header class="header">
            <div class="container">
                <div class="header__box">
                    <a href="#" class="header__logo">
                        <img src="img/logo.svg" alt="">
                    </a>
                    <div class="header__wrap">
                        <div class="header__navbar">
                            <ul class="ul">
                                <li class="li">
                                    <a href="#section1" class="item">О компании</a>
                                </li>
                                <li class="li">
                                    <a href="#section2" class="item">Услуги</a>
                                </li>
                                <li class="li">
                                    <a href="#section3" class="item">Дизайн проект</a>
                                </li>
                                <li class="li">
                                    <a href="#section4" class="item">Наши работы</a>
                                </li>
                                <li class="li">
                                    <a href="#section5" class="item">Отзывы</a>
                                </li>
                                <li class="li">
                                    <a href="#section6" class="item">Акции</a>
                                </li>
                            </ul>
                        </div>
                        <div class="header__right">
                            <a href="mailto:picugin365@mail.ru" class="header__email">picugin365@mail.ru</a>
                            <a href="tel:8 960 796 41 33" class="header__phone">8 960 796 41 33</a>
                            <div class="header__soc">
                                <a href="#" class="item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="20" viewBox="0 0 19 20" fill="none">
                                        <path d="M4.99036 16.1693L5.67816 16.5711C6.83805 17.2476 8.15727 17.6027 9.50001 17.6C11.0031 17.6 12.4725 17.1543 13.7223 16.3192C14.9721 15.4841 15.9463 14.2971 16.5215 12.9084C17.0967 11.5197 17.2472 9.99156 16.954 8.51731C16.6607 7.04305 15.9369 5.68886 14.874 4.62599C13.8111 3.56311 12.4569 2.83928 10.9827 2.54603C9.50844 2.25278 7.98033 2.40329 6.59161 2.97851C5.2029 3.55374 4.01594 4.52785 3.18084 5.77766C2.34574 7.02748 1.90001 8.49686 1.90001 9.99999C1.90001 11.3642 2.25816 12.6723 2.92981 13.8228L3.33071 14.5106L2.71036 16.7915L4.99036 16.1693ZM0.00381271 19.5L1.28821 14.7804C0.441893 13.3296 -0.0027461 11.6796 1.27606e-05 9.99999C1.27606e-05 4.75315 4.25316 0.5 9.50001 0.5C14.7469 0.5 19 4.75315 19 9.99999C19 15.2468 14.7469 19.5 9.50001 19.5C7.82115 19.5027 6.17183 19.0584 4.72151 18.2127L0.00381271 19.5ZM6.07146 5.5426C6.19876 5.5331 6.32701 5.5331 6.45431 5.5388C6.50561 5.5426 6.55691 5.5483 6.60821 5.554C6.75926 5.5711 6.92551 5.66325 6.98156 5.79055C7.26466 6.43275 7.54016 7.0797 7.80616 7.72855C7.86506 7.87295 7.82991 8.0582 7.71781 8.2387C7.64071 8.36075 7.55732 8.47871 7.46796 8.59209C7.36061 8.72984 7.12976 8.98254 7.12976 8.98254C7.12976 8.98254 7.03571 9.09464 7.07181 9.23429C7.08511 9.28749 7.12881 9.36444 7.16871 9.42904L7.22476 9.51929C7.46796 9.92494 7.79476 10.3363 8.19376 10.7239C8.30776 10.8341 8.41891 10.9471 8.53861 11.0526C8.98321 11.4449 9.48671 11.7651 10.0301 12.0026L10.0349 12.0045C10.1156 12.0396 10.1565 12.0586 10.2743 12.109C10.3332 12.1337 10.394 12.1555 10.4557 12.1717C10.5195 12.1879 10.5867 12.1849 10.6488 12.1629C10.7109 12.1409 10.765 12.101 10.8044 12.0482C11.4922 11.215 11.5549 11.1609 11.5606 11.1609V11.1628C11.6083 11.1182 11.6651 11.0844 11.727 11.0636C11.789 11.0428 11.8547 11.0355 11.9197 11.0421C11.9767 11.0459 12.0346 11.0564 12.0878 11.0801C12.5923 11.311 13.4178 11.671 13.4178 11.671L13.9707 11.919C14.0638 11.9636 14.1484 12.0691 14.1512 12.1707C14.155 12.2344 14.1607 12.337 14.1389 12.5251C14.1085 12.7711 14.0344 13.0666 13.9603 13.2214C13.9095 13.3271 13.8422 13.424 13.7608 13.5083C13.6649 13.609 13.5599 13.7006 13.4473 13.7819C13.4083 13.8113 13.3687 13.8398 13.3285 13.8674C13.2103 13.9424 13.0889 14.0121 12.9647 14.0764C12.7201 14.2064 12.4499 14.281 12.1733 14.2949C11.9976 14.3044 11.8218 14.3177 11.6451 14.3082C11.6375 14.3082 11.1055 14.2256 11.1055 14.2256C9.75485 13.8703 8.50573 13.2048 7.45751 12.2819C7.24281 12.0928 7.04426 11.8895 6.84096 11.6872C5.99546 10.8464 5.35706 9.93919 4.96946 9.08229C4.77107 8.66172 4.66391 8.20393 4.65501 7.739C4.65109 7.1622 4.83964 6.60058 5.19081 6.143C5.26016 6.0537 5.32571 5.9606 5.43876 5.85325C5.55941 5.73925 5.63541 5.67845 5.71806 5.63665C5.82795 5.58158 5.94783 5.54926 6.07051 5.54165L6.07146 5.5426Z" fill="#4E433D"/>
                                    </svg>
                                </a>
                            </div>
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
            <button class="close"></button>
            <div class="input">
                <input type="text" placeholder="Имя">
            </div>
            <div class="input">
                <input type="text" placeholder="+7 (XXX) XXX XX XX" class="tel input_phone">
            </div>
            <div class="input">
                <input type="text" placeholder="E-Mail">
            </div>
            <button class="btn">Отправить</button>
            <p class="text">
                При нажатии на кнопку “отправить” я принимаю условия <a href="#">пользовательского соглашения</a>
            </p>
        </div>
    </div>
    <main class="main">
    <?if( CSite::InDir('/index.php') ) include( $_SERVER['DOCUMENT_ROOT'] . '/index_page.php' );?>
    <?if( !CSite::InDir('/index.php') ):?>
        <div class="container">
    <?endif;?>