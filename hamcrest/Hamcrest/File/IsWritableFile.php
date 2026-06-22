<?php

/**
 * @author Vasek Brychta <vaclav@brychtovi.cz>
 */

namespace Hamcrest\File;

class IsWritableFile extends FileMatcher
{
	public function __construct()
	{
		parent::__construct('a writable file', 'cannot be written to');
	}

	protected function matchesFile(\SplFileInfo $file)
	{
		return $file->isWritable();
	}

	/**
	 * Evaluates to true if the file is writable.
	 * Accepts only <code>\SplFileInfo</code> objects or <code>string</code> paths.
	 *
	 * @return \Hamcrest\File\IsWritableFile
	 * @factory
	 */
	public static function aWritableFile()
	{
		return new self();
	}
}
