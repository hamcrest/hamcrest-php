<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Core/IsTypeOf.php';

class Hamcrest_Core_IsTypeOfTest extends Hamcrest_AbstractMatcherTest
{
  
  protected function createMatcher()
  {
    return Hamcrest_Core_IsTypeOf::typeOf('integer');
  }
  
  public function testEvaluatesToTrueIfArgumentMatchesType()
  {
    assertThat(array('5', 5), typeOf('array'));
    assertThat(false, typeOf('boolean'));
    assertThat(5, typeOf('integer'));
    assertThat(5.2, typeOf('double'));
    assertThat(null, typeOf('null'));
    assertThat(tmpfile(), typeOf('resource'));
    assertThat('a string', typeOf('string'));
  }

  public function testEvaluatesToFalseIfArgumentDoesntMatchType()
  {
    assertThat(false, not(typeOf('array')));
    assertThat(array('5', 5), not(typeOf('boolean')));
    assertThat(5.2, not(typeOf('integer')));
    assertThat(5, not(typeOf('double')));
    assertThat(false, not(typeOf('null')));
    assertThat('a string', not(typeOf('resource')));
    assertThat(tmpfile(), not(typeOf('string')));
  }
  
  public function testHasAReadableDescription()
  {
    $this->assertDescription('a double', typeOf('double'));
    $this->assertDescription('an integer', typeOf('integer'));
  }
  
  public function testDecribesActualTypeInMismatchMessage()
  {
    $this->assertMismatchDescription('was null', typeOf('boolean'), null);
    $this->assertMismatchDescription('was an integer <5>', typeOf('float'), 5);
  }
  
}
