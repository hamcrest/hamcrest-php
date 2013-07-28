<?php
namespace Hamcrest\Core;

/*
 Copyright (c) 2009 hamcrest.org
 */

/**
 * Calculates the logical disjunction of multiple matchers. Evaluation is
 * shortcut, so subsequent matchers are not called if an earlier matcher
 * returns <code>true</code>.
 */
class AnyOf extends ShortcutCombination
{

  public function __construct(array $matchers)
  {
    parent::__construct($matchers);
  }

  public function matches($item)
  {
    return $this->matchesWithShortcut($item, true);
  }

  public function describeTo(\Hamcrest\Description $description)
  {
    return $this->describeToWithOperator($description, 'or');
  }

  /**
   * Evaluates to true if ANY of the passed in matchers evaluate to true.
   *
   * @factory ...
   */
  public static function anyOf(/* args... */)
  {
    $args = func_get_args();

    return new self(\Hamcrest\Util::createMatcherArray($args));
  }

  /**
   * Evaluates to false if ANY of the passed in matchers evaluate to true.
   *
   * @factory ...
   */
  public static function noneOf(/* args... */)
    {
    $args = func_get_args();

    return IsNot::not(
      new self(\Hamcrest\Util::createMatcherArray($args))
    );
  }

}
