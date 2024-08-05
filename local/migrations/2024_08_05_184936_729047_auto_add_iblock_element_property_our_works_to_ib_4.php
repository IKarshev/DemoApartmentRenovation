<?php

use Arrilot\BitrixMigrations\BaseMigrations\BitrixMigration;
use Arrilot\BitrixMigrations\Exceptions\MigrationException;

class AutoAddIblockElementPropertyOurWorksToIb420240805184936729047 extends BitrixMigration
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
  'NAME' => 'Наши работы',
  'SORT' => 500,
  'CODE' => 'OUR_WORKS',
  'MULTIPLE' => 'Y',
  'IS_REQUIRED' => 'N',
  'ACTIVE' => 'Y',
  'USER_TYPE' => false,
  'PROPERTY_TYPE' => 'F',
  'IBLOCK_ID' => 4,
  'FILE_TYPE' => 'jpg, gif, bmp, png, jpeg, webp',
  'LIST_TYPE' => 'L',
  'ROW_COUNT' => 1,
  'COL_COUNT' => 30,
  'LINK_IBLOCK_ID' => 0,
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
  'DISPLAY_TYPE' => '',
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
        $id = $this->getIblockPropIdByCode('OUR_WORKS', 4);

        $ibp = new CIBlockProperty();
        $deleted = $ibp->delete($id);

        if (!$deleted) {
            throw new MigrationException('Ошибка при удалении свойства инфоблока '.$ibp->LAST_ERROR);
        }
    }
}
