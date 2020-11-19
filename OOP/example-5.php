<?php

abstract class Person {
  public $name;

  public function __construct($name) {
    $this->name = $name;
  }
  
  abstract public function salute();
}

class Developer extends Person {
  public function salute() {
    return "Hello {$this->name}";
  }
}

$developer = new Developer('Marios');

echo $developer->name . PHP_EOL;
echo $developer->salute() . PHP_EOL;