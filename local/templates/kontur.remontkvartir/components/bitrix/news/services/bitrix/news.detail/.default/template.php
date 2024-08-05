<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<div class="service-detail">
	<div class="container">
		<div class="main-info">
			<?if( isset($arResult['DETAIL_PICTURE']['SRC']) ):?>
				<div class="img_container">
					<img src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="">
				</div>
			<?endif;?>
			<div class="info_container">
				<div class="text"><?=$arResult['DETAIL_TEXT']?></div>

				<?if( isset($arResult['PROPERTIES']['RECOMMENDATIONS']) && !empty($arResult['PROPERTIES']['RECOMMENDATIONS']) ):?>
					<div class="recommendations">
						<div class="recommendations-title">Рекомендуем для:</div>
						<ul class="recommendations-list">
							<?foreach ($arResult['PROPERTIES']['RECOMMENDATIONS']['VALUE'] as $arkey => $arItem):?>
								<li><?=$arItem?></li>
							<?endforeach;?>
						</ul>
					</div>
				<?endif;?>
			</div>
		</div>

		<?if( !empty($arResult['DISPLAY_PROPERTIES']['TARIFFS']['LINK_ELEMENT_VALUE']) ):?>
			<div class="tariffs">
				<div class="block-title">
					<h2>Тарифы</h2>
				</div>
				
				<div id="tariffs-slider" class="slider-container">
					<?foreach ($arResult['DISPLAY_PROPERTIES']['TARIFFS']['LINK_ELEMENT_VALUE'] as $arkey => $arItem):?>
						<div class="slider-item">
							<div class="img-block"><img src="<?=\CFile::GetPath($arItem['PREVIEW_PICTURE'])?>" alt=""></div>
							<div class="info-block">
								<div class="price"><?=$arItem['PRICE']?></div>
								<div class="title"><?=$arItem['NAME']?></div>

								<?if( isset($arItem['RECOMMENDATIONS']) && !empty($arItem['RECOMMENDATIONS']) ):?>
									<div class="recommendations">
										<div class="recommendations-title">Включает в себя:</div>
										<ul class="recommendations-list">
											<?foreach ($arItem['RECOMMENDATIONS'] as $recommendations):?>
												<li><?=$recommendations?></li>
											<?endforeach;?>
										</ul>
									</div>
								<?endif;?>
								<div class="order-call-btn-container">
									<a href="javascript:void(0);" class="order-call-btn open_modal">Заказать звонок</a>
								</div>
							</div>
						</div>
					<?endforeach;?>
				</div>

				<div class="slider-navigation">
					<div class="arrow prev"></div>
					<div class="dots-container"></div>
					<div class="arrow next"></div>
				</div>
			</div>
		<?endif;?>

		<?if( !empty($arResult['PROPERTIES']['OUR_WORKS']['VALUE']) ):?>
			<div class="our-works">
				<div class="block-title">
					<h2>Наши работы</h2>
					<div class="description">
						Мы гордимся работами, которые мы выполняем.<br>
						Ознакомьтесь с примерами наших преображений 
					</div>
				</div>
				<div class="gallery">
					<?foreach ($arResult['PROPERTIES']['OUR_WORKS']['VALUE'] as $arkey => $arItem):?>
						<a href="<?=\CFile::GetPath($arItem)?>" data-fancybox="our_works" class="image-container">
							<img src="<?=\CFile::ResizeImageGet($arItem, array('width'=>490, 'height'=>315), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true)['src']?>" alt="">
						</a>
					<?endforeach;?>
				</div>
				<a href="javascript:void(0);" class="more-btn">Показать больше</a>
			</div>
		<?endif;?>
	</div>

	<?/*
	<div class="application-block">
		<div class="container">
			<div class="left-column">
				<h2>Оставить заявку на расчет стоимость ремонта для Вас!</h2>
				<p>
					Получите скидку 10% на ремонт при заказе до конца месяца!
					Для получения скидки необходимо оставить заявку через форму и заключить договор до конца текущего месяца.
					<br>
					Поспешите! Количество заказов по акции ограничено.
				</p>

				<a class="telephone" href="tel:88005553535">8 800 555 35 35</a>
			</div>
			<div class="right-column"></div>

		</div>
	</div>
	*/?>

</div>