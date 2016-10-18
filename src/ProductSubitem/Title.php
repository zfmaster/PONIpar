<?php

namespace PONIpar\ProductSubitem;

use PONIpar\ONIXException;

/*
   This file is part of the PONIpar PHP Onix Parser Library.
   Copyright (c) 2012, [di] digitale informationssysteme gmbh
   All rights reserved.

   The software is provided under the terms of the new (3-clause) BSD license.
   Please see the file LICENSE for details.
*/

/**
 * A <Title> subitem.
 */
class Title extends Subitem {

	// List 15
	const TYPE_DISTINCTIVE_TITLE = "01";
	const TYPE_ISSN_KEY_TITLE_OF_SERIAL = "02";
	const TYPE_TITLE_IN_ORIGINAL_LANGUAGE = "03";
	const TYPE_TITLE_ACRONYM_OR_INITIALISM = "04";
	const TYPE_ABBREVIATED_TITLE = "05";
	const TYPE_TITLE_IN_OTHER_LANGUAGE = "06";
	const TYPE_THEMATIC_TITLE_OF_JOURNAL_ISSUE = "07";
	const TYPE_FORMER_TITLE = "08";
	const TYPE_DISTRIBUTORS_TITLE = "10";
	const TYPE_ALTERNATIVE_TITLE_ON_COVER = "11";
	const TYPE_ALTERNATIVE_TITLE_ON_BACK = "12";
	const TYPE_EXPANDED_TITLE = "13";
	const TYPE_ALTERNATIVE_TITLE = "14";

	protected $typeMapper = array(
			"01" => "Distinctive title",
			"02" => "ISSN key title of serial",
			"03" => "Title in original language",
			"04" => "Title acronym or initialism",
			"05" => "Abbreviated title",
			"06" => "Title in other language",
			"07" => "Thematic title of journal issue",
			"08" => "Former title",
			"10" => "Distributor’s title",
			"11" => "Alternative title on cover",
			"12" => "Alternative title on back",
			"13" => "Expanded title",
			"14" => "Alternative title"
	);

	/**
	 * The type of this product identifier.
	 */
	protected $type = null;

	/**
	 * The title's values
	 */
	protected $value = array(
			'title' => null,
			'subtitle' => null
	);

	/**
	 * Create a new Title.
	 *
	 * @param mixed $in The <Title> DOMDocument or DOMElement.
	 * @throws ONIXException
	 * @throws \PONIpar\InternalException
	 */
	public function __construct($in) {
		parent::__construct($in);

		// Retrieve and check the type.
		$type = $this->_getSingleChildElementText('TitleType');

		if (!preg_match('/^[0-9]{2}$/', $type)) {
			throw new ONIXException('wrong format of TitleType');
		}
		$this->type = $type;

		try {$this->value['title'] = $this->_getSingleChildElementText('TitleText');} catch(\Exception $e) { }
		try {$this->value['subtitle'] = $this->_getSingleChildElementText('Subtitle');} catch(\Exception $e) { }

		// try 3.0 structure
		if( !$this->value['title'] ){
			try {$this->value['title'] = $this->_getSingleChildElementText('TitleElement/TitleText');} catch(\Exception $e) { }
			try {$this->value['subtitle'] = $this->_getSingleChildElementText('TitleElement/Subtitle');} catch(\Exception $e) { }
		}

		// Save memory.
		$this->_forgetSource();
	}

	/**
	 * Retrieve the type of this identifier.
	 *
	 * @param bool $mapped
	 * @return string The contents of <ProductIDType>.
	 */
	public function getType($mapped = false) {
		if ($mapped && isset($this->typeMapper[$this->type])) {
			return $this->typeMapper[$this->type];
		}
		return $this->type;
	}

	/**
	 * Retrieve the actual value of this identifier.
	 *
	 * @return string The contents of <IDValue>.
	 */
	public function getValue() {
		return $this->value;
	}

};

// a provider ONIX would foundn to use camelcase tag, so support this.
//class_alias('Title', 'Title');

