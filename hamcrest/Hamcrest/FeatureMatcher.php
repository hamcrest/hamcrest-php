<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/TypeSafeDiagnosingMatcher.php';
require_once 'Hamcrest/Matcher.php';
require_once 'Hamcrest/Description.php';

/**
 * Supporting class for matching a feature of an object. Implement
 * <code>featureValueOf()</code> in a subclass to pull out the feature to be
 * matched against.
 */
abstract class Hamcrest_FeatureMatcher
  extends Hamcrest_TypeSafeDiagnosingMatcher
{
  
  private $_subMatcher;
  private $_featureDescription;
  private $_featureName;
  
  /**
   * Constructor.
   * 
   * @param Hamcrest_Matcher $subMatcher The matcher to apply to the feature
   * @param string $featureDescription Descriptive text to use in describeTo
   * @param string $featureName Identifying text for mismatch message
   */
  public function __construct($type, $subtype, Hamcrest_Matcher $subMatcher,
    $featureDescription, $featureName)
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
  
  public function matchesSafelyWithDiagnosticDescription($actual,
    Hamcrest_Description $mismatchDescription)
  {
    $featureValue = $this->featureValueOf($actual);
    
    if (!$this->_subMatcher->matches($featureValue))
    {
      $mismatchDescription->appendText($this->_featureName)
                          ->appendText(' was ')->appendValue($featureValue);
      return false;
    }
    
    return true;
  }
  
  final public function describeTo(Hamcrest_Description $description)
  {
    $description->appendText($this->_featureDescription)->appendText(' ')
                ->appendDescriptionOf($this->_subMatcher)
               ;
  }
  
}
