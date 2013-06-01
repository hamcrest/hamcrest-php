<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

// require_once 'Hamcrest/FeatureMatcher.php';
// require_once 'Hamcrest/Matcher.php';
// require_once 'Hamcrest/Util.php';
// require_once 'Hamcrest/Core/DescribedAs.php';
// require_once 'Hamcrest/Core/IsNot.php';

/**
 * Matches if array size satisfies a nested matcher.
 */
class Hamcrest_Array_IsArrayWithSize extends Hamcrest_FeatureMatcher
{
  
  public function __construct(Hamcrest_Matcher $sizeMatcher)
  {
    parent::__construct(self::TYPE_ARRAY, null, $sizeMatcher,
      'an array with size', 'array size'
    );
  }
  
  protected function featureValueOf($array)
  {
    return count($array);
  }
  
  /**
   * Does array size satisfy a given matcher?
   *
   * @param int $size as a {@link Hamcrest_Matcher} or a value.
   *
   * @factory
   */
  public static function arrayWithSize($size)
  {
    return new self(Hamcrest_Util::wrapValueWithIsEqual($size));
  }
  
  /**
   * Matches an empty array.
   *
   * @factory
   */
  public static function emptyArray()
  {
    return Hamcrest_Core_DescribedAs::describedAs(
      'an empty array',
      self::arrayWithSize(0)
    );
  }

  /**
   * Matches an empty array.
   *
   * @factory
   */
  public static function nonEmptyArray()
  {
    return Hamcrest_Core_DescribedAs::describedAs(
      'a non-empty array',
      self::arrayWithSize(Hamcrest_Core_IsNot::not(0))
    );
  }
  
}
