<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 8/24/16
 * Time: 9:22 PM
 */
class Model_Locale extends Application_Singleton
{
    /**
     * Retrieve ID by code
     * @param string $code
     * @return int|null|string
     */
    public function retrieveIdByCode($code)
    {
        $result = null;
        $code = trim($code);
        $data = Admin_Model_Locale::getInstance()->getAll();
        if ($data) {
            foreach ($data as $record) {
                if ($record[DbTable_Locale::COL_LOCALE_CODE] == $code) {
                    $result = $record[DbTable_Locale::COL_LOCALE_ID];
                    break;
                }
            }
        }
        return $result;
    }
}