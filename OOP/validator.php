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
      
      $this->addToErrorBag($field, $rule, $isValid);
    }
    
    if ($rule === 'email') {
      $isValid = $this->checkEmailRuleIsValid($field);
      
      $this->addToErrorBag($field, $rule, $isValid);
    }
    
    if ($rule === 'integer') {
      $isValid = $this->checkIntegerRuleIsValid($field);
      
      $this->addToErrorBag($field, $rule, $isValid);
    }
  }
  
  private function checkRequiredRuleIsValid($field) {
    $isValid = true;
    
    if (!array_key_exists($field, $this->data)) {
      return false;
    }
    
    if (is_null($this->data[$field])) {
      return false;
    }
    
    return $isValid;
  }
  
  private function checkIntegerRuleIsValid($field) {
    $value = $this->data[$field] ?? null;
    
    return is_int($value);
  }
  
  private function checkEmailRuleIsValid($field) {
    $value = $this->data[$field] ?? null;
    
    return filter_var($value, FILTER_VALIDATE_EMAIL);
  }
  
  private function addToErrorBag($field, $rule, $isValid) {
    if (!$isValid) {
      $this->errorBag[$field] = array_key_exists($field, $this->errorBag)
        ? array_merge($this->errorBag[$field], [$this->messages[$field][$rule]]) : [$this->messages[$field][$rule]];
    }
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

$validator->isSuccessful();

echo json_encode($validator->failingRules());