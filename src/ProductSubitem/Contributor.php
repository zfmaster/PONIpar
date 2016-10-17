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
 * A <Contributor> subitem.
 */
class Contributor extends Subitem
{

	// Mapping of constants to types.
	const ROLE_AUTHOR = 'A01';
	const ROLE_NARRATOR = 'E03';
	const ROLE_READBY = 'E07';
	const ROLE_PERFORMER = 'E99';

	protected $roleCodes = array(
			"A01" => "By (author)",
			"A02" => "With",
			"A03" => "Screenplay by",
			"A04" => "Libretto by",
			"A05" => "Lyrics by",
			"A06" => "By (composer)",
			"A07" => "By (artist)",
			"A08" => "By (photographer)",
			"A09" => "Created by",
			"A10" => "From an idea by",
			"A11" => "Designed by",
			"A12" => "Illustrated by",
			"A13" => "Photographs by",
			"A14" => "Text by",
			"A15" => "Preface by",
			"A16" => "Prologue by",
			"A17" => "Summary by",
			"A18" => "Supplement by",
			"A19" => "Afterword by",
			"A20" => "Notes by",
			"A21" => "Commentaries by",
			"A22" => "Epilogue by",
			"A23" => "Foreword by",
			"A24" => "Introduction by",
			"A25" => "Footnotes by",
			"A26" => "Memoir by",
			"A27" => "Experiments by",
			"A29" => "Introduction and notes by",
			"A30" => "Software written by",
			"A31" => "Book and lyrics by",
			"A32" => "Contributions by",
			"A33" => "Appendix by",
			"A34" => "Index by",
			"A35" => "Drawings by",
			"A36" => "Cover design or artwork by",
			"A37" => "Preliminary work by",
			"A38" => "Original author",
			"A39" => "Maps by",
			"A40" => "Inked or colored by",
			"A41" => "Pop-ups by",
			"A42" => "Continued by",
			"A43" => "Interviewer",
			"A44" => "Interviewee",
			"A45" => "Comic script by",
			"A46" => "Inker",
			"A47" => "Colorist",
			"A48" => "Letterer",
			"A99" => "Other primary creator",
			"B01" => "Edited by",
			"B02" => "Revised by",
			"B03" => "Retold by",
			"B04" => "Abridged by",
			"B05" => "Adapted by",
			"B06" => "Translated by",
			"B07" => "As told by",
			"B08" => "Translated with commentary by",
			"B09" => "Series edited by",
			"B10" => "Edited and translated by",
			"B11" => "Editor-in-chief",
			"B12" => "Guest editor",
			"B13" => "Volume editor",
			"B14" => "Editorial board member",
			"B15" => "Editorial coordination by",
			"B16" => "Managing editor",
			"B17" => "Founded by",
			"B18" => "Prepared for publication by",
			"B19" => "Associate editor",
			"B20" => "Consultant editor",
			"B21" => "General editor",
			"B22" => "Dramatized by",
			"B23" => "General rapporteur",
			"B24" => "Literary editor",
			"B25" => "Arranged by (music)",
			"B26" => "Technical editor",
			"B27" => "Thesis advisor or supervisor",
			"B28" => "Thesis examiner",
			"B29" => "Scientific editor",
			"B99" => "Other adaptation by",
			"C01" => "Compiled by",
			"C02" => "Selected by",
			"C03" => "Non-text material selected by",
			"C04" => "Curated by",
			"C99" => "Other compilation by",
			"D01" => "Producer",
			"D02" => "Director",
			"D03" => "Conductor",
			"D99" => "Other direction by",
			"E01" => "Actor",
			"E02" => "Dancer",
			"E03" => "Narrator",
			"E04" => "Commentator",
			"E05" => "Vocal soloist",
			"E06" => "Instrumental soloist",
			"E07" => "Read by",
			"E08" => "Performed by (orchestra, band, ensemble)",
			"E09" => "Speaker",
			"E10" => "Presenter",
			"E99" => "Performed by",
			"F01" => "Filmed/photographed by",
			"F02" => "Editor (film or video)",
			"F99" => "Other recording by",
			"Z01" => "Assisted by",
			"Z02" => "Honored/dedicated to",
			"Z98" => "(Various roles)",
			"Z99" => "Other"
	);

	/**
	 * The type of this product identifier.
	 */
	protected $role = null;
	protected $name = null;

	/**
	 * The identifier’s value.
	 */
	protected $value = null;

	/**
	 * Create a new Contributor.
	 *
	 * @param mixed $in The <Contributor> DOMDocument or DOMElement.
	 */
	public function __construct($in)
	{

		parent::__construct($in);

		// Retrieve and check the type.
		$this->role = $this->_getSingleChildElementText('ContributorRole');

		// Get the value.
		$this->value = array();

		$this->value['ContributorRole'] = $this->role;

		try {
			$this->value['PersonName'] = $this->_getSingleChildElementText('PersonName');
		} catch (\Exception $e) {
		}
		try {
			$this->value['PersonNameInverted'] = $this->_getSingleChildElementText('PersonNameInverted');
		} catch (\Exception $e) {
		}
		try {
			$this->value['SequenceNumber'] = $this->_getSingleChildElementText('SequenceNumber');
		} catch (\Exception $e) {
		}
		try {
			$this->value['NamesBeforeKey'] = $this->_getSingleChildElementText('NamesBeforeKey');
		} catch (\Exception $e) {
		}
		try {
			$this->value['KeyNames'] = $this->_getSingleChildElementText('KeyNames');
		} catch (\Exception $e) {
		}
		try {
			$this->value['Bio'] = $this->_getSingleChildElementText('BiographicalNote');
		} catch (\Exception $e) {
		}

		if ($this->value['Bio'])
			$this->value['Bio'] = $this->clean($this->value['Bio']);

		// Save memory.
		$this->_forgetSource();
	}

	/**
	 * @return mixed|null
	 */
	public function getName()
	{

		// already found
		if ($this->name)
			return $this->name();

		if ($this->getValue()['PersonName'])
			return $this->name = $this->getValue()['PersonName'];

		if ($this->getValue()['PersonNameInverted']) {
			return $this->name = preg_replace("/^(.+), (.+)$/", "$2 $1", $this->getValue()['PersonNameInverted']);
		}

		return $this->name;
	}

	/**
	 * Retrieve the type of this identifier.
	 *
	 * @param bool $mapped
	 * @return string The contents of <ProductIDType>.
	 */
	public function getRole($mapped = false)
	{
		if ($mapped && isset($this->roleCodes[$this->role])) {
			return $this->roleCodes[$this->role];
		}
		return $this->role;
	}

	/**
	 * Retrieve the actual value of this identifier.
	 *
	 * @return string The contents of <IDValue>.
	 */
	public function getValue()
	{
		return $this->value;
	}


	/**
	 * @param $str
	 * @return mixed
	 */
	private function clean($str)
	{
		$str = str_replace("<![CDATA[", "", $str);
		$str = preg_replace("/\]\]>*$/", "", $str);
		return $str;
	}

}

