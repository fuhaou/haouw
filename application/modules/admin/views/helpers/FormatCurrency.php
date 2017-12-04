<?php
class Admin_View_Helper_FormatCurrency extends Zend_View_Helper_Abstract
{
    public function formatCurrency($currency)
    {
        return number_format($currency, 0, '.', ',');
    }
}