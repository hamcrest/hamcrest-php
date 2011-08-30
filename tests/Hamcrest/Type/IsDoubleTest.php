<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Type/IsDouble.php';

class Hamcrest_Type_IsDoubleTest extends Hamcrest_AbstractMatcherTest
{
  
  protected function createMatcher()
  {
    return Hamcrest_Type_IsDouble::doubleValue();
  }
  
  public function testEvaluatesToTrueIfArgumentMatchesType()
  {
    assertThat((float) 5.2, floatValue());
    assertThat((double) 5.3, doubleValue());
  }

  public function testEvaluatesToFalseIfArgumentDoesntMatchType()
  {
    assertThat(false, not(doubleValue()));
    assertThat(5, not(doubleValue()));
    assertThat('foo', not(doubleValue()));
  }
  
  public function testHasAReadableDescription()
  {
    $this->assertDescription('a double', doubleValue());
  }
  
  public function testDecribesActualTypeInMismatchMessage()
  {
    $this->assertMismatchDescription('was null', doubleValue(), null);
    $this->assertMismatchDescription('was a string "foo"', doubleValue(), 'foo');
  }
  
}
