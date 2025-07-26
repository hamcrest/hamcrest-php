<?php
namespace Hamcrest;

/*
 Copyright (c) 2009 hamcrest.org
 */

/**
 * Supporting class for matching a feature of an object. Implement
 * <code>featureValueOf()</code> in a subclass to pull out the feature to be
 * matched against.
 */
abstract class FeatureMatcher extends TypeSafeDiagnosingMatcher
{

    private Matcher $_subMatcher;
    private string $_featureDescription;
    private string $_featureName;

    /**
     * Constructor.
     *
     * @param self::TYPE_* $type
     * @param ?string $subtype
     * @param \Hamcrest\Matcher $subMatcher The matcher to apply to the feature
     * @param string $featureDescription Descriptive text to use in describeTo
     * @param string $featureName Identifying text for mismatch message
     */
    public function __construct(int $type, ?string $subtype, Matcher $subMatcher, string $featureDescription, string $featureName)
    {
        parent::__construct($type, $subtype);

        $this->_subMatcher = $subMatcher;
        $this->_featureDescription = $featureDescription;
        $this->_featureName = $featureName;
    }

    /**
     * Implement this to extract the interesting feature.
     *
     * @param mixed $actual the target object
     *
     * @return mixed the feature to be matched
     */
    abstract protected function featureValueOf($actual);

    public function matchesSafelyWithDiagnosticDescription($actual, Description $mismatchDescription): bool
    {
        $featureValue = $this->featureValueOf($actual);

        if (!$this->_subMatcher->matches($featureValue)) {
            $mismatchDescription->appendText($this->_featureName)
                                                    ->appendText(' was ')->appendValue($featureValue);

            return false;
        }

        return true;
    }

    final public function describeTo(Description $description): void
    {
        $description->appendText($this->_featureDescription)->appendText(' ')
                                ->appendDescriptionOf($this->_subMatcher)
                             ;
    }
}
