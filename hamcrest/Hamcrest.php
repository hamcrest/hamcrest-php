<?php

/*
 Copyright (c) 2009-2010 hamcrest.org
 */

// This file is generated from the static method @factory doctags.

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
function assertThat()
{
  $args = func_get_args();
  call_user_func_array(
    array('Hamcrest_MatcherAssert', 'assertThat'),
    $args
  );
}

/**
 * Evaluates to true only if each $matcher[$i] is satisfied by $array[$i].
 */
function anArray(/* args... */)
{
  $args = func_get_args();
  return call_user_func_array(array('Hamcrest_Array_IsArray', 'anArray'), $args);
}

/**
 * Evaluates to true if any item in an array satisfies the given matcher.
 *
 * @param mixed $item as a {@link Hamcrest_Matcher} or a value.
 */
function hasItemInArray($item)
{
  return Hamcrest_Array_IsArrayContaining::hasItemInArray($item);
}

/**
 * Evaluates to true if any item in an array satisfies the given matcher.
 *
 * @param mixed $item as a {@link Hamcrest_Matcher} or a value.
 */
function hasValue($item)
{
  return Hamcrest_Array_IsArrayContaining::hasItemInArray($item);
}

/**
 * An array with elements that match the given matchers.
 */
function arrayContainingInAnyOrder(/* args... */)
{
  $args = func_get_args();
  return call_user_func_array(array('Hamcrest_Array_IsArrayContainingInAnyOrder', 'arrayContainingInAnyOrder'), $args);
}

/**
 * An array with elements that match the given matchers.
 */
function containsInAnyOrder(/* args... */)
{
  $args = func_get_args();
  return call_user_func_array(array('Hamcrest_Array_IsArrayContainingInAnyOrder', 'arrayContainingInAnyOrder'), $args);
}

/**
 * An array with elements that match the given matchers in the same order.
 */
function arrayContaining(/* args... */)
{
  $args = func_get_args();
  return call_user_func_array(array('Hamcrest_Array_IsArrayContainingInOrder', 'arrayContaining'), $args);
}

/**
 * An array with elements that match the given matchers in the same order.
 */
function contains(/* args... */)
{
  $args = func_get_args();
  return call_user_func_array(array('Hamcrest_Array_IsArrayContainingInOrder', 'arrayContaining'), $args);
}

/**
 * Evaluates to true if any key in an array matches the given matcher.
 *
 * @param mixed $key as a {@link Hamcrest_Matcher} or a value.
 */
function hasKeyInArray($key)
{
  return Hamcrest_Array_IsArrayContainingKey::hasKeyInArray($key);
}

/**
 * Evaluates to true if any key in an array matches the given matcher.
 *
 * @param mixed $key as a {@link Hamcrest_Matcher} or a value.
 */
function hasKey($key)
{
  return Hamcrest_Array_IsArrayContainingKey::hasKeyInArray($key);
}

/**
 * Test if an array has both an key and value in parity with each other.
 */
function hasKeyValuePair($key, $value)
{
  return Hamcrest_Array_IsArrayContainingKeyValuePair::hasKeyValuePair($key, $value);
}

/**
 * Test if an array has both an key and value in parity with each other.
 */
function hasEntry($key, $value)
{
  return Hamcrest_Array_IsArrayContainingKeyValuePair::hasKeyValuePair($key, $value);
}

/**
 * Does array size satisfy a given matcher?
 *
 * @param int $size as a {@link Hamcrest_Matcher} or a value.
 */
function arrayWithSize($size)
{
  return Hamcrest_Array_IsArrayWithSize::arrayWithSize($size);
}

/**
 * Matches an empty array.
 */
function emptyArray()
{
  return Hamcrest_Array_IsArrayWithSize::emptyArray();
}

/**
 * Matches an empty array.
 */
function nonEmptyArray()
{
  return Hamcrest_Array_IsArrayWithSize::nonEmptyArray();
}

/**
 * Returns true if traversable is empty.
 */
function emptyTraversable()
{
  return Hamcrest_Collection_IsEmptyTraversable::emptyTraversable();
}

