<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/BaseMatcher.php';
require_once 'Hamcrest/Matcher.php';
require_once 'Hamcrest/Description.php';
require_once 'Hamcrest/Core/IsEqual.php';

/**
 * Calculates the logical negation of a matcher.
 */
class Hamcrest_Core_IsNot extends Hamcrest_BaseMatcher
{
  
  private $_matcher;
  
  public function __construct(Hamcrest_Matcher $matcher)
  {
    $this->_matcher = $matcher;
  }
  
  public function matches($arg)
  {
    return !$this->_matcher->matches($arg);
  }
  
  public function describeTo(Hamcrest_Description $description)
  {
    $description->appendText('not ')->appendDescriptionOf($this->_matcher);
  }

  /**
   * Matches if value does not match $value.
   *
   * @factory
   */
  public static function not($value)
  {
    $matcher = ($value instanceof Hamcrest_Matcher)
      ? $value
      : Hamcrest_Core_IsEqual::equalTo($value)
      ;
    return new self($matcher);
  }
  
}
