<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/BaseMatcher.php';

/**
 * Matches if traversable is empty.
 */
class Hamcrest_Collection_IsEmptyTraversable extends Hamcrest_BaseMatcher
{
  
  public function __construct()
  {
    // nothing to do
  }
  
  public function matches($item)
  {
    if (!$item instanceof Traversable)
    {
      return false;
    }

    foreach ($item as $value)
    {
      return false;
    }

    return true;
  }

  public function describeTo(Hamcrest_Description $description)
  {
    $description->appendText('an empty traversable');
  }
  
  /**
   * Is traversable empty?
   * 
   * @factory
   */
  public static function emptyTraversable()
  {
    return new self;
  }
  
}
