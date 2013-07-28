<?php
namespace Hamcrest\Type;

/*
 Copyright (c) 2010 hamcrest.org
 */

/**
 * Tests whether the value is a boolean.
 */
class IsBoolean extends \Hamcrest\Core\IsTypeOf
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
