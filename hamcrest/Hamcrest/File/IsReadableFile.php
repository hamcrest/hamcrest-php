<?php

/**
 * @author Vasek Brychta <vaclav@brychtovi.cz>
 */

namespace Hamcrest\File;

class IsReadableFile extends FileMatcher
{
	public function __construct()
	{
		parent::__construct('a readable file', 'cannot be read');
	}

	protected function matchesFile(\SplFileInfo $file)
	{
		return $file->isReadable();
	}

	/**
	 * Evaluates to true if the file is readable.
	 * Accepts only <code>\SplFileInfo</code> objects or <code>string</code> paths.
	 *
	 * @return \Hamcrest\File\IsReadableFile
	 * @factory
	 */
	public static function aReadableFile()
	{
		return new self();
	}
}
