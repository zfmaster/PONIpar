<?php


namespace PONIpar\ProductSubitem;

/*
   This file is part of the PONIpar PHP Onix Parser Library.
   Copyright (c) 2012, [di] digitale informationssysteme gmbh
   All rights reserved.

   The software is provided under the terms of the new (3-clause) BSD license.
   Please see the file LICENSE for details.
*/

/**
 * A <Subject> subitem.
 */
class Subject extends Subitem {
	
	// list 27
	const SCHEME_DEWEY = "01";
	const SCHEME_ABRIDGED_DEWEY = "02";
	const SCHEME_LC_CLASSIFICATION = "03";
	const SCHEME_LC_SUBJECT_HEADING = "04";
	const SCHEME_NLM_CLASSIFICATION = "05";
	const SCHEME_MESH_HEADING = "06";
	const SCHEME_NAL_SUBJECT_HEADING = "07";
	const SCHEME_AAT = "08";
	const SCHEME_UDC = "09";
	const SCHEME_BISAC_SUBJECT_HEADING = "10";
	const SCHEME_BISAC_REGION_CODE = "11";
	const SCHEME_BIC_SUBJECT_CATEGORY = "12";
	const SCHEME_BIC_GEOGRAPHICAL_QUALIFIER = "13";
	const SCHEME_BIC_LANGUAGE_QUALIFIER_LANGUAGE_AS_SUBJECT = "14";
	const SCHEME_BIC_TIME_PERIOD_QUALIFIER = "15";
	const SCHEME_BIC_EDUCATIONAL_PURPOSE_QUALIFIER = "16";
	const SCHEME_BIC_READING_LEVEL_AND_SPECIAL_INTEREST_QUALIFIER = "17";
	const SCHEME_DDC_SACHGRUPPEN_DER_DEUTSCHEN_NATIONALBIBLIOGRAFIE = "18";
	const SCHEME_LC_FICTION_GENRE_HEADING = "19";
	const SCHEME_KEYWORDS = "20";
	const SCHEME_BIC_CHILDRENS_BOOK_MARKETING_CATEGORY = "21";
	const SCHEME_BISAC_MERCHANDISING_THEME = "22";
	const SCHEME_PUBLISHERS_OWN_CATEGORY_CODE = "23";
	const SCHEME_PROPRIETARY_SUBJECT_SCHEME = "24";
	const SCHEME_TABLA_DE_MATERIAS_ISBN = "25";
	const SCHEME_WARENGRUPPEN_SYSTEMATIK_DES_DEUTSCHEN_BUCHHANDELS = "26";
	const SCHEME_SWD = "27";
	const SCHEME_THMES_ELECTRE = "28";
	const SCHEME_CLIL = "29";
	const SCHEME_DNB_SACHGRUPPEN = "30";
	const SCHEME_NUGI = "31";
	const SCHEME_NUR = "32";
	const SCHEME_ECPA_CHRISTIAN_BOOK_CATEGORY = "33";
	const SCHEME_SISO = "34";
	const SCHEME_KOREAN_DECIMAL_CLASSIFICATION_KDC = "35";
	const SCHEME_DDC_DEUTSCH_22 = "36";
	const SCHEME_BOKGRUPPER = "37";
	const SCHEME_VAREGRUPPER = "38";
	const SCHEME_LREPLANER = "39";
	const SCHEME_NIPPON_DECIMAL_CLASSIFICATION = "40";
	const SCHEME_BSQ = "41";
	const SCHEME_ANELE_MATERIAS = "42";
	const SCHEME_UTDANNINGSPROGRAM = "43";
	const SCHEME_PROGRAMOMRDE = "44";
	const SCHEME_UNDERVISNINGSMATERIELL = "45";
	const SCHEME_NORSK_DDK = "46";
	const SCHEME_VARUGRUPPER = "47";
	const SCHEME_SAB = "48";
	const SCHEME_LROMEDELSTYP = "49";
	const SCHEME_FRHANDSBESKRIVNING = "50";
	const SCHEME_SPANISH_ISBN_UDC_SUBSET = "51";
	const SCHEME_ECI_SUBJECT_CATEGORIES = "52";
	const SCHEME_SOGGETTO_CCE = "53";
	const SCHEME_QUALIFICATORE_GEOGRAFICO_CCE = "54";
	const SCHEME_QUALIFICATORE_DI_LINGUA_CCE = "55";
	const SCHEME_QUALIFICATORE_DI_PERIODO_STORICO_CCE = "56";
	const SCHEME_QUALIFICATORE_DI_LIVELLO_SCOLASTICO_CCE = "57";
	const SCHEME_QUALIFICATORE_DI_ET_DI_LETTURA_CCE = "58";
	const SCHEME_VDS_BILDUNGSMEDIEN_FCHER = "59";
	const SCHEME_FAGKODER = "60";
	const SCHEME_JEL_CLASSIFICATION = "61";
	const SCHEME_CSH = "62";
	const SCHEME_RVM = "63";
	const SCHEME_YSA = "64";
	const SCHEME_ALLRS = "65";
	const SCHEME_YKL = "66";
	const SCHEME_MUSA = "67";
	const SCHEME_CILLA = "68";
	const SCHEME_KAUNOKKI = "69";
	const SCHEME_BELLA = "70";
	const SCHEME_YSO = "71";
	const SCHEME_PAIKKATIETO_ONTOLOGIA = "72";
	const SCHEME_SUOMALAINEN_KIRJA_ALAN_LUOKITUS = "73";
	const SCHEME_SEARS = "74";
	const SCHEME_BIC_E4L = "75";
	const SCHEME_CSR = "76";
	const SCHEME_SUOMALAINEN_OPPIAINELUOKITUS = "77";
	const SCHEME_JAPANESE_BOOK_TRADE_C_CODE = "78";
	const SCHEME_JAPANESE_BOOK_TRADE_GENRE_CODE = "79";
	const SCHEME_FIKTIIVISEN_AINEISTON_LISLUOKITUS = "80";
	const SCHEME_ARABIC_SUBJECT_HEADING_SCHEME = "81";
	const SCHEME_ARABIZED_BIC_SUBJECT_CATEGORY = "82";
	const SCHEME_ARABIZED_LC_SUBJECT_HEADINGS = "83";
	const SCHEME_BIBLIOTHECA_ALEXANDRINA_SUBJECT_HEADINGS = "84";
	const SCHEME_POSTAL_CODE = "85";
	const SCHEME_GEONAMES_ID = "86";
	const SCHEME_NEWBOOKS_SUBJECT_CLASSIFICATION = "87";
	const SCHEME_CHINESE_LIBRARY_CLASSIFICATION = "88";
	const SCHEME_NTCPDSAC_CLASSIFICATION = "89";
	const SCHEME_SEASON_AND_EVENT_INDICATOR = "90";
	const SCHEME_GND = "91";
	const SCHEME_BIC_UKSLC = "92";
	const SCHEME_THEMA_SUBJECT_CATEGORY = "93";
	const SCHEME_THEMA_GEOGRAPHICAL_QUALIFIER = "94";
	const SCHEME_THEMA_LANGUAGE_QUALIFIER = "95";
	const SCHEME_THEMA_TIME_PERIOD_QUALIFIER = "96";
	const SCHEME_THEMA_EDUCATIONAL_PURPOSE_QUALIFIER = "97";
	const SCHEME_THEMA_INTEREST_AGE__SPECIAL_INTEREST_QUALIFIER = "98";
	const SCHEME_THEMA_STYLE_QUALIFIER = "99";
	const SCHEME_MNESORD = "A2";
	const SCHEME_STATYSTYKA_KSIEK_PAPIEROWYCH_MWIONYCH_I_ELEKTRONICZNYCH = "A3";
	const SCHEME_CCSS = "A4";
	const SCHEME_RAMEAU = "A5";
	const SCHEME_NOMENCLATURE_DISCIPLINE_SCOLAIRE = "A6";
	const SCHEME_ISIC = "A7";
	const SCHEME_LC_CHILDRENS_SUBJECT_HEADINGS = "A8";
	const SCHEME_NY_LROMEDEL = "A9";
	const SCHEME_EUROVOC = "B0";
	const SCHEME_BISG_EDUCATIONAL_TAXONOMY = "B1";
	const SCHEME_KEYWORDS_NOT_FOR_DISPLAY = "B2";
	const SCHEME_NOMENCLATURE_DIPLME = "B3";


