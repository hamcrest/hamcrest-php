<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/TypeSafeDiagnosingMatcher.php';
require_once 'Hamcrest/Description.php';
require_once 'Hamcrest/Matcher.php';
require_once 'Hamcrest/Array/MatchingOnce.php';
require_once 'Hamcrest/Core/IsEqual.php';

/**
 * Matches if an array contains a set of items satisfying nested matchers.
 */
class Hamcrest_Array_IsArrayContainingInAnyOrder
  extends Hamcrest_TypeSafeDiagnosingMatcher
{
  
  private $_elementMatchers;
  
  public function __construct(array $elementMatchers)
  {
    parent::__construct(self::TYPE_ARRAY);
    
    $this->_elementMatchers = $elementMatchers;
  }
  
  protected function matchesSafelyWithDiagnosticDescription($array,
    Hamcrest_Description $mismatchDescription)
  {
    $matching = new Hamcrest_Array_MatchingOnce(
      $this->_elementMatchers, $mismatchDescription
    );
    
    foreach ($array as $element)
    {
      if (!$matching->matches($element))
      {
        return false;
      }
    }
    
    return $matching->isFinished($array);
  }
  
  public function describeTo(Hamcrest_Description $description)
  {
    $description->appendList('[', ', ', ']', $this->_elementMatchers)
                ->appendText(' in any order')
                ;
  }
  
  /**
   * An array with elements that match the given matchers.
   *
   * @factory containsInAnyOrder
   */
  public static function arrayContainingInAnyOrder(array $items)
  {
    $matchers = array();
    foreach ($items as $item)
    {
      $matchers[] = ($item instanceof Hamcrest_Matcher)
        ? $item
        : Hamcrest_Core_IsEqual::equalTo($item)
        ;
    }
    
    return new self($matchers);
  }
  
}
