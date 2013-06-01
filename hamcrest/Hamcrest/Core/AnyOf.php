<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

// require_once 'Hamcrest/Core/ShortcutCombination.php';
// require_once 'Hamcrest/Description.php';
// require_once 'Hamcrest/Util.php';

/**
 * Calculates the logical disjunction of multiple matchers. Evaluation is
 * shortcut, so subsequent matchers are not called if an earlier matcher
 * returns <code>true</code>.
 */
class Hamcrest_Core_AnyOf extends Hamcrest_Core_ShortcutCombination
{
  
  public function __construct(array $matchers)
  {
    parent::__construct($matchers);
  }
  
  public function matches($item)
  {
    return $this->matchesWithShortcut($item, true);
  }
  
  public function describeTo(Hamcrest_Description $description)
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
    return new self(Hamcrest_Util::createMatcherArray($args));
  }
    
  /**
   * Evaluates to false if ANY of the passed in matchers evaluate to true.
   *
   * @factory ...
   */
  public static function noneOf(/* args... */)
    {
    $args = func_get_args();
    return Hamcrest_Core_IsNot::not(
      new self(Hamcrest_Util::createMatcherArray($args))
    );
  }
  
}
