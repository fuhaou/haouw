<?php
/**
 * Created by PhpStorm.
 * User: mjphong
 * Date: 27/01/2015
 * Time: 11:32
 */
class Controller_Helper_BuildArrayByKey extends Zend_Controller_Action_Helper_Abstract
{
    public function direct($array, $keyName)
    {
        return Application_Function_Array::buildArrayByKey($array, $keyName);
    }
}