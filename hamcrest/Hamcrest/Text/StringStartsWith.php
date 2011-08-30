<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/Text/SubstringMatcher.php';

/**
 * Tests if the argument is a string that contains a substring.
 */
class Hamcrest_Text_StringStartsWith extends Hamcrest_Text_SubstringMatcher
{
  
  public function __construct($substring)
  {
    parent::__construct($substring);
  }

  /**
   * Matches if value is a string that starts with $substring.
   *
   * @factory
   */
  public static function startsWith($substring)
  {
    return new self($substring);
  }
  
  // -- Protected Methods
  
  protected function evalSubstringOf($string)
  {
    return (substr($string, 0, strlen($this->_substring)) === $this->_substring);
  }
  
  protected function relationship()
  {
    return 'starting with';
  }
  
}
