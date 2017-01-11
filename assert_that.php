<?php

require __DIR__ . '/vendor/autoload.php';

Hamcrest\Util::registerGlobalFunctions();

echo "Asserting boolean\n";
// Boolean
assertThat("This should be true", true, is(true));
assertThat("This should be false", false, is(false));

echo "Asserting String\n";
// String
$name = "Hamcrest";
assertThat("Should be a string", $name, is(equalTo($name)));

// instance
$now = new DateTime();
assertThat("now should be an instance of stdClass", $now, anInstanceOf(DateTimeInterface::class));


$result = true;
// with an identifier
assertThat("result should be true", $result, is(equalTo(true)));

// without an identifier
assertThat($result, is(equalTo(true)));

// evaluate a boolean expression
assertThat($result === true);

/***** Array *****/

$list = [];
assertThat("list should be an array", anArray($list), is(true))	;

$list = [2, 4, 6];
$item = 4;
assertThat($list, hasItemInArray(4));

// hasValue 
assertThat([2,4,6], hasValue(2));

// arrayContainingInAnyOrder
assertThat([2, 4, 6], arrayContainingInAnyOrder([6, 4, 2]));
assertThat([2, 4, 6], arrayContainingInAnyOrder([4, 2, 6]));

// containsInAnyOrder
assertThat([2, 4, 6], containsInAnyOrder([6, 2, 4]));

// arrayContaining
assertThat([2, 4, 6], arrayContaining([2, 4, 6]));
assertthat([2, 4, 6], not(arrayContaining([6, 4, 2])));

// contains
assertThat([2, 4, 6], contains([2, 4, 6]));

// hasKeyInArray
assertThat(['name'=> 'foobar'], hasKeyInArray('name'));

// hasKey
assertThat(['name'=> 'foobar'], hasKey('name'));

// hasKeyValuePair
assertThat(['name'=> 'foobar'], hasKeyValuePair('name', 'foobar'));

// hasEntry same as hasKeyValuePair

// arrayWithSize
assertthat([2, 4, 6], arrayWithSize(3));

// emptyArray
assertThat([], emptyArray());

// nonEmptyArray
assertThat([1], nonEmptyArray());

/****** Collection *******/

// emptyTraversable
//assertThat([], emptyTraversable());
// nonEmptyTraversable
// traversableWithSize

/******* Core ******/

// allOf
assertThat([2,4,6], allOf(hasValue(2), arrayWithSize(3)));

// anyOf
assertThat([2, 4, 6], anyOf(hasValue(8), hasValue(2)));

// noneOf
assertThat([2, 4, 6], noneOf(hasValue(1), hasValue(3)));

// both + andAlso
assertThat([2, 4, 6], both(hasValue(2))->andAlso(hasValue(4)));

// either + orElse
assertThat([2, 4, 6], either(hasValue(2))->orElse(hasValue(4)));

// describedAs - http://happygiraffe.net/blog/2008/07/26/assertthat
$expected = "Dog";
$found = null;
//assertThat("Expected {$expected}, got {$found}", $found, is(notNullValue()));
//assertThat($found, describedAs($expected, notNullValue()));

// everyItem
assertThat([2, 4, 6], everyItem(notNullValue()));

// hasToString
class Foo {
    public function __toString() {
        return "[Foo]Instance";
    }
}
$foo = new Foo;

assertThat($foo, hasToString(equalTo("[Foo]Instance")));

// hasItem - for collection
assertThat([2, 4, 6], hasItem(equalTo(2)));

// hasItems - for collection
assertThat([1, 3, 5], hasItems(equalTo(1), equalTo(3)));

/***** Object *****/

// equalTo - '=='
$foo = new Foo;
$foo2 = new Foo;
assertThat($foo, equalTo($foo2));

// identicalTo '==='
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

// set - check instance property

// notSet

///// Numbers ///////

// closeTo - value close to a range
assertThat(3, closeTo(3, 0.5));

// comparesEqualTo
// greaterThan
// greaterThanOrEqualTo
// atLeast
// lessThan
// lessThanOrEqualTo
// atMost


////// String ////
// emptyString
// isEmptyOrNullString
// nullOrEmptyString
// isNonEmptyString
// nonEmptyString
// equalToIgnoringCase
// equalToIgnoringWhiteSpace
// matchesPattern
// containsString
// containsStringIgnoringCase
// stringContainsInOrder
// endsWith
// startsWith
// 

//// Type checking
// arrayValue
// booleanValue
// boolValue
// callableValue
// doubleValue
// floatValue
// integerValue
// intValue
// numericValue
// objectValue
// anObject
// resourceValue
// scalarValue
// stringValue
// hasXPath
 
echo "Wao! I am done\n";

