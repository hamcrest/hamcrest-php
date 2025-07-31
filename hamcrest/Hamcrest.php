<?php

/*
 Copyright (c) 2009-2010 hamcrest.org
 */

// This file is generated from the static method @factory doctags.

if (!function_exists('assertThat')) {
    /**
     * Make an assertion and throw {@link Hamcrest_AssertionError} if it fails.
     *
     * Example:
     * <pre>
     * //With an identifier
     * assertThat("assertion identifier", $apple->flavour(), equalTo("tasty"));
     * //Without an identifier
     * assertThat($apple->flavour(), equalTo("tasty"));
     * //Evaluating a boolean expression
     * assertThat("some error", $a > $b);
     * </pre>
     */
    function assertThat(): void
    {
        $args = func_get_args();
        call_user_func_array(
            array('Hamcrest\MatcherAssert', 'assertThat'),
            $args
        );
    }
}

if (!function_exists('anArray')) {
    /**
     * Evaluates to true only if each $matcher[$i] is satisfied by $array[$i].
     */
    function anArray(/* args... */): \Hamcrest\Arrays\IsArray
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Arrays\IsArray', 'anArray'), $args);
    }
}

if (!function_exists('hasItemInArray')) {
    /**
     * Evaluates to true if any item in an array satisfies the given matcher.
     *
     * @param mixed $item as a {@link Hamcrest\Matcher} or a value.
     *
     * @return \Hamcrest\Arrays\IsArrayContaining
     */
    function hasItemInArray($item): \Hamcrest\Arrays\IsArrayContaining
    {
        return \Hamcrest\Arrays\IsArrayContaining::hasItemInArray($item);
    }
}

if (!function_exists('hasValue')) {
    /**
     * Evaluates to true if any item in an array satisfies the given matcher.
     *
     * @param mixed $item as a {@link Hamcrest\Matcher} or a value.
     *
     * @return \Hamcrest\Arrays\IsArrayContaining
     */
    function hasValue($item): \Hamcrest\Arrays\IsArrayContaining
    {
        return \Hamcrest\Arrays\IsArrayContaining::hasItemInArray($item);
    }
}

if (!function_exists('arrayContainingInAnyOrder')) {
    /**
     * An array with elements that match the given matchers.
     */
    function arrayContainingInAnyOrder(/* args... */): \Hamcrest\Arrays\IsArrayContainingInAnyOrder
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Arrays\IsArrayContainingInAnyOrder', 'arrayContainingInAnyOrder'), $args);
    }
}

if (!function_exists('containsInAnyOrder')) {
    /**
     * An array with elements that match the given matchers.
     */
    function containsInAnyOrder(/* args... */): \Hamcrest\Arrays\IsArrayContainingInAnyOrder
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Arrays\IsArrayContainingInAnyOrder', 'arrayContainingInAnyOrder'), $args);
    }
}

if (!function_exists('arrayContaining')) {
    /**
     * An array with elements that match the given matchers in the same order.
     */
    function arrayContaining(/* args... */): \Hamcrest\Arrays\IsArrayContainingInOrder
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Arrays\IsArrayContainingInOrder', 'arrayContaining'), $args);
    }
}

if (!function_exists('contains')) {
    /**
     * An array with elements that match the given matchers in the same order.
     */
    function contains(/* args... */): \Hamcrest\Arrays\IsArrayContainingInOrder
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Arrays\IsArrayContainingInOrder', 'arrayContaining'), $args);
    }
}

if (!function_exists('hasKeyInArray')) {
    /**
     * Evaluates to true if any key in an array matches the given matcher.
     *
     * @param mixed $key as a {@link Hamcrest\Matcher} or a value.
     *
     * @return \Hamcrest\Arrays\IsArrayContainingKey
     */
    function hasKeyInArray($key): \Hamcrest\Arrays\IsArrayContainingKey
    {
        return \Hamcrest\Arrays\IsArrayContainingKey::hasKeyInArray($key);
    }
}

if (!function_exists('hasKey')) {
    /**
     * Evaluates to true if any key in an array matches the given matcher.
     *
     * @param mixed $key as a {@link Hamcrest\Matcher} or a value.
     *
     * @return \Hamcrest\Arrays\IsArrayContainingKey
     */
    function hasKey($key): \Hamcrest\Arrays\IsArrayContainingKey
    {
        return \Hamcrest\Arrays\IsArrayContainingKey::hasKeyInArray($key);
    }
}

