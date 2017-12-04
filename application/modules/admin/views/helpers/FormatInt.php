<?php

class Admin_View_Helper_FormatInt extends Zend_View_Helper_Abstract
{
    public function formatInt($number)
    {
        return number_format($number, 0, '.', ',');
    }
}