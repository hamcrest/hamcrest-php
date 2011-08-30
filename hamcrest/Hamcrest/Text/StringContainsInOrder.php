<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/TypeSafeMatcher.php';
require_once 'Hamcrest/Description.php';

/**
 * Tests if the value contains a series of substrings in a constrained order.
 */
class Hamcrest_Text_StringContainsInOrder extends Hamcrest_TypeSafeMatcher
{
  
  private $_substrings;
  
  public function __construct(array $substrings)
  {
    parent::__construct(self::TYPE_STRING);
    
    $this->_substrings = $substrings;
  }
  
  protected function matchesSafely($item)
  {
    $fromIndex = 0;
    
    foreach ($this->_substrings as $substring)
    {
      if (false === $fromIndex = strpos($item, $substring, $fromIndex))
      {
        return false;
      }
    }
    
    return true;
  }
  
  protected function describeMismatchSafely($item,
    Hamcrest_Description $mismatchDescription)
  {
    $mismatchDescription->appendText('was ')->appendText($item);
  }
  
  public function describeTo(Hamcrest_Description $description)
  {
    $description->appendText('a string containing ')
                ->appendValueList('', ', ', '', $this->_substrings)
                ->appendText(' in order')
                ;
  }

  /**
   * Matches if value contains $substrings in a constrained order.
   *
   * @factory
   */
  public static function stringContainsInOrder(array $substrings)
  {
    return new self($substrings);
  }
  
}