if (!function_exists('hasKeyValuePair')) {
    /**
     * Test if an array has both an key and value in parity with each other.
     *
     * @param mixed $key
     * @param mixed $value
     */
    function hasKeyValuePair($key, $value): \Hamcrest\Arrays\IsArrayContainingKeyValuePair
    {
        return \Hamcrest\Arrays\IsArrayContainingKeyValuePair::hasKeyValuePair($key, $value);
    }
}

if (!function_exists('hasEntry')) {
    /**
     * Test if an array has both an key and value in parity with each other.
     *
     * @param mixed $key
     * @param mixed $value
     */
    function hasEntry($key, $value): \Hamcrest\Arrays\IsArrayContainingKeyValuePair
    {
        return \Hamcrest\Arrays\IsArrayContainingKeyValuePair::hasKeyValuePair($key, $value);
    }
}

if (!function_exists('arrayWithSize')) {
    /**
     * Does array size satisfy a given matcher?
     *
     * @param \Hamcrest\Matcher|int $size as a {@link Hamcrest\Matcher} or a value.
     *
     * @return \Hamcrest\Arrays\IsArrayWithSize
     */
    function arrayWithSize($size): \Hamcrest\Arrays\IsArrayWithSize
    {
        return \Hamcrest\Arrays\IsArrayWithSize::arrayWithSize($size);
    }
}

if (!function_exists('emptyArray')) {
    /**
     * Matches an empty array.
     */
    function emptyArray(): \Hamcrest\Core\DescribedAs
    {
        return \Hamcrest\Arrays\IsArrayWithSize::emptyArray();
    }
}

if (!function_exists('nonEmptyArray')) {
    /**
     * Matches an empty array.
     */
    function nonEmptyArray(): \Hamcrest\Core\DescribedAs
    {
        return \Hamcrest\Arrays\IsArrayWithSize::nonEmptyArray();
    }
}

if (!function_exists('emptyTraversable')) {
    /**
     * Returns true if traversable is empty.
     */
    function emptyTraversable(): \Hamcrest\Collection\IsEmptyTraversable
    {
        return \Hamcrest\Collection\IsEmptyTraversable::emptyTraversable();
    }
}

if (!function_exists('nonEmptyTraversable')) {
    /**
     * Returns true if traversable is not empty.
     */
    function nonEmptyTraversable(): \Hamcrest\Collection\IsEmptyTraversable
    {
        return \Hamcrest\Collection\IsEmptyTraversable::nonEmptyTraversable();
    }
}

if (!function_exists('traversableWithSize')) {
    /**
     * Does traversable size satisfy a given matcher?
     *
     * @param mixed $size
     */
    function traversableWithSize($size): \Hamcrest\Collection\IsTraversableWithSize
    {
        return \Hamcrest\Collection\IsTraversableWithSize::traversableWithSize($size);
    }
}

if (!function_exists('allOf')) {
    /**
     * Evaluates to true only if ALL of the passed in matchers evaluate to true.
     */
    function allOf(/* args... */): \Hamcrest\Core\AllOf
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Core\AllOf', 'allOf'), $args);
    }
}

if (!function_exists('anyOf')) {
    /**
     * Evaluates to true if ANY of the passed in matchers evaluate to true.
     */
    function anyOf(/* args... */): \Hamcrest\Core\AnyOf
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Core\AnyOf', 'anyOf'), $args);
    }
}

if (!function_exists('noneOf')) {
    /**
     * Evaluates to false if ANY of the passed in matchers evaluate to true.
     */
    function noneOf(/* args... */): \Hamcrest\Core\IsNot
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Core\AnyOf', 'noneOf'), $args);
    }
}

if (!function_exists('both')) {
    /**
     * This is useful for fluently combining matchers that must both pass.
     * For example:
     * <pre>
     *   assertThat($string, both(containsString("a"))->andAlso(containsString("b")));
     * </pre>
     */
    function both(\Hamcrest\Matcher $matcher): \Hamcrest\Core\CombinableMatcher
    {
        return \Hamcrest\Core\CombinableMatcher::both($matcher);
    }
}

if (!function_exists('either')) {
    /**
     * This is useful for fluently combining matchers where either may pass,
     * for example:
     * <pre>
     *   assertThat($string, either(containsString("a"))->orElse(containsString("b")));
     * </pre>
     */
    function either(\Hamcrest\Matcher $matcher): \Hamcrest\Core\CombinableMatcher
    {
        return \Hamcrest\Core\CombinableMatcher::either($matcher);
    }
}

