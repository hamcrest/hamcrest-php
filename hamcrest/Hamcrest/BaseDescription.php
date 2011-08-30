<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/Description.php';
require_once 'Hamcrest/SelfDescribing.php';
require_once 'Hamcrest/Internal/SelfDescribingValue.php';

/**
 * A {@link Hamcrest_Description} that is stored as a string.
 */
abstract class Hamcrest_BaseDescription implements Hamcrest_Description
{
  
  public function appendText($text)
  {
    $this->append($text);
    return $this;
  }
  
  public function appendDescriptionOf(Hamcrest_SelfDescribing $value)
  {
    $value->describeTo($this);
    return $this;
  }
  
  public function appendValue($value)
  {
    if (is_null($value))
    {
      $this->append('null');
    }
    elseif (is_string($value))
    {
      $this->_toPhpSyntax($value);
    }
    elseif (is_float($value))
    {
      $this->append('<');
      $this->append($value);
      $this->append('F>');
    }
    elseif (is_bool($value))
    {
      $this->append('<');
      $this->append($value ? 'true' : 'false');
      $this->append('>');
    }
    elseif (is_array($value) || $value instanceof Iterator || $value instanceof IteratorAggregate)
    {
      $this->appendValueList('[', ', ', ']', $value);
    }
    elseif (is_object($value) && !method_exists($value, '__toString'))
    {
      $this->append('<');
      $this->append(get_class($value));
      $this->append('>');
    }
    else
    {
      $this->append('<');
      $this->append($value);
      $this->append('>');
    }
    return $this;
  }
  
  public function appendValueList($start, $separator, $end, $values)
  {
    $list = array();
    foreach ($values as $v)
    {
      $list[] = new Hamcrest_Internal_SelfDescribingValue($v);
    }
    
    $this->appendList($start, $separator, $end, $list);
    return $this;
  }
  
  public function appendList($start, $separator, $end, $values)
  {
    $this->append($start);
    
    $separate = false;
    
    foreach ($values as $value)
    {
      /*if (!($value instanceof Hamcrest_SelfDescribing))
      {
        $value = new Hamcrest_Internal_SelfDescribingValue($value);
      }*/
      
      if ($separate)
      {
        $this->append($separator);
      }
      
      $this->appendDescriptionOf($value);
      
      $separate = true;
    }
    
    $this->append($end);
    
    return $this;
  }
  
  // -- Protected Methods
  
  /**
   * Append the String <var>$str</var> to the description.
   */
  abstract protected function append($str);
  
  // -- Private Methods
  
  private function _toPhpSyntax($value)
  {
    $str = '"';
    for ($i = 0, $len = strlen($value); $i < $len; ++$i)
    {
      switch ($value[$i])
      {
        case '"':
          $str .= '\\"';
          break;
        
        case "\t":
          $str .= '\\t';
          break;
        
        case "\r":
          $str .= '\\r';
          break;
        
        case "\n":
          $str .= '\\n';
          break;
        
        default:
          $str .= $value[$i];
      }
    }
    $str .= '"';
    $this->append($str);
  }
  
}
