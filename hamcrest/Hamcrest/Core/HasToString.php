<?php
namespace Hamcrest\Core;

/*
 Copyright (c) 2009 hamcrest.org
 */

/**
 * Matches if array size satisfies a nested matcher.
 */
class HasToString extends \Hamcrest\FeatureMatcher
{

  public function __construct(\Hamcrest\Matcher $toStringMatcher)
  {
    parent::__construct(self::TYPE_OBJECT, null, $toStringMatcher,
        'an object with toString()', 'toString()'
    );
  }

  public function matchesSafelyWithDiagnosticDescription($actual,
    \Hamcrest\Description $mismatchDescription)
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
    if (method_exists($actual, 'toString')) {
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
    return new self(\Hamcrest\Util::wrapValueWithIsEqual($matcher));
  }

}
