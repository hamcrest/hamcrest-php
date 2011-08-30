<?php

/*
 Copyright (c) 2010 hamcrest.org
 */

require_once 'Hamcrest/Text/SubstringMatcher.php';

/**
 * Tests if the argument is a string that matches a regular expression.
 */
class Hamcrest_Text_MatchesPattern extends Hamcrest_Text_SubstringMatcher
{
  
  public function __construct($pattern)
  {
    parent::__construct($pattern);
  }

  /**
   * Matches if value is a string that matches regular expression $pattern.
   *
   * @factory
   */
  public static function matchesPattern($pattern)
  {
    return new self($pattern);
  }
  
  // -- Protected Methods
  
  protected function evalSubstringOf($item)
  {
    return preg_match($this->_substring, (string) $item) >= 1;
  }
  
  protected function relationship()
  {
    return 'matching';
  }
  
}
