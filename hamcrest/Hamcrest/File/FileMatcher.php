<?php

/**
 * @author Vasek Brychta <vaclav@brychtovi.cz>
 */

namespace Hamcrest\File;

use Hamcrest\BaseMatcher;
use Hamcrest\Description;

abstract class FileMatcher extends BaseMatcher
{
	/**
	 * Description of the matcher that will be returned from the {@link describeTo()} method.
	 *
	 * @var string
	 */
	private $ownDescription;

	/**
	 * Description of a mismatch for the matcher, it will be prepended by the actual value that does not match.
	 *
	 * @var string
	 */
	private $failureDescription;

	/**
	 * @param string $ownDescription
	 * @param string $failureDescription
	 */
	public function __construct($ownDescription, $failureDescription)
	{
		$this->ownDescription = $ownDescription;
		$this->failureDescription = $failureDescription;
	}

	public function describeTo(Description $description)
	{
		$description->appendText($this->ownDescription);
	}

	final public function matches($item)
	{
		return $this->isSafeType($item) && $this->matchesFile($this->createSplFileInfoObjectFromPath($item));
	}

	final public function describeMismatch($item, Description $mismatchDescription)
	{
		if ($this->isSafeType($item)) {
			$this->describeFileMismatch($this->createSplFileInfoObjectFromPath($item), $mismatchDescription);
		} else {
			parent::describeMismatch($item, $mismatchDescription);
		}
	}

	/**
	 * Implement this method to provide the actual functionality of the matcher.
	 * It is guaranteed that the {@link $file} parameter is always {@code \SplFileInfo}.
	 *
	 * @param \SplFileInfo $file
	 * @return bool
	 */
	abstract protected function matchesFile(\SplFileInfo $file);

	protected function describeFileMismatch(\SplFileInfo $file, Description $mismatchDescription)
	{
		$mismatchDescription->appendValue($file)->appendText(' ')->appendText($this->failureDescription);
	}

	/**
	 * @param $value
	 * @return bool
	 */
	private function isSafeType($value)
	{
		return $value instanceof \SplFileInfo || is_string($value);
	}

	/**
	 * @param string|\SplFileInfo $item
	 * @return \SplFileInfo
	 */
	private function createSplFileInfoObjectFromPath($item)
	{
		if (is_string($item))
			return new \SplFileInfo($item);

		return $item;
	}
}
