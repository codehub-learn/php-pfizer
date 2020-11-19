<?php

class Person {
  public $name;
  
  public function __construct($name) {
    $this->name = $name;
  }

  public function salute() {
    return "Hello {$this->name}";
  }
}

class Developer extends Person {
  public function salute() {
    return "Hello {$this->name}!! How is engineering nowadays?";
  }
}

$developer = new Developer('Marios');

echo $developer->name . PHP_EOL;
echo $developer->salute() . PHP_EOL;