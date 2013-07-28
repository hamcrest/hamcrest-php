<?php
namespace Hamcrest\Type;

/*
 Copyright (c) 2010 hamcrest.org
 */

/**
 * Tests whether the value is a resource.
 */
class IsResource extends \Hamcrest\Core\IsTypeOf
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
