This is the PHP port of Hamcrest Matchers
=========================================

Hamcrest is a matching library originally written for Java, but
subsequently ported to many other languages.  hamcrest-php is the
offical PHP port of Hamcrest and essentially follows a literal
translation of the original Java API for Hamcrest, with a few
Exceptions, mostly down to PHP language barriers:

  1. instanceOf($theClass) is actually anInstanceOf($theClass)

  2. both(containsString('a'))->and(containsString('b'))
     is actually both(containsString('a'))->andAlso(containsString('b'))

  3. either(containsString('a'))->or(containsString('b'))
     is actually either(containsString('a'))->orElse(containsString('b'))

  4. Unless it would be non-semantic for a matcher to do so, hamcrest-php
     allows dynamic typing for it's input, in "the PHP way". Exception are
     where semantics surrounding the type itself would suggest otherwise,
     such as stringContains() and greaterThan().

  5. Several official matchers have not been ported because they don't
     make sense or don't apply in PHP:
     
       - typeCompatibleWith($theClass)
       - eventFrom($source)
       - hasProperty($name) **
       - samePropertyValuesAs($obj) **

  6. When most of the collections matchers are finally ported, PHP-specific
     aliases will probably be created due to a difference in naming
     conventions between Java's Arrays, Collections, Sets and Maps compared
     with PHP's Arrays.

Usage
-----

To use Hamcrest, add the hamcrest directory to your include path and then
simply include hamcrest.php to gain access to each of the Hamcrest matchers.

    <?php

    set_include_path(
      'hamcrest-php/hamcrest' . PATH_SEPARATOR .
      get_include_path()
    );

    require_once 'hamcrest.php';

    assertThat('a', equalToIgnoringCase('A'));

    ?>

hamcrest.php uses global function names.  If you really need namespaced ones
(which won't look as fluent), include "hamcrest/Hamcrest/Matchers.php" and
"hamcrest/Hamcrest/MatcherAssert.php".

    <?php

    set_include_path(
      'hamcrest-php/hamcrest' . PATH_SEPARATOR .
      get_include_path()
    );

    require_once 'hamcrest/Hamcrest/MatcherAssert.php';
    require_once 'hamcrest/Hamcrest/Matchers.php';

    Hamcrest_MatcherAssert::assertThat('a', Hamcrest_Matchers::equalToIgnoringCase('A'));

    ?>

PEAR Package
------------

You can now install Hamcrest using PEAR.  Note that the channel is lowercase
while the package is uppercase.

    > pear channel-discover hamcrest.googlecode.com/svn/pear
    > pear install hamcrest/Hamcrest

Assuming you have PEAR's library installation directory (e.g. /usr/bin/php)
in your global include path, you only need to include hamcrest.php.

    <?php

    require_once 'Hamcrest/hamcrest.php';

    assertThat('a', equalToIgnoringCase('A'));

    ?>


  ** [Unless we consider POPO's (Plain Old PHP Objects) akin to JavaBeans]
     - The POPO thing is a joke.  Java devs coin the term POJO's (Plain Old
       Java Objects).
