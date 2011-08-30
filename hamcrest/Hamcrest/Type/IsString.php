<?php

/*
 Copyright (c) 2010 hamcrest.org
 */

require_once 'Hamcrest/Core/IsTypeOf.php';

/**
 * Tests whether the value is a string.
 */
class Hamcrest_Type_IsString extends Hamcrest_Core_IsTypeOf
{
  
  /**
   * Creates a new instance of IsString
   */
  public function __construct()
  {
    parent::__construct('string');
  }
  
  /**
   * Is the value a string?
   *
   * @factory
   */
  public static function stringValue()
  {
    return new self;
  }
  
}
