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

## Usage

You can run the bookshop cart simulator using
```
$ docker exec -it <phpfpm7.1_container_id> bin/cart-simulator
```

## Run tests

You can retrieve the `<phpfpm7.1_container_id>` using `$ docker ps`

**Behat** test suites (configuration in behat.yml)
```
$ docker exec -it <phpfpm7.1_container_id> vendor/bin/behat
```

**PHPSpec** tests (configuration in phpspec.yml)
```
$ docker exec -it <phpfpm7.1_container_id> vendor/bin/phpspec run
```

**PHPUnit** tests (configuration in phpunit.xml)
```
$ docker exec -it <phpfpm7.1_container_id> vendor/bin/phpunit
```
