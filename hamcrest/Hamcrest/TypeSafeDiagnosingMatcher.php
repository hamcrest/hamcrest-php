<?php
namespace Hamcrest;

/**
 * Convenient base class for Matchers that require a value of a specific type.
 * This simply checks the type and then casts.
 */

abstract class TypeSafeDiagnosingMatcher extends TypeSafeMatcher
{

    final public function matchesSafely($actual): bool
    {
        return $this->matchesSafelyWithDiagnosticDescription($actual, new NullDescription());
    }

    final public function describeMismatchSafely($actual, Description $mismatchDescription): void
    {
        $this->matchesSafelyWithDiagnosticDescription($actual, $mismatchDescription);
    }

    // -- Protected Methods

    /**
     * Subclasses should implement these. The item will already have been checked for
     * the specific type.
     * @param mixed $actual
     */
    abstract protected function matchesSafelyWithDiagnosticDescription($actual, Description $mismatchDescription): bool;
}
