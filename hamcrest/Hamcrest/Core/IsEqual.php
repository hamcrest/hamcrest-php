<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/BaseMatcher.php';
require_once 'Hamcrest/Description.php';

/**
 * Is the value equal to another value, as tested by the use of the "=="
 * comparison operator?
 */
class Hamcrest_Core_IsEqual extends Hamcrest_BaseMatcher
{
  
  private $_item;
  
  public function __construct($item)
  {
    $this->_item = $item;
  }
  
  public function matches($arg)
  {
    return (($arg == $this->_item) && ($this->_item == $arg));
  }
  
  public function describeTo(Hamcrest_Description $description)
  {
    $description->appendValue($this->_item);
  }

  /**
   * Is the value equal to another value, as tested by the use of the "=="
   * comparison operator?
   *
   * @factory
   */
  public static function equalTo($item)
  {
    return new self($item);
  }
  
}