/**
 * Returns true if traversable is not empty.
 */
function nonEmptyTraversable()
{
  return Hamcrest_Collection_IsEmptyTraversable::nonEmptyTraversable();
}

/**
 * Does traversable size satisfy a given matcher?
 */
function traversableWithSize($size)
{
  return Hamcrest_Collection_IsTraversableWithSize::traversableWithSize($size);
}

/**
 * Evaluates to true only if ALL of the passed in matchers evaluate to true.
 */
function allOf(/* args... */)
{
  $args = func_get_args();
  return call_user_func_array(array('Hamcrest_Core_AllOf', 'allOf'), $args);
}

/**
 * Evaluates to true if ANY of the passed in matchers evaluate to true.
 */
function anyOf(/* args... */)
{
  $args = func_get_args();
  return call_user_func_array(array('Hamcrest_Core_AnyOf', 'anyOf'), $args);
}

/**
 * Evaluates to false if ANY of the passed in matchers evaluate to true.
 */
function noneOf(/* args... */)
{
  $args = func_get_args();
  return call_user_func_array(array('Hamcrest_Core_AnyOf', 'noneOf'), $args);
}

/**
 * This is useful for fluently combining matchers that must both pass.
 * For example:
 * <pre>
 *   assertThat($string, both(containsString("a"))->andAlso(containsString("b")));
 * </pre>
 */
function both(Hamcrest_Matcher $matcher)
{
  return Hamcrest_Core_CombinableMatcher::both($matcher);
}

/**
 * This is useful for fluently combining matchers where either may pass,
 * for example:
 * <pre>
 *   assertThat($string, either(containsString("a"))->orElse(containsString("b")));
 * </pre>
 */
function either(Hamcrest_Matcher $matcher)
{
  return Hamcrest_Core_CombinableMatcher::either($matcher);
}

/**
 * Wraps an existing matcher and overrides the description when it fails.
 */
function describedAs(/* args... */)
{
  $args = func_get_args();
  return call_user_func_array(array('Hamcrest_Core_DescribedAs', 'describedAs'), $args);
}

/**
 * @param Hamcrest_Matcher $itemMatcher
 *   A matcher to apply to every element in an array.
 *
 * @return Hamcrest_Core_Every
 *   Evaluates to TRUE for a collection in which every item matches $itemMatcher
 */
function everyItem(Hamcrest_Matcher $itemMatcher)
{
  return Hamcrest_Core_Every::everyItem($itemMatcher);
}

/**
 * Does array size satisfy a given matcher?
 */
function hasToString($matcher)
{
    return Hamcrest_Core_HasToString::hasToString($matcher);
}

/**
 * Decorates another Matcher, retaining the behavior but allowing tests
 * to be slightly more expressive.
 *
 * For example:  assertThat($cheese, equalTo($smelly))
 *          vs.  assertThat($cheese, is(equalTo($smelly)))
 */
function is($value)
{
    return Hamcrest_Core_Is::is($value);
}

/**
 * This matcher always evaluates to true.
 *
 * @param string $description A meaningful string used when describing itself.
 */
