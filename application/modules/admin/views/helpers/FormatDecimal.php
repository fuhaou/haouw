<?php
class Admin_View_Helper_FormatDecimal extends Zend_View_Helper_Abstract
{
    public function formatDecimal($number, $decimals = 2)
    {
        return number_format($number, $decimals, '.', ',');
    }
}