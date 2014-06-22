#!/usr/bin/env php
<?php
// application.php
require_once './vendor/autoload.php';

use Tracker\Console\Command\GreetCommand;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new GreetCommand);
$application->run();