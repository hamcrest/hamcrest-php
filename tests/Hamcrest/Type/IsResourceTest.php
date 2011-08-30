<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Type/IsResource.php';

class Hamcrest_Type_IsResourceTest extends Hamcrest_AbstractMatcherTest
{
  
  protected function createMatcher()
  {
    return Hamcrest_Type_IsResource::resourceValue();
  }
  
  public function testEvaluatesToTrueIfArgumentMatchesType()
  {
    assertThat(tmpfile(), resourceValue());
  }

  public function testEvaluatesToFalseIfArgumentDoesntMatchType()
  {
    assertThat(false, not(resourceValue()));
    assertThat(5, not(resourceValue()));
    assertThat('foo', not(resourceValue()));
  }
  
  public function testHasAReadableDescription()
  {
    $this->assertDescription('a resource', resourceValue());
  }
  
  public function testDecribesActualTypeInMismatchMessage()
  {
    $this->assertMismatchDescription('was null', resourceValue(), null);
    $this->assertMismatchDescription('was a string "foo"', resourceValue(), 'foo');
  }
  
}
