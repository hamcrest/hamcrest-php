<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/BaseMatcher.php';
require_once 'Hamcrest/Description.php';

/**
 * A matcher that always returns <code>true</code>.
 */
class Hamcrest_Core_IsAnything extends Hamcrest_BaseMatcher
{
  
  private $_message;
  
  public function __construct($message = 'ANYTHING')
  {
    $this->_message = $message;
  }
  
  public function matches($item)
  {
    return true;
  }
  
  public function describeTo(Hamcrest_Description $description)
  {
    $description->appendText($this->_message);
  }
  
  /**
   * This matcher always evaluates to true.
   *
   * @param string $description A meaningful string used when describing itself.
   *
   * @factory
   */
  public static function anything($description = 'ANYTHING')
  {
    return new self($description);
  }
  
}
