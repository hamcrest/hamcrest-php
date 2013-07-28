<?php
namespace Hamcrest\Core;

/*
 Copyright (c) 2009 hamcrest.org
 */

/**
 * A matcher that always returns <code>true</code>.
 */
class IsAnything extends \Hamcrest\BaseMatcher
{

  private $_message;

  public function __construct($message = 'ANYTHING')
  {
    $this->_message = $message;
  }

  public function matches($item)
  {
    return true;
  }

  public function describeTo(\Hamcrest\Description $description)
  {
    $description->appendText($this->_message);
  }

  /**
   * This matcher always evaluates to true.
   *
   * @param string $description A meaningful string used when describing itself.
   *
   * @factory
   */
  public static function anything($description = 'ANYTHING')
  {
    return new self($description);
  }

}
