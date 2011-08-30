<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/FeatureMatcher.php';
require_once 'Hamcrest/Matcher.php';
require_once 'Hamcrest/Core/IsEqual.php';

/**
 * Matches if array size satisfies a nested matcher.
 */
class Hamcrest_Core_HasToString extends Hamcrest_FeatureMatcher
{

  public function __construct(Hamcrest_Matcher $toStringMatcher)
  {
    parent::__construct(self::TYPE_OBJECT, null, $toStringMatcher, 
        'an object with toString()', 'toString()'
    );
  }

  public function matchesSafelyWithDiagnosticDescription($actual,
    Hamcrest_Description $mismatchDescription)
  {
    if (method_exists($actual, 'toString')
        || method_exists($actual, '__toString'))
    {
      return parent::matchesSafelyWithDiagnosticDescription($actual,
          $mismatchDescription);
    }
    return false;
  }

  protected function featureValueOf($actual)
  {
    if (method_exists($actual, 'toString'))
    {
      return $actual->toString();
    }
    return (string) $actual;
  }

  /**
   * Does array size satisfy a given matcher?
   *
   * @factory
   */
  public static function hasToString($matcher)
  {
    return new self(
        $matcher instanceof Hamcrest_Matcher 
        ? $matcher 
        : Hamcrest_Core_IsEqual::equalTo($matcher));
  }

}
