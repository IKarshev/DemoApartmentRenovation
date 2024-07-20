<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"main_slider",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("", ""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("", ""),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?>

<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"advantages",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("", ""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "2",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("", ""),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?>


<section class="company">
    <div class="company__box">
        <div class="company__left wow fadeIn" data-wow-duration="1s" data-wow-delay="0s">

            <?$APPLICATION->IncludeFile(
                '/include/about-company-image.php',
                [],
                [
                    'MODE'      => 'html',
                    'NAME'      => 'Фото',
                    'TEMPLATE'  => 'page_inc.php'
                ]
            );?>

        </div>
        <div class="company__right">
            <div class="wrap">
                <div class="title_h2 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s">
                    <?$APPLICATION->IncludeFile(
                        '/include/about-company-title.php',
                        [],
                        [
                            'MODE'      => 'html',
                            'NAME'      => 'Заголовок',
                            'TEMPLATE'  => 'page_inc.php'
                        ]
                    );?>
                </div>

                <?$APPLICATION->IncludeFile(
                    '/include/about-company-text.php',
                    [],
                    [
                        'MODE'      => 'html',
                        'NAME'      => 'Текст',
                        'TEMPLATE'  => 'page_inc.php'
                    ]
                );?>

                <?$APPLICATION->IncludeComponent(
                    "bitrix:news.list",
                    "company",
                    Array(
                        "ACTIVE_DATE_FORMAT" => "d.m.Y",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "Y",
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "A",
                        "CHECK_DATES" => "Y",
                        "DETAIL_URL" => "",
                        "DISPLAY_BOTTOM_PAGER" => "N",
                        "DISPLAY_DATE" => "N",
                        "DISPLAY_NAME" => "N",
                        "DISPLAY_PICTURE" => "N",
                        "DISPLAY_PREVIEW_TEXT" => "N",
                        "DISPLAY_TOP_PAGER" => "N",
                        "FIELD_CODE" => array("", ""),
                        "FILTER_NAME" => "",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "IBLOCK_ID" => "3",
                        "IBLOCK_TYPE" => "content",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "INCLUDE_SUBSECTIONS" => "N",
                        "MESSAGE_404" => "",
                        "NEWS_COUNT" => "20",
                        "PAGER_BASE_LINK_ENABLE" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_TEMPLATE" => ".default",
                        "PAGER_TITLE" => "Новости",
                        "PARENT_SECTION" => "",
                        "PARENT_SECTION_CODE" => "",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "PROPERTY_CODE" => array("", ""),
                        "SET_BROWSER_TITLE" => "N",
                        "SET_LAST_MODIFIED" => "N",
                        "SET_META_DESCRIPTION" => "N",
                        "SET_META_KEYWORDS" => "N",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "SHOW_404" => "N",
                        "SORT_BY1" => "ACTIVE_FROM",
                        "SORT_BY2" => "SORT",
                        "SORT_ORDER1" => "DESC",
                        "SORT_ORDER2" => "ASC",
                        "STRICT_SECTION_CHECK" => "N"
                    )
                );?>

                <div class="banner__btns wow fadeInUp" data-wow-duration="1s" data-wow-delay="2s">
                    <button class="banner__call">Консультация специалиста</button>
                    <button href=".map" class="banner__list">
                        Как нас найти
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" viewBox="0 0 16 20" fill="none">
                            <path d="M8 18.25L7.50612 18.8144L8 19.2466L8.49388 18.8144L8 18.25ZM14.25 7.75C14.25 8.65956 13.8802 9.73103 13.2496 10.874C12.6255 12.0051 11.7837 13.1393 10.9263 14.1575C10.0711 15.1731 9.21366 16.0575 8.56903 16.6887C8.24717 17.0039 7.97948 17.2548 7.7931 17.4262C7.69993 17.5119 7.62716 17.5776 7.57818 17.6215C7.55369 17.6435 7.53516 17.6599 7.523 17.6707C7.51693 17.6761 7.51245 17.68 7.50962 17.6825C7.5082 17.6837 7.5072 17.6846 7.50661 17.6851C7.50632 17.6854 7.50613 17.6856 7.50605 17.6856C7.50601 17.6857 7.50603 17.6856 7.50601 17.6857C7.50605 17.6856 7.50612 17.6856 8 18.25C8.49388 18.8144 8.494 18.8143 8.49415 18.8142C8.49424 18.8141 8.49442 18.814 8.49459 18.8138C8.49493 18.8135 8.49538 18.8131 8.49594 18.8126C8.49705 18.8117 8.49858 18.8103 8.50053 18.8086C8.50443 18.8052 8.50999 18.8003 8.51716 18.7939C8.53149 18.7812 8.55227 18.7628 8.57905 18.7388C8.63261 18.6908 8.71023 18.6207 8.80847 18.5303C9.0049 18.3497 9.28408 18.0879 9.61847 17.7605C10.2863 17.1065 11.1789 16.1863 12.0737 15.1237C12.9663 14.0638 13.8745 12.8465 14.5629 11.5986C15.2448 10.3627 15.75 9.02794 15.75 7.75H14.25ZM8 1.5C11.4518 1.5 14.25 4.29822 14.25 7.75H15.75C15.75 3.46979 12.2802 0 8 0V1.5ZM1.75 7.75C1.75 4.29822 4.54822 1.5 8 1.5V0C3.71979 0 0.25 3.46979 0.25 7.75H1.75ZM8 18.25C8.49388 17.6856 8.49395 17.6856 8.49399 17.6857C8.49397 17.6856 8.49399 17.6857 8.49395 17.6856C8.49387 17.6856 8.49368 17.6854 8.49339 17.6851C8.4928 17.6846 8.4918 17.6837 8.49038 17.6825C8.48755 17.68 8.48307 17.6761 8.477 17.6707C8.46484 17.6599 8.44631 17.6435 8.42182 17.6215C8.37284 17.5776 8.30007 17.5119 8.2069 17.4262C8.02052 17.2548 7.75283 17.0039 7.43097 16.6887C6.78634 16.0575 5.92892 15.1731 5.07368 14.1575C4.21625 13.1393 3.37445 12.0051 2.75043 10.874C2.11982 9.73103 1.75 8.65956 1.75 7.75H0.25C0.25 9.02794 0.755184 10.3627 1.43707 11.5986C2.12555 12.8465 3.03375 14.0638 3.92632 15.1237C4.82108 16.1863 5.71366 17.1065 6.38153 17.7605C6.71592 18.0879 6.9951 18.3497 7.19153 18.5303C7.28977 18.6207 7.36739 18.6908 7.42095 18.7388C7.44773 18.7628 7.46851 18.7812 7.48284 18.7939C7.49001 18.8003 7.49557 18.8052 7.49947 18.8086C7.50142 18.8103 7.50295 18.8117 7.50406 18.8126C7.50462 18.8131 7.50507 18.8135 7.50541 18.8138C7.50558 18.814 7.50576 18.8141 7.50585 18.8142C7.506 18.8143 7.50612 18.8144 8 18.25ZM9.25 8C9.25 8.69036 8.69036 9.25 8 9.25V10.75C9.51878 10.75 10.75 9.51878 10.75 8H9.25ZM8 6.75C8.69036 6.75 9.25 7.30964 9.25 8H10.75C10.75 6.48122 9.51878 5.25 8 5.25V6.75ZM6.75 8C6.75 7.30964 7.30964 6.75 8 6.75V5.25C6.48122 5.25 5.25 6.48122 5.25 8H6.75ZM8 9.25C7.30964 9.25 6.75 8.69036 6.75 8H5.25C5.25 9.51878 6.48122 10.75 8 10.75V9.25Z" fill="#4E433D"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="services" id="services">
    <div class="container">
        <div class="title_h2">
            <p class="h2 center">Услуги</p>
        </div>
        <div class="services__box">
            <div class="services__block wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                <div class="img">
                    <img src="img/services1.png" alt="">
                </div>
                <div class="content">
                    <p class="price">от 2 390р/кв.м <span class="day">7 дней</span></p>
                    <p class="title">Косметический ремонт</p>
                    <p class="h5">Рекомендуем для:</p>
                    <ul class="ul">
                        <li class="li">предпродажной подготовки</li>
                        <li class="li">сдачи в аренду</li>
                        <li class="li">обновления ремонта</li>
                    </ul>
                </div>
                <div class="bottom">
                    <button class="btn open_modal">Заказать звонок</button>
                    <a href="#" class="link">Подробнее</a>
                </div>
            </div>
            <div class="services__block wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s">
                <div class="img">
                    <img src="img/services2.png" alt="">
                </div>
                <div class="content">
                    <p class="price">от 4 190р/кв.м <span class="day">14 дней</span></p>
                    <p class="title">Капитальный ремонт</p>
                    <p class="h5">Рекомендуем для:</p>
                    <ul class="ul">
                        <li class="li">ремонта новостроек</li>
                        <li class="li">полного преображения квартиры</li>
                        <li class="li">ремонта коттеджа</li>
                    </ul>
                </div>
                <div class="bottom">
                    <button class="btn open_modal">Заказать звонок</button>
                    <a href="#" class="link">Подробнее</a>
                </div>
            </div>
            <div class="services__block wow fadeIn" data-wow-duration="1s" data-wow-delay="1s">
                <div class="img">
                    <img src="img/services3.png" alt="">
                </div>
                <div class="content">
                    <p class="price">от 5 990р/кв.м <span class="day">21 день</span></p>
                    <p class="title">Эксклюзивный ремонт</p>
                    <p class="h5">Рекомендуем для:</p>
                    <ul class="ul">
                        <li class="li">авторского дизайна</li>
                        <li class="li">нестандартных решений</li>
                        <li class="li">роскошной жизни</li>
                    </ul>
                </div>
                <div class="bottom">
                    <button class="btn open_modal">Заказать звонок</button>
                    <a href="#" class="link">Подробнее</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="services" id="design-project">
    <div class="container">
        <div class="title_h2">
            <p class="h2 center">Дизайн проект</p>
        </div>
        <div class="services__box">
            <div class="services__block wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                <div class="img">
                    <img src="img/services4.png" alt="">
                </div>
                <div class="content">
                    <p class="price">от 1 780р/кв.м <span class="day">7 дней</span></p>
                    <p class="title">Эскизная проработка
                        дизайн-проекта</p>
                    <p class="h5">Рекомендуем для:</p>
                    <ul class="ul">
                        <li class="li">самостоятельного ремонта</li>
                    </ul>
                </div>
                <div class="bottom">
                    <button class="btn open_modal">Заказать звонок</button>
                    <a href="#" class="link">Подробнее</a>
                </div>
            </div>
            <div class="services__block wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s">
                <div class="img">
                    <img src="img/services5.png" alt="">
                </div>
                <div class="content">
                    <p class="price">от 2 380р/кв.м <span class="day">14 дней</span></p>
                    <p class="title">Стандартная проработка
                        дизайн-проекта</p>
                    <p class="h5">Рекомендуем для:</p>
                    <ul class="ul">
                        <li class="li">ремонта "под ключ" с авторским надзором</li>
                    </ul>
                </div>
                <div class="bottom">
                    <button class="btn open_modal">Заказать звонок</button>
                    <a href="#" class="link">Подробнее</a>
                </div>
            </div>
            <div class="services__block wow fadeIn" data-wow-duration="1s" data-wow-delay="1s">
                <div class="img">
                    <img src="img/services6.png" alt="">
                </div>
                <div class="content">
                    <p class="price">от 2 980р/кв.м <span class="day">21 день</span></p>
                    <p class="title">Детальная проработка
                        дизайн-проекта</p>
                    <p class="h5">Рекомендуем для:</p>
                    <ul class="ul">
                        <li class="li">эксклюзивного ремонта</li>
                    </ul>
                </div>
                <div class="bottom">
                    <button class="btn open_modal">Заказать звонок</button>
                    <a href="#" class="link">Подробнее</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="our_work wow fadeIn" id="our-works" data-wow-duration="1s" data-wow-delay="0.2s">
    <div class="container">
        <div class="title_h2">
            <p class="h2 center">Наши работы</p>
        </div>
        <div class="our_work__slider">
            <div class="our_work__grid">
                <a href="img/grid1.png" data-fancybox="gal" class="our_work__block block1">
                    <img src="img/grid1.png" alt="">
                </a>
                <a href="img/grid2.png" data-fancybox="gal" class="our_work__block block2">
                    <img src="img/grid2.png" alt="">
                </a>
                <a href="img/grid3.png" data-fancybox="gal" class="our_work__block block3">
                    <img src="img/grid3.png" alt="">
                </a>
                <a href="img/grid4.png" data-fancybox="gal" class="our_work__block block4">
                    <img src="img/grid4.png" alt="">
                </a>
                <a href="img/grid5.png" data-fancybox="gal" class="our_work__block block5">
                    <img src="img/grid5.png" alt="">
                </a>
                <a href="img/grid6.png" data-fancybox="gal" class="our_work__block block6">
                    <img src="img/grid6.png" alt="">
                </a>
                <a href="img/grid7.png" data-fancybox="gal" class="our_work__block block7">
                    <img src="img/grid7.png" alt="">
                </a>
                <a href="img/grid8.png" data-fancybox="gal" class="our_work__block block8">
                    <img src="img/grid8.png" alt="">
                </a>
                <a href="img/grid9.png" data-fancybox="gal" class="our_work__block block9">
                    <img src="img/grid9.png" alt="">
                </a>
                <a href="img/grid10.png" data-fancybox="gal" class="our_work__block block10">
                    <img src="img/grid10.png" alt="">
                </a>
                <a href="img/grid11.png" data-fancybox="gal" class="our_work__block block11">
                    <img src="img/grid11.png" alt="">
                </a>
                <a href="img/grid12.png" data-fancybox="gal" class="our_work__block block12">
                    <img src="img/grid12.png" alt="">
                </a>
            </div>
            <div class="our_work__grid">
                <a href="img/grid1.png" data-fancybox="gal" class="our_work__block block1">
                    <img src="img/grid1.png" alt="">
                </a>
                <a href="img/grid2.png" data-fancybox="gal" class="our_work__block block2">
                    <img src="img/grid2.png" alt="">
                </a>
                <a href="img/grid3.png" data-fancybox="gal" class="our_work__block block3">
                    <img src="img/grid3.png" alt="">
                </a>
                <a href="img/grid4.png" data-fancybox="gal" class="our_work__block block4">
                    <img src="img/grid4.png" alt="">
                </a>
                <a href="img/grid5.png" data-fancybox="gal" class="our_work__block block5">
                    <img src="img/grid5.png" alt="">
                </a>
                <a href="img/grid6.png" data-fancybox="gal" class="our_work__block block6">
                    <img src="img/grid6.png" alt="">
                </a>
                <a href="img/grid7.png" data-fancybox="gal" class="our_work__block block7">
                    <img src="img/grid7.png" alt="">
                </a>
                <a href="img/grid8.png" data-fancybox="gal" class="our_work__block block8">
                    <img src="img/grid8.png" alt="">
                </a>
                <a href="img/grid9.png" data-fancybox="gal" class="our_work__block block9">
                    <img src="img/grid9.png" alt="">
                </a>
                <a href="img/grid10.png" data-fancybox="gal" class="our_work__block block10">
                    <img src="img/grid10.png" alt="">
                </a>
                <a href="img/grid11.png" data-fancybox="gal" class="our_work__block block11">
                    <img src="img/grid11.png" alt="">
                </a>
                <a href="img/grid12.png" data-fancybox="gal" class="our_work__block block12">
                    <img src="img/grid12.png" alt="">
                </a>
            </div>
            <div class="our_work__grid">
                <a href="img/grid1.png" data-fancybox="gal" class="our_work__block block1">
                    <img src="img/grid1.png" alt="">
                </a>
                <a href="img/grid2.png" data-fancybox="gal" class="our_work__block block2">
                    <img src="img/grid2.png" alt="">
                </a>
                <a href="img/grid3.png" data-fancybox="gal" class="our_work__block block3">
                    <img src="img/grid3.png" alt="">
                </a>
                <a href="img/grid4.png" data-fancybox="gal" class="our_work__block block4">
                    <img src="img/grid4.png" alt="">
                </a>
                <a href="img/grid5.png" data-fancybox="gal" class="our_work__block block5">
                    <img src="img/grid5.png" alt="">
                </a>
                <a href="img/grid6.png" data-fancybox="gal" class="our_work__block block6">
                    <img src="img/grid6.png" alt="">
                </a>
                <a href="img/grid7.png" data-fancybox="gal" class="our_work__block block7">
                    <img src="img/grid7.png" alt="">
                </a>
                <a href="img/grid8.png" data-fancybox="gal" class="our_work__block block8">
                    <img src="img/grid8.png" alt="">
                </a>
                <a href="img/grid9.png" data-fancybox="gal" class="our_work__block block9">
                    <img src="img/grid9.png" alt="">
                </a>
                <a href="img/grid10.png" data-fancybox="gal" class="our_work__block block10">
                    <img src="img/grid10.png" alt="">
                </a>
                <a href="img/grid11.png" data-fancybox="gal" class="our_work__block block11">
                    <img src="img/grid11.png" alt="">
                </a>
                <a href="img/grid12.png" data-fancybox="gal" class="our_work__block block12">
                    <img src="img/grid12.png" alt="">
                </a>
            </div>
            <div class="our_work__grid">
                <a href="img/grid1.png" data-fancybox="gal" class="our_work__block block1">
                    <img src="img/grid1.png" alt="">
                </a>
                <a href="img/grid2.png" data-fancybox="gal" class="our_work__block block2">
                    <img src="img/grid2.png" alt="">
                </a>
                <a href="img/grid3.png" data-fancybox="gal" class="our_work__block block3">
                    <img src="img/grid3.png" alt="">
                </a>
                <a href="img/grid4.png" data-fancybox="gal" class="our_work__block block4">
                    <img src="img/grid4.png" alt="">
                </a>
                <a href="img/grid5.png" data-fancybox="gal" class="our_work__block block5">
                    <img src="img/grid5.png" alt="">
                </a>
                <a href="img/grid6.png" data-fancybox="gal" class="our_work__block block6">
                    <img src="img/grid6.png" alt="">
                </a>
                <a href="img/grid7.png" data-fancybox="gal" class="our_work__block block7">
                    <img src="img/grid7.png" alt="">
                </a>
                <a href="img/grid8.png" data-fancybox="gal" class="our_work__block block8">
                    <img src="img/grid8.png" alt="">
                </a>
                <a href="img/grid9.png" data-fancybox="gal" class="our_work__block block9">
                    <img src="img/grid9.png" alt="">
                </a>
                <a href="img/grid10.png" data-fancybox="gal" class="our_work__block block10">
                    <img src="img/grid10.png" alt="">
                </a>
                <a href="img/grid11.png" data-fancybox="gal" class="our_work__block block11">
                    <img src="img/grid11.png" alt="">
                </a>
                <a href="img/grid12.png" data-fancybox="gal" class="our_work__block block12">
                    <img src="img/grid12.png" alt="">
                </a>
            </div>
        </div>
        <div class="our_work__grid_mobile">
            <div class="our_work__grid">
                <a href="img/grid1.png" data-fancybox="gal" class="our_work__block block1">
                    <img src="img/grid1.png" alt="">
                </a>
                <a href="img/grid2.png" data-fancybox="gal" class="our_work__block block2">
                    <img src="img/grid2.png" alt="">
                </a>
                <a href="img/grid3.png" data-fancybox="gal" class="our_work__block block3">
                    <img src="img/grid3.png" alt="">
                </a>
                <a href="img/grid4.png" data-fancybox="gal" class="our_work__block block4">
                    <img src="img/grid4.png" alt="">
                </a>
                <a href="img/grid5.png" data-fancybox="gal" class="our_work__block block5">
                    <img src="img/grid5.png" alt="">
                </a>
                <a href="img/grid6.png" data-fancybox="gal" class="our_work__block block6">
                    <img src="img/grid6.png" alt="">
                </a>
                <a href="img/grid7.png" data-fancybox="gal" class="our_work__block block7">
                    <img src="img/grid7.png" alt="">
                </a>
                <a href="img/grid8.png" data-fancybox="gal" class="our_work__block block8">
                    <img src="img/grid8.png" alt="">
                </a>
                <a href="img/grid9.png" data-fancybox="gal" class="our_work__block block9">
                    <img src="img/grid9.png" alt="">
                </a>
                <a href="img/grid10.png" data-fancybox="gal" class="our_work__block block10">
                    <img src="img/grid10.png" alt="">
                </a>
                <a href="img/grid11.png" data-fancybox="gal" class="our_work__block block11">
                    <img src="img/grid11.png" alt="">
                </a>
                <a href="img/grid12.png" data-fancybox="gal" class="our_work__block block12">
                    <img src="img/grid12.png" alt="">
                </a>
            </div>
        </div>
        
    </div>
</section>
<section class="reviews wow fadeIn" id="reviews" data-wow-duration="1s" data-wow-delay="0.2s">
    <div class="container">
        <div class="title_h2">
            <p class="h2 center">Отзывы наших клиентов</p>
        </div>
        <div class="reviews__box">
            <div class="reviews__video">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/jfKfPfyJRdk" title="lofi hip hop radio - beats to relax/study to" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="reviews__video">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/jfKfPfyJRdk" title="lofi hip hop radio - beats to relax/study to" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="reviews__video">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/jfKfPfyJRdk" title="lofi hip hop radio - beats to relax/study to" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="reviews__video">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/jfKfPfyJRdk" title="lofi hip hop radio - beats to relax/study to" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="reviews__video">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/jfKfPfyJRdk" title="lofi hip hop radio - beats to relax/study to" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="reviews__video">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/jfKfPfyJRdk" title="lofi hip hop radio - beats to relax/study to" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>
<section class="stock wow fadeIn" id="sales" data-wow-duration="1s" data-wow-delay="0.2s">
    <div class="container">
        <div class="title_h2">
            <p class="h2 center">Акции</p>
        </div>
        <div class="stock__box">
            <div class="stock__block">
                <p class="title">Лист комплектации бесплатно</p>
                <p class="text">При заказе любого ремонта анализ поставщиков и выбор минимальных цен на материалы бесплатно.</p>
            </div>
            <div class="stock__block">
                <p class="title">Лист комплектации бесплатно</p>
                <p class="text">При заказе любого ремонта анализ поставщиков и выбор минимальных цен на материалы бесплатно.</p>
            </div>
            <div class="stock__block">
                <p class="title">Лист комплектации бесплатно</p>
                <p class="text">При заказе любого ремонта анализ поставщиков и выбор минимальных цен на материалы бесплатно.</p>
            </div>
            <div class="stock__block">
                <p class="title">Лист комплектации бесплатно</p>
                <p class="text">При заказе любого ремонта анализ поставщиков и выбор минимальных цен на материалы бесплатно.</p>
            </div>
        </div>
    </div>
</section>
<div class="consultation_wrap">
    <section class="consultation">
        <div class="consultation__box">
            <div class="consultation__left wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                <p class="title">Получите консультацию</p>
                <ul class="ul">
                    <li class="li">По реализации вашего дизайна и организации планировки</li>
                    <li class="li">Выслушаем все идеи, пожелания и изучим референсы</li>
                </ul>
            </div>
            <div class="consultation__form wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
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
            <img src="img/iphone.png" alt="" class="iphone">
        </div>
    </section>
</div>
<section class="reviews_slider wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
    <div class="title_h2">
        <p class="h2 center">Отзывы</p>
    </div>
    <div class="reviews_slider__wrap">
        <div class="reviews_slider__block">
            <div class="wrap">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="17" viewBox="0 0 26 17" fill="none">
                        <path d="M11.0901 0.538086H3.83608L0.736084 16.6581H9.60208L11.0901 0.538086ZM25.7221 0.538086H18.4681L15.3681 16.6581H24.2341L25.7221 0.538086Z" fill="#FFDC60"/>
                    </svg>
                </div>
                <p class="date">12 августа 2020</p>
                <p class="name">Елена Иванова</p>
                <p class="text">Как уже неоднократно упомянуто, стремящиеся вытеснить традиционное производство, нанотехнологии призывают нас к новым свершениям, которые, в свою очередь, должны быть указаны как претенденты на роль ключевых факторов?</p>
            </div>
        </div>
        <div class="reviews_slider__block">
            <div class="wrap">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="17" viewBox="0 0 26 17" fill="none">
                        <path d="M11.0901 0.538086H3.83608L0.736084 16.6581H9.60208L11.0901 0.538086ZM25.7221 0.538086H18.4681L15.3681 16.6581H24.2341L25.7221 0.538086Z" fill="#FFDC60"/>
                    </svg>
                </div>
                <p class="date">12 августа 2020</p>
                <p class="name">Елена Иванова</p>
                <p class="text">Как уже неоднократно упомянуто, стремящиеся вытеснить традиционное производство, нанотехнологии призывают нас к новым свершениям, которые, в свою очередь, должны быть указаны как претенденты на роль ключевых факторов?</p>
            </div>
        </div>
        <div class="reviews_slider__block">
            <div class="wrap">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="17" viewBox="0 0 26 17" fill="none">
                        <path d="M11.0901 0.538086H3.83608L0.736084 16.6581H9.60208L11.0901 0.538086ZM25.7221 0.538086H18.4681L15.3681 16.6581H24.2341L25.7221 0.538086Z" fill="#FFDC60"/>
                    </svg>
                </div>
                <p class="date">12 августа 2020</p>
                <p class="name">Елена Иванова</p>
                <p class="text">Как уже неоднократно упомянуто, стремящиеся вытеснить традиционное производство, нанотехнологии призывают нас к новым свершениям, которые, в свою очередь, должны быть указаны как претенденты на роль ключевых факторов?</p>
            </div>
        </div>
        <div class="reviews_slider__block">
            <div class="wrap">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="17" viewBox="0 0 26 17" fill="none">
                        <path d="M11.0901 0.538086H3.83608L0.736084 16.6581H9.60208L11.0901 0.538086ZM25.7221 0.538086H18.4681L15.3681 16.6581H24.2341L25.7221 0.538086Z" fill="#FFDC60"/>
                    </svg>
                </div>
                <p class="date">12 августа 2020</p>
                <p class="name">Елена Иванова</p>
                <p class="text">Как уже неоднократно упомянуто, стремящиеся вытеснить традиционное производство, нанотехнологии призывают нас к новым свершениям, которые, в свою очередь, должны быть указаны как претенденты на роль ключевых факторов?</p>
            </div>
        </div>
    </div>
</section>
<section class="lists" id="list">
    <div class="container">
        <div class="lists__box">
            <div class="lists__block wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                <p class="title">Комплексный ремонт</p>
                <ul class="ul">
                    <li class="li"><a href="#">Косметический ремонт</a></li>
                    <li class="li"><a href="#">Капитальный ремонт</a></li>
                    <li class="li"><a href="#">Эксклюзивный ремонт</a></li>
                    <li class="li"><a href="#">Квартира</a></li>
                    <li class="li"><a href="#">Новостройка</a></li>
                    <li class="li"><a href="#">Студия</a></li>
                    <li class="li"><a href="#">Апартаменты</a></li>
                    <li class="li"><a href="#">Лофт</a></li>
                    <li class="li"><a href="#">Пентхаус</a></li>
                    <li class="li"><a href="#">Коттедж</a></li>
                    <li class="li"><a href="#">Загородный дом</a></li>
                    <li class="li"><a href="#">Офис</a></li>
                    <li class="li"><a href="#">Нежилое помещение</a></li>
                    <li class="li"><a href="#">Комплексный дизайн-проект</a></li>
                </ul>
            </div>
            <div class="lists__block wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s">
                <p class="title">Ремонт отдельных помещений</p>
                <ul class="ul">
                    <li class="li"><a href="#">Ванная комната</a></li>
                    <li class="li"><a href="#">Туалет</a></li>
                    <li class="li"><a href="#">Жилая комната</a></li>
                    <li class="li"><a href="#">Спальня</a></li>
                    <li class="li"><a href="#">Кухня</a></li>
                    <li class="li"><a href="#">Гостиная</a></li>
                    <li class="li"><a href="#">Кабинет</a></li>
                    <li class="li"><a href="#">Детская комната</a></li>
                    <li class="li"><a href="#">Балкон или лоджия</a></li>
                    <li class="li"><a href="#">Гардеробная</a></li>
                    <li class="li"><a href="#">Прихожая</a></li>
                    <li class="li"><a href="#">Дизайн-проект помещения</a></li>
                </ul>
            </div>
            <div class="lists__block wow fadeIn" data-wow-duration="1s" data-wow-delay="1s">
                <p class="title">Мелкие ремонтные работы</p>
                <ul class="ul">
                    <li class="li"><a href="#">Отделка стен</a></li>
                    <li class="li"><a href="#">Настил пола</a></li>
                    <li class="li"><a href="#">Отделка потолка</a></li>
                    <li class="li"><a href="#">Малярные работы</a></li>
                    <li class="li"><a href="#">Электромонтажные работы</a></li>
                    <li class="li"><a href="#">Сантехнические работы</a></li>
                    <li class="li"><a href="#">Демонтажные работы</a></li>
                    <li class="li"><a href="#">Черновая отделка</a></li>
                    <li class="li"><a href="#">Объединение лоджии с комнатой</a></li>
                    <li class="li"><a href="#">Межкомнатные двери</a></li>
                    <li class="li"><a href="#">Монтаж стен и перегородок</a></li>
                    <li class="li"><a href="#">Отопление</a></li>
                    <li class="li"><a href="#">Водоснабжение и канализация</a></li>
                    <li class="li"><a href="#">Вентиляция и кондиционирование</a></li>
                    <li class="li"><a href="#">Утепление и звукоизоляция</a></li>
                    <li class="li"><a href="#">Монтаж окон</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="map">
    <div style="position:relative;overflow:hidden;">
        <a href="https://yandex.uz/maps/65/novosibirsk/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Новосибирск</a>
        <a href="https://yandex.uz/maps/65/novosibirsk/house/ulitsa_krylova_36/bEsYfwRgSkcOQFtvfXx1cXtkYg==/?ll=82.930329%2C55.040776&utm_medium=mapframe&utm_source=maps&z=17.15" style="color:#eee;font-size:12px;position:absolute;top:14px;">Улица Крылова, 36 — Яндекс Карты</a>
        <iframe src="https://yandex.uz/map-widget/v1/-/CCUfuAU-9B" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
</section>