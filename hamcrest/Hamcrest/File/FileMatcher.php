<?php

declare(strict_types=1);

/**
 * @author Vasek Brychta <vaclav@brychtovi.cz>
 */

namespace Hamcrest\File;

use Hamcrest\BaseMatcher;
use Hamcrest\Description;

abstract class FileMatcher extends BaseMatcher
{
	/** @var string */
	private $ownDescription;
	/** @var string */
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
		if ($this->isSafeType($item))
		{
			$this->describeFileMismatch($this->createSplFileInfoObjectFromPath($item), $mismatchDescription);
		}
		else
		{
			parent::describeMismatch($item, $mismatchDescription);
		}
	}

	abstract protected function matchesFile(\SplFileInfo $file): bool;

	protected function describeFileMismatch(\SplFileInfo $file, Description $mismatchDescription)
	{
		$mismatchDescription->appendValue($file)->appendText(' ')->appendText($this->failureDescription);
	}

	private function isSafeType($value): bool
	{
		return $value instanceof \SplFileInfo || is_string($value);
	}

	/**
	 * @param string|\SplFileInfo $item
	 * @return \SplFileInfo
	 */
	private function createSplFileInfoObjectFromPath($item): \SplFileInfo
	{
		if (is_string($item))
			return new \SplFileInfo($item);

		return $item;
	}
}