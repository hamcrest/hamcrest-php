<?php

/**
 * @author Vasek Brychta <vaclav@brychtovi.cz>
 */

namespace Hamcrest\File;

use Hamcrest\AbstractMatcherTest;

class IsExistingFileTest extends AbstractMatcherTest
{
	private static $EXISTING_FILE_PATH;
	private static $NON_EXISTING_FILE_PATH;
	private static $EXISTING_DIRECTORY_PATH;

	private static $EXISTING_FILE;
	private static $NON_EXISTING_FILE;
	private static $EXISTING_DIRECTORY;

	/**
	 * @beforeClass
	 */
	public static function initializeFiles()
	{
		self::$EXISTING_FILE_PATH = __FILE__;
		self::$NON_EXISTING_FILE_PATH = __DIR__ . '/does-not-exist';
		self::$EXISTING_DIRECTORY_PATH = __DIR__;

		self::$EXISTING_FILE = new \SplFileInfo(self::$EXISTING_FILE_PATH);
		self::$NON_EXISTING_FILE = new \SplFileInfo(self::$NON_EXISTING_FILE_PATH);
		self::$EXISTING_DIRECTORY = new \SplFileInfo(self::$EXISTING_DIRECTORY_PATH);
	}

	protected function createMatcher()
	{
		return IsExistingFile::anExistingFile();
	}

	public function testMatchesAnExistingFile()
	{
		$this->assertMatches(
			$this->createMatcher(),
			self::$EXISTING_FILE,
			"should match a file that actualy exists"
		);
	}

	public function testMatchesAnExistingFilePath()
	{
		$this->assertMatches(
			$this->createMatcher(),
			self::$EXISTING_FILE_PATH,
			"should match a path to file that actualy exists"
		);
	}

	public function testDoesNotMatchAFileThatDoesNotExist()
	{
		$this->assertDoesNotMatch(
			$this->createMatcher(),
			self::$NON_EXISTING_FILE,
			"should not match a file that does not exist"
		);
	}

	public function testDoesNotMatchAFilePathThatDoesNotExist()
	{
		$this->assertDoesNotMatch(
			$this->createMatcher(),
			self::$NON_EXISTING_FILE_PATH,
			"should not match a path to file that does not exist"
		);
	}

	public function testDoesNotMatchAnExistingDirectory()
	{
		$this->assertDoesNotMatch(
			$this->createMatcher(),
			self::$EXISTING_DIRECTORY,
			"should not match an existing directory"
		);
	}

	public function testDoesNotMatchAnExistingDirectoryPath()
	{
		$this->assertDoesNotMatch(
			$this->createMatcher(),
			self::$EXISTING_DIRECTORY_PATH,
			"should not match a path to existing directory"
		);
	}

	public function testDoesNotMatchNull()
	{
		$this->assertDoesNotMatch(
			$this->createMatcher(),
			null,
			'should not match null'
		);
	}

	public function testHasAReadableDescription()
	{
		$this->assertDescription('an existing file', $this->createMatcher());
	}

	public function testHasAReadableMissmatchDescription()
	{
		$this->assertMismatchDescription(
			'<' . self::$NON_EXISTING_FILE . '> is not a file',
			$this->createMatcher(),
			self::$NON_EXISTING_FILE
		);
	}

	public function testHasAReadableMissmatchDescriptionForPath()
	{
		$this->assertMismatchDescription(
			'<' . self::$NON_EXISTING_FILE_PATH . '> is not a file',
			$this->createMatcher(),
			self::$NON_EXISTING_FILE_PATH
		);
	}

	public function testHasAReadableTypeMissmatchDescription()
	{
		$this->assertMismatchDescription(
			'was <stdClass>',
			$this->createMatcher(),
			new \stdClass()
		);
	}
}
