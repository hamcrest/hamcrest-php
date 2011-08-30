<?php

/*
 Copyright (c) 2010 hamcrest.org
 */

require_once 'Hamcrest/Core/IsTypeOf.php';

/**
 * Tests whether the value is a resource.
 */
class Hamcrest_Type_IsResource extends Hamcrest_Core_IsTypeOf
{
  
  /**
   * Creates a new instance of IsResource
   */
  public function __construct()
  {
    parent::__construct('resource');
  }
  
  /**
   * Is the value a resource?
   *
   * @factory
   */
  public static function resourceValue()
  {
    return new self;
  }
  
}
