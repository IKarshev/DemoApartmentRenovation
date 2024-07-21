<?php

use Arrilot\BitrixMigrations\BaseMigrations\BitrixMigration;
use Arrilot\BitrixMigrations\Exceptions\MigrationException;

class AutoUpdateIblockReviews20240721135254654607 extends BitrixMigration
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
  'IBLOCK_TYPE_ID' => 'content',
  'NAME' => 'Отзывы',
  'CODE' => 'Reviews',
  'API_CODE' => 'Reviews',
  'LIST_PAGE_URL' => '',
  'DETAIL_PAGE_URL' => '',
  'CANONICAL_PAGE_URL' => '',
  'DESCRIPTION' => '',
  'DESCRIPTION_TYPE' => 'text',
  'EDIT_FILE_BEFORE' => '',
  'EDIT_FILE_AFTER' => '',
  'SECTION_CHOOSER' => 'L',
  'LIST_MODE' => '',
  'ELEMENTS_NAME' => 'Элементы',
  'ELEMENT_NAME' => 'Элемент',
  'ELEMENT_ADD' => 'Добавить элемент',
  'ELEMENT_EDIT' => 'Изменить элемент',
  'ELEMENT_DELETE' => 'Удалить элемент',
  'SECTION_PAGE_URL' => '',
  'SECTIONS_NAME' => 'Разделы',
  'SECTION_NAME' => 'Раздел',
  'SECTION_ADD' => 'Добавить раздел',
  'SECTION_EDIT' => 'Изменить раздел',
  'SECTION_DELETE' => 'Удалить раздел',
  'RIGHTS_MODE' => 'S',
  'ACTIVE' => 'Y',
  'REST_ON' => 'N',
  'INDEX_ELEMENT' => 'Y',
  'INDEX_SECTION' => 'Y',
  'LID' => 
  array (
    0 => 's1',
  ),
  'FIELDS' => 
  array (
    'IBLOCK_SECTION' => 
    array (
      'IS_REQUIRED' => 'N',
      'DEFAULT_VALUE' => 
      array (
        'KEEP_IBLOCK_SECTION_ID' => 'N',
      ),
    ),
    'ACTIVE' => 
    array (
      'IS_REQUIRED' => 'N',
      'DEFAULT_VALUE' => 'Y',
    ),
    'ACTIVE_FROM' => 
    array (
      'IS_REQUIRED' => 'N',
      'DEFAULT_VALUE' => '=now',
    ),
    'ACTIVE_TO' => 
    array (
      'IS_REQUIRED' => 'N',
      'DEFAULT_VALUE' => '',
    ),
    'SORT' => 
    array (
      'IS_REQUIRED' => 'N',
      'DEFAULT_VALUE' => '500',
    ),
    'NAME' => 
    array (
      'IS_REQUIRED' => 'N',
      'DEFAULT_VALUE' => '',
    ),
    'PREVIEW_PICTURE' => 
    array (
      'IS_REQUIRED' => 'N',
      'DEFAULT_VALUE' => 
      array (
        'FROM_DETAIL' => 'N',
        'UPDATE_WITH_DETAIL' => 'N',
        'DELETE_WITH_DETAIL' => 'N',
        'SCALE' => 'N',
        'WIDTH' => '',
        'HEIGHT' => '',
        'IGNORE_ERRORS' => 'N',
        'METHOD' => 'resample',
        'COMPRESSION' => '95',
        'USE_WATERMARK_FILE' => 'N',
        'WATERMARK_FILE' => '',
        'WATERMARK_FILE_ALPHA' => '',
        'WATERMARK_FILE_POSITION' => 'tl',
        'USE_WATERMARK_TEXT' => 'N',
        'WATERMARK_TEXT' => '',
        'WATERMARK_TEXT_FONT' => '',
        'WATERMARK_TEXT_COLOR' => '',
        'WATERMARK_TEXT_SIZE' => '',
        'WATERMARK_TEXT_POSITION' => 'tl',
      ),
    ),
    'PREVIEW_TEXT_TYPE' => 
    array (
      'IS_REQUIRED' => 'N',
      'DEFAULT_VALUE' => 'text',
    ),
    'PREVIEW_TEXT_TYPE_ALLOW_CHANGE' => 
    array (
      'DEFAULT_VALUE' => 'Y',
    ),
    'PREVIEW_TEXT' => 
    array (
      'IS_REQUIRED' => 'N',
      'DEFAULT_VALUE' => '',
    ),
    'DETAIL_PICTURE' => 
    array (
      'IS_REQUIRED' => 'N',
      'DEFAULT_VALUE' => 
      array (
        'SCALE' => 'N',
        'WIDTH' => '',
        'HEIGHT' => '',
        'IGNORE_ERRORS' => 'N',
        'METHOD' => 'resample',
        'COMPRESSION' => '95',
        'USE_WATERMARK_FILE' => 'N',
        'WATERMARK_FILE' => '',
        'WATERMARK_FILE_ALPHA' => '',
        'WATERMARK_FILE_POSITION' => 'tl',
        'USE_WATERMARK_TEXT' => 'N',
        'WATERMARK_TEXT' => '',
        'WATERMARK_TEXT_FONT' => '',
        'WATERMARK_TEXT_COLOR' => '',
        'WATERMARK_TEXT_SIZE' => '',
        'WATERMARK_TEXT_POSITION' => 'tl',
      ),
    ),
    'DETAIL_TEXT_TYPE' => 
    array (
      'IS_REQUIRED' => 'N',
      'DEFAULT_VALUE' => 'text',
    ),
    'DETAIL_TEXT_TYPE_ALLOW_CHANGE' => 
    array (
      'DEFAULT_VALUE' => 'Y',
    ),
    'DETAIL_TEXT' => 
    array (
      'IS_REQUIRED' => 'N',
      'DEFAULT_VALUE' => '',
    ),
    'XML_ID' => 
    array (
      'IS_REQUIRED' => 'N',
      'DEFAULT_VALUE' => '',
    ),
    'CODE' => 
    array (
      'IS_REQUIRED' => 'N',
      'DEFAULT_VALUE' => 
      array (
        'UNIQUE' => 'Y',
        'TRANSLITERATION' => 'Y',
        'TRANS_LEN' => '100',
        'TRANS_CASE' => 'L',
        'TRANS_SPACE' => '-',
        'TRANS_OTHER' => '-',
        'TRANS_EAT' => 'Y',
        'USE_GOOGLE' => 'N',
      ),
    ),
    'TAGS' => 
    array (
      'IS_REQUIRED' => 'N',
      'DEFAULT_VALUE' => '',
    ),
    'SECTION_NAME' => 
    array (
      'IS_REQUIRED' => 'N',
      'DEFAULT_VALUE' => '',
    ),
    'SECTION_PICTURE' => 
    array (
      'IS_REQUIRED' => 'N',
      'DEFAULT_VALUE' => 
      array (
        'FROM_DETAIL' => 'N',
        'UPDATE_WITH_DETAIL' => 'N',
        'DELETE_WITH_DETAIL' => 'N',
        'SCALE' => 'N',
        'WIDTH' => '',
        'HEIGHT' => '',
        'IGNORE_ERRORS' => 'N',
        'METHOD' => 'resample',
        'COMPRESSION' => '95',
        'USE_WATERMARK_FILE' => 'N',
        'WATERMARK_FILE' => '',
        'WATERMARK_FILE_ALPHA' => '',
        'WATERMARK_FILE_POSITION' => 'tl',
        'USE_WATERMARK_TEXT' => 'N',
        'WATERMARK_TEXT' => '',
        'WATERMARK_TEXT_FONT' => '',
        'WATERMARK_TEXT_COLOR' => '',
        'WATERMARK_TEXT_SIZE' => '',
        'WATERMARK_TEXT_POSITION' => 'tl',
      ),
    ),
    'SECTION_DESCRIPTION_TYPE' => 
    array (
      'IS_REQUIRED' => 'N',
      'DEFAULT_VALUE' => 'text',
    ),
    'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE' => 
    array (
      'DEFAULT_VALUE' => 'Y',
    ),
    'SECTION_DESCRIPTION' => 
    array (
      'IS_REQUIRED' => 'N',
      'DEFAULT_VALUE' => '',
    ),
    'SECTION_DETAIL_PICTURE' => 
    array (
      'IS_REQUIRED' => 'N',
      'DEFAULT_VALUE' => 
      array (
        'SCALE' => 'N',
        'WIDTH' => '',
        'HEIGHT' => '',
        'IGNORE_ERRORS' => 'N',
        'METHOD' => 'resample',
        'COMPRESSION' => '95',
        'USE_WATERMARK_FILE' => 'N',
        'WATERMARK_FILE' => '',
        'WATERMARK_FILE_ALPHA' => '',
        'WATERMARK_FILE_POSITION' => 'tl',
        'USE_WATERMARK_TEXT' => 'N',
        'WATERMARK_TEXT' => '',
        'WATERMARK_TEXT_FONT' => '',
        'WATERMARK_TEXT_COLOR' => '',
        'WATERMARK_TEXT_SIZE' => '',
        'WATERMARK_TEXT_POSITION' => 'tl',
      ),
    ),
    'SECTION_XML_ID' => 
    array (
      'IS_REQUIRED' => 'N',
      'DEFAULT_VALUE' => '',
    ),
    'SECTION_CODE' => 
    array (
      'IS_REQUIRED' => 'N',
      'DEFAULT_VALUE' => 
      array (
        'UNIQUE' => 'Y',
        'TRANSLITERATION' => 'Y',
        'TRANS_LEN' => '100',
        'TRANS_CASE' => 'L',
        'TRANS_SPACE' => '-',
        'TRANS_OTHER' => '-',
        'TRANS_EAT' => 'Y',
        'USE_GOOGLE' => 'N',
      ),
    ),
    'LOG_SECTION_ADD' => 
    array (
      'IS_REQUIRED' => 'N',
    ),
    'LOG_SECTION_EDIT' => 
    array (
      'IS_REQUIRED' => 'N',
    ),
    'LOG_SECTION_DELETE' => 
    array (
      'IS_REQUIRED' => 'N',
    ),
    'LOG_ELEMENT_ADD' => 
    array (
      'IS_REQUIRED' => 'N',
    ),
    'LOG_ELEMENT_EDIT' => 
    array (
      'IS_REQUIRED' => 'N',
    ),
    'LOG_ELEMENT_DELETE' => 
    array (
      'IS_REQUIRED' => 'N',
    ),
  ),
  'SORT' => 500,
  'WORKFLOW' => 'N',
  'BIZPROC' => 'N',
  'GROUP_ID' => 
  array (
    2 => 'R',
    1 => 'X',
    3 => '',
    4 => '',
  ),
  'IPROPERTY_TEMPLATES' => 
  array (
    'SECTION_META_TITLE' => '',
    'SECTION_META_KEYWORDS' => '',
    'SECTION_META_DESCRIPTION' => '',
    'SECTION_PAGE_TITLE' => '',
    'ELEMENT_META_TITLE' => '',
    'ELEMENT_META_KEYWORDS' => '',
    'ELEMENT_META_DESCRIPTION' => '',
    'ELEMENT_PAGE_TITLE' => '',
    'SECTION_PICTURE_FILE_ALT' => '',
    'SECTION_PICTURE_FILE_TITLE' => '',
    'SECTION_DETAIL_PICTURE_FILE_ALT' => '',
    'SECTION_DETAIL_PICTURE_FILE_TITLE' => '',
    'ELEMENT_PREVIEW_PICTURE_FILE_ALT' => '',
    'ELEMENT_PREVIEW_PICTURE_FILE_TITLE' => '',
    'ELEMENT_DETAIL_PICTURE_FILE_ALT' => '',
    'ELEMENT_DETAIL_PICTURE_FILE_TITLE' => '',
    'SECTION_PICTURE_FILE_NAME' => '',
    'SECTION_DETAIL_PICTURE_FILE_NAME' => '',
    'ELEMENT_PREVIEW_PICTURE_FILE_NAME' => '',
    'ELEMENT_DETAIL_PICTURE_FILE_NAME' => '',
  ),
  'ID' => 9,
);

        $iblockId = $this->getIblockIdByCode($fields['CODE']);
        $fields['ID'] = $iblockId;

        $ib = new CIBlock();
        $updated = $ib->update($iblockId, $fields);

        if (!$updated) {
            throw new MigrationException('Ошибка при обновлении инфоблока '.$ib->LAST_ERROR);
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
        return false;
    }
}
