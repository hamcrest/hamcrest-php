<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Type/IsString.php';

class Hamcrest_Type_IsStringTest extends Hamcrest_AbstractMatcherTest
{
  
  protected function createMatcher()
  {
    return Hamcrest_Type_IsString::stringValue();
  }
  
  public function testEvaluatesToTrueIfArgumentMatchesType()
  {
    assertThat('', stringValue());
    assertThat("foo", stringValue());
  }

  public function testEvaluatesToFalseIfArgumentDoesntMatchType()
  {
    assertThat(false, not(stringValue()));
    assertThat(5, not(stringValue()));
    assertThat(array(1, 2, 3), not(stringValue()));
  }
  
  public function testHasAReadableDescription()
  {
    $this->assertDescription('a string', stringValue());
  }
  
  public function testDecribesActualTypeInMismatchMessage()
  {
    $this->assertMismatchDescription('was null', stringValue(), null);
    $this->assertMismatchDescription('was a double <5.2F>', stringValue(), 5.2);
  }
  
}
