<?php

/**
 * @author Vasek Brychta <vaclav@brychtovi.cz>
 */

namespace Hamcrest\File;

class IsExistingFileOrDirectory extends FileMatcher
{
	public function __construct()
	{
		parent::__construct('an existing file or directory', 'does not exist');
	}

	protected function matchesFile(\SplFileInfo $file)
	{
		return $file->isFile() || $file->isDir();
	}

	/**
	 * Evaluates to true if the file exists and is a regular file or a directory.
	 * Accepts only <code>\SplFileInfo</code> objects or <code>string</code> paths.
	 *
	 * @return \Hamcrest\File\IsExistingFileOrDirectory
	 * @factory
	 */
	public static function anExistingFileOrDirectory()
	{
		return new self();
	}
}
