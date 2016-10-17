<?php


namespace PONIpar\ProductSubitem;

use PONIpar\ProductSubitem\Subitem;

/*
   This file is part of the PONIpar PHP Onix Parser Library.
   Copyright (c) 2012, [di] digitale informationssysteme gmbh
   All rights reserved.

   The software is provided under the terms of the new (3-clause) BSD license.
   Please see the file LICENSE for details.
*/

/**
 * A <OtherText> subitem.
 */
class OtherText extends Subitem {

	// List 33
	const TYPE_MAIN_DESCRIPTION = "01";
	const TYPE_SHORT_DESCRIPTIONANNOTATION = "02";
	const TYPE_LONG_DESCRIPTION = "03";
	const TYPE_TABLE_OF_CONTENTS = "04";
	const TYPE_REVIEW_QUOTE_RESTRICTED_LENGTH = "05";
	const TYPE_QUOTE_FROM_REVIEW_OF_PREVIOUS_EDITION = "06";
	const TYPE_REVIEW_TEXT = "07";
	const TYPE_REVIEW_QUOTE = "08";
	const TYPE_PROMOTIONAL_HEADLINE = "09";
	const TYPE_PREVIOUS_REVIEW_QUOTE = "10";
	const TYPE_AUTHOR_COMMENTS = "11";
	const TYPE_DESCRIPTION_FOR_READER = "12";
	const TYPE_BIOGRAPHICAL_NOTE = "13";
	const TYPE_DESCRIPTION_FOR_READING_GROUP_GUIDE = "14";
	const TYPE_DISCUSSION_QUESTION_FOR_READING_GROUP_GUIDE = "15";
	const TYPE_COMPETING_TITLES = "16";
	const TYPE_FLAP_COPY = "17";
	const TYPE_BACK_COVER_COPY = "18";
	const TYPE_FEATURE = "19";
	const TYPE_NEW_FEATURE = "20";
	const TYPE_PUBLISHERS_NOTICE = "21";
	const TYPE_INDEX = "22";
	const TYPE_EXCERPT_FROM_BOOK = "23";
	const TYPE_FIRST_CHAPTER = "24";
	const TYPE_DESCRIPTION_FOR_SALES_PEOPLE = "25";
	const TYPE_DESCRIPTION_FOR_PRESS_OR_OTHER_MEDIA = "26";
	const TYPE_DESCRIPTION_FOR_SUBSIDIARY_RIGHTS_DEPARTMENT = "27";
	const TYPE_DESCRIPTION_FOR_TEACHERSEDUCATORS = "28";
	const TYPE_UNPUBLISHED_ENDORSEMENT = "30";
	const TYPE_DESCRIPTION_FOR_BOOKSTORE = "31";
	const TYPE_DESCRIPTION_FOR_LIBRARY = "32";
	const TYPE_INTRODUCTION_OR_PREFACE = "33";
	const TYPE_FULL_TEXT = "34";
	const TYPE_PROMOTIONAL_TEXT = "35";
	const TYPE_AUTHOR_INTERVIEW__QANDA = "40";
	const TYPE_READING_GROUP_GUIDE = "41";
	const TYPE_COMMENTARY__DISCUSSION = "42";
	const TYPE_SHORT_DESCRIPTION_FOR_SERIES_OR_SET = "43";
	const TYPE_LONG_DESCRIPTION_FOR_SERIES_OR_SET = "44";
	const TYPE_CONTRIBUTOR_EVENT_SCHEDULE = "45";
	const TYPE_LICENSE = "46";
	const TYPE_OPEN_ACCESS_STATEMENT = "47";
	const TYPE_DIGITAL_EXCLUSIVITY_STATEMENT = "48";
	const TYPE_OFFICIAL_RECOMMENDATION = "49";
	const TYPE_MASTER_BRAND_NAME = "98";
	const TYPE_COUNTRY_OF_FINAL_MANUFACTURE = "99";

