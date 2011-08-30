<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/BaseMatcher.php';
require_once 'Hamcrest/Description.php';

/**
 * Is the value the same object as another value?
 * In PHP terms, does $a === $b?
 */
class Hamcrest_Core_IsSame extends Hamcrest_BaseMatcher
{
  
  private $_object;
  
  public function __construct($object)
  {
    $this->_object = $object;
  }
  
  public function matches($object)
  {
    return ($object === $this->_object) && ($this->_object === $object);
  }
  
  public function describeTo(Hamcrest_Description $description)
  {
    $description->appendText('sameInstance(')
                ->appendValue($this->_object)
                ->appendText(')')
                ;
  }
  
  /**
   * Creates a new instance of IsSame.
   *
   * @param mixed $object
   *   The predicate evaluates to true only when the argument is
   *   this object.
   *
   * @factory
   */
  public static function sameInstance($object)
  {
    return new self($object);
  }
  
}
