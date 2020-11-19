<?php

trait salute {
  public function sayHello() {
    return "Hello {$this->name}";
  }
}

trait work {
  public function askAboutWork() {
    return "{$this->name}, where are you working at the moment?";
  }
}

class Person {
  use salute;
  
  public $name;
  
  function __construct($name) {
    $this->name = $name;
  }
}

class Developer extends Person {
  use salute, work;
  
  public function sayHello() {
    return "Hello {$this->name}";
  }
}

$person = new Person('Marios');

echo $person->name . PHP_EOL;
echo $person->sayHello() . PHP_EOL;

$developer = new Developer('John');

echo $developer->name . PHP_EOL;
echo $developer->sayHello() . PHP_EOL;
echo $developer->askAboutWork() . PHP_EOL;