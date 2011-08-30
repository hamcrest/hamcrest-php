<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Type/IsObject.php';

class Hamcrest_Type_IsObjectTest extends Hamcrest_AbstractMatcherTest
{
  
  protected function createMatcher()
  {
    return Hamcrest_Type_IsObject::objectValue();
  }
  
  public function testEvaluatesToTrueIfArgumentMatchesType()
  {
    assertThat(new stdClass, objectValue());
  }

  public function testEvaluatesToFalseIfArgumentDoesntMatchType()
  {
    assertThat(false, not(objectValue()));
    assertThat(5, not(objectValue()));
    assertThat('foo', not(objectValue()));
  }
  
  public function testHasAReadableDescription()
  {
    $this->assertDescription('an object', objectValue());
  }
  
  public function testDecribesActualTypeInMismatchMessage()
  {
    $this->assertMismatchDescription('was null', objectValue(), null);
    $this->assertMismatchDescription('was a string "foo"', objectValue(), 'foo');
  }
  
}
