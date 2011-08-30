<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Type/IsArray.php';

class Hamcrest_Type_IsArrayTest extends Hamcrest_AbstractMatcherTest
{
  
  protected function createMatcher()
  {
    return Hamcrest_Type_IsArray::arrayValue();
  }
  
  public function testEvaluatesToTrueIfArgumentMatchesType()
  {
    assertThat(array('5', 5), arrayValue());
    assertThat(array(), arrayValue());
  }

  public function testEvaluatesToFalseIfArgumentDoesntMatchType()
  {
    assertThat(false, not(arrayValue()));
    assertThat(5, not(arrayValue()));
    assertThat('foo', not(arrayValue()));
  }
  
  public function testHasAReadableDescription()
  {
    $this->assertDescription('an array', arrayValue());
  }
  
  public function testDecribesActualTypeInMismatchMessage()
  {
    $this->assertMismatchDescription('was null', arrayValue(), null);
    $this->assertMismatchDescription('was a string "foo"', arrayValue(), 'foo');
  }
  
}
