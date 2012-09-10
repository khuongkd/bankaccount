<?php
namespace bankaccount\testing;

class Factory extends \bankaccount\Factory
{
    public function getInstanceFor($type, array $arguments = array())
    {
        switch ($type) {
            case 'Result': {
                return new \bankaccount\framework\testing\Result(
                  $arguments['headers'], $arguments['body']
                );
            }

            default: {
                return parent::getInstanceFor($type);
            }
        }
    }
}
