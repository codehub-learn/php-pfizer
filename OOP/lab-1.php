<?php

class Validator {
  public $data     = [];
  public $rules    = [];
  public $messages = [];
  
  private $errorBag = [];
  
  public function __construct($data, $rules, $messages) {
    $this->data = $data;
    $this->rules = $rules;
    $this->messages = $messages;
  }
  
  public function run() {
    foreach ($this->rules as $field => $rules) {
      if (is_array($rules)) {
        foreach ($rules as $rule) {
          $this->validateField($field, $rule);
        }
      }
      else {
        $this->validateField($field, $rules);
      }
    }
  }
  
  public function isSuccessful() {
    return count($this->errorBag) === 0;
  }
  
  public function failingRules() {
    return $this->errorBag;
  }
  
  private function validateField($field, $rule) {
    if ($rule === 'required') {
      $isValid = $this->checkRequiredRuleIsValid($field);
      
      if (!$isValid) {
        $this->addToErrorBag($field, $rule);
      }
    }
    
    if ($rule === 'email') {
      $isValid = $this->checkEmailRuleIsValid($field);
      
      if (!$isValid) {
        $this->addToErrorBag($field, $rule);
      }
    }
    
    if ($rule === 'integer') {
      $isValid = $this->checkIntegerRuleIsValid($field);
      
      if (!$isValid) {
        $this->addToErrorBag($field, $rule);
      }
    }
  }
  
  private function checkRequiredRuleIsValid($field) {
    if ($this->checkIsOptionalField($field)) {
      return false;
    }
    
    return true;
  }
  
  private function checkIntegerRuleIsValid($field) {
    if ($this->checkIsOptionalField($field)) {
      return true;
    }
    
    return is_int($this->data[$field]);
  }
  
  private function checkEmailRuleIsValid($field) {
    if ($this->checkIsOptionalField($field)) {
      return true;
    }
    
    return filter_var($this->data[$field], FILTER_VALIDATE_EMAIL);
  }
  
  private function addToErrorBag($field, $rule) {
    $this->errorBag[$field] = array_key_exists($field, $this->errorBag)
      ? array_merge($this->errorBag[$field], [$this->messages[$field][$rule]]) : [$this->messages[$field][$rule]];
  }
  
  private function checkIsOptionalField($field) {
    return !array_key_exists($field, $this->data) or is_null($this->data[$field]);
  }
}

$data = [
  'email' => 2,
];

$rules = [
  'name'  => 'required',
  'email' => [
    'required',
    'email',
  ],
];

$messages = [
  'name'  => [
    'required' => 'Name field is a required one',
  ],
  'email' => [
    'required' => 'Email field is a required one',
    'email'    => 'Enter a valid email',
  ],
];

$validator = new Validator($data, $rules, $messages);

$validator->run();

echo $validator->isSuccessful() ? 'It is successful' . PHP_EOL : 'It is not successful' . PHP_EOL;

echo json_encode($validator->failingRules());