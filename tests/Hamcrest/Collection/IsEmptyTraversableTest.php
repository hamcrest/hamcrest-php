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
  
  public function testEmptyMatcherMatchesWhenEmpty()
  {
    $this->assertMatches(emptyTraversable(), new ArrayObject(array()), 
      'an empty traversable'
    );
  }

  public function testEmptyMatcherDoesNotMatchWhenNotEmpty()
  {
    $this->assertDoesNotMatch(emptyTraversable(), 
      new ArrayObject(array(1, 2, 3)), 'a non-empty traversable'
    );
  }

  public function testEmptyMatcherDoesNotMatchNull()
  {
    $this->assertDoesNotMatch(emptyTraversable(), null,
      'should not match null'
    );
  }
  
  public function testEmptyMatcherHasAReadableDescription()
  {
    $this->assertDescription('an empty traversable', emptyTraversable());
  }
  

  public function testNonEmptyDoesNotMatchNull()
  {
    $this->assertDoesNotMatch(nonEmptyTraversable(), null,
      'should not match null'
    );
  }

  public function testNonEmptyDoesNotMatchWhenEmpty()
  {
    $this->assertDoesNotMatch(nonEmptyTraversable(), new ArrayObject(array()),
      'an empty traversable'
    );
  }

  public function testNonEmptyMatchesWhenNotEmpty()
  {
    $this->assertMatches(nonEmptyTraversable(),
      new ArrayObject(array(1, 2, 3)), 'a non-empty traversable'
    );
  }

  public function testNonEmptyNonEmptyMatcherHasAReadableDescription()
  {
    $this->assertDescription('a non-empty traversable', nonEmptyTraversable());
  }

}
