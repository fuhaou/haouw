<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 1/30/15
 * Time: 11:17 AM
 */
class Admin_View_Helper_ActiveLabel extends Zend_View_Helper_Abstract
{
    public $data;

    public function __construct()
    {
        if (empty($this->data)) {
            $this->data = Admin_Model_ConfigActive::getInstance()->getAll();
        }
    }

    public function activeLabel($activeValue)
    {
        $data = $this->data;
        return isset($data[$activeValue]) ? $data[$activeValue][DbTable_Config_Active::COL_CONFIG_ACTIVE_NAME] : '';
    }
}