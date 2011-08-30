<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/Text/SubstringMatcher.php';

/**
 * Tests if the argument is a string that contains a substring.
 */
class Hamcrest_Text_StringContains extends Hamcrest_Text_SubstringMatcher
{

  public function __construct($substring)
  {
    parent::__construct($substring);
  }

  public function ignoringCase()
  {
    return new Hamcrest_Text_StringContainsIgnoringCase($this->_substring);
  }

  /**
   * Matches if value is a string that contains $substring.
   *
   * @factory
   */
  public static function containsString($substring)
  {
    return new self($substring);
  }
  
  // -- Protected Methods
  
  protected function evalSubstringOf($item)
  {
    return (false !== strpos((string) $item, $this->_substring));
  }
  
  protected function relationship()
  {
    return 'containing';
  }
  
}
