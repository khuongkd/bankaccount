<?php
namespace bankaccount\framework\view;

class Result
{
    protected $headers;
    protected $body;

    public function __construct(array $headers, $body)
    {
        $this->headers = $headers;
        $this->body    = $body;
    }

    public function render()
    {
        foreach ($this->headers as $header) {
            header($header);
        }

        print $this->body;
    }
}
