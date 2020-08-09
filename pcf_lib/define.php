<?php
/*
const CC_PG_TITLE = '会費・ご寄付・アジアの友購読料・新規会員登録｜公益財団法人 アジア学生文化協会';
const CC_MSG_H2 = 'インターネットからクレジットカードでのご送金';
const CC_MSG_EXPLAIN = '以下を入力し確認するボタンを押してください。<span>*</span>は入力必須です。';
const CC_MSG_CONF_EXPLAIN = 'この内容でよろしければ送信するボタンを押してください。<br>メールアドレスに間違いがあると返信ができませんので十分にご確認ください。';
const CC_MSG_WAITING = 'しばらくお待ち下さい...';

const CC_ITEM_NUMBER = '受付番号';
const CC_ITEM_COUNTRY = '国籍';
const CC_ITEM_NAME = '氏名';
const CC_ITEM_MAIL = 'メールアドレス';
const CC_ITEM_COURSE = 'コース';
const CC_ITEM_FEES_1 = '1. 出願料';
const CC_ITEM_FEES_2 = '2. 入学金';
const CC_ITEM_FEES_3 = '3. 授業料（6ヶ月）';
const CC_ITEM_FEES_4 = '4. 授業料（1年間）';
const CC_ITEM_FEES_5 = '5. EJU（日本留学試験）受験料';
const CC_ITEM_FEES_6 = '6. JLPT（日本語能力試験）受験料';
const CC_ITEM_FEES_7 = '7. 印鑑';
const CC_ITEM_FEES_8 = '8. 寮費';
const CC_ITEM_FEES_9 = '9. その他';
const CC_ITEM_FEES_INCLUDE = '含める ';
const CC_ITEM_FEES_UNIT = '円';
const CC_ITEM_FEES_TOTAL = '合計';
const CC_BUTTON_CONFIRM = '確認する';
const CC_BUTTON_PRV = '戻る';
const CC_BUTTON_NEXT = '進む';
const CC_BUTTON_SEND = '送信する';

$select_course = array(
	"0" => "選択してください",
	"1" => "大学進学課程（Prep. Course 1）",
	"2" => "大学進学準備課程（Prep. Course 2）",
);
$select_countries = array(
	"0" => "選択してください",
	"AF" => "Afghanistan",
	"AL" => "Albania",
	"DZ" => "Algeria",
	"AS" => "American Samoa",
	"AD" => "Andorra",
	"AG" => "Angola",
	"AI" => "Anguilla",
	"AG" => "Antigua-Barbuda",
	"AR" => "Argentina",
	"AA" => "Armenia",
	"AW" => "Aruba",
	"AU" => "Australia",
	"AT" => "Austria",
	"AZ" => "Azerbaijan",
	"BS" => "Bahamas",
	"BH" => "Bahrain",
	"BD" => "Bangladesh",
	"BB" => "Barbados",
	"BY" => "Belarus",
	"BE" => "Belgium",
	"BZ" => "Belize",
	"BJ" => "Benin",
	"BM" => "Bermuda",
	"BT" => "Bhutan",
	"BO" => "Bolivia",
	"BL" => "Bonaire",
	"BA" => "Bosnia-Herzegovina",
	"BW" => "Botswana",
	"BR" => "Brazil",
	"BC" => "British Indian Ocean Ter",
	"BN" => "Brunei",
	"BG" => "Bulgaria",
	"BF" => "Burkina Faso",
	"BI" => "Burundi",
	"KH" => "Cambodia",
	"CM" => "Cameroon",
	"CA" => "Canada",
	"IC" => "Canary Islands",
	"CV" => "Cape Verde",
	"KY" => "Cayman Islands",
	"CF" => "Central African Republic",
	"TD" => "Chad",
	"CD" => "Channel Islands",
	"CL" => "Chile",
	"CN" => "China",
	"CI" => "Christmas Island",
	"CS" => "Cocos Island",
	"CO" => "Colombia",
	"CC" => "Comoros",
	"CG" => "Congo",
	"CK" => "Cook Islands",
	"CR" => "Costa Rica",
	"CT" => "Cote D'Ivoire",
	"HR" => "Croatia",
	"CU" => "Cuba",
	"CB" => "Curacao",
	"CY" => "Cyprus",
	"CZ" => "Czech Republic",
	"DK" => "Denmark",
	"DJ" => "Djibouti",
	"DM" => "Dominica",
	"DO" => "Dominican Republic",
	"TM" => "East Timor",
	"EC" => "Ecuador",
	"EG" => "Egypt",
	"SV" => "El Salvador",
	"GQ" => "Equatorial Guinea",
	"ER" => "Eritrea",
	"EE" => "Estonia",
	"ET" => "Ethiopia",
	"FA" => "Falkland Islands",
	"FO" => "Faroe Islands",
	"FJ" => "Fiji",
	"FI" => "Finland",
	"FR" => "France",
	"GF" => "French Guiana",
	"PF" => "French Polynesia",
	"FS" => "French Southern Ter",
	"GA" => "Gabon",
	"GM" => "Gambia",
	"GE" => "Georgia",
	"DE" => "Germany",
	"GH" => "Ghana",
	"GI" => "Gibraltar",
	"GB" => "Great Britain",
	"GR" => "Greece",
	"GL" => "Greenland",
	"GD" => "Grenada",
	"GP" => "Guadeloupe",
	"GU" => "Guam",
	"GT" => "Guatemala",
	"GN" => "Guinea",
	"GY" => "Guyana",
	"HT" => "Haiti",
	"HW" => "Hawaii",
	"HN" => "Honduras",
	"HK" => "Hong Kong",
	"HU" => "Hungary",
	"IS" => "Iceland",
	"IN" => "India",
	"ID" => "Indonesia",
	"IA" => "Iran",
	"IQ" => "Iraq",
	"IR" => "Ireland",
	"IM" => "Isle of Man",
	"IL" => "Israel",
	"IT" => "Italy",
	"JM" => "Jamaica",
	"JP" => "Japan",
	"JO" => "Jordan",
	"KZ" => "Kazakhstan",
	"KE" => "Kenya",
	"KI" => "Kiribati",
	"NK" => "Korea North",
	"KS" => "Korea South",
	"KW" => "Kuwait",
	"KG" => "Kyrgyzstan",
	"LA" => "Laos",
	"LV" => "Latvia",
	"LB" => "Lebanon",
	"LS" => "Lesotho",
	"LR" => "Liberia",
	"LY" => "Libya",
	"LI" => "Liechtenstein",
	"LT" => "Lithuania",
	"LU" => "Luxembourg",
	"MO" => "Macau",
	"MK" => "Macedonia",
	"MG" => "Madagascar",
	"MY" => "Malaysia",
	"MW" => "Malawi",
	"MV" => "Maldives",
	"ML" => "Mali",
	"MT" => "Malta",
	"MH" => "Marshall Islands",
	"MQ" => "Martinique",
	"MR" => "Mauritania",
	"MU" => "Mauritius",
	"ME" => "Mayotte",
	"MX" => "Mexico",
	"MI" => "Midway Islands",
	"MD" => "Moldova",
	"MC" => "Monaco",
	"MN" => "Mongolia",
	"MS" => "Montserrat",
	"MA" => "Morocco",
	"MZ" => "Mozambique",
	"MM" => "Myanmar",
	"NA" => "Nambia",
	"NU" => "Nauru",
	"NP" => "Nepal",
	"AN" => "Netherland Antilles",
	"NL" => "Netherlands (Holland, Europe)",
	"NV" => "Nevis",
	"NC" => "New Caledonia",
	"NZ" => "New Zealand",
	"NI" => "Nicaragua",
	"NE" => "Niger",
	"NG" => "Nigeria",
	"NW" => "Niue",
	"NF" => "Norfolk Island",
	"NO" => "Norway",
	"OM" => "Oman",
	"PK" => "Pakistan",
	"PW" => "Palau Island",
	"PS" => "Palestine",
	"PA" => "Panama",
	"PG" => "Papua New Guinea",
	"PY" => "Paraguay",
	"PE" => "Peru",
	"PH" => "Philippines",
	"PO" => "Pitcairn Island",
	"PL" => "Poland",
	"PT" => "Portugal",
	"PR" => "Puerto Rico",
	"QA" => "Qatar",
	"ME" => "Republic of Montenegro",
	"RS" => "Republic of Serbia",
	"RE" => "Reunion",
	"RO" => "Romania",
	"RU" => "Russia",
	"RW" => "Rwanda",
	"NT" => "St Barthelemy",
	"EU" => "St Eustatius",
	"HE" => "St Helena",
	"KN" => "St Kitts-Nevis",
	"LC" => "St Lucia",
	"MB" => "St Maarten",
	"PM" => "St Pierre-Miquelon",
	"VC" => "St Vincent-Grenadines",
	"SP" => "Saipan",
	"SO" => "Samoa",
	"AS" => "Samoa American",
	"SM" => "San Marino",
	"ST" => "Sao Tome-Principe",
	"SA" => "Saudi Arabia",
	"SN" => "Senegal",
	"RS" => "Serbia",
	"SC" => "Seychelles",
	"SL" => "Sierra Leone",
	"SG" => "Singapore",
	"SK" => "Slovakia",
	"SI" => "Slovenia",
	"SB" => "Solomon Islands",
	"OI" => "Somalia",
	"ZA" => "South Africa",
	"ES" => "Spain",
	"LK" => "Sri Lanka",
	"SD" => "Sudan",
	"SR" => "Suriname",
	"SZ" => "Swaziland",
	"SE" => "Sweden",
	"CH" => "Switzerland",
	"SY" => "Syria",
	"TA" => "Tahiti",
	"TW" => "Taiwan",
	"TJ" => "Tajikistan",
	"TZ" => "Tanzania",
	"TH" => "Thailand",
	"TG" => "Togo",
	"TK" => "Tokelau",
	"TO" => "Tonga",
	"TT" => "Trinidad-Tobago",
	"TN" => "Tunisia",
	"TR" => "Turkey",
	"TU" => "Turkmenistan",
	"TC" => "Turks-Caicos Is",
	"TV" => "Tuvalu",
	"UG" => "Uganda",
	"UA" => "Ukraine",
	"AE" => "United Arab Emirates",
	"GB" => "United Kingdom",
	"US" => "United States of America",
	"UY" => "Uruguay",
	"UZ" => "Uzbekistan",
	"VU" => "Vanuatu",
	"VS" => "Vatican City State",
	"VE" => "Venezuela",
	"VN" => "Vietnam",
	"VB" => "Virgin Islands (Brit)",
	"VA" => "Virgin Islands (USA)",
	"WK" => "Wake Island",
	"WF" => "Wallis-Futana Is",
	"YE" => "Yemen",
	"ZR" => "Zaire",
	"ZM" => "Zambia",
	"ZW" => "Zimbabwe",
);

$define_fees = array(
	"1" => array(
		'1' => array('出願料' => '20000'),						// referenceFee
		'2' => array('入学金' => '80000'),						// entranceFee
		'3' => array('授業料（6ヶ月）' => '360000'),				// tuitionFee6months
		'4' => array('授業料（1年間）' => '720000'),				// tuitionFee1year
		'5' => array('EJU（日本留学試験）受験料' => '15000'),		// ejuApplicationFee
		'6' => array('JLPT（日本語能力試験）受験料' => '6000'),	// jlptApplicationFee
		'7' => array('印鑑' => '1300'),							// nameStamp
		'8' => array('寮費' => '0'),								// dormitoryFee
		'9' => array('その他' => '0')							// other
	),
	"2" => array(
		'1' => array('出願料' => '20000'),						// referenceFee
		'2' => array('入学金' => '95000'),						// entranceFee
		'3' => array('授業料（6ヶ月）' => '360000'),				// tuitionFee6months
		'4' => array('授業料（1年間）' => '720000'),				// tuitionFee1year
		'5' => array('EJU（日本留学試験）受験料' => '15000'),		// ejuApplicationFee
		'6' => array('JLPT（日本語能力試験）受験料' => '6000'),	// jlptApplicationFee
		'7' => array('印鑑' => '1300'),							// nameStamp
		'8' => array('寮費' => '0'),								// dormitoryFee
		'9' => array('その他' => '0')							// other
	),
);
*/

const SMBC_ENV_RELEASE = '0';
const SMBC_ENV_TEST = '1';
//const SMBC_ENV = SMBC_ENV_RELEASE;
const SMBC_ENV = SMBC_ENV_TEST;
$smbc_infos = array();
$smbc_infos[SMBC_ENV_TEST] = array(
	'shop_id' => 'tshop00000898',
	'shop_pwd' => 'b8dbfduq',
	'smbc_url' => 'https://pt01.smbc-gp.co.jp/link/tshop00000898/Multi/Entry',
);
$smbc_infos[SMBC_ENV_RELEASE] = array(
	'shop_id' => '8100052000443',
	'shop_pwd' => '75b9n7rt',
	'smbc_url' => 'https://p01.smbc-gp.co.jp/link/8100052000443/Multi/Entry',
);