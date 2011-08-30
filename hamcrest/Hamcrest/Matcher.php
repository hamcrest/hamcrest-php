<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/SelfDescribing.php';

/**
 * A matcher over acceptable values.
 * A matcher is able to describe itself to give feedback when it fails.
 * <p/>
 * Matcher implementations should <b>NOT directly implement this interface</b>.
 * Instead, <b>extend</b> the {@link Hamcrest_BaseMatcher} abstract class,
 * which will ensure that the Matcher API can grow to support
 * new features and remain compatible with all Matcher implementations.
 * <p/>
 * For easy access to common Matcher implementations, use the static factory
 * methods in {@link Hamcrest_CoreMatchers}.
 *
 * @see Hamcrest_CoreMatchers
 * @see Hamcrest_BaseMatcher
 */
interface Hamcrest_Matcher extends Hamcrest_SelfDescribing
{
  
  /**
   * Evaluates the matcher for argument <var>$item</var>.
   * 
   * @param mixed $item the object against which the matcher is evaluated.
   * 
   * @return boolean <code>true</code> if <var>$item</var> matches,
   *   otherwise <code>false</code>.
   * 
   * @see Hamcrest_BaseMatcher
   */
  public function matches($item);
  
  /**
   * Generate a description of why the matcher has not accepted the item.
   * The description will be part of a larger description of why a matching
   * failed, so it should be concise. 
   * This method assumes that <code>matches($item)</code> is false, but 
   * will not check this.
   * 
   * @param mixed $item The item that the Matcher has rejected.
   * @param Hamcrest_Description $mismatchDescription
   *   The description to be built or appended to.
   */
  public function describeMismatch($item, Hamcrest_Description $description);
  
}
