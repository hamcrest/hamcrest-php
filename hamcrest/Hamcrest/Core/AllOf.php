<?php
namespace Hamcrest\Core;

/*
 Copyright (c) 2009 hamcrest.org
 */

/**
 * Calculates the logical conjunction of multiple matchers. Evaluation is
 * shortcut, so subsequent matchers are not called if an earlier matcher
 * returns <code>false</code>.
 */
class AllOf extends \Hamcrest\DiagnosingMatcher
{

  private $_matchers;

  public function __construct(array $matchers)
  {
    \Hamcrest\Util::checkAllAreMatchers($matchers);

    $this->_matchers = $matchers;
  }

  public function matchesWithDiagnosticDescription($item,
    \Hamcrest\Description $mismatchDescription)
  {
    foreach ($this->_matchers as $matcher) {
      if (!$matcher->matches($item)) {
        $mismatchDescription->appendDescriptionOf($matcher)->appendText(' ');
        $matcher->describeMismatch($item, $mismatchDescription);

        return false;
      }
    }

    return true;
  }

  public function describeTo(\Hamcrest\Description $description)
  {
    $description->appendList('(', ' and ', ')', $this->_matchers);
  }

  /**
   * Evaluates to true only if ALL of the passed in matchers evaluate to true.
   *
   * @factory ...
   */
  public static function allOf(/* args... */)
  {
    $args = func_get_args();

    return new self(\Hamcrest\Util::createMatcherArray($args));
  }

}
