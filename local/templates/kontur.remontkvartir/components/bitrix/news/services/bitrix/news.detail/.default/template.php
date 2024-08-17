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

		<div class="our-works wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
			<div class="block-title">
				<h2>Наши работы</h2>
				<div class="description">
					Мы гордимся работами, которые мы выполняем.<br>
					Ознакомьтесь с примерами наших преображений 
				</div>
			</div>
			<div class="our-works-gallery">
				<?$APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"our_work_2",
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
						"FIELD_CODE" => array("",""),
						"FILTER_NAME" => "OurWorksFilter",
						"HIDE_LINK_WHEN_NO_DETAIL" => "N",
						"IBLOCK_ID" => "6",
						"IBLOCK_TYPE" => "content",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
						"INCLUDE_SUBSECTIONS" => "N",
						"MESSAGE_404" => "",
						"NEWS_COUNT" => "6",
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
						"PROPERTY_CODE" => array("","EXECUTION_TIME","RECOMMENDATIONS","PRICE",""),
						"SET_BROWSER_TITLE" => "N",
						"SET_LAST_MODIFIED" => "N",
						"SET_META_DESCRIPTION" => "N",
						"SET_META_KEYWORDS" => "N",
						"SET_STATUS_404" => "N",
						"SET_TITLE" => "N",
						"SHOW_404" => "N",
						"SORT_BY1" => "TIMESTAMP_X",
						"SORT_BY2" => "SORT",
						"SORT_ORDER1" => "DESC",
						"SORT_ORDER2" => "ASC",
						"STRICT_SECTION_CHECK" => "N",
					)
				);?>
			</div>
			<a href="/our_work" class="more-btn">Показать больше</a>
		</div>

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