<?php

/**
 * @author Vasek Brychta <vaclav@brychtovi.cz>
 */

namespace Hamcrest\File;

use Hamcrest\AbstractMatcherTest;

class IsFileWithSizeTest extends AbstractMatcherTest
{
	private static $FILE_PATH;
	private static $FILE;
	private static $ACTUAL_SIZE;

	private static $EMPTY_FILE;

	/**
	 * @beforeClass
	 */
	public static function initializeFiles()
	{
		self::$FILE_PATH = __FILE__;
		self::$FILE = new \SplFileInfo(self::$FILE_PATH);
		self::$ACTUAL_SIZE = filesize(self::$FILE_PATH);

		self::$EMPTY_FILE = new class('/tmp/empty') extends \SplFileInfo {
			public function getSize()
			{
				return 0;
			}
		};
	}

	protected function createMatcher()
	{
		return IsFileWithSize::aFileWithSize(not(anything()));
	}

	public function testMatchesAFileWithEqualSize()
	{
		$this->assertMatches(
			aFileWithSize(self::$ACTUAL_SIZE),
			self::$FILE,
			"should match a file that has equal size"
		);
	}

	public function testMatchesAFilePathWithEqualSize()
	{
		$this->assertMatches(
			aFileWithSize(self::$ACTUAL_SIZE),
			self::$FILE_PATH,
			"should match a file path that has equal size"
		);
	}

	public function testDoesNotMatchAFileWithDifferentSize()
	{
		$this->assertDoesNotMatch(
			aFileWithSize(self::$ACTUAL_SIZE + 1),
			self::$FILE,
			"should not match a file that has a different size"
		);
	}

	public function testDoesNotMatchAFilePathWithDifferentSize()
	{
		$this->assertDoesNotMatch(
			aFileWithSize(self::$ACTUAL_SIZE + 1),
			self::$FILE_PATH,
			"should not match a file path that has a different size"
		);
	}

	public function testMatchesAFileWithSizeMatchedByAnotherMatcher()
	{
		$this->assertMatches(
			aFileWithSize(greaterThan(self::$ACTUAL_SIZE - 1)),
			self::$FILE,
			"should match a file with size that is matched by another matcher"
		);
	}

	public function testMatchesAFilePathWithSizeMatchedByAnotherMatcher()
	{
		$this->assertMatches(
			aFileWithSize(greaterThan(self::$ACTUAL_SIZE - 1)),
			self::$FILE_PATH,
			"should match a file path with size that is matched by another matcher"
		);
	}

	public function testDoesNotMatchAFileWithSizeNotMatchedByAnotherMatcher()
	{
		$this->assertDoesNotMatch(
			aFileWithSize(greaterThan(self::$ACTUAL_SIZE)),
			self::$FILE,
			"should not match a file with size that is not matched by another matcher"
		);
	}

	public function testEmptyFileMatcherMatchesEmptyFile()
	{
		$this->assertMatches(
			anEmptyFile(),
			self::$EMPTY_FILE,
			"should match an empty file"
		);
	}

	public function testEmptyFileMatcherDoesNotMatchNonEmptyFile()
	{
		$this->assertDoesNotMatch(
			anEmptyFile(),
			self::$FILE,
			"should not match non-empty file"
		);
	}

	public function testNonEmptyFileMatcherMatchesNonEmptyFile()
	{
		$this->assertMatches(
			aNonEmptyFile(),
			self::$FILE,
			"should match a non-empty file"
		);
	}

	public function testNonEmptyFileMatcherDoesNotMatchEmptyFile()
	{
		$this->assertDoesNotMatch(
			aNonEmptyFile(),
			self::$EMPTY_FILE,
			"should not match empty file"
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
		$this->assertDescription('a file with size <42>', aFileWithSize(42));
	}

	public function testHasAReadableDescriptionWithAnotherMatcher()
	{
		$this->assertDescription('a file with size a value greater than <42>', aFileWithSize(greaterThan(42)));
	}

	public function testEmptyFileMatcherHasAReadableDescription()
	{
		$this->assertDescription('an empty file', anEmptyFile());
	}

	public function testNonEmptyFileMatcherHasAReadableDescription()
	{
		$this->assertDescription('a non-empty file', aNonEmptyFile());
	}

	public function testHasAReadableMissmatchDescription()
	{
		$this->assertMismatchDescription(
			'size was <' . self::$ACTUAL_SIZE . '>',
			$this->createMatcher(),
			self::$FILE
		);
	}

	public function testEmptyFileMatcherHasAReadableMissmatchDescription()
	{
		$this->assertMismatchDescription(
			'size was <' . self::$ACTUAL_SIZE . '>',
			anEmptyFile(),
			self::$FILE
		);
	}

	public function testNonEmptyFileMatcherHasAReadableMissmatchDescription()
	{
		$this->assertMismatchDescription(
			'size was <0>',
			aNonEmptyFile(),
			self::$EMPTY_FILE
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
