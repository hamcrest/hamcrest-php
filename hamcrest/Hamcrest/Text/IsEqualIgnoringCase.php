<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/TypeSafeMatcher.php';
require_once 'Hamcrest/Description.php';

/**
 * Tests if a string is equal to another string, regardless of the case.
 */
class Hamcrest_Text_IsEqualIgnoringCase extends Hamcrest_TypeSafeMatcher
{
  
  private $_string;
  
  public function __construct($string)
  {
    parent::__construct(self::TYPE_STRING);
    
    $this->_string = $string;
  }
  
  protected function matchesSafely($item)
  {
    return strtolower($this->_string) === strtolower($item);
  }
  
  protected function describeMismatchSafely($item,
    Hamcrest_Description $mismatchDescription)
  {
    $mismatchDescription->appendText('was ')->appendText($item);
  }
  
  public function describeTo(Hamcrest_Description $description)
  {
    $description->appendText('equalToIgnoringCase(')
                ->appendValue($this->_string)
                ->appendText(')')
                ;
  }
  
  /**
   * Matches if value is a string equal to $string, regardless of the case.
   *
   * @factory
   */
  public static function equalToIgnoringCase($string)
  {
    return new self($string);
  }
  
}
