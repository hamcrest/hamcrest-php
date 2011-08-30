<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/BaseMatcher.php';
require_once 'Hamcrest/Description.php';
require_once 'Hamcrest/Core/AnyOf.php';
require_once 'Hamcrest/Core/IsNull.php';

/**
 * Matches empty Strings (and null).
 */
class Hamcrest_Text_IsEmptyString extends Hamcrest_BaseMatcher
{
  
  private static $_INSTANCE;
  private static $_NULL_OR_EMPTY_INSTANCE;
  
  public function matches($item)
  {
    return ($item === '');
  }
  
  public function describeTo(Hamcrest_Description $description)
  {
    $description->appendText('an empty string');
  }
  
  /**
   * Matches if value is zero-length string.
   *
   * @factory emptyString
   */
  public static function isEmptyString() //Q: Why have Hamcrest added the "is" to this one?
  {
    if (!isset(self::$_INSTANCE))
    {
      self::$_INSTANCE = new self();
    }
    
    return self::$_INSTANCE;
  }
  
  /**
   * Matches if value is null or zero-length string.
   *
   * @factory nullOrEmptyString
   */
  public static function isEmptyOrNullString()
  {
    if (!isset(self::$_NULL_OR_EMPTY_INSTANCE))
    {
      self::$_NULL_OR_EMPTY_INSTANCE = Hamcrest_Core_AnyOf::anyOf(
        Hamcrest_Core_IsNull::nullvalue(), new self()
      );
    }
    
    return self::$_NULL_OR_EMPTY_INSTANCE;
  }
  
}
