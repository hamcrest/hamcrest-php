<?php

/*
 Copyright (c) 2010 hamcrest.org
 */

require_once 'Hamcrest/Core/IsTypeOf.php';

/**
 * Tests whether the value is numeric.
 */
class Hamcrest_Type_IsNumeric extends Hamcrest_Core_IsTypeOf
{

  public function __construct() {
    parent::__construct('number');
  }

  public function matches($item)
  {
    return is_numeric($item);
  }
  
  /**
   * Is the value a numeric?
   *
   * @factory
   */
  public static function numericValue()
  {
    return new self;
  }
  
}
