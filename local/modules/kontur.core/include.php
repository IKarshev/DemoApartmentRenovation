<?
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