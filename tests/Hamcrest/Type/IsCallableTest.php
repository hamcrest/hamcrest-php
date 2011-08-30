<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Type/IsCallable.php';

class Hamcrest_Type_IsCallableTest extends Hamcrest_AbstractMatcherTest
{

  public static function callableFunction() { }

  public function __invoke() { }
  
  protected function createMatcher()
  {
    return Hamcrest_Type_IsCallable::callable();
  }

  public function testEvaluatesToTrueIfArgumentIsFunctionName()
  {
    assertThat('preg_match', callable());
  }

  public function testEvaluatesToTrueIfArgumentIsStaticMethodCallback()
  {
    assertThat(array('Hamcrest_Type_IsCallableTest', 'callableFunction'),
               callable()
    );
  }

  public function testEvaluatesToTrueIfArgumentIsInstanceMethodCallback()
  {
    assertThat(array($this, 
                     'testEvaluatesToTrueIfArgumentIsInstanceMethodCallback'),
               callable()
    );
  }

  public function testEvaluatesToTrueIfArgumentIsClosure()
  {
    if (!version_compare(PHP_VERSION, '5.3', '>='))
    {
      $this->markTestSkipped('Closures require PHP 5.3');
    }
    eval('assertThat(function() {}, callable());');
  }

  public function testEvaluatesToTrueIfArgumentImplementsInvoke()
  {
    if (!version_compare(PHP_VERSION, '5.3', '>='))
    {
      $this->markTestSkipped('Magic method __invoke() requires PHP 5.3');
    }
    assertThat($this, callable());
  }

  public function testEvaluatesToFalseIfArgumentIsInvalidFunctionName()
  {
    if (function_exists('not_a_Hamcrest_function'))
    {
      $this->markTestSkipped(
          'Function "not_a_Hamcrest_function" must not exist');
    }
    assertThat('not_a_Hamcrest_function', not(callable()));
  }

  public function testEvaluatesToFalseIfArgumentIsInvalidStaticMethodCallback()
  {
    assertThat(array('Hamcrest_Type_IsCallableTest', 'noMethod'), 
        not(callable())
    );
  }

  public function testEvaluatesToFalseIfArgumentIsInvalidInstanceMethodCallback()
  {
    assertThat(array($this, 'noMethod'), not(callable()));
  }

  public function testEvaluatesToFalseIfArgumentDoesntImplementInvoke()
  {
    assertThat(new stdClass(), not(callable()));
  }

  public function testEvaluatesToFalseIfArgumentDoesntMatchType()
  {
    assertThat(false, not(callable()));
    assertThat(5.2, not(callable()));
  }
  
  public function testHasAReadableDescription()
  {
    $this->assertDescription(
        'function name, callback array, Closure, or callable object',
        callable()
    );
  }
  
  public function testDecribesActualTypeInMismatchMessage()
  {
    $this->assertMismatchDescription('was "invalid-function"', callable(), 
        'invalid-function'
    );
  }
  
}
