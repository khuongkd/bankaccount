<?php
use bankaccount\framework\view\View;
use bankaccount\framework\testing\Result;

class TestView extends View
{
    public function render()
    {
        return new Result(array(), 'test');
    }
}
