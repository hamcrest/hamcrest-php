<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Core/IsSet.php';

class Hamcrest_Core_IsSetTest extends Hamcrest_AbstractMatcherTest
{

  public static $_classProperty;
  public $_instanceProperty;

  protected function setUp()
  {
    self::$_classProperty = null;
    unset($this->_instanceProperty);
  }
  
  protected function createMatcher()
  {
    return Hamcrest_Core_IsSet::set('property_name');
  }

  public function testEvaluatesToTrueIfArrayPropertyIsSet()
  {
    assertThat(array('foo' => 'bar'), set('foo'));
  }

  public function testNegatedEvaluatesToFalseIfArrayPropertyIsSet()
  {
    assertThat(array('foo' => 'bar'), not(notSet('foo')));
  }

  public function testEvaluatesToTrueIfClassPropertyIsSet()
  {
    self::$_classProperty = 'bar';
    assertThat('Hamcrest_Core_IsSetTest', set('_classProperty'));
  }

  public function testNegatedEvaluatesToFalseIfClassPropertyIsSet()
  {
    self::$_classProperty = 'bar';
    assertThat('Hamcrest_Core_IsSetTest', not(notSet('_classProperty')));
  }

  public function testEvaluatesToTrueIfObjectPropertyIsSet()
  {
    $this->_instanceProperty = 'bar';
    assertThat($this, set('_instanceProperty'));
  }

  public function testNegatedEvaluatesToFalseIfObjectPropertyIsSet()
  {
    $this->_instanceProperty = 'bar';
    assertThat($this, not(notSet('_instanceProperty')));
  }

  public function testEvaluatesToFalseIfArrayPropertyIsNotSet()
  {
    assertThat(array('foo' => 'bar'), not(set('baz')));
  }

  public function testNegatedEvaluatesToTrueIfArrayPropertyIsNotSet()
  {
    assertThat(array('foo' => 'bar'), notSet('baz'));
  }

  public function testEvaluatesToFalseIfClassPropertyIsNotSet()
  {
    assertThat('Hamcrest_Core_IsSetTest', not(set('_classProperty')));
  }

  public function testNegatedEvaluatesToTrueIfClassPropertyIsNotSet()
  {
    assertThat('Hamcrest_Core_IsSetTest', notSet('_classProperty'));
  }

  public function testEvaluatesToFalseIfObjectPropertyIsNotSet()
  {
    assertThat($this, not(set('_instanceProperty')));
  }

  public function testNegatedEvaluatesToTrueIfObjectPropertyIsNotSet()
  {
    assertThat($this, notSet('_instanceProperty'));
  }
  
  public function testHasAReadableDescription()
  {
    $this->assertDescription('set property foo', set('foo'));
    $this->assertDescription('unset property bar', notSet('bar'));
  }
  
  public function testDecribesPropertySettingInMismatchMessage()
  {
    $this->assertMismatchDescription('was not set', set('bar'),
        array('foo' => 'bar')
    );
    $this->assertMismatchDescription('was "bar"', notSet('foo'),
        array('foo' => 'bar')
    );
    self::$_classProperty = 'bar';
    $this->assertMismatchDescription('was "bar"', notSet('_classProperty'),
        'Hamcrest_Core_IsSetTest'
    );
    $this->_instanceProperty = 'bar';
    $this->assertMismatchDescription('was "bar"', notSet('_instanceProperty'),
        $this
    );
  }
  
}
