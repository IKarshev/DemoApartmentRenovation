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

<div class="service-detail" id="<?=$this->GetEditAreaId($arResult["ID"])?>">
	<div class="container">
		<div class="main-info wow fadeIn"  data-wow-duration="1s" data-wow-delay="0.4s">
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
			<div class="tariffs wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
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
			<div class="our-works wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
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

	<div class="application-block wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
		<div class="container">
			<div class="left-column">
				<?$APPLICATION->IncludeFile(
					'/include/service/application-block.php',
					[],
					[
						'MODE'      => 'html',
						'NAME'      => 'Текст в блоке с формой',
						'TEMPLATE'  => 'page_inc.php'
					]
				);?>
			</div>
			<div class="right-column">
				<div class="consultation__form">
					<?$APPLICATION->IncludeComponent(
						"kontur:form",
						"CostCalculation",
						Array(
							"ADD_FORM" => "Y",
							"EMAIL_MASK" => array(),
							"FORM_TITLE" => "",
							"IBLOCK" => "13",
							"IBLOCKTYPE" => "Forms",
							"MAIL_TEMPLATE" => "",
							"PHONE_MASK" => array("PHONE_NUMBER"),
							"POPUP" => "N",
							"PROPERTYS" => array("NAME","PHONE_NUMBER","MESSAGE"),
							"SEND_MAIL" => "N",
							"POLICE_LINK" => '#',
							"USE_RECAPTCHA" => \Bitrix\Main\Config\Option::get('kontur.core', 'GoogleRecaptchaActivity'),
						)
					);?>
				</div>
			</div>

		</div>
	</div>
	
	<?if( !empty($arResult['DISPLAY_PROPERTIES']['WORK_STAGES']['LINK_ELEMENT_VALUE']) ):?>
		<div class="container wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
			<div class="work-stages">
				<div class="block-title">
					<h2>Этапы работ</h2>
				</div>

				<div class="stage-list-container">
					<div class="stages-btn-container">
						<?for ($i=0; $i < count($arResult['DISPLAY_PROPERTIES']['WORK_STAGES']['LINK_ELEMENT_VALUE']); $i++):?>
							<div class="stage-btn <?=($i==0) ? 'active' : ''?>" data-stage_count="<?=$i+1?>"><?=$i+1?></div>
						<?endfor;?>
					</div>
					<div class="stages-container">
						<?
						$StageCount = 1;
						foreach ($arResult['DISPLAY_PROPERTIES']['WORK_STAGES']['LINK_ELEMENT_VALUE'] as $arkey => $arItem):?>
							<div class="stage <?=($StageCount==1) ? 'active' : ''?>"data-stage_count="<?=$StageCount?>">
								<div class="left_column">
									<div class="stage-title">Этап <?=$StageCount?>: <?=$arItem['NAME']?></div>
									<p><?=$arItem['PREVIEW_TEXT']?></p>
								</div>
								<div class="right_column" style="background-image: url('<?=\CFile::GetPath($arItem['PREVIEW_PICTURE']);?>');"></div>
							</div>
						<?
						$StageCount++;
						endforeach;?>
					</div>
				</div>
			</div>
		</div>
	<?endif;?>

</div>