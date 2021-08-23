<?php

declare(strict_types=1);

/**
 * @author Vasek Brychta <vaclav@brychtovi.cz>
 */

namespace Hamcrest\File;

use Hamcrest\BaseMatcher;
use Hamcrest\Description;

class IsExistingFile extends BaseMatcher
{
	public function describeTo(Description $description)
	{
		$description->appendText('an existing file');
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

	private function matchesFile(\SplFileInfo $file): bool
	{
		return $file->isFile();
	}

	private function describeFileMismatch(\SplFileInfo $file, Description $mismatchDescription)
	{
		$mismatchDescription->appendValue($file)->appendText(' is not a file');
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

	/**
	 * Evaluates to true if the file exists and is a regular file.
	 * Accepts only <code>\SplFileInfo</code> objects or <code>string</code> paths.
	 *
	 * @return \Hamcrest\File\IsExistingFile
	 * @factory
	 */
	public static function anExistingFile()
	{
		return new self();
	}
}