if (!function_exists('describedAs')) {
    /**
     * Wraps an existing matcher and overrides the description when it fails.
     */
    function describedAs(/* args... */): \Hamcrest\Core\DescribedAs
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Core\DescribedAs', 'describedAs'), $args);
    }
}

if (!function_exists('everyItem')) {
    /**
     * @param \Hamcrest\Matcher $itemMatcher
     *   A matcher to apply to every element in an array.
     *
     * @return \Hamcrest\Core\Every
     *   Evaluates to TRUE for a collection in which every item matches $itemMatcher
     */
    function everyItem(\Hamcrest\Matcher $itemMatcher): \Hamcrest\Core\Every
    {
        return \Hamcrest\Core\Every::everyItem($itemMatcher);
    }
}

if (!function_exists('hasToString')) {
    /**
     * Creates a matcher that matches any examined object whose <code>toString</code> or
     * <code>__toString()</code> method returns a value equalTo the specified string.
     *
     * @param mixed $matcher
     */
    function hasToString($matcher): \Hamcrest\Core\HasToString
    {
        return \Hamcrest\Core\HasToString::hasToString($matcher);
    }
}

if (!function_exists('is')) {
    /**
     * Decorates another Matcher, retaining the behavior but allowing tests
     * to be slightly more expressive.
     *
     * For example:  assertThat($cheese, equalTo($smelly))
     *          vs.  assertThat($cheese, is(equalTo($smelly)))
     *
     * @param mixed $value
     */
    function is($value): \Hamcrest\Core\Is
    {
        return \Hamcrest\Core\Is::is($value);
    }
}

if (!function_exists('anything')) {
    /**
     * This matcher always evaluates to true.
     *
     * @param string $description A meaningful string used when describing itself.
     */
    function anything(string $description = 'ANYTHING'): \Hamcrest\Core\IsAnything
    {
        return \Hamcrest\Core\IsAnything::anything($description);
    }
}

if (!function_exists('hasItem')) {
    /**
     * Test if the value is an array containing this matcher.
     *
     * Example:
     * <pre>
     * assertThat(array('a', 'b'), hasItem(equalTo('b')));
     * //Convenience defaults to equalTo()
     * assertThat(array('a', 'b'), hasItem('b'));
     * </pre>
     */
    function hasItem(/* args... */): \Hamcrest\Core\IsCollectionContaining
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Core\IsCollectionContaining', 'hasItem'), $args);
    }
}

if (!function_exists('hasItems')) {
    /**
     * Test if the value is an array containing elements that match all of these
     * matchers.
     *
     * Example:
     * <pre>
     * assertThat(array('a', 'b', 'c'), hasItems(equalTo('a'), equalTo('b')));
     * </pre>
     */
    function hasItems(/* args... */): \Hamcrest\Core\AllOf
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Core\IsCollectionContaining', 'hasItems'), $args);
    }
}

if (!function_exists('equalTo')) {
    /**
     * Is the value equal to another value, as tested by the use of the "=="
     * comparison operator?
     *
     * @param mixed $item
     */
    function equalTo($item): \Hamcrest\Core\IsEqual
    {
        return \Hamcrest\Core\IsEqual::equalTo($item);
    }
}

if (!function_exists('identicalTo')) {
    /**
     * Tests of the value is identical to $value as tested by the "===" operator.
     *
     * @param mixed $value
     */
    function identicalTo($value): \Hamcrest\Core\IsIdentical
    {
        return \Hamcrest\Core\IsIdentical::identicalTo($value);
    }
}

if (!function_exists('anInstanceOf')) {
    /**
     * Is the value an instance of a particular type?
     * This version assumes no relationship between the required type and
     * the signature of the method that sets it up, for example in
     * <code>assertThat($anObject, anInstanceOf('Thing'));</code>
     */
    function anInstanceOf(string $theClass): \Hamcrest\Core\IsInstanceOf
    {
        return \Hamcrest\Core\IsInstanceOf::anInstanceOf($theClass);
    }
}