	// List 34
	const FORMAT_ASCII_TEXT = "00";
	const FORMAT_SGML = "01";
	const FORMAT_HTML = "02";
	const FORMAT_XML = "03";
	const FORMAT_PDF = "04";
	const FORMAT_XHTML = "05";
	const FORMAT_DEFAULT_TEXT_FORMAT = "06";
	const FORMAT_BASIC_ASCII_TEXT = "07";
	const FORMAT_MICROSOFT_RICH_TEXT_FORMAT_RTF = "09";
	const FORMAT_MICROSOFT_WORD_BINARY_FORMAT_DOC = "10";
	const FORMAT_ECMA_376_WORDPROCESSINGML = "11";
	const FORMAT_ISO_26300_ODF = "12";
	const FORMAT_COREL_WORDPERFECT_BINARY_FORMAT_DOC = "13";
	const FORMAT_EPUB = "14";
	const FORMAT_XPS = "15";

	protected $typeMapper = array(
			"01" => "Main description",
			"02" => "Short description/annotation",
			"03" => "Long description",
			"04" => "Table of contents",
			"05" => "Review quote, restricted length",
			"06" => "Quote from review of previous edition",
			"07" => "Review text",
			"08" => "Review quote",
			"09" => "Promotional ‘headline’",
			"10" => "Previous review quote",
			"11" => "Author comments",
			"12" => "Description for reader",
			"13" => "Biographical note",
			"14" => "Description for Reading Group Guide",
			"15" => "Discussion question for Reading Group Guide",
			"16" => "Competing titles",
			"17" => "Flap copy",
			"18" => "Back cover copy",
			"19" => "Feature",
			"20" => "New feature",
			"21" => "Publisher’s notice",
			"22" => "Index",
			"23" => "Excerpt from book",
			"24" => "First chapter",
			"25" => "Description for sales people",
			"26" => "Description for press or other media",
			"27" => "Description for subsidiary rights department",
			"28" => "Description for teachers/educators",
			"30" => "Unpublished endorsement",
			"31" => "Description for bookstore",
			"32" => "Description for library",
			"33" => "Introduction or preface",
			"34" => "Full text",
			"35" => "Promotional text",
			"40" => "Author interview / QandA",
			"41" => "Reading Group Guide",
			"42" => "Commentary / discussion",
			"43" => "Short description for series or set",
			"44" => "Long description for series or set",
			"45" => "Contributor event schedule",
			"46" => "License",
			"47" => "Open access statement",
			"48" => "Digital exclusivity statement",
			"49" => "Official recommendation",
			"98" => "Master brand name",
			"99" => "Country of final manufacture"
	);

	/**
	 * Text data
	 */
	protected $type = null;
	protected $format = null;
	protected $value = null;
	protected $author = null;

	/**
	 * Create a new OtherText.
	 *
	 * @param mixed $in The <OtherText> DOMDocument or DOMElement.
	 */
	public function __construct($in) {
		parent::__construct($in);
		
		try {$this->type = $this->_getSingleChildElementText('TextTypeCode');} catch(\Exception $e) { }
		
		// try 3.0
		if( !$this->type )
			try {$this->type = $this->_getSingleChildElementText('TextType');} catch(\Exception $e) { }
		
		try {$this->format = $this->_getSingleChildElementText('TextFormat');} catch(\Exception $e) { }
		try {$this->value = $this->_getSingleChildElementText('Text');} catch(\Exception $e) { }
		try {$this->author = $this->_getSingleChildElementText('TextAuthor');} catch(\Exception $e) { }
		
		$this->cleanValue();
		
		// Save memory.
		$this->_forgetSource();
	}

	/**
	 * Retrieve the type of this text.
	 *
	 * @param bool $mapped
	 * @return string The contents of <TextTypeCode>.
	 */
	public function getType($mapped = false) {
		if ($mapped && isset($this->typeMapper[$this->type])) {
			return $this->typeMapper[$this->type];
		}
		return $this->type;
	}
	
	/**
	 * Retrieve the format of this text.
	 *
	 * @return string The contents of <TextFormat>.
	 */
	public function getFormat() {
		return $this->format;
	}

	/**
	 * Retrieve the actual value of this text.
	 *
	 * @return string The contents of <Text>.
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * Retrieve the actual value of this text.
	 *
	 * @return string The contents of <TextAuthor>.
	 */
	public function getAuthor() {
		return $this->author;
	}

	private function cleanValue(){
		if( !$this->value ) return;
		$this->value = str_replace("<![CDATA[","",$this->value);
		$this->value = preg_replace("/\]\]>*$/","",$this->value);
	}
};

