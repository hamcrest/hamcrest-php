<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/TypeSafeMatcher.php';
require_once 'Hamcrest/Description.php';

// NOTE: This class is not exactly a direct port of Java's since Java handles
//       arrays quite differently than PHP

// TODO: Allow this to take matchers or values within the array

/**
 * Matcher for array whose elements satisfy a sequence of matchers.
 * The array size must equal the number of element matchers.
 */
class Hamcrest_Array_IsArray extends Hamcrest_TypeSafeMatcher
{
  
  private $_elementMatchers;
  
  public function __construct(array $elementMatchers)
  {
    parent::__construct(self::TYPE_ARRAY);
    
    $this->_elementMatchers = $elementMatchers;
  }
  
  protected function matchesSafely($array)
  {
    if (array_keys($array) != array_keys($this->_elementMatchers))
    {
      return false;
    }
    
    foreach ($this->_elementMatchers as $k => $matcher)
    {
      if (!$matcher->matches($array[$k]))
      {
        return false;
      }
    }
    
    return true;
  }
  
  protected function describeMismatchSafely($actual,
    Hamcrest_Description $mismatchDescription)
  {
    if (count($actual) != count($this->_elementMatchers))
    {
      $mismatchDescription->appendText('array length was ' . count($actual));
      return;
    }
    elseif (array_keys($actual) != array_keys($this->_elementMatchers))
    {
      $mismatchDescription->appendText('array keys were ')
                          ->appendValueList(
                            $this->descriptionStart(),
                            $this->descriptionSeparator(),
                            $this->descriptionEnd(),
                            array_keys($actual)
                            )
                          ;
      return;
    }
    
    foreach ($this->_elementMatchers as $k => $matcher)
    {
      if (!$matcher->matches($actual[$k]))
      {
        $mismatchDescription->appendText('element ')->appendValue($k)
                            ->appendText(' was ')->appendValue($actual[$k])
                            ;
        return;
      }
    }
  }
  
  public function describeTo(Hamcrest_Description $description)
  {
    $description->appendList(
      $this->descriptionStart(),
      $this->descriptionSeparator(),
      $this->descriptionEnd(),
      $this->_elementMatchers
    );
  }
  
  /**
   * Evaluates to true only if each $matcher[$i] is satisfied by $array[$i].
   *
   * @factory
   */
  public static function anArray($array)
  {
    return new self($array);
  }
  
  // -- Protected Methods
  
  protected function descriptionStart()
  {
    return '[';
  }
  
  protected function descriptionSeparator()
  {
    return ', ';
  }
  
  protected function descriptionEnd()
  {
    return ']';
  }
  
}
