<?php
namespace Hamcrest\Core;

/*
 Copyright (c) 2009 hamcrest.org
 */

/**
 * Calculates the logical negation of a matcher.
 */
class IsNot extends \Hamcrest\BaseMatcher
{

  private $_matcher;

  public function __construct(\Hamcrest\Matcher $matcher)
  {
    $this->_matcher = $matcher;
  }

  public function matches($arg)
  {
    return !$this->_matcher->matches($arg);
  }

  public function describeTo(\Hamcrest\Description $description)
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
    return new self(\Hamcrest\Util::wrapValueWithIsEqual($value));
  }

}
