# Code Kata: Cat and mouse

## Kata Subject

The code kata subject can be found [at this link](https://api.codewars.com/kata/cat-and-mouse-2d-version).

## Behavior Driven Development

This implementation was made in BDD approach, using coupled:
- [Behat](http://behat.org)
- [PHPSpec](http://www.phpspec.net)
- [PHPUnit](https://phpunit.de)

## Installation

Build & up provided docker containers stack
```
$ composer install
```

## Run tests

**Behat** test suites (configuration in behat.yml)
```
$ vendor/bin/behat
```

**PHPSpec** tests (configuration in phpspec.yml)
```
$ vendor/bin/phpspec run
```

**PHPUnit** tests (configuration in phpunit.xml)
```
$ vendor/bin/phpunit
```
