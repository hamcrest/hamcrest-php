<?php

/*
 Copyright (c) 2010 hamcrest.org
 */

require_once 'Hamcrest/Core/IsTypeOf.php';

/**
 * Tests whether the value is an object.
 */
class Hamcrest_Type_IsObject extends Hamcrest_Core_IsTypeOf
{
  
  /**
   * Creates a new instance of IsObject
   */
  public function __construct()
  {
    parent::__construct('object');
  }
  
  /**
   * Is the value an object?
   *
   * @factory anObject
   */
  public static function objectValue()
  {
    return new self;
  }
  
}
