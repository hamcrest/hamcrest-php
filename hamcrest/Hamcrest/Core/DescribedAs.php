<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/BaseMatcher.php';
require_once 'Hamcrest/Description.php';
require_once 'Hamcrest/Matcher.php';

/**
 * Provides a custom description to another matcher.
 */
class Hamcrest_Core_DescribedAs extends Hamcrest_BaseMatcher
{
  
  private $_descriptionTemplate;
  private $_matcher;
  private $_values;
  
  const ARG_PATTERN = '/%([0-9]+)/';
  
  public function __construct($descriptionTemplate, Hamcrest_Matcher $matcher,
    array $values)
  {
    $this->_descriptionTemplate = $descriptionTemplate;
    $this->_matcher = $matcher;
    $this->_values = $values;
  }
  
  public function matches($item)
  {
    return $this->_matcher->matches($item);
  }
  
  public function describeTo(Hamcrest_Description $description)
  {
    $textStart = 0;
    while (preg_match(self::ARG_PATTERN, $this->_descriptionTemplate,
      $matches, PREG_OFFSET_CAPTURE, $textStart))
    {
      
      $text = $matches[0][0];
      $index = $matches[1][0];
      $offset = $matches[0][1];
      
      $description->appendText(substr($this->_descriptionTemplate, $textStart, $offset - $textStart));
      $description->appendValue($this->_values[$index]);
      
      $textStart = $offset + strlen($text);
    }
    
    if ($textStart < strlen($this->_descriptionTemplate))
    {
      $description->appendText(substr($this->_descriptionTemplate, $textStart));
    }
  }
  
  /**
   * Wraps an existing matcher and overrides the description when it fails.
   *
   * @factory ...
   */
  public static function describedAs(/* $description, Hamcrest_Matcher $matcher, $values... */)
  {
    $args = func_get_args();
    $description = array_shift($args);
    $matcher = array_shift($args);
    $values = $args;
    
    return new self($description, $matcher, $values);
  }
  
}
