<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Collection/IsTraversableWithSize.php';

class Hamcrest_Traversable_IsTraversableWithSizeTest
    extends Hamcrest_AbstractMatcherTest
{

  protected function createMatcher()
  {
    return Hamcrest_Collection_IsTraversableWithSize::traversableWithSize(
        equalTo(2)
    );
  }
  
  public function testMatchesWhenSizeIsCorrect()
  {
    $this->assertMatches(traversableWithSize(equalTo(3)), 
        new ArrayObject(array(1, 2, 3)), 'correct size'
    );
  }

  public function testDoesNotMatchWhenSizeIsIncorrect()
  {
    $this->assertDoesNotMatch(traversableWithSize(equalTo(2)), 
        new ArrayObject(array(1, 2, 3)), 'incorrect size'
    );
  }

  public function testDoesNotMatchNull()
  {
    $this->assertDoesNotMatch(traversableWithSize(3), null,
      'should not match null'
    );
  }

  public function testProvidesConvenientShortcutForTraversableWithSizeEqualTo()
  {
    $this->assertMatches(traversableWithSize(3),
        new ArrayObject(array(1, 2, 3)), 'correct size'
    );
  }
  
  public function testHasAReadableDescription()
  {
    $this->assertDescription('a traversable with size <3>', 
        traversableWithSize(equalTo(3))
    );
  }
  
}