if (!function_exists('any')) {
    /**
     * Is the value an instance of a particular type?
     * This version assumes no relationship between the required type and
     * the signature of the method that sets it up, for example in
     * <code>assertThat($anObject, anInstanceOf('Thing'));</code>
     */
    function any(string $theClass): \Hamcrest\Core\IsInstanceOf
    {
        return \Hamcrest\Core\IsInstanceOf::anInstanceOf($theClass);
    }
}

if (!function_exists('not')) {
    /**
     * Matches if value does not match $value.
     *
     * @param mixed $value
     */
    function not($value): \Hamcrest\Core\IsNot
    {
        return \Hamcrest\Core\IsNot::not($value);
    }
}

if (!function_exists('nullValue')) {
    /**
     * Matches if value is null.
     */
    function nullValue(): \Hamcrest\Core\IsNull
    {
        return \Hamcrest\Core\IsNull::nullValue();
    }
}

if (!function_exists('notNullValue')) {
    /**
     * Matches if value is not null.
     */
    function notNullValue(): \Hamcrest\Core\IsNot
    {
        return \Hamcrest\Core\IsNull::notNullValue();
    }
}

if (!function_exists('sameInstance')) {
    /**
     * Creates a new instance of IsSame.
     *
     * @param mixed $object
     *   The predicate evaluates to true only when the argument is
     *   this object.
     *
     * @return \Hamcrest\Core\IsSame
     */
    function sameInstance($object): \Hamcrest\Core\IsSame
    {
        return \Hamcrest\Core\IsSame::sameInstance($object);
    }
}

if (!function_exists('typeOf')) {
    /**
     * Is the value a particular built-in type?
     *
     * @param string $theType
     */
    function typeOf(string $theType): \Hamcrest\Core\IsTypeOf
    {
        return \Hamcrest\Core\IsTypeOf::typeOf($theType);
    }
}

if (!function_exists('set')) {
    /**
     * Matches if value (class, object, or array) has named $property.
     *
     * @param mixed $property
     */
    function set($property): \Hamcrest\Core\Set
    {
        return \Hamcrest\Core\Set::set($property);
    }
}

if (!function_exists('notSet')) {
    /**
     * Matches if value (class, object, or array) does not have named $property.
     *
     * @param mixed $property
     */
    function notSet($property): \Hamcrest\Core\Set
    {
        return \Hamcrest\Core\Set::notSet($property);
    }
}

if (!function_exists('closeTo')) {
    /**
     * Matches if value is a number equal to $value within some range of
     * acceptable error $delta.
     *
     * @param mixed $value
     * @param mixed $delta
     */
    function closeTo($value, $delta): \Hamcrest\Number\IsCloseTo
    {
        return \Hamcrest\Number\IsCloseTo::closeTo($value, $delta);
    }
}

if (!function_exists('comparesEqualTo')) {
    /**
     * The value is not > $value, nor < $value.
     *
     * @param mixed $value
     */
    function comparesEqualTo($value): \Hamcrest\Number\OrderingComparison
    {
        return \Hamcrest\Number\OrderingComparison::comparesEqualTo($value);
    }
}

if (!function_exists('greaterThan')) {
    /**
     * The value is > $value.
     *
     * @param mixed $value
     */
    function greaterThan($value): \Hamcrest\Number\OrderingComparison
    {
        return \Hamcrest\Number\OrderingComparison::greaterThan($value);
    }
}

if (!function_exists('greaterThanOrEqualTo')) {
    /**
     * The value is >= $value.
     *
     * @param mixed $value
     */
    function greaterThanOrEqualTo($value): \Hamcrest\Number\OrderingComparison
    {
        return \Hamcrest\Number\OrderingComparison::greaterThanOrEqualTo($value);
    }
}

if (!function_exists('atLeast')) {
    /**
     * The value is >= $value.
     *
     * @param mixed $value
     */
    function atLeast($value): \Hamcrest\Number\OrderingComparison
    {
        return \Hamcrest\Number\OrderingComparison::greaterThanOrEqualTo($value);
    }
}

if (!function_exists('lessThan')) {
    /**
     * The value is < $value.
     *
     * @param mixed $value
     */
    function lessThan($value): \Hamcrest\Number\OrderingComparison
    {
        return \Hamcrest\Number\OrderingComparison::lessThan($value);
    }
}

if (!function_exists('lessThanOrEqualTo')) {
    /**
     * The value is <= $value.
     *
     * @param mixed $value
     */
    function lessThanOrEqualTo($value): \Hamcrest\Number\OrderingComparison
    {
        return \Hamcrest\Number\OrderingComparison::lessThanOrEqualTo($value);
    }
}

