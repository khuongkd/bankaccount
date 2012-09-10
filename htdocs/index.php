<?php
require __DIR__ . '/../src/application/autoload.php';
require __DIR__ . '/../src/framework/autoload.php';

use bankaccount\Application;
use bankaccount\Factory;
use bankaccount\framework\http\Request;

// Set some super-global variables for demo purposes.
if (PHP_SAPI == 'cli') {
    $_SERVER['REQUEST_URI'] = '/bankaccount/id/1';
}

$application = new Application(
  new Request($_SERVER['REQUEST_URI']),
  new Factory(
    new bankaccount\framework\factory\Factory,
    new \PDO('sqlite:' . dirname(__DIR__) . '/database/bankaccount.db')
  )
);

$application->run();
