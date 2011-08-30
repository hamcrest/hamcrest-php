<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Type/IsBoolean.php';

class Hamcrest_Type_IsBooleanTest extends Hamcrest_AbstractMatcherTest
{
  
  protected function createMatcher()
  {
    return Hamcrest_Type_IsBoolean::booleanValue();
  }
  
  public function testEvaluatesToTrueIfArgumentMatchesType()
  {
    assertThat(false, booleanValue());
    assertThat(true, booleanValue());
  }

  public function testEvaluatesToFalseIfArgumentDoesntMatchType()
  {
    assertThat(array(), not(booleanValue()));
    assertThat(5, not(booleanValue()));
    assertThat('foo', not(booleanValue()));
  }
  
  public function testHasAReadableDescription()
  {
    $this->assertDescription('a boolean', booleanValue());
  }
  
  public function testDecribesActualTypeInMismatchMessage()
  {
    $this->assertMismatchDescription('was null', booleanValue(), null);
    $this->assertMismatchDescription('was a string "foo"', booleanValue(), 'foo');
  }
  
}
