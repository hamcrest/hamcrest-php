<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/DiagnosingMatcher.php';
require_once 'Hamcrest/Matcher.php';
require_once 'Hamcrest/Description.php';

/**
 * Calculates the logical conjunction of multiple matchers. Evaluation is
 * shortcut, so subsequent matchers are not called if an earlier matcher
 * returns <code>false</code>.
 */
class Hamcrest_Core_AllOf extends Hamcrest_DiagnosingMatcher
{
  
  private $_matchers = array();
  
  public function __construct(array $matchers)
  {
    foreach ($matchers as $m)
    {
      if (!($m instanceof Hamcrest_Matcher))
      {
        throw new InvalidArgumentException();
      }
    }
    
    $this->_matchers = $matchers;
  }
  
  public function matchesWithDiagnosticDescription($item,
    Hamcrest_Description $mismatchDescription)
  {
    foreach ($this->_matchers as $matcher)
    {
      if (!$matcher->matches($item))
      {
        $mismatchDescription->appendDescriptionOf($matcher)->appendText(' ');
        $matcher->describeMismatch($item, $mismatchDescription);
        
        return false;
      }
    }
    
    return true;
  }
  
  public function describeTo(Hamcrest_Description $description)
  {
    $description->appendList('(', ' and ', ')', $this->_matchers);
  }
  
  /**
   * Evaluates to true only if ALL of the passed in matchers evaluate to true.
   *
   * @factory ...
   */
  public static function allOf()
  {
    $args = func_get_args();
    
    //If array of matchers passed
    if (isset($args[0]) && is_array($args[0]))
    {
      return new self($args[0]);
    }
    else //variable number of matcher args passed
    {
      return new self($args);
    }
  }
  
}
