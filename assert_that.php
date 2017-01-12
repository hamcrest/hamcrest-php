<?php

require __DIR__ . '/vendor/autoload.php';

Hamcrest\Util::registerGlobalFunctions();

/***** Array *****/

// anArray - Evaluates to true only if each $matcher[$i] is satisfied by $array[$i].
 
assertThat([], anArray());

// hasItemInArray
$list = range(2, 7, 2);
$item = 4;
assertThat($list, hasItemInArray($item));

// hasValue - alias of hasItemInArray
assertThat([2,4,6], hasValue(2));

// arrayContainingInAnyOrder
assertThat([2, 4, 6], arrayContainingInAnyOrder([6, 4, 2]));
assertThat([2, 4, 6], arrayContainingInAnyOrder([4, 2, 6]));

// containsInAnyOrder
assertThat([2, 4, 6], containsInAnyOrder([6, 2, 4]));

// arrayContaining - same order
assertThat([2, 4, 6], arrayContaining([2, 4, 6]));
assertthat([2, 4, 6], not(arrayContaining([6, 4, 2])));

// contains - same order
assertThat([2, 4, 6], contains([2, 4, 6]));

// hasKeyInArray
assertThat(['name'=> 'foobar'], hasKeyInArray('name'));

// hasKey - alias of hasKeyInArray
assertThat(['name'=> 'foobar'], hasKey('name'));

// hasKeyValuePair
assertThat(['name'=> 'foobar'], hasKeyValuePair('name', 'foobar'));

// hasEntry same as hasKeyValuePair
assertThat(['name'=> 'foobar'], hasKeyValuePair('name', 'foobar'));

// arrayWithSize
assertthat([2, 4, 6], arrayWithSize(3));

// emptyArray
assertThat([], emptyArray());

// nonEmptyArray
assertThat([1], nonEmptyArray());

/****** Collection *******/

$empty_it = new EmptyIterator;
$non_empty_it = new ArrayIterator(range(1, 10));
// emptyTraversable
assertThat($empty_it, emptyTraversable());
assertThat($non_empty_it, nonEmptyTraversable());
assertThat($non_empty_it, traversableWithSize(count(range(1, 10))));

/******* Core ******/

// allOf - Evaluates to true only if ALL of the passed in matchers evaluate to true.
assertThat([2,4,6], allOf(hasValue(2), arrayWithSize(3)));

// anyOf - Evaluates to true if ANY of the passed in matchers evaluate to true.
assertThat([2, 4, 6], anyOf(hasValue(8), hasValue(2)));

// noneOf - Evaluates to false if ANY of the passed in matchers evaluate to true.
assertThat([2, 4, 6], noneOf(hasValue(1), hasValue(3)));

// both + andAlso - This is useful for fluently combining matchers that must both pass.
assertThat([2, 4, 6], both(hasValue(2))->andAlso(hasValue(4)));

// either + orElse - This is useful for fluently combining matchers where either may pass,
assertThat([2, 4, 6], either(hasValue(2))->orElse(hasValue(4)));

// describedAs - http://happygiraffe.net/blog/2008/07/26/assertthat
// Wraps an existing matcher and overrides the description when it fails.
 
$expected = "Dog";
$found = null;
//assertThat("Expected {$expected}, got {$found}", $found, is(notNullValue()));
//assertThat($found, describedAs($expected, notNullValue()));

// everyItem - A matcher to apply to every element in an array.
assertThat([2, 4, 6], everyItem(notNullValue()));

// hasItem - for collection
assertThat([2, 4, 6], hasItem(equalTo(2)));

// hasItems - for collection
assertThat([1, 3, 5], hasItems(equalTo(1), equalTo(3)));


/***** Object *****/
// hasToString
class Foo {
    public $name = null;

    public function __toString() {
        return "[Foo]Instance";
    }
}
$foo = new Foo;

assertThat($foo, hasToString(equalTo("[Foo]Instance")));


// equalTo - compares'=='
$foo = new Foo;
$foo2 = new Foo;
assertThat($foo, equalTo($foo2));

// identicalTo - compares '==='
assertThat($foo, is(not(identicalTo($foo2))));

// anInstanceOf
assertThat($foo, anInstanceOf(Foo::class));

// any - anInstanceOf
assertThat($foo, any(Foo::class));

// nullValue
assertThat(null, is(nullValue()));

// notNullValue
assertThat("", notNullValue());

// sameInstance
assertThat($foo, is(not(sameInstance($foo2))));
assertThat($foo, is(sameInstance($foo)));

// typeOf
assertThat(1, typeOf("integer"));

// notSet - check if instance property is not set
assertThat($foo, notSet("name"));

// set - check instance property
$foo->name = "bar";
assertThat($foo, set("name"));

/****** Numbers *****/

// closeTo - value close to a range
assertThat(3, closeTo(3, 0.5));

// comparesEqualTo
assertThat(2, comparesEqualTo(2));

// greaterThan
assertThat(2, greaterThan(1));

// greaterThanOrEqualTo
assertThat(2, greaterThanOrEqualTo(2));

// atLeast - The value is >= given value
assertThat(3, atLeast(2));

// lessThan
assertThat(2, lessThan(3));

// lessThanOrEqualTo
assertThat(2, lessThanOrEqualTo(3));

// atMost - The value is <= given value
assertThat(2, atMost(3));


/******* String *******/

// emptyString
assertThat("", emptyString());

// isEmptyOrNullString
assertThat(null, isEmptyOrNullString());

// nullOrEmptyString
assertThat("", nullOrEmptyString());

// isNonEmptyString
assertThat("foo", isNonEmptyString());

// nonEmptyString
assertThat("foo", nonEmptyString());

// equalToIgnoringCase
assertThat("Foo", equalToIgnoringCase("foo"));

// equalToIgnoringWhiteSpace
assertThat(" Foo ", equalToIgnoringWhiteSpace("Foo"));

// matchesPattern
assertThat("foobarbaz", matchesPattern('/(foo)(bar)(baz)/'));

// containsString
assertThat("foobar", containsString("foo"));

// containsStringIgnoringCase
assertThat("fooBar", containsStringIgnoringCase("bar"));

// stringContainsInOrder
assertThat("foo", stringContainsInOrder("foo"));

// endsWith
assertThat("foo", endsWith("oo"));

// startsWith
assertThat("bar", startsWith("ba"));


/******* Type checking *******/
// arrayValue
assertThat([], arrayValue());

// booleanValue
assertThat(true, booleanValue());

// boolValue
assertThat(false, boolValue());

// callableValue
$func = function () {};
assertThat($func, callableValue($func));

// doubleValue
assertThat(3.14, doubleValue());

// floatValue
assertThat(3.14, floatValue());

// integerValue
assertThat(1, integerValue());

// intValue
assertThat(1, intValue());

// numericValue
assertThat("123", numericValue());

// objectValue
$obj = new stdClass;
assertThat($obj, objectValue());

// anObject
assertThat($obj, anObject());

// resourceValue
$fp = fopen("/tmp/foo", "w+");
assertThat($fp, resourceValue());

// scalarValue
assertThat(1, scalarValue());

// stringValue
assertThat("", stringValue());

// hasXPath
$xml = <<<XML
<books>
  <book>
    <isbn>1</isbn>   
  </book>
  <book>
    <isbn>2</isbn>   
  </book>
</books>
XML;

$doc = new DOMDocument;
$doc->loadXML($xml);
assertThat($doc, hasXPath("book", 2));

echo "Wao! I am done\n";

