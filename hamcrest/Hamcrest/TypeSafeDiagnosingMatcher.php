<?php

require_once 'Hamcrest/TypeSafeMatcher.php';
require_once 'Hamcrest/Description.php';
require_once 'Hamcrest/NullDescription.php';

/**
 * Convenient base class for Matchers that require a value of a specific type.
 * This simply checks the type and then casts.
 */
abstract class Hamcrest_TypeSafeDiagnosingMatcher
  extends Hamcrest_TypeSafeMatcher
{
  
  public final function matchesSafely($item)
  {
    return $this->matchesSafelyWithDiagnosticDescription($item,
        new Hamcrest_NullDescription());
  }
  
  public final function describeMismatchSafely($item,
    Hamcrest_Description $mismatchDescription)
  {
    $this->matchesSafelyWithDiagnosticDescription($item,
        $mismatchDescription);
  }
  
  // -- Protected Methods
  
  /**
   * Subclasses should implement these. The item will already have been checked for
   * the specific type.
   */
  abstract protected function matchesSafelyWithDiagnosticDescription($item,
    Hamcrest_Description $mismatchDescription);
  
}
