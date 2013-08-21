<?php
namespace bankaccount\framework\view;

use bankaccount\framework\factory\FactoryInterface;
use bankaccount\framework\http\Response;

class Redirect extends View
{
    public function render()
    {
        return $this->factory->getInstanceFor(
          'Result',
          array(
            'headers' => array('Location: ' . $this->response->get('target')),
            'body'    => ''
          )
        );
    }
}
