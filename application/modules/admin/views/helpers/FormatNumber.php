<?php
class Admin_View_Helper_FormatNumber extends Zend_View_Helper_Abstract
{
    public function formatNumber($number)
    {
        return number_format($number, 2, '.', ',');
    }
}