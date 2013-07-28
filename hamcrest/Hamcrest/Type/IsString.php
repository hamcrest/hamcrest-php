<?php
namespace Hamcrest\Type;

/*
 Copyright (c) 2010 hamcrest.org
 */

/**
 * Tests whether the value is a string.
 */
class IsString extends \Hamcrest\Core\IsTypeOf
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
