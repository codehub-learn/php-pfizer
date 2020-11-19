## Lab 1

In this lab we will use vanilla PHP to create a `Validator` class, so we can validate various form fields.

The `Validator` class should accept 3 arguments when getting instantiated:

- data: required array
- rules: required array
- messages: required array

### Data example

```php
$data = [
  'name' => 'Marios',
  'email' => 'marios@gmail.com',
  'age'  => 38
];
```

### Rules example

```php
$rules = [
  'name' => 'required',
  'email' => ['required', 'email'],
  'age'  => 'integer'
];
```

### Messages example

```php
$messages = [
  'name' => [
    'required' => 'Please enter a name',
  ],
  'email' => [
    'required' => 'Please enter an email',
    'email' => 'Please enter a valid email',
  ],
  'age' => [
    'integer' => 'Please enter an integer for age field'
  ],
];
```

`Validator` class will expose some methods:

- a method named `run` that will run the actual validation
- a method named `isSuccessful` that will return a boolean indicating whether the validation is successful or not
- a method named `failingRules` that will return an array with failing rules as keys and the corresponding error messages in an array format as values

`Validator` class should validate accurately the following rules:

- required: whether the field is passed and it is not equal with `null`
- email: whether the field is a valid email
- integer: whether the field is an actual integer

## Example 1

Given that we provide to the `Validator` class these arguments:

```php
$data = [
  'name' => 'Marios'
];

$rules = [
  'name' => 'required'
];

$messages = [
  'name' => [
    'required' => 'Name field is a required one'
  ]
];
```

Then these should be the results:

```php
$validator = new Validator($data, $rules, $messages);

$validator->run();

$validator->isSuccessful();
// Returns true

$validator->failingRules();
// Returns an empty array []
```

## Example 2

Given that we provide to the `Validator` class these arguments:

```php
$data = [];

$rules = [
  'name' => 'required'
];

$messages = [
  'name' => [
    'required' => 'Name field is a required one'
  ]
];
```

Then these should be the results:

```php
$validator = new Validator($data, $rules, $messages);

$validator->run();

$validator->isSuccessful();
// Returns false

$validator->failingRules();
// Returns an array
// ['name' => ['Name field is a required one']]
```

## Example 3

Given that we provide to the `Validator` class these arguments:

```php
$data = [];

$rules = [
  'name' => 'required',
  'email' => ['required', 'email'],
];

$messages = [
  'name' => [
    'required' => 'Name field is a required one'
  ],
  'email' => [
    'required' => 'Email field is a required one',
    'email' => 'Enter a valid email',
  ]
];
```

Then these should be the results:

```php
$validator = new Validator($data, $rules, $messages);

$validator->run();

$validator->isSuccessful();
// Returns false

$validator->failingRules();
// Returns an array
// ['name' => ['Name field is a required one'], 'email' => ['Email field is a required one']]
```