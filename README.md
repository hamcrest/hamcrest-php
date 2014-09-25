This is the PHP port of Hamcrest Matchers
=========================================

[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/hamcrest/hamcrest-php/badges/quality-score.png?s=754f5c0556419fc6204917ca9a9dcf2fa2b45ed0)](https://scrutinizer-ci.com/g/hamcrest/hamcrest-php/)
[![Build Status](https://travis-ci.org/hamcrest/hamcrest-php.png?branch=master)](https://travis-ci.org/hamcrest/hamcrest-php)
[![Coverage Status](https://coveralls.io/repos/hamcrest/hamcrest-php/badge.png)](https://coveralls.io/r/hamcrest/hamcrest-php)

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

Usage
-----

To use Hamcrest, add the hamcrest directory to your include path and then
simply include hamcrest.php to gain access to each of the Hamcrest matchers.

```php
set_include_path(
  'hamcrest-php/hamcrest' . PATH_SEPARATOR .
  get_include_path()
);

require_once 'hamcrest.php';

assertThat('a', equalToIgnoringCase('A'));
```

hamcrest.php uses global function names.  If you really need namespaced ones
(which won't look as fluent), include "hamcrest/Hamcrest/Matchers.php" and
"hamcrest/Hamcrest/MatcherAssert.php".

```php
set_include_path(
  'hamcrest-php/hamcrest' . PATH_SEPARATOR .
  get_include_path()
);

require_once 'hamcrest/Hamcrest/MatcherAssert.php';
require_once 'hamcrest/Hamcrest/Matchers.php';

Hamcrest_MatcherAssert::assertThat('a', Hamcrest_Matchers::equalToIgnoringCase('A'));
```

Composer Package
----------------

Hamcrest is available as the [Composer](https://getcomposer.org/) package
[hamcrest/hamcrest-php](https://packagist.org/packages/hamcrest/hamcrest-php).

Using Hamcrest via Composer means there is no need to manually `require()` any
files. Simply include the package as a dependency, and include the Composer
class loader as normal, and you will have access to both the global functions,
and the Hamcrest classes:

```php
require '/path/to/vendor/autoload.php';

assertThat('a', equalToIgnoringCase('A'));
Hamcrest_MatcherAssert::assertThat('a', Hamcrest_Matchers::equalToIgnoringCase('A'));
```

  ** [Unless we consider POPO's (Plain Old PHP Objects) akin to JavaBeans]
     - The POPO thing is a joke.  Java devs coin the term POJO's (Plain Old
       Java Objects).
