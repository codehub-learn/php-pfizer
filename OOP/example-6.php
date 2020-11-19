<?php

interface Greetings {
  public function salute();
}

class Person implements Greetings {
  public $name;

  public function __construct($name) {
    $this->name = $name;
  }
  
  public function salute() {
    return "Hello {$this->name}";
  }
  
  public function sayHi() {
    return "Hi {$this->name}";
  }
}

$person = new Person('Marios');

echo $person->name . PHP_EOL;
echo $person->salute() . PHP_EOL;
echo $person->sayHi() . PHP_EOL;