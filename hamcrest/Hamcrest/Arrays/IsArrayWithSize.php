<?php
namespace Hamcrest\Arrays;

/*
 Copyright (c) 2009 hamcrest.org
 */

/**
 * Matches if array size satisfies a nested matcher.
 */
class IsArrayWithSize extends \Hamcrest\FeatureMatcher
{

  public function __construct(\Hamcrest\Matcher $sizeMatcher)
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
   * @param int $size as a {@link Hamcrest\Matcher} or a value.
   *
   * @factory
   */
  public static function arrayWithSize($size)
  {
    return new self(\Hamcrest\Util::wrapValueWithIsEqual($size));
  }

  /**
   * Matches an empty array.
   *
   * @factory
   */
  public static function emptyArray()
  {
    return \Hamcrest\Core\DescribedAs::describedAs(
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
    return \Hamcrest\Core\DescribedAs::describedAs(
      'a non-empty array',
      self::arrayWithSize(Core\IsNot::not(0))
    );
  }

}
