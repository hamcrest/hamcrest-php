<?php

/*
 Copyright (c) 2010 hamcrest.org
 */

require_once 'Hamcrest/Core/IsTypeOf.php';

/**
 * Tests whether the value is a float/double.
 *
 * PHP returns "double" for values of type "float".
 */
class Hamcrest_Type_IsDouble extends Hamcrest_Core_IsTypeOf
{
  
  /**
   * Creates a new instance of IsDouble
   */
  public function __construct()
  {
    parent::__construct('double');
  }
  
  /**
   * Is the value a float/double?
   *
   * @factory floatValue
   */
  public static function doubleValue()
  {
    return new self;
  }
  
}
