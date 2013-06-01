<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/BaseMatcher.php';
require_once 'Hamcrest/Description.php';
require_once 'Hamcrest/Core/IsNot.php';

/**
 * Is the value null?
 */
class Hamcrest_Core_IsNull extends Hamcrest_BaseMatcher
{
  
  private static $_INSTANCE;
  private static $_NOT_INSTANCE;

  public function matches($item)
  {
    return is_null($item);
  }
  
  public function describeTo(Hamcrest_Description $description)
  {
    $description->appendText('null');
  }
  
  /**
   * Matches if value is null.
   *
   * @factory
   */
  public static function nullValue()
  {
    if (!self::$_INSTANCE) {
      self::$_INSTANCE = new self();
    }

    return self::$_INSTANCE;
  }
  
  /**
   * Matches if value is not null.
   *
   * @factory
   */
  public static function notNullValue()
  {
    if (!self::$_NOT_INSTANCE) {
      self::$_NOT_INSTANCE = Hamcrest_Core_IsNot::not(self::nullValue());
  }
  
    return self::$_NOT_INSTANCE;
  }

}
