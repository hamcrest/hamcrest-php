<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Array/IsArrayWithSize.php';

class Hamcrest_Array_IsArrayWithSizeTest extends Hamcrest_AbstractMatcherTest
{
  
  protected function createMatcher()
  {
    return Hamcrest_Array_IsArrayWithSize::arrayWithSize(equalTo(2));
  }
  
  public function testMatchesWhenSizeIsCorrect()
  {
    $this->assertMatches(arrayWithSize(equalTo(3)), array(1, 2, 3), 'correct size');
    $this->assertDoesNotMatch(arrayWithSize(equalTo(2)), array(1, 2, 3), 'incorrect size');
  }
  
  public function testProvidesConvenientShortcutForArrayWithSizeEqualTo()
  {
    $this->assertMatches(arrayWithSize(3), array(1, 2, 3), 'correct size');
    $this->assertDoesNotMatch(arrayWithSize(2), array(1, 2, 3), 'incorrect size');
  }
  
  public function testEmptyArray()
  {
    $this->assertMatches(emptyArray(), array(), 'correct size');
    $this->assertDoesNotMatch(emptyArray(), array(1), 'incorrect size');
  }
  
  public function testHasAReadableDescription()
  {
    $this->assertDescription('an array with size <3>', arrayWithSize(equalTo(3)));
    $this->assertDescription('an empty array', emptyArray());
  }
  
}
