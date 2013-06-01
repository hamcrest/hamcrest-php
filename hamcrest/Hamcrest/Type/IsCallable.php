<?php

/*
 Copyright (c) 2010 hamcrest.org
 */

// require_once 'Hamcrest/Core/IsTypeOf.php';

/**
 * Tests whether the value is callable.
 */
class Hamcrest_Type_IsCallable extends Hamcrest_Core_IsTypeOf
{

  /**
   * Creates a new instance of IsCallable
   */
  public function __construct()
  {
    parent::__construct('callable');
  }

  public function matches($item)
  {
    return is_callable($item);
  }
  
  /**
   * Is the value callable?
   *
   * @factory
   */
  public static function callableValue()
  {
    return new self;
  }
  
}
