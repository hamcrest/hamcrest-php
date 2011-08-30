<?php

/*
 Copyright (c) 2010 hamcrest.org
 */

require_once 'Hamcrest/Text/SubstringMatcher.php';

/**
 * Tests if the argument is a string that contains a substring ignoring case.
 */
class Hamcrest_Text_StringContainsIgnoringCase extends Hamcrest_Text_SubstringMatcher
{

  public function __construct($substring)
  {
    parent::__construct($substring);
  }

  /**
   * Matches if value is a string that contains $substring regardless of the case.
   *
   * @factory
   */
  public static function containsStringIgnoringCase($substring)
  {
    return new self($substring);
  }
  
  // -- Protected Methods
  
  protected function evalSubstringOf($item)
  {
    return (false !== stripos((string) $item, $this->_substring));
  }
  
  protected function relationship()
  {
    return 'containing in any case';
  }
  
}
