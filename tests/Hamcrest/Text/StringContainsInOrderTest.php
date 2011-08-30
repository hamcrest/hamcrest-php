<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Text/StringContainsInOrder.php';

class Hamcrest_Text_StringContainsInOrderTest
  extends Hamcrest_AbstractMatcherTest
{
  
  private $_m;
  
  public function setUp()
  {
    $this->_m = Hamcrest_Text_StringContainsInOrder::stringContainsInOrder(array('a', 'b', 'c'));
  }
  
  protected function createMatcher()
  {
    return $this->_m;
  }
  
  public function testMatchesOnlyIfStringContainsGivenSubstringsInTheSameOrder()
  {
    $this->assertMatches($this->_m, 'abc', 'substrings in order');
    $this->assertMatches($this->_m, '1a2b3c4', 'substrings separated');
    
    $this->assertDoesNotMatch($this->_m, 'cab', 'substrings out of order');
    $this->assertDoesNotMatch($this->_m, 'xyz', 'no substrings in string');
    $this->assertDoesNotMatch($this->_m, 'ac', 'substring missing');
    $this->assertDoesNotMatch($this->_m, '', 'empty string');
  }
  
  public function testHasAReadableDescription()
  {
    $this->assertDescription(
      'a string containing "a", "b", "c" in order', $this->_m
    );
  }
  
}
