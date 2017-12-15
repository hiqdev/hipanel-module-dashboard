<?php

namespace hipanel\modules\dashboard;

class Dashboard implements DashboardInterface
{
    protected $_values = [];

    public function setValues(array $values)
    {
        $this->_values = $values;
    }

    public function get($name, $default = null)
    {
        return empty($this->_values[$name]) ? null : $this->_values[$name];
    }

    public function mget(array $names)
    {
        $res = [];
        foreach ($names as $name) {
            $res[$name] = $this->get($name);
        }

        return $res;
    }
}