if (!function_exists('atMost')) {
    /**
     * The value is <= $value.
     *
     * @param mixed $value
     */
    function atMost($value): \Hamcrest\Number\OrderingComparison
    {
        return \Hamcrest\Number\OrderingComparison::lessThanOrEqualTo($value);
    }
}

if (!function_exists('isEmptyString')) {
    /**
     * Matches if value is a zero-length string.
     */
    function isEmptyString(): \Hamcrest\Text\IsEmptyString
    {
        return \Hamcrest\Text\IsEmptyString::isEmptyString();
    }
}

if (!function_exists('emptyString')) {
    /**
     * Matches if value is a zero-length string.
     */
    function emptyString(): \Hamcrest\Text\IsEmptyString
    {
        return \Hamcrest\Text\IsEmptyString::isEmptyString();
    }
}

if (!function_exists('isEmptyOrNullString')) {
    /**
     * Matches if value is null or a zero-length string.
     */
    function isEmptyOrNullString(): \Hamcrest\Core\AnyOf
    {
        return \Hamcrest\Text\IsEmptyString::isEmptyOrNullString();
    }
}

if (!function_exists('nullOrEmptyString')) {
    /**
     * Matches if value is null or a zero-length string.
     */
    function nullOrEmptyString(): \Hamcrest\Core\AnyOf
    {
        return \Hamcrest\Text\IsEmptyString::isEmptyOrNullString();
    }
}

if (!function_exists('isNonEmptyString')) {
    /**
     * Matches if value is a non-zero-length string.
     */
    function isNonEmptyString(): \Hamcrest\Text\IsEmptyString
    {
        return \Hamcrest\Text\IsEmptyString::isNonEmptyString();
    }
}

if (!function_exists('nonEmptyString')) {
    /**
     * Matches if value is a non-zero-length string.
     */
    function nonEmptyString(): \Hamcrest\Text\IsEmptyString
    {
        return \Hamcrest\Text\IsEmptyString::isNonEmptyString();
    }
}

if (!function_exists('equalToIgnoringCase')) {
    /**
     * Matches if value is a string equal to $string, regardless of the case.
     *
     * @param mixed $string
     */
    function equalToIgnoringCase($string): \Hamcrest\Text\IsEqualIgnoringCase
    {
        return \Hamcrest\Text\IsEqualIgnoringCase::equalToIgnoringCase($string);
    }
}

if (!function_exists('equalToIgnoringWhiteSpace')) {
    /**
     * Matches if value is a string equal to $string, regardless of whitespace.
     *
     * @param mixed $string
     */
    function equalToIgnoringWhiteSpace($string): \Hamcrest\Text\IsEqualIgnoringWhiteSpace
    {
        return \Hamcrest\Text\IsEqualIgnoringWhiteSpace::equalToIgnoringWhiteSpace($string);
    }
}

if (!function_exists('matchesPattern')) {
    /**
     * Matches if value is a string that matches regular expression $pattern.
     *
     * @param mixed $pattern
     */
    function matchesPattern($pattern): \Hamcrest\Text\MatchesPattern
    {
        return \Hamcrest\Text\MatchesPattern::matchesPattern($pattern);
    }
}

if (!function_exists('containsString')) {
    /**
     * Matches if value is a string that contains $substring.
     *
     * @param mixed $substring
     */
    function containsString($substring): \Hamcrest\Text\StringContains
    {
        return \Hamcrest\Text\StringContains::containsString($substring);
    }
}

if (!function_exists('containsStringIgnoringCase')) {
    /**
     * Matches if value is a string that contains $substring regardless of the case.
     *
     * @param mixed $substring
     */
    function containsStringIgnoringCase($substring): \Hamcrest\Text\StringContainsIgnoringCase
    {
        return \Hamcrest\Text\StringContainsIgnoringCase::containsStringIgnoringCase($substring);
    }
}

if (!function_exists('stringContainsInOrder')) {
    /**
     * Matches if value contains $substrings in a constrained order.
     */
    function stringContainsInOrder(/* args... */): \Hamcrest\Text\StringContainsInOrder
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Text\StringContainsInOrder', 'stringContainsInOrder'), $args);
    }
}

