<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Core/HasToString.php';

class Hamcrest_HasToString_PhpForm
{
  public function __toString()
  {
    return 'php';
  }
}

class Hamcrest_HasToString_JavaForm
{
  public function toString()
  {
    return 'java';
  }
}

class Hamcrest_HasToString_BothForms
{
  public function __toString()
  {
    return 'php';
  }
  
  public function toString()
  {
    return 'java';
  }
}

class Hamcrest_Core_HasToStringTest extends Hamcrest_AbstractMatcherTest
{
  
  protected function createMatcher()
  {
    return Hamcrest_Core_HasToString::hasToString('foo');
  }
  
  public function testMatchesWhenToStringMatches()
  {
    $this->assertMatches(hasToString(equalTo('php')),
        new Hamcrest_HasToString_PhpForm(), 'correct __toString'
    );
    $this->assertMatches(hasToString(equalTo('java')),
        new Hamcrest_HasToString_JavaForm(), 'correct toString'
    );
  }

  public function testPicksJavaOverPhpToString()
  {
    $this->assertMatches(hasToString(equalTo('java')),
        new Hamcrest_HasToString_BothForms(), 'correct toString'
    );
  }
  
  public function testDoesNotMatchWhenToStringDoesNotMatch()
  {
    $this->assertDoesNotMatch(hasToString(equalTo('mismatch')),
        new Hamcrest_HasToString_PhpForm(), 'incorrect __toString'
    );
    $this->assertDoesNotMatch(hasToString(equalTo('mismatch')),
        new Hamcrest_HasToString_JavaForm(), 'incorrect toString'
    );
    $this->assertDoesNotMatch(hasToString(equalTo('mismatch')),
        new Hamcrest_HasToString_BothForms(), 'incorrect __toString'
    );
  }

  public function testDoesNotMatchNull()
  {
    $this->assertDoesNotMatch(hasToString(equalTo('a')), null,
      'should not match null'
    );
  }
  
  public function testProvidesConvenientShortcutForTraversableWithSizeEqualTo()
  {
    $this->assertMatches(hasToString(equalTo('php')),
        new Hamcrest_HasToString_PhpForm(), 'correct __toString'
    );
  }
  
  public function testHasAReadableDescription()
  {
    $this->assertDescription('an object with toString() "php"', 
        hasToString(equalTo('php'))
    );
  }
  
}
