# Code Kata: Cat and mouse

## Kata Subject

The code kata subject can be found [at this link](https://api.codewars.com/kata/cat-and-mouse-2d-version).

## Behavior Driven Development

This implementation was made in BDD approach, using together
- [Behat](http://behat.org)
- [PHPSpec](http://www.phpspec.net)
- [PHPUnit](https://phpunit.de)

## Installation

Using composer 
```
$ composer install
```

## Usage

You can play the game using
```
$ bin/escape-game <length> <steps> [<catPosition> <mousePosition>]
```

Parameters:
- **length**: length of the map
- **steps**: max steps allowed for the cat to catch the mouse
- **catPosition**: cat's position
- **mousePosition**: mouse's position

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
