<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Core/IsAnything.php';

class Hamcrest_Core_IsAnythingTest extends Hamcrest_AbstractMatcherTest
{
  
  protected function createMatcher()
  {
    return Hamcrest_Core_IsAnything::anything();
  }
  
  public function testAlwaysEvaluatesToTrue()
  {
    assertThat(null, anything());
    assertThat(new stdClass(), anything());
    assertThat('hi', anything());
  }
  
  public function testHasUsefulDefaultDescription()
  {
    $this->assertDescription('ANYTHING', anything());
  }
  
  public function testCanOverrideDescription()
  {
    $description = 'description';
    $this->assertDescription($description, anything($description));
  }
  
}
