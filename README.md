This is the PHP port of Hamcrest Matchers
=========================================

[![Build Status](https://travis-ci.org/hamcrest/hamcrest-php.png?branch=master)](https://travis-ci.org/hamcrest/hamcrest-php)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/hamcrest/hamcrest-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/hamcrest/hamcrest-php/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/hamcrest/hamcrest-php/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/hamcrest/hamcrest-php/?branch=master)

Hamcrest is a matching library originally written for Java, but
subsequently ported to many other languages.  hamcrest-php is the
official PHP port of Hamcrest and essentially follows a literal
translation of the original Java API for Hamcrest, with a few
Exceptions, mostly down to PHP language barriers:

  1. `instanceOf($theClass)` is actually `anInstanceOf($theClass)`

  2. `both(containsString('a'))->and(containsString('b'))`
     is actually `both(containsString('a'))->andAlso(containsString('b'))`

  3. `either(containsString('a'))->or(containsString('b'))`
     is actually `either(containsString('a'))->orElse(containsString('b'))`

  4. Unless it would be non-semantic for a matcher to do so, hamcrest-php
     allows dynamic typing for it's input, in "the PHP way". Exception are
     where semantics surrounding the type itself would suggest otherwise,
     such as stringContains() and greaterThan().

  5. Several official matchers have not been ported because they don't
     make sense or don't apply in PHP:

       - `typeCompatibleWith($theClass)`
       - `eventFrom($source)`
       - `hasProperty($name)` **
       - `samePropertyValuesAs($obj)` **

  6. When most of the collections matchers are finally ported, PHP-specific
     aliases will probably be created due to a difference in naming
     conventions between Java's Arrays, Collections, Sets and Maps compared
     with PHP's Arrays.

---
** [Unless we consider POPO's (Plain Old PHP Objects) akin to JavaBeans]
     - The POPO thing is a joke.  Java devs coin the term POJO's (Plain Old
       Java Objects).


Usage
-----

Hamcrest matchers are easy to use as:

```php
Hamcrest_MatcherAssert::assertThat('a', Hamcrest_Matchers::equalToIgnoringCase('A'));
```


Documentation
-------------
A tutorial can be found on the [Hamcrest site](https://code.google.com/archive/p/hamcrest/wikis/TutorialPHP.wiki).


Available Matchers
------------------
* `assertThat` - Make an assertion and throw {@link Hamcrest_AssertionError} if it fails.

```php
$result = true;
// with an identifier
assertThat("result should be true", $result, is(equalTo(true)));

// without an identifier
assertThat($result, is(equalTo(true)));

// evaluate a boolean expression
assertThat($result === true);
```

* Array

  * `anArray` - Evaluates to true only if each $matcher[$i] is satisfied by $array[$i].

```php
$list = [];
assertThat("list should be an array", anArray($list), is(true));
```

  * `hasItemInArray` - Evaluates to true if any item in an array satisfies the given matcher.

```php
$list = [2, 4, 6];
$item = 4;
assertThat("4 should exists in the list", $list, hasItemInArray(4));
```

  * `hasValue` - Evaluates to true if any item in an array satisfies the given matcher.

  * `arrayContainingInAnyOrder` - An array with elements that match the given matchers.

  * `containsInAnyOrder` - An array with elements that match the given matchers.

  * `arrayContaining` - An array with elements that match the given matchers in the same order.


* Collection

  * `emptyTraversable` - Returns true if traversable is empty.

  * `nonEmptyTraversable` - Returns true if traversable is not empty.


* Core

  * `allOf` - Evaluates to true only if ALL of the passed in matchers evaluate to true.

  * `anyOf` - Evaluates to true if ANY of the passed in matchers evaluate to true.


* Number

  * `closeTo` - Matches if value is a number equal to $value within some range of acceptable error $delta.

  * `comparesEqualTo` - The value is not > $value, nor < $value.


* Text

  * `isEmptyString` - Matches if value is a zero-length string.


* Type

  * `arrayValue` - Is the value an array?


* Xml

  * `hasXPath` - 