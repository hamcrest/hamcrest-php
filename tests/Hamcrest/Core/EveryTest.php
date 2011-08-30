<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Core/Every.php';

class Hamcrest_Core_EveryTest extends Hamcrest_AbstractMatcherTest
{
  
  protected function createMatcher()
  {
    return Hamcrest_Core_Every::everyItem(anything());
  }
  
  public function testIsTrueWhenEveryValueMatches()
  {
    assertThat(array('AaA', 'BaB', 'CaC'), everyItem(containsString('a')));
    assertThat(array('AbA', 'BbB', 'CbC'), not(everyItem(containsString('a'))));
  }
  
  public function testIsAlwaysTrueForEmptyLists()
  {
    assertThat(array(), everyItem(containsString('a')));
  }
  
  public function testDescribesItself()
  {
    $each =  everyItem(containsString('a'));
    $this->assertEquals('every item is a string containing "a"', (string) $each);
    
    $this->assertMismatchDescription('an item was "BbB"', $each, array('BbB'));
  }
  
}