if (!function_exists('endsWith')) {
    /**
     * Matches if value is a string that ends with $substring.
     *
     * @param mixed $substring
     */
    function endsWith($substring): \Hamcrest\Text\StringEndsWith
    {
        return \Hamcrest\Text\StringEndsWith::endsWith($substring);
    }
}

if (!function_exists('startsWith')) {
    /**
     * Matches if value is a string that starts with $substring.
     *
     * @param mixed $substring
     */
    function startsWith($substring): \Hamcrest\Text\StringStartsWith
    {
        return \Hamcrest\Text\StringStartsWith::startsWith($substring);
    }
}

if (!function_exists('arrayValue')) {
    /**
     * Is the value an array?
     */
    function arrayValue(): \Hamcrest\Type\IsArray
    {
        return \Hamcrest\Type\IsArray::arrayValue();
    }
}

if (!function_exists('booleanValue')) {
    /**
     * Is the value a boolean?
     */
    function booleanValue(): \Hamcrest\Type\IsBoolean
    {
        return \Hamcrest\Type\IsBoolean::booleanValue();
    }
}

if (!function_exists('boolValue')) {
    /**
     * Is the value a boolean?
     */
    function boolValue(): \Hamcrest\Type\IsBoolean
    {
        return \Hamcrest\Type\IsBoolean::booleanValue();
    }
}

if (!function_exists('callableValue')) {
    /**
     * Is the value callable?
     */
    function callableValue(): \Hamcrest\Type\IsCallable
    {
        return \Hamcrest\Type\IsCallable::callableValue();
    }
}

if (!function_exists('doubleValue')) {
    /**
     * Is the value a float/double?
     */
    function doubleValue(): \Hamcrest\Type\IsDouble
    {
        return \Hamcrest\Type\IsDouble::doubleValue();
    }
}

if (!function_exists('floatValue')) {
    /**
     * Is the value a float/double?
     */
    function floatValue(): \Hamcrest\Type\IsDouble
    {
        return \Hamcrest\Type\IsDouble::doubleValue();
    }
}

if (!function_exists('integerValue')) {
    /**
     * Is the value an integer?
     */
    function integerValue(): \Hamcrest\Type\IsInteger
    {
        return \Hamcrest\Type\IsInteger::integerValue();
    }
}

if (!function_exists('intValue')) {
    /**
     * Is the value an integer?
     */
    function intValue(): \Hamcrest\Type\IsInteger
    {
        return \Hamcrest\Type\IsInteger::integerValue();
    }
}

if (!function_exists('numericValue')) {
    /**
     * Is the value a numeric?
     */
    function numericValue(): \Hamcrest\Type\IsNumeric
    {
        return \Hamcrest\Type\IsNumeric::numericValue();
    }
}

if (!function_exists('objectValue')) {
    /**
     * Is the value an object?
     */
    function objectValue(): \Hamcrest\Type\IsObject
    {
        return \Hamcrest\Type\IsObject::objectValue();
    }
}

if (!function_exists('anObject')) {
    /**
     * Is the value an object?
     */
    function anObject(): \Hamcrest\Type\IsObject
    {
        return \Hamcrest\Type\IsObject::objectValue();
    }
}

if (!function_exists('resourceValue')) {
    /**
     * Is the value a resource?
     */
    function resourceValue(): \Hamcrest\Type\IsResource
    {
        return \Hamcrest\Type\IsResource::resourceValue();
    }
}

if (!function_exists('scalarValue')) {
    /**
     * Is the value a scalar (boolean, integer, double, or string)?
     */
    function scalarValue(): \Hamcrest\Type\IsScalar
    {
        return \Hamcrest\Type\IsScalar::scalarValue();
    }
}

if (!function_exists('stringValue')) {
    /**
     * Is the value a string?
     */
    function stringValue(): \Hamcrest\Type\IsString
    {
        return \Hamcrest\Type\IsString::stringValue();
    }
}

if (!function_exists('hasXPath')) {
    /**
     * Wraps <code>$matcher</code> with {@link Hamcrest\Core\IsEqual)
     * if it's not a matcher and the XPath in <code>count()</code>
     * if it's an integer.
     *
     * @param string $xpath
     * @param null|Matcher|int|mixed $matcher
     */
    function hasXPath(string $xpath, $matcher = null): \Hamcrest\Xml\HasXPath
    {
        return \Hamcrest\Xml\HasXPath::hasXPath($xpath, $matcher);
    }
}
