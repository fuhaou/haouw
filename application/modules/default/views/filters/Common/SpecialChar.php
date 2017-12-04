<?php
/**
 * Created by PhpStorm.
 * User: tuanvu
 * Date: 15/09/2017
 * Time: 16:31
 */

class View_Filter_Common_SpecialChar extends Application_Singleton implements Zend_Filter_Interface
{
    /**
     * @param mixed remove all special char
     * @return string
     */
    public function filter($value)
    {
        $strUp = "AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬBCDĐEÈẺẼÉẸÊỀỂỄẾỆFGHIÌỈĨÍỊJKLMNOÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢPQRSTUÙỦŨÚỤƯỪỬỮỨỰVWXYỲỶỸÝỴZ";
        $strLow = "aàảãáạăằẳẵắặâầẩẫấậbcdđeèẻẽéẹêềểễếệfghiìỉĩíịjklmnoòỏõóọôồổỗốộơờởỡớợpqrstuùủũúụưừửữứựvwxyỳỷỹýỵz";
        $pattern = "/[^A-Za-z0-9".$strUp.$strLow." ]/";
        $result = preg_replace($pattern, '', $value);
        return trim($result);
    }
}
