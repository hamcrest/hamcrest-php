<?php

/**
 * @author Vasek Brychta <vaclav@brychtovi.cz>
 */

namespace Hamcrest\File;

use Hamcrest\AbstractMatcherTest;

class IsReadableFileTest extends AbstractMatcherTest
{
	private static $READABLE_FILE_PATH;

	private static $READABLE_FILE;
	private static $NON_READABLE_FILE;

	/**
	 * @beforeClass
	 */
	public static function initializeFiles()
	{
		self::$READABLE_FILE_PATH = __FILE__;

		self::$READABLE_FILE = new \SplFileInfo(self::$READABLE_FILE_PATH);

		self::$NON_READABLE_FILE = new class('/tmp/non-readable') extends \SplFileInfo {
			public function isReadable()
			{
				return false;
			}
		};
	}

	protected function createMatcher()
	{
		return IsReadableFile::aReadableFile();
	}

	public function testMatchesAReadableFile()
	{
		$this->assertMatches(
			$this->createMatcher(),
			self::$READABLE_FILE,
			"should match a file that is readable"
		);
	}

	public function testMatchesAReadableFilePath()
	{
		$this->assertMatches(
			$this->createMatcher(),
			self::$READABLE_FILE_PATH,
			"should match a path to file that is readable"
		);
	}

	public function testDoesNotMatchAFileThatIsNotReadable()
	{
		$this->assertDoesNotMatch(
			$this->createMatcher(),
			self::$NON_READABLE_FILE,
			"should not match a file that is not readable"
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
		$this->assertDescription('a readable file', $this->createMatcher());
	}

	public function testHasAReadableMissmatchDescription()
	{
		$this->assertMismatchDescription(
			'<' . self::$NON_READABLE_FILE . '> cannot be read',
			$this->createMatcher(),
			self::$NON_READABLE_FILE
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
