<?php

/*
 Copyright (c) 2010 hamcrest.org
 */

require_once 'Hamcrest/Core/IsTypeOf.php';

/**
 * Tests whether the value is a boolean.
 */
class Hamcrest_Type_IsBoolean extends Hamcrest_Core_IsTypeOf
{
  
  /**
   * Creates a new instance of IsBoolean
   */
  public function __construct()
  {
    parent::__construct('boolean');
  }
  
  /**
   * Is the value a boolean?
   *
   * @factory boolValue
   */
  public static function booleanValue()
  {
    return new self;
  }
  
}
