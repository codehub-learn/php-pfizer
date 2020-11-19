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

$person = new Person('Marios');

echo $person->name . PHP_EOL;
echo $person->salute() . PHP_EOL;