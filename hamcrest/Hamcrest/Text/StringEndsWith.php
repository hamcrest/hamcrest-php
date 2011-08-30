<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/Text/SubstringMatcher.php';

/**
 * Tests if the argument is a string that ends with a substring.
 */
class Hamcrest_Text_StringEndsWith extends Hamcrest_Text_SubstringMatcher
{
  
  public function __construct($substring)
  {
    parent::__construct($substring);
  }

  /**
   * Matches if value is a string that ends with $substring.
   *
   * @factory
   */
  public static function endsWith($substring)
  {
    return new self($substring);
  }
  
  // -- Protected Methods
  
  protected function evalSubstringOf($string)
  {
    return (substr($string, (-1 * strlen($this->_substring))) === $this->_substring);
  }
  
  protected function relationship()
  {
    return 'ending with';
  }
  
}
