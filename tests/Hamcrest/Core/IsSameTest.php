<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Core/IsSame.php';

class Hamcrest_Core_IsSameTest extends Hamcrest_AbstractMatcherTest
{
  
  protected function createMatcher()
  {
    return Hamcrest_Core_IsSame::sameInstance(new stdClass());
  }
  
  public function testEvaluatesToTrueIfArgumentIsReferenceToASpecifiedObject()
  {
    $o1 = new stdClass();
    $o2 = new stdClass();
    
    assertThat($o1, sameInstance($o1));
    assertThat($o2, not(sameInstance($o1)));
  }
  
  public function testReturnsReadableDescriptionFromToString()
  {
    $this->assertDescription('sameInstance("ARG")', sameInstance('ARG'));
  }
  
  public function testReturnsReadableDescriptionFromToStringWhenInitialisedWithNull()
  {
    $this->assertDescription('sameInstance(null)', sameInstance(null));
  }
  
}
