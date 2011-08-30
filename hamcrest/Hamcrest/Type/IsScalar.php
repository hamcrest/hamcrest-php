<?php

/*
 Copyright (c) 2010 hamcrest.org
 */

require_once 'Hamcrest/Core/IsTypeOf.php';

/**
 * Tests whether the value is a scalar (boolean, integer, double, or string).
 */
class Hamcrest_Type_IsScalar extends Hamcrest_Core_IsTypeOf
{

  public function __construct() {
    parent::__construct('scalar');
  }

  public function matches($item)
  {
    return is_scalar($item);
  }
  
  /**
   * Is the value a scalar (boolean, integer, double, or string)?
   *
   * @factory
   */
  public static function scalarValue()
  {
    return new self;
  }
  
}
