<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Core/IsInstanceOf.php';
require_once 'Hamcrest/Core/SampleBaseClass.php';
require_once 'Hamcrest/Core/SampleSubClass.php';

class Hamcrest_Core_IsInstanceOfTest extends Hamcrest_AbstractMatcherTest
{
  
  private $_baseClassInstance;
  private $_subClassInstance;
  
  public function setUp()
  {
    $this->_baseClassInstance = new Hamcrest_Core_SampleBaseClass('good');
    $this->_subClassInstance = new Hamcrest_Core_SampleSubClass('good');
  }
  
  protected function createMatcher()
  {
    return Hamcrest_Core_IsInstanceOf::anInstanceOf('stdClass');
  }
  
  public function testEvaluatesToTrueIfArgumentIsInstanceOfASpecificClass()
  {
    assertThat($this->_baseClassInstance, anInstanceOf('Hamcrest_Core_SampleBaseClass'));
    assertThat($this->_subClassInstance, anInstanceOf('Hamcrest_Core_SampleSubClass'));
    assertThat(null, not(anInstanceOf('Hamcrest_Core_SampleBaseClass')));
    assertThat(new stdClass(), not(anInstanceOf('Hamcrest_Core_SampleBaseClass')));
  }

  public function testEvaluatesToFalseIfArgumentIsNotAnObject()
  {
    assertThat(null, not(anInstanceOf('Hamcrest_Core_SampleBaseClass')));
    assertThat(false, not(anInstanceOf('Hamcrest_Core_SampleBaseClass')));
    assertThat(5, not(anInstanceOf('Hamcrest_Core_SampleBaseClass')));
    assertThat('foo', not(anInstanceOf('Hamcrest_Core_SampleBaseClass')));
    assertThat(array(1, 2, 3), not(anInstanceOf('Hamcrest_Core_SampleBaseClass')));
  }
  
  public function testHasAReadableDescription()
  {
    $this->assertDescription('an instance of stdClass', anInstanceOf('stdClass'));
  }
  
  public function testDecribesActualClassInMismatchMessage()
  {
    $this->assertMismatchDescription(
      '[Hamcrest_Core_SampleBaseClass] <good>',
      anInstanceOf('Hamcrest_Core_SampleSubClass'),
      $this->_baseClassInstance
    );
  }
  
}
