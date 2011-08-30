<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/TypeSafeMatcher.php';
require_once 'Hamcrest/Matcher.php';
require_once 'Hamcrest/Description.php';
require_once 'Hamcrest/Core/AllOf.php';
require_once 'Hamcrest/Core/IsEqual.php';

/**
 * Tests if an array contains values that match one or more Matchers.
 */
class Hamcrest_Core_IsCollectionContaining extends Hamcrest_TypeSafeMatcher
{
  
  private $_elementMatcher;
  
  public function __construct(Hamcrest_Matcher $elementMatcher)
  {
    parent::__construct(self::TYPE_ARRAY);
    
    $this->_elementMatcher = $elementMatcher;
  }
  
  protected function matchesSafely($items)
  {
    foreach ($items as $item)
    {
      if ($this->_elementMatcher->matches($item))
      {
        return true;
      }
    }
    
    return false;
  }
  
  protected function describeMismatchSafely($items,
    Hamcrest_Description $mismatchDescription)
  {
    $mismatchDescription->appendText('was ')->appendValue($items);
  }
  
  public function describeTo(Hamcrest_Description $description)
  {
    $description
        ->appendText('a collection containing ')
        ->appendDescriptionOf($this->_elementMatcher)
        ;
  }
  
  /**
   * Test if the value is an array containing this matcher.
   * 
   * Example:
   * <pre>
   * assertThat(array('a', 'b'), hasItem(equalTo('b')));
   * //Convenience defaults to equalTo()
   * assertThat(array('a', 'b'), hasItem('b'));
   * </pre>
   *
   * @factory ...
   */
  public static function hasItem()
  {
    $args = func_get_args();
    $firstArg = array_shift($args);
    
    if (!($firstArg instanceof Hamcrest_Matcher))
    {
      $matcher = Hamcrest_Core_IsEqual::equalTo($firstArg);
    }
    else
    {
      $matcher = $firstArg;
    }
    
    return new self($matcher);
  }
  
  /**
   * Test if the value is an array containing elements that match all of these
   * matchers.
   * 
   * Example:
   * <pre>
   * assertThat(array('a', 'b', 'c'), hasItems(equalTo('a'), equalTo('b')));
   * </pre>
   *
   * @factory ...
   */
  public static function hasItems()
  {
    $args = func_get_args();
    $matchers = array();
    
    foreach ($args as $arg)
    {
      $matchers[] = self::hasItem($arg);
    }
    
    return Hamcrest_Core_AllOf::allOf($matchers);
  }
  
}
