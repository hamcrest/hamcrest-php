<?php
namespace Hamcrest\Type;

/*
 Copyright (c) 2010 hamcrest.org
 */

/**
 * Tests whether the value is an integer.
 */
class IsInteger extends \Hamcrest\Core\IsTypeOf
{

  /**
   * Creates a new instance of IsInteger
   */
  public function __construct()
  {
    parent::__construct('integer');
  }

  /**
   * Is the value an integer?
   *
   * @factory intValue
   */
  public static function integerValue()
  {
    return new self;
  }

}
