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

	<div class="tariffs">
		<div class="block-title">Тарифы</div>
		
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



		<?/*
		<div class="slider-navigation-container"></div>
		*/?>
	</div>

</div>