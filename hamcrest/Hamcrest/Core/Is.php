<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/BaseMatcher.php';
require_once 'Hamcrest/Matcher.php';
require_once 'Hamcrest/Description.php';
require_once 'Hamcrest/Core/IsEqual.php';

/**
 * Decorates another Matcher, retaining the behavior but allowing tests
 * to be slightly more expressive.
 *
 * For example:  assertThat($cheese, equalTo($smelly))
 *          vs.  assertThat($cheese, is(equalTo($smelly)))
 */
class Hamcrest_Core_Is extends Hamcrest_BaseMatcher
{
  
  private $_matcher;
  
  public function __construct(Hamcrest_Matcher $matcher)
  {
    $this->_matcher = $matcher;
  }
  
  public function matches($arg)
  {
    return $this->_matcher->matches($arg);
  }
  
  public function describeTo(Hamcrest_Description $description)
  {
    $description->appendText('is ')->appendDescriptionOf($this->_matcher);
  }
  
  public function describeMismatch($item,
    Hamcrest_Description $mismatchDescription)
  {
    $this->_matcher->describeMismatch($item, $mismatchDescription);
  }

  /**
   * Decorates another Matcher, retaining the behavior but allowing tests
   * to be slightly more expressive.
   *
   * For example:  assertThat($cheese, equalTo($smelly))
   *          vs.  assertThat($cheese, is(equalTo($smelly)))
   *
   * @factory
   */
  public static function is($value)
  {
    $matcher = ($value instanceof Hamcrest_Matcher)
      ? $value
      : Hamcrest_Core_IsEqual::equalTo($value)
      ;
    return new self($matcher);
  }
  
}
