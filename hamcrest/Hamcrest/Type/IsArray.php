<?php

/*
 Copyright (c) 2010 hamcrest.org
 */

require_once 'Hamcrest/Core/IsTypeOf.php';

/**
 * Tests whether the value is an array.
 */
class Hamcrest_Type_IsArray extends Hamcrest_Core_IsTypeOf
{
  
  /**
   * Creates a new instance of IsArray
   */
  public function __construct()
  {
    parent::__construct('array');
  }
  
  /**
   * Is the value an array?
   *
   * @factory
   */
  public static function arrayValue()
  {
    return new self;
  }
  
}
