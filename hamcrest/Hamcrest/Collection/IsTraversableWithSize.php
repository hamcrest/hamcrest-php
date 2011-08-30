<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/FeatureMatcher.php';
require_once 'Hamcrest/Matcher.php';
require_once 'Hamcrest/Core/IsEqual.php';
require_once 'Hamcrest/Core/DescribedAs.php';

/**
 * Matches if traversable size satisfies a nested matcher.
 */
class Hamcrest_Collection_IsTraversableWithSize extends Hamcrest_FeatureMatcher
{
  
  public function __construct(Hamcrest_Matcher $sizeMatcher)
  {
    parent::__construct(self::TYPE_OBJECT, 'Traversable', $sizeMatcher, 
        'a traversable with size', 'traversable size');
  }
  
  protected function featureValueOf($actual)
  {
    $size = 0;
    foreach ($actual as $value)
    {
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
    $matcher = ($size instanceof Hamcrest_Matcher)
      ? $size
      : Hamcrest_Core_IsEqual::equalTo($size)
      ;
    return new self($matcher);
  }
  
}
