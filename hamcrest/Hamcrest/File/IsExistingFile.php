<?php

/**
 * @author Vasek Brychta <vaclav@brychtovi.cz>
 */

namespace Hamcrest\File;

class IsExistingFile extends FileMatcher
{
	public function __construct()
	{
		parent::__construct('an existing file', 'is not a file');
	}

	protected function matchesFile(\SplFileInfo $file)
	{
		return $file->isFile();
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
