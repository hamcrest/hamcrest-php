<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/FeatureMatcher.php';

class Hamcrest_Thingy
{
  private $_result;
  public function __construct($result)
  {
    $this->_result = $result;
  }
  public function getResult()
  {
    return $this->_result;
  }
}

/* Test-specific subclass only */
class Hamcrest_ResultMatcher extends Hamcrest_FeatureMatcher
{
  public function __construct()
  {
    parent::__construct(self::TYPE_ANY, null, equalTo('bar'), 'Thingy with result', 'result');
  }
  public function featureValueOf($actual)
  {
    if ($actual instanceof Hamcrest_Thingy)
    {
      return $actual->getResult();
    }
  }
}

class Hamcrest_FeatureMatcherTest extends Hamcrest_AbstractMatcherTest
{
  
  private $_resultMatcher;
  
  public function setUp()
  {
    $this->_resultMatcher = $this->_resultMatcher();
  }
  
  protected function createMatcher()
  {
    return $this->_resultMatcher();
  }
  
  public function testMatchesPartOfAnObject()
  {
    $this->assertMatches($this->_resultMatcher, new Hamcrest_Thingy('bar'), 'feature');
    $this->assertDescription('Thingy with result "bar"', $this->_resultMatcher);
  }
  
  public function testMismatchesPartOfAnObject()
  {
    $this->assertMismatchDescription(
      'result was "foo"',
      $this->_resultMatcher, new Hamcrest_Thingy('foo')
    );
  }
  
  public function testDoesNotGenerateNoticesForNull()
  {
    $this->assertMismatchDescription('result was null', $this->_resultMatcher, null);
  }
  
  // -- Creation Methods
  
  private function _resultMatcher()
  {
    return new Hamcrest_ResultMatcher();
  }
  
}
