<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

// require_once 'Hamcrest/BaseMatcher.php';
// require_once 'Hamcrest/Description.php';
// require_once 'Hamcrest/Core/AnyOf.php';
// require_once 'Hamcrest/Core/IsNull.php';

/**
 * Matches empty Strings (and null).
 */
class Hamcrest_Text_IsEmptyString extends Hamcrest_BaseMatcher
{
  
  private static $_INSTANCE;
  private static $_NULL_OR_EMPTY_INSTANCE;
  private static $_NOT_INSTANCE;

  private $_empty;

  public function __construct($empty = true)
  {
    $this->_empty = $empty;
  }
  
  public function matches($item)
  {
    return $this->_empty
      ? ($item === '')
      : is_string($item) && $item !== '';
  }
  
  public function describeTo(Hamcrest_Description $description)
  {
    $description->appendText(
      $this->_empty
        ? 'an empty string'
        : 'a non-empty string'
      );
  }
  
  /**
   * Matches if value is a zero-length string.
   *
   * @factory emptyString
   */
  public static function isEmptyString()
  {
    if (!self::$_INSTANCE)
    {
      self::$_INSTANCE = new self(true);
    }
    
    return self::$_INSTANCE;
  }
  
  /**
   * Matches if value is null or a zero-length string.
   *
   * @factory nullOrEmptyString
   */
  public static function isEmptyOrNullString()
  {
    if (!self::$_NULL_OR_EMPTY_INSTANCE)
    {
      self::$_NULL_OR_EMPTY_INSTANCE = Hamcrest_Core_AnyOf::anyOf(
        Hamcrest_Core_IsNull::nullvalue(),
        self::isEmptyString()
      );
    }
    
    return self::$_NULL_OR_EMPTY_INSTANCE;
  }
  
  /**
   * Matches if value is a non-zero-length string.
   *
   * @factory nonEmptyString
   */
  public static function isNonEmptyString()
  {
    if (!self::$_NOT_INSTANCE)
    {
      self::$_NOT_INSTANCE = new self(false);
    }

    return self::$_NOT_INSTANCE;
  }

}
