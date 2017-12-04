<?php
/**
 * Created by PhpStorm.
 * User: tuanvu
 * Date: 15/09/2017
 * Time: 16:35
 */

class View_Filter_Common_Id extends Application_Singleton implements Zend_Filter_Interface
{
    /**
     * @param mixed remove all except number
     * @return mixed
     */
    public function filter($value)
    {
        $pattern = "/[^0-9]/";
        $result =  preg_replace($pattern, '',  $value );
        return $result;
    }
}
