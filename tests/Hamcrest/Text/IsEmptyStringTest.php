<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Text/IsEmptyString.php';

class Hamcrest_Text_IsEmptyStringTest extends Hamcrest_AbstractMatcherTest
{
  
  protected function createMatcher()
  {
    return Hamcrest_Text_IsEmptyString::isEmptyOrNullString();
  }
  
  public function testEmptyOrNullIsNull()
  {
    assertThat(null, isEmptyOrNullString());
  }
  
  public function testZeroIsNotEmptyOrNullString()
  {
    assertThat(0, not(isEmptyOrNullString()));
  }
  
  public function testFalseIsNotEmptyOrNullString()
  {
    assertThat(false, not(isEmptyOrNullString()));
  }
  
  public function testEmptyIsNotNull()
  {
    assertThat(null, not(isEmptyString()));
  }
  
  public function testMatchesEmptyString()
  {
    $this->assertMatches(isEmptyString(), '', 'empty string');
    $this->assertMatches(isEmptyOrNullString(), '', 'empty string');
  }
  
  public function testDoesNotMatchNonEmptyString()
  {
    $this->assertDoesNotMatch(isEmptyString(), 'a', 'non empty string');
  }
  
  public function testHasAReadableDescription()
  {
    $this->assertDescription('an empty string', isEmptyString());
    $this->assertDescription('(null or an empty string)', isEmptyOrNullString());
  }
  
}
