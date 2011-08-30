<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/TypeSafeMatcher.php';
require_once 'Hamcrest/Description.php';

abstract class Hamcrest_Text_SubstringMatcher extends Hamcrest_TypeSafeMatcher
{
  
  protected $_substring;
  
  public function __construct($substring)
  {
    parent::__construct(self::TYPE_STRING);
    
    $this->_substring = $substring;
  }
  
  protected function matchesSafely($item)
  {
    return $this->evalSubstringOf($item);
  }
  
  protected function describeMismatchSafely($item,
    Hamcrest_Description $mismatchDescription)
  {
    $mismatchDescription->appendText('was "')->appendText($item)->appendText('"');
  }
  
  public function describeTo(Hamcrest_Description $description)
  {
    $description->appendText('a string ')
                ->appendText($this->relationship())
                ->appendText(' ')
                ->appendValue($this->_substring)
                ;
  }
  
  abstract protected function evalSubstringOf($string);
  
  abstract protected function relationship();
  
}
