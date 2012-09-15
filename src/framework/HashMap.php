<?php
namespace bankaccount\framework;

use bankaccount\framework\exception\OutOfBoundsException;

trait HashMap
{
    protected $values = array();

    public function set($key, $value)
    {
        $this->values[$key] = $value;
    }

    public function get($key)
    {
        if (!isset($this->values[$key])) {
            throw new OutOfBoundsException(
              sprintf('Key "%s" does not exist', $key)
            );
        }

        return $this->values[$key];
    }
}
