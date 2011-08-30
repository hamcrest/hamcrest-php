<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/SelfDescribing.php';

/**
 * A description of a Matcher. A Matcher will describe itself to a description
 * which can later be used for reporting.
 *
 * @see Hamcrest_Matcher::describeTo()
 */
interface Hamcrest_Description
{
  
  /**
   * Appends some plain text to the description.
   * 
   * @param string $text
   * 
   * @return Hamcrest_Description
   */
  public function appendText($text);
  
  /**
   * Appends the description of a {@link Hamcrest_SelfDescribing} value to
   * this description.
   * 
   * @param Hamcrest_SelfDescribing $value
   * 
   * @return Hamcrest_Description
   */
  public function appendDescriptionOf(Hamcrest_SelfDescribing $value);
  
  /**
   * Appends an arbitary value to the description.
   * 
   * @param mixed $value
   * 
   * @return Hamcrest_SelfDescribing
   */
  public function appendValue($value);
  
  /**
   * Appends a list of values to the description.
   * 
   * @param string $start
   * @param string $separator
   * @param string $end
   * @param array|IteratorAggregate|Iterator $values
   * 
   * @return Hamcrest_Description
   */
  public function appendValueList($start, $separator, $end, $values);
  
  /**
   * Appends a list of {@link Hamcrest_SelfDescribing} objects to the
   * description.
   * 
   * @param string $start
   * @param string $separator
   * @param string $end
   * @param array|IteratorAggregate|Iterator $values
   *   must be instances of {@link Hamcrest_SelfDescribing}
   * 
   * @return Hamcrest_Description
   */
  public function appendList($start, $separator, $end, $values);
  
}
