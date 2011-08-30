<?php

/*
 Copyright (c) 2010 hamcrest.org
 */

require_once 'Hamcrest/Core/IsTypeOf.php';

/**
 * Tests whether the value is an integer.
 */
class Hamcrest_Type_IsInteger extends Hamcrest_Core_IsTypeOf
{
  
  /**
   * Creates a new instance of IsInteger
   */
  public function __construct()
  {
    parent::__construct('integer');
  }
  
  /**
   * Is the value an integer?
   *
   * @factory intValue
   */
  public static function integerValue()
  {
    return new self;
  }
  
}
