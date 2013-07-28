<?php
namespace Hamcrest\Type;

/*
 Copyright (c) 2010 hamcrest.org
 */

/**
 * Tests whether the value is a scalar (boolean, integer, double, or string).
 */
class IsScalar extends \Hamcrest\Core\IsTypeOf
{

  public function __construct()
  {
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
