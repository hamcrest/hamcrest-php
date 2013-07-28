<?php
namespace Hamcrest\Core;

/*
 Copyright (c) 2009 hamcrest.org
 */

class CombinableMatcher extends \Hamcrest\BaseMatcher
{

  private $_matcher;

  public function __construct(\Hamcrest\Matcher $matcher)
  {
    $this->_matcher = $matcher;
  }

  public function matches($item)
  {
    return $this->_matcher->matches($item);
  }

  public function describeTo(\Hamcrest\Description $description)
  {
    $description->appendDescriptionOf($this->_matcher);
  }

  /** Diversion from Hamcrest-Java... Logical "and" not permitted */
  public function andAlso(\Hamcrest\Matcher $other)
  {
    return new self(new AllOf($this->_templatedListWith($other)));
  }

  /** Diversion from Hamcrest-Java... Logical "or" not permitted */
  public function orElse(\Hamcrest\Matcher $other)
  {
    return new self(new AnyOf($this->_templatedListWith($other)));
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
  public static function both(\Hamcrest\Matcher $matcher)
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
  public static function either(\Hamcrest\Matcher $matcher)
  {
    return new self($matcher);
  }

  // -- Private Methods

  private function _templatedListWith(\Hamcrest\Matcher $other)
  {
    return array($this->_matcher, $other);
  }

}
