<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/TypeSafeMatcher.php';
require_once 'Hamcrest/Description.php';
require_once 'Hamcrest/Matcher.php';
require_once 'Hamcrest/Core/IsEqual.php';

/**
 * Matches if an array contains the specified key.
 */
class Hamcrest_Array_IsArrayContainingKey extends Hamcrest_TypeSafeMatcher
{
  
  private $_keyMatcher;
  
  public function __construct(Hamcrest_Matcher $keyMatcher)
  {
    parent::__construct(self::TYPE_ARRAY);
    
    $this->_keyMatcher = $keyMatcher;
  }
  
  protected function matchesSafely($array)
  {
    foreach ($array as $key => $element)
    {
      if ($this->_keyMatcher->matches($key))
      {
        return true;
      }
    }
    
    return false;
  }
  
  protected function describeMismatchSafely($array,
    Hamcrest_Description $mismatchDescription)
  {
    //Not using appendValueList() so that keys can be shown
    $mismatchDescription->appendText('array was ')
                        ->appendText('[')
                        ;
    $loop = false;
    foreach ($array as $key => $value)
    {
      if ($loop)
      {
        $mismatchDescription->appendText(', ');
      }
      $mismatchDescription->appendValue($key)->appendText(' => ')->appendValue($value);
      $loop = true;
    }
    $mismatchDescription->appendText(']');
  }
  
  public function describeTo(Hamcrest_Description $description)
  {
    $description
         ->appendText('array with key ')
         ->appendDescriptionOf($this->_keyMatcher)
         ;
  }
  
  /**
   * Evaluates to true if any key in an array matches the given matcher.
   * 
   * @param mixed $key as a {@link Hamcrest_Matcher} or a value.
   *
   * @factory hasKey
   */
  public static function hasKeyInArray($key)
  {
    $matcher = ($key instanceof Hamcrest_Matcher)
      ? $key
      : Hamcrest_Core_IsEqual::equalTo($key)
      ;
    
    return new self($matcher);
  }
  
}
