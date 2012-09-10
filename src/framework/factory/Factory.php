<?php
namespace bankaccount\framework\factory;

class Factory implements FactoryInterface
{
    protected $uniqueInstances = array();

    public function getController($name)
    {
        return new $name;
    }

    public function getMapper($name)
    {
        return new $name;
    }

    public function getView($name)
    {
        switch ($name) {
            default: {
                return new $name($this->getInstanceFor('Response'), $this);
            }
        }
    }

    public function getInstanceFor($type, array $arguments = array())
    {
        switch ($type) {
            case 'Response': {
                if (!isset($this->uniqueInstances['response'])) {
                    $this->uniqueInstances['response'] = new \bankaccount\framework\http\Response;
                }

                return $this->uniqueInstances['response'];
            }

            case 'Result': {
                return new \bankaccount\framework\view\Result(
                  $arguments['headers'], $arguments['body']
                );
            }

            case 'Router': {
                return new \bankaccount\framework\router\Router;
            }
        }

        throw new Exception(sprintf('Unknown type "%s"', $type));
    }
}
