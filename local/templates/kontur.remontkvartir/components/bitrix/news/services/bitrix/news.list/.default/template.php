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

<?if( !empty($arResult['ITEMS']) ):?>
	<div class="services-list">
		<?foreach ($arResult['ITEMS'] as $arItem):
			$wow_delay = 0.4;
			?>
			<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="services-list-item wow fadeIn" data-wow-duration="1s" data-wow-delay="<?=$wow_delay?>s" style="background-image: url('<?=$arItem['PREVIEW_PICTURE']['SRC']?>');">
				<div class="title"><?=$arItem['NAME']?></div>
			</a>
		<?
			$wow_duration += 0.2;
			endforeach;?>
	</div>
<?endif;?>