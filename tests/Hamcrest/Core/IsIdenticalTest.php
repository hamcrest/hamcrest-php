<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Core/IsIdentical.php';

class Hamcrest_Core_IsIdenticalTest extends Hamcrest_AbstractMatcherTest
{
  
  protected function createMatcher()
  {
    return Hamcrest_Core_IsIdentical::identicalTo('irrelevant');
  }
  
  public function testEvaluatesToTrueIfArgumentIsReferenceToASpecifiedObject()
  {
    $o1 = new stdClass();
    $o2 = new stdClass();
    
    assertThat($o1, identicalTo($o1));
    assertThat($o2, not(identicalTo($o1)));
  }
  
  public function testReturnsReadableDescriptionFromToString()
  {
    $this->assertDescription('"ARG"', identicalTo('ARG'));
  }
  
  public function testReturnsReadableDescriptionFromToStringWhenInitialisedWithNull()
  {
    $this->assertDescription('null', identicalTo(null));
  }
  
}
