<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Type/IsNumeric.php';

class Hamcrest_Type_IsNumericTest extends Hamcrest_AbstractMatcherTest
{
  
  protected function createMatcher()
  {
    return Hamcrest_Type_IsNumeric::numericValue();
  }
  
  public function testEvaluatesToTrueIfArgumentMatchesType()
  {
    assertThat(5, numericValue());
    assertThat(0, numericValue());
    assertThat(-5, numericValue());
    assertThat(5.3, numericValue());
    assertThat(0.53, numericValue());
    assertThat(-5.3, numericValue());
    assertThat('5', numericValue());
    assertThat('0', numericValue());
    assertThat('-5', numericValue());
    assertThat('5.3', numericValue());
    assertThat('5e+3', numericValue());
    assertThat('0.053e-2', numericValue());
    assertThat('-53.253e+25', numericValue());
    assertThat('+53.253e+25', numericValue());
    assertThat('0x4F2a04', numericValue());
  }

  public function testEvaluatesToFalseIfArgumentDoesntMatchType()
  {
    assertThat(false, not(numericValue()));
    assertThat('foo', not(numericValue()));
    assertThat('foo5', not(numericValue()));
    assertThat('5foo', not(numericValue()));
  }
  
  public function testHasAReadableDescription()
  {
    $this->assertDescription('a number', numericValue());
  }
  
  public function testDecribesActualTypeInMismatchMessage()
  {
    $this->assertMismatchDescription('was null', numericValue(), null);
    $this->assertMismatchDescription('was a string "foo"', numericValue(), 'foo');
  }
  
}
