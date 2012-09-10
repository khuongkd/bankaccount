<?php
namespace bankaccount\view;

use bankaccount\framework\view\Result;
use bankaccount\framework\view\View;

class BankAccount extends View
{
    public function render()
    {
        $headers = array();

        $buffer = sprintf(
          'The balance of bank account #%d is %0.2f.',
          $this->response->get('id'),
          $this->response->get('balance')
        );

        return $this->factory->getInstanceFor(
          'Result', array('headers' => $headers, 'body' => $buffer)
        );
    }
}
