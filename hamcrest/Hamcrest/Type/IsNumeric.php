<?php
namespace Hamcrest\Type;

/*
 Copyright (c) 2010 hamcrest.org
 */

/**
 * Tests whether the value is numeric.
 */
class IsNumeric extends \Hamcrest\Core\IsTypeOf
{

  public function __construct()
  {
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
