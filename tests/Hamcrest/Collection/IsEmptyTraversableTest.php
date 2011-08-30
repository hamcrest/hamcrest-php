<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Collection/IsEmptyTraversable.php';

class Hamcrest_Traversable_IsEmptyTraversableTest
    extends Hamcrest_AbstractMatcherTest
{

  protected function createMatcher()
  {
    return Hamcrest_Collection_IsEmptyTraversable::emptyTraversable();
  }
  
  public function testMatchesWhenEmpty()
  {
    $this->assertMatches(emptyTraversable(), new ArrayObject(array()), 
        'correct size'
    );
  }

  public function testDoesNotMatchWhenNotEmpty()
  {
    $this->assertDoesNotMatch(emptyTraversable(), 
        new ArrayObject(array(1, 2, 3)), 'incorrect size'
    );
  }

  public function testDoesNotMatchNull()
  {
    $this->assertDoesNotMatch(emptyTraversable(), null,
      'should not match null'
    );
  }
  
  public function testHasAReadableDescription()
  {
    $this->assertDescription('an empty traversable', emptyTraversable());
  }
  
}
