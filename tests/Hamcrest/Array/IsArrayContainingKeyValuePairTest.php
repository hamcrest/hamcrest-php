<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Array/IsArrayContainingKeyValuePair.php';

class Hamcrest_Array_IsArrayContainingKeyValuePairTest extends Hamcrest_AbstractMatcherTest
{
  
  protected function createMatcher()
  {
    return Hamcrest_Array_IsArrayContainingKeyValuePair::hasKeyValuePair('irrelevant', 'irrelevant');
  }
  
  public function testMatchesArrayContainingMatchingKeyAndValue()
  {
    $array = array('a'=>1, 'b'=>2);
    
    $this->assertMatches(hasKeyValuePair(equalTo('a'), equalTo(1)), $array, 'matcherA');
    $this->assertMatches(hasKeyValuePair(equalTo('b'), equalTo(2)), $array, 'matcherB');
    $this->assertMismatchDescription(
      'array was ["a" => <1>, "b" => <2>]',
      hasKeyValuePair(equalTo('c'), equalTo(3)),
      $array
    );
  }
  
  public function testDoesNotMatchNull()
  {
    $this->assertMismatchDescription('was null', hasKeyValuePair(anything(), anything()), null);
  }
  
  public function testHasReadableDescription()
  {
    $this->assertDescription('array containing ["a" => <2>]', hasKeyValuePair(equalTo('a'), equalTo(2)));
  }
  
}
