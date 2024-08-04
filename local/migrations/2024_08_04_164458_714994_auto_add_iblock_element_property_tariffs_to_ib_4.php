<?php

use Arrilot\BitrixMigrations\BaseMigrations\BitrixMigration;
use Arrilot\BitrixMigrations\Exceptions\MigrationException;

class AutoAddIblockElementPropertyTariffsToIb420240804164458714994 extends BitrixMigration
{
    /**
     * Run the migration.
     *
     * @return mixed
     * @throws MigrationException
     */
    public function up()
    {
        $fields = array (
  'ID' => 0,
  'NAME' => 'Тарифы',
  'SORT' => 500,
  'CODE' => 'TARIFFS',
  'MULTIPLE' => 'Y',
  'IS_REQUIRED' => 'N',
  'ACTIVE' => 'Y',
  'USER_TYPE' => false,
  'PROPERTY_TYPE' => 'E',
  'IBLOCK_ID' => 4,
  'FILE_TYPE' => '',
  'LIST_TYPE' => 'L',
  'ROW_COUNT' => 1,
  'COL_COUNT' => 30,
  'LINK_IBLOCK_ID' => 12,
  'DEFAULT_VALUE' => '',
  'USER_TYPE_SETTINGS' => false,
  'WITH_DESCRIPTION' => 'N',
  'SEARCHABLE' => 'N',
  'FILTRABLE' => 'N',
  'MULTIPLE_CNT' => 5,
  'HINT' => '',
  'VALUES' => 
  array (
  ),
  'SECTION_PROPERTY' => 'Y',
  'SMART_FILTER' => 'N',
  'DISPLAY_TYPE' => 'F',
  'DISPLAY_EXPANDED' => 'N',
  'FILTER_HINT' => '',
  'FEATURES' => 
  array (
    'iblock:LIST_PAGE_SHOW' => 
    array (
      'ID' => 'n0',
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'LIST_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
    'iblock:DETAIL_PAGE_SHOW' => 
    array (
      'ID' => 'n1',
      'MODULE_ID' => 'iblock',
      'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
      'IS_ENABLED' => 'N',
    ),
  ),
);

        $ibp = new CIBlockProperty();
        $propId = $ibp->add($fields);

        if (!$propId) {
            throw new MigrationException('Ошибка при добавлении свойства инфоблока '.$ibp->LAST_ERROR);
        }
    }

    /**
     * Reverse the migration.
     *
     * @return mixed
     * @throws MigrationException
     */
    public function down()
    {
        $id = $this->getIblockPropIdByCode('TARIFFS', 4);

        $ibp = new CIBlockProperty();
        $deleted = $ibp->delete($id);

        if (!$deleted) {
            throw new MigrationException('Ошибка при удалении свойства инфоблока '.$ibp->LAST_ERROR);
        }
    }
}
