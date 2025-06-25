<?php

/*
 Copyright (c) 2009-2010 hamcrest.org
 */

// This file is generated from the static method @factory doctags.

namespace Hamcrest;

use Hamcrest\Arrays\IsArray;
use Hamcrest\Arrays\IsArrayContainingInAnyOrder;
use Hamcrest\Arrays\IsArrayContainingInOrder;
use Hamcrest\Core\AllOf;
use Hamcrest\Core\AnyOf;
use Hamcrest\Core\DescribedAs;
use Hamcrest\Core\IsCollectionContaining;
use Hamcrest\Text\StringContainsInOrder;

/**
 * A series of static factories for all hamcrest matchers.
 */
class Matchers
{

    /**
     * Evaluates to true only if each $matcher[$i] is satisfied by $array[$i].
     */
    public static function anArray(/* args... */): IsArray
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Arrays\IsArray', 'anArray'), $args);
    }

    /**
     * Evaluates to true if any item in an array satisfies the given matcher.
     *
     * @param mixed $item as a {@link Hamcrest\Matcher} or a value.
     *
     * @return \Hamcrest\Arrays\IsArrayContaining
     */
    public static function hasItemInArray($item): \Hamcrest\Arrays\IsArrayContaining
    {
        return \Hamcrest\Arrays\IsArrayContaining::hasItemInArray($item);
    }

    /**
     * Evaluates to true if any item in an array satisfies the given matcher.
     *
     * @param mixed $item as a {@link Hamcrest\Matcher} or a value.
     *
     * @return \Hamcrest\Arrays\IsArrayContaining
     */
    public static function hasValue($item): \Hamcrest\Arrays\IsArrayContaining
    {
        return \Hamcrest\Arrays\IsArrayContaining::hasItemInArray($item);
    }

    /**
     * An array with elements that match the given matchers.
     */
    public static function arrayContainingInAnyOrder(/* args... */): IsArrayContainingInAnyOrder
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Arrays\IsArrayContainingInAnyOrder', 'arrayContainingInAnyOrder'), $args);
    }

    /**
     * An array with elements that match the given matchers.
     */
    public static function containsInAnyOrder(/* args... */): IsArrayContainingInAnyOrder
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Arrays\IsArrayContainingInAnyOrder', 'arrayContainingInAnyOrder'), $args);
    }

    /**
     * An array with elements that match the given matchers in the same order.
     */
    public static function arrayContaining(/* args... */): IsArrayContainingInOrder
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Arrays\IsArrayContainingInOrder', 'arrayContaining'), $args);
    }

    /**
     * An array with elements that match the given matchers in the same order.
     */
    public static function contains(/* args... */): IsArrayContainingInOrder
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Arrays\IsArrayContainingInOrder', 'arrayContaining'), $args);
    }

    /**
     * Evaluates to true if any key in an array matches the given matcher.
     *
     * @param mixed $key as a {@link Hamcrest\Matcher} or a value.
     *
     * @return \Hamcrest\Arrays\IsArrayContainingKey
     */
    public static function hasKeyInArray($key): \Hamcrest\Arrays\IsArrayContainingKey
    {
        return \Hamcrest\Arrays\IsArrayContainingKey::hasKeyInArray($key);
    }

    /**
     * Evaluates to true if any key in an array matches the given matcher.
     *
     * @param mixed $key as a {@link Hamcrest\Matcher} or a value.
     *
     * @return \Hamcrest\Arrays\IsArrayContainingKey
     */
    public static function hasKey($key): \Hamcrest\Arrays\IsArrayContainingKey
    {
        return \Hamcrest\Arrays\IsArrayContainingKey::hasKeyInArray($key);
    }

    /**
     * Test if an array has both an key and value in parity with each other.
     * @param mixed $key
     * @param mixed $value
     */
    public static function hasKeyValuePair($key, $value): \Hamcrest\Arrays\IsArrayContainingKeyValuePair
    {
        return \Hamcrest\Arrays\IsArrayContainingKeyValuePair::hasKeyValuePair($key, $value);
    }

    /**
     * Test if an array has both an key and value in parity with each other.
     * @param mixed $key
     * @param mixed $value
     */
    public static function hasEntry($key, $value): \Hamcrest\Arrays\IsArrayContainingKeyValuePair
    {
        return \Hamcrest\Arrays\IsArrayContainingKeyValuePair::hasKeyValuePair($key, $value);
    }

    /**
     * Does array size satisfy a given matcher?
     *
     * @param \Hamcrest\Matcher|int $size as a {@link Hamcrest\Matcher} or a value.
     *
     * @return \Hamcrest\Arrays\IsArrayWithSize
     */
    public static function arrayWithSize($size): \Hamcrest\Arrays\IsArrayWithSize
    {
        return \Hamcrest\Arrays\IsArrayWithSize::arrayWithSize($size);
    }

    /**
     * Matches an empty array.
     */
    public static function emptyArray(): \Hamcrest\Core\DescribedAs
    {
        return \Hamcrest\Arrays\IsArrayWithSize::emptyArray();
    }

    /**
     * Matches an empty array.
     */
    public static function nonEmptyArray(): \Hamcrest\Core\DescribedAs
    {
        return \Hamcrest\Arrays\IsArrayWithSize::nonEmptyArray();
    }

    /**
     * Returns true if traversable is empty.
     */
    public static function emptyTraversable(): \Hamcrest\Collection\IsEmptyTraversable
    {
        return \Hamcrest\Collection\IsEmptyTraversable::emptyTraversable();
    }

    /**
     * Returns true if traversable is not empty.
     */
    public static function nonEmptyTraversable(): \Hamcrest\Collection\IsEmptyTraversable
    {
        return \Hamcrest\Collection\IsEmptyTraversable::nonEmptyTraversable();
    }

    /**
     * Does traversable size satisfy a given matcher?
     * @param mixed $size
     */
    public static function traversableWithSize($size): \Hamcrest\Collection\IsTraversableWithSize
    {
        return \Hamcrest\Collection\IsTraversableWithSize::traversableWithSize($size);
    }

    /**
     * Evaluates to true only if ALL of the passed in matchers evaluate to true.
     */
    public static function allOf(/* args... */): AllOf
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Core\AllOf', 'allOf'), $args);
    }

    /**
     * Evaluates to true if ANY of the passed in matchers evaluate to true.
     */
    public static function anyOf(/* args... */): AnyOf
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Core\AnyOf', 'anyOf'), $args);
    }

    /**
     * Evaluates to false if ANY of the passed in matchers evaluate to true.
     */
    public static function noneOf(/* args... */): AnyOf
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Core\AnyOf', 'noneOf'), $args);
    }

    /**
     * This is useful for fluently combining matchers that must both pass.
     * For example:
     * <pre>
     *   assertThat($string, both(containsString("a"))->andAlso(containsString("b")));
     * </pre>
     */
    public static function both(\Hamcrest\Matcher $matcher): \Hamcrest\Core\CombinableMatcher
    {
        return \Hamcrest\Core\CombinableMatcher::both($matcher);
    }

    /**
     * This is useful for fluently combining matchers where either may pass,
     * for example:
     * <pre>
     *   assertThat($string, either(containsString("a"))->orElse(containsString("b")));
     * </pre>
     */
    public static function either(\Hamcrest\Matcher $matcher): \Hamcrest\Core\CombinableMatcher
    {
        return \Hamcrest\Core\CombinableMatcher::either($matcher);
    }

    /**
     * Wraps an existing matcher and overrides the description when it fails.
     */
    public static function describedAs(/* args... */): DescribedAs
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Core\DescribedAs', 'describedAs'), $args);
    }

    /**
     * @param Matcher $itemMatcher
     *   A matcher to apply to every element in an array.
     *
     * @return \Hamcrest\Core\Every
     *   Evaluates to TRUE for a collection in which every item matches $itemMatcher
     */
    public static function everyItem(\Hamcrest\Matcher $itemMatcher): \Hamcrest\Core\Every
    {
        return \Hamcrest\Core\Every::everyItem($itemMatcher);
    }

    /**
     * Creates a matcher that matches any examined object whose <code>toString</code> or
     * <code>__toString()</code> method returns a value equalTo the specified string.
     */
    public static function hasToString($matcher): \Hamcrest\Core\HasToString
    {
        return \Hamcrest\Core\HasToString::hasToString($matcher);
    }

    /**
     * Decorates another Matcher, retaining the behavior but allowing tests
     * to be slightly more expressive.
     *
     * For example:  assertThat($cheese, equalTo($smelly))
     *          vs.  assertThat($cheese, is(equalTo($smelly)))
     * @param mixed $value
     */
    public static function is($value): \Hamcrest\Core\Is
    {
        return \Hamcrest\Core\Is::is($value);
    }

    /**
     * This matcher always evaluates to true.
     *
     * @param string $description A meaningful string used when describing itself.
     *
     * @return \Hamcrest\Core\IsAnything
     */
    public static function anything(string $description = 'ANYTHING'): \Hamcrest\Core\IsAnything
    {
        return \Hamcrest\Core\IsAnything::anything($description);
    }

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
    public static function hasItem(/* args... */): IsCollectionContaining
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Core\IsCollectionContaining', 'hasItem'), $args);
    }

    /**
     * Test if the value is an array containing elements that match all of these
     * matchers.
     *
     * Example:
     * <pre>
     * assertThat(array('a', 'b', 'c'), hasItems(equalTo('a'), equalTo('b')));
     * </pre>
     */
    public static function hasItems(/* args... */): IsCollectionContaining
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Core\IsCollectionContaining', 'hasItems'), $args);
    }

    /**
     * Is the value equal to another value, as tested by the use of the "=="
     * comparison operator?
     * @param mixed $item
     */
    public static function equalTo($item): \Hamcrest\Core\IsEqual
    {
        return \Hamcrest\Core\IsEqual::equalTo($item);
    }

    /**
     * Tests of the value is identical to $value as tested by the "===" operator.
     * @param mixed $value
     */
    public static function identicalTo($value): \Hamcrest\Core\IsIdentical
    {
        return \Hamcrest\Core\IsIdentical::identicalTo($value);
    }

    /**
     * Is the value an instance of a particular type?
     * This version assumes no relationship between the required type and
     * the signature of the method that sets it up, for example in
     * <code>assertThat($anObject, anInstanceOf('Thing'));</code>
     */
    public static function anInstanceOf(string $theClass): \Hamcrest\Core\IsInstanceOf
    {
        return \Hamcrest\Core\IsInstanceOf::anInstanceOf($theClass);
    }

    /**
     * Is the value an instance of a particular type?
     * This version assumes no relationship between the required type and
     * the signature of the method that sets it up, for example in
     * <code>assertThat($anObject, anInstanceOf('Thing'));</code>
     */
    public static function any(string $theClass): \Hamcrest\Core\IsInstanceOf
    {
        return \Hamcrest\Core\IsInstanceOf::anInstanceOf($theClass);
    }

    /**
     * Matches if value does not match $value.
     * @param mixed $value
     */
    public static function not($value): \Hamcrest\Core\IsNot
    {
        return \Hamcrest\Core\IsNot::not($value);
    }

    /**
     * Matches if value is null.
     */
    public static function nullValue(): \Hamcrest\Core\IsNull
    {
        return \Hamcrest\Core\IsNull::nullValue();
    }

    /**
     * Matches if value is not null.
     */
    public static function notNullValue(): Matcher
    {
        return \Hamcrest\Core\IsNull::notNullValue();
    }

    /**
     * Creates a new instance of IsSame.
     *
     * @param mixed $object
     *   The predicate evaluates to true only when the argument is
     *   this object.
     *
     * @return \Hamcrest\Core\IsSame
     */
    public static function sameInstance($object): \Hamcrest\Core\IsSame
    {
        return \Hamcrest\Core\IsSame::sameInstance($object);
    }

    /**
     * Is the value a particular built-in type?
     */
    public static function typeOf(string $theType): \Hamcrest\Core\IsTypeOf
    {
        return \Hamcrest\Core\IsTypeOf::typeOf($theType);
    }

    /**
     * Matches if value (class, object, or array) has named $property.
     * @param mixed $property
     */
    public static function set($property): \Hamcrest\Core\Set
    {
        return \Hamcrest\Core\Set::set($property);
    }

    /**
     * Matches if value (class, object, or array) does not have named $property.
     * @param mixed $property
     */
    public static function notSet($property): \Hamcrest\Core\Set
    {
        return \Hamcrest\Core\Set::notSet($property);
    }

    /**
     * Matches if value is a number equal to $value within some range of
     * acceptable error $delta.
     * @param mixed $value
     * @param mixed $delta
     */
    public static function closeTo($value, $delta): \Hamcrest\Number\IsCloseTo
    {
        return \Hamcrest\Number\IsCloseTo::closeTo($value, $delta);
    }

    /**
     * The value is not > $value, nor < $value.
     * @param mixed $value
     */
    public static function comparesEqualTo($value): \Hamcrest\Number\OrderingComparison
    {
        return \Hamcrest\Number\OrderingComparison::comparesEqualTo($value);
    }

    /**
     * The value is > $value.
     * @param mixed $value
     */
    public static function greaterThan($value): \Hamcrest\Number\OrderingComparison
    {
        return \Hamcrest\Number\OrderingComparison::greaterThan($value);
    }

    /**
     * The value is >= $value.
     * @param mixed $value
     */
    public static function greaterThanOrEqualTo($value): \Hamcrest\Number\OrderingComparison
    {
        return \Hamcrest\Number\OrderingComparison::greaterThanOrEqualTo($value);
    }

    /**
     * The value is >= $value.
     * @param mixed $value
     */
    public static function atLeast($value): \Hamcrest\Number\OrderingComparison
    {
        return \Hamcrest\Number\OrderingComparison::greaterThanOrEqualTo($value);
    }

    /**
     * The value is < $value.
     * @param mixed $value
     */
    public static function lessThan($value): \Hamcrest\Number\OrderingComparison
    {
        return \Hamcrest\Number\OrderingComparison::lessThan($value);
    }

    /**
     * The value is <= $value.
     * @param mixed $value
     */
    public static function lessThanOrEqualTo($value): \Hamcrest\Number\OrderingComparison
    {
        return \Hamcrest\Number\OrderingComparison::lessThanOrEqualTo($value);
    }

    /**
     * The value is <= $value.
     * @param mixed $value
     */
    public static function atMost($value): \Hamcrest\Number\OrderingComparison
    {
        return \Hamcrest\Number\OrderingComparison::lessThanOrEqualTo($value);
    }

    /**
     * Matches if value is a zero-length string.
     */
    public static function isEmptyString(): \Hamcrest\Text\IsEmptyString
    {
        return \Hamcrest\Text\IsEmptyString::isEmptyString();
    }

    /**
     * Matches if value is a zero-length string.
     */
    public static function emptyString(): \Hamcrest\Text\IsEmptyString
    {
        return \Hamcrest\Text\IsEmptyString::isEmptyString();
    }

    /**
     * Matches if value is null or a zero-length string.
     */
    public static function isEmptyOrNullString(): Matcher
    {
        return \Hamcrest\Text\IsEmptyString::isEmptyOrNullString();
    }

    /**
     * Matches if value is null or a zero-length string.
     */
    public static function nullOrEmptyString(): Matcher
    {
        return \Hamcrest\Text\IsEmptyString::isEmptyOrNullString();
    }

    /**
     * Matches if value is a non-zero-length string.
     */
    public static function isNonEmptyString(): \Hamcrest\Text\IsEmptyString
    {
        return \Hamcrest\Text\IsEmptyString::isNonEmptyString();
    }

    /**
     * Matches if value is a non-zero-length string.
     */
    public static function nonEmptyString(): \Hamcrest\Text\IsEmptyString
    {
        return \Hamcrest\Text\IsEmptyString::isNonEmptyString();
    }

    /**
     * Matches if value is a string equal to $string, regardless of the case.
     * @param mixed $string
     */
    public static function equalToIgnoringCase($string): \Hamcrest\Text\IsEqualIgnoringCase
    {
        return \Hamcrest\Text\IsEqualIgnoringCase::equalToIgnoringCase($string);
    }

    /**
     * Matches if value is a string equal to $string, regardless of whitespace.
     * @param mixed $string
     */
    public static function equalToIgnoringWhiteSpace($string): \Hamcrest\Text\IsEqualIgnoringWhiteSpace
    {
        return \Hamcrest\Text\IsEqualIgnoringWhiteSpace::equalToIgnoringWhiteSpace($string);
    }

    /**
     * Matches if value is a string that matches regular expression $pattern.
     * @param mixed $pattern
     */
    public static function matchesPattern($pattern): \Hamcrest\Text\MatchesPattern
    {
        return \Hamcrest\Text\MatchesPattern::matchesPattern($pattern);
    }

    /**
     * Matches if value is a string that contains $substring.
     * @param mixed $substring
     */
    public static function containsString($substring): \Hamcrest\Text\StringContains
    {
        return \Hamcrest\Text\StringContains::containsString($substring);
    }

    /**
     * Matches if value is a string that contains $substring regardless of the case.
     * @param mixed $substring
     */
    public static function containsStringIgnoringCase($substring): \Hamcrest\Text\StringContainsIgnoringCase
    {
        return \Hamcrest\Text\StringContainsIgnoringCase::containsStringIgnoringCase($substring);
    }

    /**
     * Matches if value contains $substrings in a constrained order.
     */
    public static function stringContainsInOrder(/* args... */): StringContainsInOrder
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Text\StringContainsInOrder', 'stringContainsInOrder'), $args);
    }

    /**
     * Matches if value is a string that ends with $substring.
     * @param mixed $substring
     */
    public static function endsWith($substring): \Hamcrest\Text\StringEndsWith
    {
        return \Hamcrest\Text\StringEndsWith::endsWith($substring);
    }

    /**
     * Matches if value is a string that starts with $substring.
     * @param mixed $substring
     */
    public static function startsWith($substring): \Hamcrest\Text\StringStartsWith
    {
        return \Hamcrest\Text\StringStartsWith::startsWith($substring);
    }

    /**
     * Is the value an array?
     */
    public static function arrayValue(): \Hamcrest\Type\IsArray
    {
        return \Hamcrest\Type\IsArray::arrayValue();
    }

    /**
     * Is the value a boolean?
     */
    public static function booleanValue(): \Hamcrest\Type\IsBoolean
    {
        return \Hamcrest\Type\IsBoolean::booleanValue();
    }

    /**
     * Is the value a boolean?
     */
    public static function boolValue(): \Hamcrest\Type\IsBoolean
    {
        return \Hamcrest\Type\IsBoolean::booleanValue();
    }

    /**
     * Is the value callable?
     */
    public static function callableValue(): \Hamcrest\Type\IsCallable
    {
        return \Hamcrest\Type\IsCallable::callableValue();
    }

    /**
     * Is the value a float/double?
     */
    public static function doubleValue(): \Hamcrest\Type\IsDouble
    {
        return \Hamcrest\Type\IsDouble::doubleValue();
    }

    /**
     * Is the value a float/double?
     */
    public static function floatValue(): \Hamcrest\Type\IsDouble
    {
        return \Hamcrest\Type\IsDouble::doubleValue();
    }

    /**
     * Is the value an integer?
     */
    public static function integerValue(): \Hamcrest\Type\IsInteger
    {
        return \Hamcrest\Type\IsInteger::integerValue();
    }

    /**
     * Is the value an integer?
     */
    public static function intValue(): \Hamcrest\Type\IsInteger
    {
        return \Hamcrest\Type\IsInteger::integerValue();
    }

    /**
     * Is the value a numeric?
     */
    public static function numericValue(): \Hamcrest\Type\IsNumeric
    {
        return \Hamcrest\Type\IsNumeric::numericValue();
    }

    /**
     * Is the value an object?
     */
    public static function objectValue(): \Hamcrest\Type\IsObject
    {
        return \Hamcrest\Type\IsObject::objectValue();
    }

    /**
     * Is the value an object?
     */
    public static function anObject(): \Hamcrest\Type\IsObject
    {
        return \Hamcrest\Type\IsObject::objectValue();
    }

    /**
     * Is the value a resource?
     */
    public static function resourceValue(): \Hamcrest\Type\IsResource
    {
        return \Hamcrest\Type\IsResource::resourceValue();
    }

    /**
     * Is the value a scalar (boolean, integer, double, or string)?
     */
    public static function scalarValue(): \Hamcrest\Type\IsScalar
    {
        return \Hamcrest\Type\IsScalar::scalarValue();
    }

    /**
     * Is the value a string?
     */
    public static function stringValue(): \Hamcrest\Type\IsString
    {
        return \Hamcrest\Type\IsString::stringValue();
    }

    /**
     * Wraps <code>$matcher</code> with {@link Hamcrest\Core\IsEqual)
     * if it's not a matcher and the XPath in <code>count()</code>
     * if it's an integer.
     * @param null|Matcher|int|mixed $matcher
     */
    public static function hasXPath(string $xpath, $matcher = null): \Hamcrest\Xml\HasXPath
    {
        return \Hamcrest\Xml\HasXPath::hasXPath($xpath, $matcher);
    }
}
