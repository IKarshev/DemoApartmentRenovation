<?
$MainPages = [
	'#about-company',
	'#services',
	'#design-project',
	'#our-works',
	'#reviews',
	'#sales',
];
$OnMainPage = (CSite::InDir('/index.php')) ? '' : '/';
foreach ($aMenuLinks as $arkey => &$MenuItem) {
	if( in_array($MenuItem[1], $MainPages) ) $MenuItem[1] = $OnMainPage . $MenuItem[1];
}
?>