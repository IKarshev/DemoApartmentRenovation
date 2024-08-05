        <section class="map">
            <div style="position:relative;overflow:hidden;">
                <?$APPLICATION->IncludeFile(
                    '/include/map_widget.php',
                    [],
                    [
                        'MODE'      => 'php',
                        'NAME'      => 'Виджет карты',
                        'TEMPLATE'  => 'page_inc.php'
                    ]
                );?>
            </div>
        </section>
        
        <?if( !CSite::InDir('/index.php') && $APPLICATION->GetDirProperty('FullWidth')!=='Y' ):?>
            </div>
        <?endif;?>
    </main>
   
    <button class="besamogas"></button>
    <footer class="footer">
        <div class="container">
            <div class="footer__top">
                <div class="box">
                    <a href="#" class="footer__logo">
                        <img src="<?=SITE_TEMPLATE_PATH?>/images/logo.svg" alt="">
                    </a>
                    
                    <?$APPLICATION->IncludeFile(
                        '/include/footer/footer_address.php',
                        [],
                        [
                            'MODE'      => 'html',
                            'NAME'      => 'Адрес',
                            'TEMPLATE'  => 'page_inc.php'
                        ]
                    );?>

                    <?$APPLICATION->IncludeFile(
                        '/include/footer/footer_email.php',
                        [],
                        [
                            'MODE'      => 'html',
                            'NAME'      => 'Электронную почту',
                            'TEMPLATE'  => 'page_inc.php'
                        ]
                    );?>

                    <?$APPLICATION->IncludeFile(
                        '/include/footer/footer_phone1.php',
                        [],
                        [
                            'MODE'      => 'html',
                            'NAME'      => 'Номер телефона',
                            'TEMPLATE'  => 'page_inc.php'
                        ]
                    );?>

                    <?$APPLICATION->IncludeFile(
                        '/include/footer/footer_phone2.php',
                        [],
                        [
                            'MODE'      => 'html',
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
            <div class="footer__bottom">
                <div class="box">
                    <button class="footer__call open_modal">Заказать звонок</button>

                    <div class="left">
                        <?$APPLICATION->IncludeFile(
                            '/include/footer/footer_politics.php',
                            [],
                            [
                                'MODE'      => 'php',
                                'NAME'      => 'Политику конфиденциальности',
                                'TEMPLATE'  => 'page_inc.php'
                            ]
                        );?>
                    </div>

                    <div class="center">
                        <?$APPLICATION->IncludeFile(
                            '/include/footer/footer_text.php',
                            [],
                            [
                                'MODE'      => 'php',
                                'NAME'      => 'Текст',
                                'TEMPLATE'  => 'page_inc.php'
                            ]
                        );?>
                    </div>
                    <div class="right copyright">
                        <div>
                            <a href="#" class="link">Создание сайтов</a>
                            <a href="#" class="link">Продвижение сайтов</a>
                        </div>
                        <img src="<?=SITE_TEMPLATE_PATH?>/images/kontur.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>