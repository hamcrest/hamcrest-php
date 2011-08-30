<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/Core/IsSame.php';
require_once 'Hamcrest/Description.php';

/**
 * The same as {@link Hamcrest_Core_IsSame} but with slightly different
 * semantics.
 */
class Hamcrest_Core_IsIdentical extends Hamcrest_Core_IsSame
{
  
  private $_value;
  
  public function __construct($value)
  {
    parent::__construct($value);
    $this->_value = $value;
  }
  
  public function describeTo(Hamcrest_Description $description)
  {
    $description->appendValue($this->_value);
  }
  
  /**
   * Tests of the value is identical to $value as tested by the "===" operator.
   *
   * @factory
   */
  public static function identicalTo($value)
  {
    return new self($value);
  }
  
}