	/**
	 * The scheme of this subject
	 */
	protected $scheme = null;

	/**
	 * The value (code) of this subject
	 */
	protected $value = null;

	/**
	 * The text (keyword) of this subject
	 */
	protected $text = null;
	
	protected $mainSubject = false;

	/**
	 * Create a new Subject.
	 *
	 * @param mixed $in The <Subject> DOMDocument or DOMElement.
	 */
	public function __construct($in) {
		parent::__construct($in);
		
		try{ $this->scheme = $this->_getSingleChildElementText('SubjectSchemeIdentifier'); } catch(\Exception $e) { }
		try{ $this->value = $this->_getSingleChildElementText('SubjectCode'); } catch(\Exception $e) { }
		try {
			$this->text = $this->_getSingleChildElementText('SubjectHeadingText');
		} catch (\Exception $e) {
		}

		try{ $this->_getSingleChildElementText('MainSubject'); $this->mainSubject = true; } catch(\Exception $e) {
			$this->mainSubject = false;
		}
		
		// Save memory.
		$this->_forgetSource();
	}

	/**
	 * Retrieve the type of this identifier.
	 *
	 * @return string The contents of <SubjectSchemeIdentifier>.
	 */
	public function getScheme() {
		return $this->scheme;
	}

	/**
	 * Retrieve the value of
	 *
	 * @return string The contents of <SubjectCode>.
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * Retrieve the text of
	 *
	 * @return string The contents of <SubjectHeadingText>.
	 */
	public function getText()
	{
		return $this->text;
	}

	/**
	 * Is this the <MainSubject>?
	 *
	 * @return bool
	 */
	public function isMainSubject() {
		return $this->mainSubject;
	}
	
};


