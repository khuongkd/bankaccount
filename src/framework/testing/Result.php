<?php
namespace bankaccount\framework\testing;

class Result extends \bankaccount\framework\view\Result
{
    public function getBody()
    {
        return $this->body;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function render()
    {
    }
}
