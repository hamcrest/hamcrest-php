<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/BaseMatcher.php';
require_once 'Hamcrest/Description.php';
require_once 'Hamcrest/Matcher.php';
require_once 'Hamcrest/Core/AllOf.php';
require_once 'Hamcrest/Core/AnyOf.php';

class Hamcrest_Core_CombinableMatcher extends Hamcrest_BaseMatcher
{
  
  private $_matcher;
  
  public function __construct(Hamcrest_Matcher $matcher)
  {
    $this->_matcher = $matcher;
  }
  
  public function matches($item)
  {
    return $this->_matcher->matches($item);
  }
  
  public function describeTo(Hamcrest_Description $description)
  {
    $description->appendDescriptionOf($this->_matcher);
  }
  
  /** Diversion from Hamcrest-Java... Logical "and" not permitted */
  public function andAlso(Hamcrest_Matcher $other)
  {
    return new self(new Hamcrest_Core_AllOf($this->_templatedListWith($other)));
  }
  
  /** Diversion from Hamcrest-Java... Logical "or" not permitted */
  public function orElse(Hamcrest_Matcher $other)
  {
    return new self(new Hamcrest_Core_AnyOf($this->_templatedListWith($other)));
  }
  
  /**
   * This is useful for fluently combining matchers that must both pass.
   * For example:
   * <pre>
   *   assertThat($string, both(containsString("a"))->andAlso(containsString("b")));
   * </pre>
   *
   * @factory
   */
  public static function both(Hamcrest_Matcher $matcher)
  {
    return new self($matcher);
  }
  
  /**
   * This is useful for fluently combining matchers where either may pass,
   * for example:
   * <pre>
   *   assertThat($string, either(containsString("a"))->orElse(containsString("b")));
   * </pre>
   *
   * @factory
   */
  public static function either(Hamcrest_Matcher $matcher)
  {
    return new self($matcher);
  }
  
  // -- Private Methods
  
  private function _templatedListWith(Hamcrest_Matcher $other)
  {
    return array($this->_matcher, $other);
  }
  
}
