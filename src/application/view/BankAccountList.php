<?php
namespace bankaccount\view;

use bankaccount\framework\view\Result;
use bankaccount\framework\view\View;

class BankAccountList extends View
{
    public function render()
    {
        $headers = array();

        $buffer = '<ul>';

        foreach ($this->response->get('ids') as $id) {
            $buffer .= sprintf(
              '<li><a href="/bankaccount/id/%d">Bank Account #%d</a></li>',
              $id,
              $id
            );
        }

        $buffer .= '</ul>';

        return $this->factory->getInstanceFor(
          'Result', array('headers' => $headers, 'body' => $buffer)
        );
    }
}
