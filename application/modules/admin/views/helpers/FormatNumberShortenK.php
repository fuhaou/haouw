<?php
class Admin_View_Helper_FormatNumberShortenK extends Zend_View_Helper_Abstract
{
    public function formatNumberShortenK($number)
    {
        $value = $number / 1000;
        return number_format($value);
    }
}