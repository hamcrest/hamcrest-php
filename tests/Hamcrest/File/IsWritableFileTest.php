<?php

/**
 * @author Vasek Brychta <vaclav@brychtovi.cz>
 */

namespace Hamcrest\File;

use Hamcrest\AbstractMatcherTest;

class IsWritableFileTest extends AbstractMatcherTest
{
	private static $WRITABLE_FILE_PATH;

	private static $WRITABLE_FILE;
	private static $NON_WRITABLE_FILE;

	/**
	 * @beforeClass
	 */
	public static function initializeFiles()
	{
		self::$WRITABLE_FILE_PATH = __FILE__;

		self::$WRITABLE_FILE = new \SplFileInfo(self::$WRITABLE_FILE_PATH);

		self::$NON_WRITABLE_FILE = new class('/tmp/non-writable') extends \SplFileInfo {
			public function isWritable()
			{
				return false;
			}
		};
	}

	protected function createMatcher()
	{
		return IsWritableFile::aWritableFile();
	}

	public function testMatchesAWritableFile()
	{
		$this->assertMatches(
			$this->createMatcher(),
			self::$WRITABLE_FILE,
			"should match a file that is writable"
		);
	}

	public function testMatchesAWritableFilePath()
	{
		$this->assertMatches(
			$this->createMatcher(),
			self::$WRITABLE_FILE_PATH,
			"should match a path to file that is writable"
		);
	}

	public function testDoesNotMatchAFileThatIsNotWritable()
	{
		$this->assertDoesNotMatch(
			$this->createMatcher(),
			self::$NON_WRITABLE_FILE,
			"should not match a file that is not writable"
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
		$this->assertDescription('a writable file', $this->createMatcher());
	}

	public function testHasAReadableMissmatchDescription()
	{
		$this->assertMismatchDescription(
			'<' . self::$NON_WRITABLE_FILE . '> cannot be written to',
			$this->createMatcher(),
			self::$NON_WRITABLE_FILE
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
