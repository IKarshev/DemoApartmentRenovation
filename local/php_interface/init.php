<?
include( $_SERVER['DOCUMENT_ROOT'] . '/local/composer/vendor/autoload.php' );

// migration
Arrilot\BitrixMigrations\Autocreate\Manager::init($_SERVER["DOCUMENT_ROOT"].'/local/migrations');
?>