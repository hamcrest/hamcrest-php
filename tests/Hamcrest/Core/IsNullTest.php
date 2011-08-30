<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Core/IsNull.php';

class Hamcrest_Core_IsNullTest extends Hamcrest_AbstractMatcherTest
{
  
  protected function createMatcher()
  {
    return Hamcrest_Core_IsNull::nullValue();
  }
  
  public function testEvaluatesToTrueIfArgumentIsNull()
  {
    assertThat(null, nullValue());
    assertThat(self::ANY_NON_NULL_ARGUMENT, not(nullValue()));
    
    assertThat(self::ANY_NON_NULL_ARGUMENT, notNullValue());
    assertThat(null, not(notNullValue()));
  }
  
}
