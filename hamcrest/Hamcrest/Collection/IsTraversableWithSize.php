<?php
namespace Hamcrest\Collection;

/*
 Copyright (c) 2009 hamcrest.org
 */

/**
 * Matches if traversable size satisfies a nested matcher.
 */
class IsTraversableWithSize extends \Hamcrest\FeatureMatcher
{

  public function __construct(\Hamcrest\Matcher $sizeMatcher)
  {
    parent::__construct(self::TYPE_OBJECT, 'Traversable', $sizeMatcher,
        'a traversable with size', 'traversable size');
  }

  protected function featureValueOf($actual)
  {
    $size = 0;
    foreach ($actual as $value) {
      $size++;
    }

    return $size;
  }

  /**
   * Does traversable size satisfy a given matcher?
   *
   * @factory
   */
  public static function traversableWithSize($size)
  {
    return new self(\Hamcrest\Util::wrapValueWithIsEqual($size));
  }

}
