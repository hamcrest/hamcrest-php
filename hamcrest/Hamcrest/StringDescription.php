<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/BaseDescription.php';
require_once 'Hamcrest/SelfDescribing.php';

/**
 * A {@link Hamcrest_Description} that is stored as a string.
 */
class Hamcrest_StringDescription extends Hamcrest_BaseDescription
{
  
  private $_out;
  
  public function __construct($out = '')
  {
    $this->_out = (string) $out;
  }
  
  public function __toString()
  {
    return $this->_out;
  }
  
  /**
   * Return the description of a {@link Hamcrest_SelfDescribing} object as a
   * String.
   * 
   * @param Hamcrest_SelfDescribing $selfDescribing
   *   The object to be described.
   * 
   * @return string
   *   The description of the object.
   */
  public static function toString(Hamcrest_SelfDescribing $selfDescribing)
  {
    $self = new self();
    return (string) $self->appendDescriptionOf($selfDescribing);
  }
  
  /**
   * Alias for {@link toString()}.
   */
  public static function asString(Hamcrest_SelfDescribing $selfDescribing)
  {
    return self::toString($selfDescribing);
  }
  
  // -- Protected Methods
  
  protected function append($str)
  {
    $this->_out .= $str;
  }
  
}
