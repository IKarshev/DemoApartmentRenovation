<?
include_once (__DIR__ . '/lib/vendor/autoload.php');
include_once (__DIR__ . '/lib/aliases.php');

\Bitrix\Main\Loader::registerAutoloadClasses(
	"kontur.core",
	array(
		"konturCore\\Options" => "lib/Options.php",
		"konturCore\\EventHandler" => "lib/EventHandler.php",
		"konturCore\\Helper" => "lib/Helper.php",

		// orm
		"konturCore\\Orm\\SettingsOrderFieldTable" => "lib/Orm/SettingsOrderFieldTable.php",
	)
);