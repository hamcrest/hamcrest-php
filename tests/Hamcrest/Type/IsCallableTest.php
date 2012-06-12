<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Type/IsCallable.php';

class Hamcrest_Type_IsCallableTest extends Hamcrest_AbstractMatcherTest
{

  public static function callableFunction() { }

  public function __invoke() { }
  
  protected function createMatcher()
  {
    return Hamcrest_Type_IsCallable::callback();
  }

  public function testEvaluatesToTrueIfArgumentIsFunctionName()
  {
    assertThat('preg_match', callback());
  }

  public function testEvaluatesToTrueIfArgumentIsStaticMethodCallback()
  {
    assertThat(array('Hamcrest_Type_IsCallableTest', 'callableFunction'),
               callback()
    );
  }

  public function testEvaluatesToTrueIfArgumentIsInstanceMethodCallback()
  {
    assertThat(array($this, 
                     'testEvaluatesToTrueIfArgumentIsInstanceMethodCallback'),
               callback()
    );
  }

  public function testEvaluatesToTrueIfArgumentIsClosure()
  {
    if (!version_compare(PHP_VERSION, '5.3', '>='))
    {
      $this->markTestSkipped('Closures require PHP 5.3');
    }
    eval('assertThat(function() {}, callback());');
  }

  public function testEvaluatesToTrueIfArgumentImplementsInvoke()
  {
    if (!version_compare(PHP_VERSION, '5.3', '>='))
    {
      $this->markTestSkipped('Magic method __invoke() requires PHP 5.3');
    }
    assertThat($this, callback());
  }

  public function testEvaluatesToFalseIfArgumentIsInvalidFunctionName()
  {
    if (function_exists('not_a_Hamcrest_function'))
    {
      $this->markTestSkipped(
          'Function "not_a_Hamcrest_function" must not exist');
    }
    assertThat('not_a_Hamcrest_function', not(callback()));
  }

  public function testEvaluatesToFalseIfArgumentIsInvalidStaticMethodCallback()
  {
    assertThat(array('Hamcrest_Type_IsCallableTest', 'noMethod'), 
        not(callback())
    );
  }

  public function testEvaluatesToFalseIfArgumentIsInvalidInstanceMethodCallback()
  {
    assertThat(array($this, 'noMethod'), not(callback()));
  }

  public function testEvaluatesToFalseIfArgumentDoesntImplementInvoke()
  {
    assertThat(new stdClass(), not(callback()));
  }

  public function testEvaluatesToFalseIfArgumentDoesntMatchType()
  {
    assertThat(false, not(callback()));
    assertThat(5.2, not(callback()));
  }
  
  public function testHasAReadableDescription()
  {
    $this->assertDescription(
        'function name, callback array, Closure, or callable object',
        callback()
    );
  }
  
  public function testDecribesActualTypeInMismatchMessage()
  {
    $this->assertMismatchDescription('was "invalid-function"', callback(), 
        'invalid-function'
    );
  }
  
}
