<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

// require_once 'Hamcrest/TypeSafeDiagnosingMatcher.php';
// require_once 'Hamcrest/Description.php';
// require_once 'Hamcrest/Matcher.php';
// require_once 'Hamcrest/Util.php';
// require_once 'Hamcrest/Array/MatchingOnce.php';

/**
 * Matches if an array contains a set of items satisfying nested matchers.
 */
class Hamcrest_Array_IsArrayContainingInAnyOrder
  extends Hamcrest_TypeSafeDiagnosingMatcher
{

  private $_elementMatchers;

  public function __construct(array $elementMatchers)
  {
    parent::__construct(self::TYPE_ARRAY);

    Hamcrest_Util::checkAllAreMatchers($elementMatchers);

    $this->_elementMatchers = $elementMatchers;
  }

  protected function matchesSafelyWithDiagnosticDescription($array,
    Hamcrest_Description $mismatchDescription)
  {
    $matching = new Hamcrest_Array_MatchingOnce(
      $this->_elementMatchers, $mismatchDescription
    );

    foreach ($array as $element)
    {
      if (!$matching->matches($element))
      {
        return false;
      }
    }

    return $matching->isFinished($array);
  }

  public function describeTo(Hamcrest_Description $description)
  {
    $description->appendList('[', ', ', ']', $this->_elementMatchers)
                ->appendText(' in any order')
                ;
  }

  /**
   * An array with elements that match the given matchers.
   *
   * @factory containsInAnyOrder ...
   */
  public static function arrayContainingInAnyOrder(/* args... */)
  {
    $args = func_get_args();
    return new self(Hamcrest_Util::createMatcherArray($args));
  }

}
