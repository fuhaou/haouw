<?php
class Application_Console_Getopt extends Zend_Console_Getopt
{
    public function getParams()
    {
        $this->parse();
        return $this->_options;
    }

    protected function _parseSingleOption($flag, &$argv)
    {
        if ($this->_getoptConfig[self::CONFIG_IGNORECASE]) {
            $flag = strtolower($flag);
        }
        if (!isset($this->_ruleMap[$flag]) && isset($argv[0])) {
            $this->_options[$flag] = $argv[0];
            return;
        }
        if (!isset($this->_ruleMap[$flag])) {
            return;
        }
        $realFlag = $this->_ruleMap[$flag];
        switch ($this->_rules[$realFlag]['param']) {
            case 'required':
                if (count($argv) > 0) {
                    $param = array_shift($argv);
                    $this->_checkParameterType($realFlag, $param);
                } else {
                    require_once 'Zend/Console/Getopt/Exception.php';
                    throw new Zend_Console_Getopt_Exception(
                        "Option \"$flag\" requires a parameter.",
                        $this->getUsageMessage());
                }
                break;
            case 'optional':
                if (count($argv) > 0 && substr($argv[0], 0, 1) != '-') {
                    $param = array_shift($argv);
                    $this->_checkParameterType($realFlag, $param);
                } else {
                    $param = true;
                }
                break;
            default:
                $param = true;
        }
        $this->_options[$realFlag] = $param;
    }
}