function anything($description = 'ANYTHING')
{
    return Hamcrest_Core_IsAnything::anything($description);
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
function hasItem(/* args... */)
{
    $args = func_get_args();
  return call_user_func_array(array('Hamcrest_Core_IsCollectionContaining', 'hasItem'), $args);
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
function hasItems(/* args... */)
{
    $args = func_get_args();
  return call_user_func_array(array('Hamcrest_Core_IsCollectionContaining', 'hasItems'), $args);
}

/**
 * Is the value equal to another value, as tested by the use of the "=="
 * comparison operator?
 */
function equalTo($item)
{
    return Hamcrest_Core_IsEqual::equalTo($item);
}

/**
 * Tests of the value is identical to $value as tested by the "===" operator.
 */
function identicalTo($value)
{
    return Hamcrest_Core_IsIdentical::identicalTo($value);
}

/**
 * Is the value an instance of a particular type?
 * This version assumes no relationship between the required type and
 * the signature of the method that sets it up, for example in
 * <code>assertThat($anObject, anInstanceOf('Thing'));</code>
 */
function anInstanceOf($theClass)
{
    return Hamcrest_Core_IsInstanceOf::anInstanceOf($theClass);
}

/**
 * Is the value an instance of a particular type?
 * This version assumes no relationship between the required type and
 * the signature of the method that sets it up, for example in
 * <code>assertThat($anObject, anInstanceOf('Thing'));</code>
 */
function any($theClass)
{
    return Hamcrest_Core_IsInstanceOf::anInstanceOf($theClass);
}

/**
 * Matches if value does not match $value.
 */
function not($value)
{
    return Hamcrest_Core_IsNot::not($value);
}

/**
 * Matches if value is null.
 */
function nullValue()
{
    return Hamcrest_Core_IsNull::nullValue();
}

/**
 * Matches if value is not null.
 */
function notNullValue()
{
    return Hamcrest_Core_IsNull::notNullValue();
}

/**
 * Creates a new instance of IsSame.
 *
 * @param mixed $object
 *   The predicate evaluates to true only when the argument is
 *   this object.
 */
function sameInstance($object)
{
    return Hamcrest_Core_IsSame::sameInstance($object);
}

/**
 * Matches if value (class, object, or array) has named $property.
 */
function set($property)
{
    return Hamcrest_Core_IsSet::set($property);
}

/**
 * Matches if value (class, object, or array) does not have named $property.
 */
function notSet($property)
{
    return Hamcrest_Core_IsSet::notSet($property);
}

/**
 * Is the value a particular built-in type?
 */
function typeOf($theType)
{
    return Hamcrest_Core_IsTypeOf::typeOf($theType);
}

/**
 * Matches if value is a number equal to $value within some range of
 * acceptable error $delta.
 */
function closeTo($value, $delta)
{
    return Hamcrest_Number_IsCloseTo::closeTo($value, $delta);
}

/**
 * The value is not > $value, nor < $value.
 */
function comparesEqualTo($value)
{
    return Hamcrest_Number_OrderingComparison::comparesEqualTo($value);
}

/**
 * The value is > $value.
 */
function greaterThan($value)
{
    return Hamcrest_Number_OrderingComparison::greaterThan($value);
}

/**
 * The value is >= $value.
 */
function greaterThanOrEqualTo($value)
{
    return Hamcrest_Number_OrderingComparison::greaterThanOrEqualTo($value);
}

/**
 * The value is >= $value.
 */
function atLeast($value)
{
    return Hamcrest_Number_OrderingComparison::greaterThanOrEqualTo($value);
}

/**
 * The value is < $value.
 */
function lessThan($value)
{
    return Hamcrest_Number_OrderingComparison::lessThan($value);
}

/**
 * The value is <= $value.
 */
function lessThanOrEqualTo($value)
{
    return Hamcrest_Number_OrderingComparison::lessThanOrEqualTo($value);
}

/**
 * The value is <= $value.
 */
function atMost($value)
{
    return Hamcrest_Number_OrderingComparison::lessThanOrEqualTo($value);
}

/**
 * Matches if value is a zero-length string.
 */
function isEmptyString()
{
    return Hamcrest_Text_IsEmptyString::isEmptyString();
}

/**
 * Matches if value is a zero-length string.
 */
function emptyString()
{
    return Hamcrest_Text_IsEmptyString::isEmptyString();
}

/**
 * Matches if value is null or a zero-length string.
 */
function isEmptyOrNullString()
{
    return Hamcrest_Text_IsEmptyString::isEmptyOrNullString();
}

/**
 * Matches if value is null or a zero-length string.
 */
function nullOrEmptyString()
{
    return Hamcrest_Text_IsEmptyString::isEmptyOrNullString();
}

/**
 * Matches if value is a non-zero-length string.
 */
function isNonEmptyString()
{
    return Hamcrest_Text_IsEmptyString::isNonEmptyString();
}

/**
 * Matches if value is a non-zero-length string.
 */
function nonEmptyString()
{
    return Hamcrest_Text_IsEmptyString::isNonEmptyString();
}

/**
 * Matches if value is a string equal to $string, regardless of the case.
 */
function equalToIgnoringCase($string)
{
    return Hamcrest_Text_IsEqualIgnoringCase::equalToIgnoringCase($string);
}

/**
 * Matches if value is a string equal to $string, regardless of whitespace.
 */
function equalToIgnoringWhiteSpace($string)
{
    return Hamcrest_Text_IsEqualIgnoringWhiteSpace::equalToIgnoringWhiteSpace($string);
}

/**
 * Matches if value is a string that matches regular expression $pattern.
 */
function matchesPattern($pattern)
{
    return Hamcrest_Text_MatchesPattern::matchesPattern($pattern);
}

/**
 * Matches if value is a string that contains $substring.
 */
function containsString($substring)
{
    return Hamcrest_Text_StringContains::containsString($substring);
}

/**
 * Matches if value is a string that contains $substring regardless of the case.
 */
function containsStringIgnoringCase($substring)
{
    return Hamcrest_Text_StringContainsIgnoringCase::containsStringIgnoringCase($substring);
}

/**
 * Matches if value contains $substrings in a constrained order.
 */
function stringContainsInOrder(/* args... */)
{
    $args = func_get_args();
  return call_user_func_array(array('Hamcrest_Text_StringContainsInOrder', 'stringContainsInOrder'), $args);
}

/**
 * Matches if value is a string that ends with $substring.
 */
function endsWith($substring)
{
    return Hamcrest_Text_StringEndsWith::endsWith($substring);
}

/**
 * Matches if value is a string that starts with $substring.
 */
function startsWith($substring)
{
    return Hamcrest_Text_StringStartsWith::startsWith($substring);
}

/**
 * Is the value an array?
 */
function arrayValue()
{
    return Hamcrest_Type_IsArray::arrayValue();
}

/**
 * Is the value a boolean?
 */
function booleanValue()
{
    return Hamcrest_Type_IsBoolean::booleanValue();
}

/**
 * Is the value a boolean?
 */
function boolValue()
{
    return Hamcrest_Type_IsBoolean::booleanValue();
}

/**
 * Is the value callable?
 */
function callableValue()
{
    return Hamcrest_Type_IsCallable::callableValue();
}

/**
 * Is the value a float/double?
 */
function doubleValue()
{
    return Hamcrest_Type_IsDouble::doubleValue();
}

/**
 * Is the value a float/double?
 */
function floatValue()
{
    return Hamcrest_Type_IsDouble::doubleValue();
}

/**
 * Is the value an integer?
 */
function integerValue()
{
    return Hamcrest_Type_IsInteger::integerValue();
}

/**
 * Is the value an integer?
 */
function intValue()
{
    return Hamcrest_Type_IsInteger::integerValue();
}

/**
 * Is the value a numeric?
 */
function numericValue()
{
    return Hamcrest_Type_IsNumeric::numericValue();
}

/**
 * Is the value an object?
 */
function objectValue()
{
    return Hamcrest_Type_IsObject::objectValue();
}

/**
 * Is the value an object?
 */
function anObject()
{
    return Hamcrest_Type_IsObject::objectValue();
}

/**
 * Is the value a resource?
 */
function resourceValue()
{
    return Hamcrest_Type_IsResource::resourceValue();
}

/**
 * Is the value a scalar (boolean, integer, double, or string)?
 */
function scalarValue()
{
    return Hamcrest_Type_IsScalar::scalarValue();
}

/**
 * Is the value a string?
 */
function stringValue()
{
    return Hamcrest_Type_IsString::stringValue();
}

/**
 * Wraps <code>$matcher</code> with {@link Hamcrest_Core_IsEqual)
 * if it's not a matcher and the XPath in <code>count()</code>
 * if it's an integer.
 */
function hasXPath($xpath, $matcher = null)
{
    return Hamcrest_Xml_HasXPath::hasXPath($xpath, $matcher);
}
