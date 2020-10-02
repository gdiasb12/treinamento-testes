<?php
ini_set('display_errors', 1);

require_once __DIR__. '/vendor/autoload.php';

use App\Hello;
use App\Multiple;

// $hello = new Hello();

// echo $hello->sayHelloWorld();

$multiple = new Multiple();

echo $multiple->calculateMultiples(1);