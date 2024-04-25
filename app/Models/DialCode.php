<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

class DialCode extends Model
{
    use \Sushi\Sushi;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $rows = [
        [
            "name" => "Afghanistan",
            "id" => "+93",
            "code" => "AF"
        ],
        [
            "name" => "Aland Islands",
            "id" => "+358",
            "code" => "AX"
        ],
        [
            "name" => "Albania",
            "id" => "+355",
            "code" => "AL"
        ],
        [
            "name" => "Algeria",
            "id" => "+213",
            "code" => "DZ"
        ],
        [
            "name" => "AmericanSamoa",
            "id" => "+1684",
            "code" => "AS"
        ],
        [
            "name" => "Andorra",
            "id" => "+376",
            "code" => "AD"
        ],
        [
            "name" => "Angola",
            "id" => "+244",
            "code" => "AO"
        ],
        [
            "name" => "Anguilla",
            "id" => "+1264",
            "code" => "AI"
        ],
        [
            "name" => "Antarctica",
            "id" => "+672",
            "code" => "AQ"
        ],
        [
            "name" => "Antigua and Barbuda",
            "id" => "+1268",
            "code" => "AG"
        ],
        [
            "name" => "Argentina",
            "id" => "+54",
            "code" => "AR"
        ],
        [
            "name" => "Armenia",
            "id" => "+374",
            "code" => "AM"
        ],
        [
            "name" => "Aruba",
            "id" => "+297",
            "code" => "AW"
        ],
        [
            "name" => "Australia",
            "id" => "+61",
            "code" => "AU"
        ],
        [
            "name" => "Austria",
            "id" => "+43",
            "code" => "AT"
        ],
        [
            "name" => "Azerbaijan",
            "id" => "+994",
            "code" => "AZ"
        ],
        [
            "name" => "Bahamas",
            "id" => "+1242",
            "code" => "BS"
        ],
        [
            "name" => "Bahrain",
            "id" => "+973",
            "code" => "BH"
        ],
        [
            "name" => "Bangladesh",
            "id" => "+880",
            "code" => "BD"
        ],
        [
            "name" => "Barbados",
            "id" => "+1246",
            "code" => "BB"
        ],
        [
            "name" => "Belarus",
            "id" => "+375",
            "code" => "BY"
        ],
        [
            "name" => "Belgium",
            "id" => "+32",
            "code" => "BE"
        ],
        [
            "name" => "Belize",
            "id" => "+501",
            "code" => "BZ"
        ],
        [
            "name" => "Benin",
            "id" => "+229",
            "code" => "BJ"
        ],
        [
            "name" => "Bermuda",
            "id" => "+1441",
            "code" => "BM"
        ],
        [
            "name" => "Bhutan",
            "id" => "+975",
            "code" => "BT"
        ],
        [
            "name" => "Bolivia, Plurinational State of",
            "id" => "+591",
            "code" => "BO"
        ],
        [
            "name" => "Bosnia and Herzegovina",
            "id" => "+387",
            "code" => "BA"
        ],
        [
            "name" => "Botswana",
            "id" => "+267",
            "code" => "BW"
        ],
        [
            "name" => "Brazil",
            "id" => "+55",
            "code" => "BR"
        ],
        [
            "name" => "British Indian Ocean Territory",
            "id" => "+246",
            "code" => "IO"
        ],
        [
            "name" => "Brunei Darussalam",
            "id" => "+673",
            "code" => "BN"
        ],
        [
            "name" => "Bulgaria",
            "id" => "+359",
            "code" => "BG"
        ],
        [
            "name" => "Burkina Faso",
            "id" => "+226",
            "code" => "BF"
        ],
        [
            "name" => "Burundi",
            "id" => "+257",
            "code" => "BI"
        ],
        [
            "name" => "Cambodia",
            "id" => "+855",
            "code" => "KH"
        ],
        [
            "name" => "Cameroon",
            "id" => "+237",
            "code" => "CM"
        ],
        [
            "name" => "Canada",
            "id" => "+1",
            "code" => "CA"
        ],
        [
            "name" => "Cape Verde",
            "id" => "+238",
            "code" => "CV"
        ],
        [
            "name" => "Cayman Islands",
            "id" => "+ 345",
            "code" => "KY"
        ],
        [
            "name" => "Central African Republic",
            "id" => "+236",
            "code" => "CF"
        ],
        [
            "name" => "Chad",
            "id" => "+235",
            "code" => "TD"
        ],
        [
            "name" => "Chile",
            "id" => "+56",
            "code" => "CL"
        ],
        [
            "name" => "China",
            "id" => "+86",
            "code" => "CN"
        ],
        [
            "name" => "Christmas Island",
            "id" => "+61",
            "code" => "CX"
        ],
        [
            "name" => "Cocos (Keeling) Islands",
            "id" => "+61",
            "code" => "CC"
        ],
        [
            "name" => "Colombia",
            "id" => "+57",
            "code" => "CO"
        ],
        [
            "name" => "Comoros",
            "id" => "+269",
            "code" => "KM"
        ],
        [
            "name" => "Congo",
            "id" => "+242",
            "code" => "CG"
        ],
        [
            "name" => "Congo, The Democratic Republic of the Congo",
            "id" => "+243",
            "code" => "CD"
        ],
        [
            "name" => "Cook Islands",
            "id" => "+682",
            "code" => "CK"
        ],
        [
            "name" => "Costa Rica",
            "id" => "+506",
            "code" => "CR"
        ],
        [
            "name" => "Cote d'Ivoire",
            "id" => "+225",
            "code" => "CI"
        ],
        [
            "name" => "Croatia",
            "id" => "+385",
            "code" => "HR"
        ],
        [
            "name" => "Cuba",
            "id" => "+53",
            "code" => "CU"
        ],
        [
            "name" => "Cyprus",
            "id" => "+357",
            "code" => "CY"
        ],
        [
            "name" => "Czech Republic",
            "id" => "+420",
            "code" => "CZ"
        ],
        [
            "name" => "Denmark",
            "id" => "+45",
            "code" => "DK"
        ],
        [
            "name" => "Djibouti",
            "id" => "+253",
            "code" => "DJ"
        ],
        [
            "name" => "Dominica",
            "id" => "+1767",
            "code" => "DM"
        ],
        [
            "name" => "Dominican Republic",
            "id" => "+1849",
            "code" => "DO"
        ],
        [
            "name" => "Ecuador",
            "id" => "+593",
            "code" => "EC"
        ],
        [
            "name" => "Egypt",
            "id" => "+20",
            "code" => "EG"
        ],
        [
            "name" => "El Salvador",
            "id" => "+503",
            "code" => "SV"
        ],
        [
            "name" => "Equatorial Guinea",
            "id" => "+240",
            "code" => "GQ"
        ],
        [
            "name" => "Eritrea",
            "id" => "+291",
            "code" => "ER"
        ],
        [
            "name" => "Estonia",
            "id" => "+372",
            "code" => "EE"
        ],
        [
            "name" => "Ethiopia",
            "id" => "+251",
            "code" => "ET"
        ],
        [
            "name" => "Falkland Islands (Malvinas)",
            "id" => "+500",
            "code" => "FK"
        ],
        [
            "name" => "Faroe Islands",
            "id" => "+298",
            "code" => "FO"
        ],
        [
            "name" => "Fiji",
            "id" => "+679",
            "code" => "FJ"
        ],
        [
            "name" => "Finland",
            "id" => "+358",
            "code" => "FI"
        ],
        [
            "name" => "France",
            "id" => "+33",
            "code" => "FR"
        ],
        [
            "name" => "French Guiana",
            "id" => "+594",
            "code" => "GF"
        ],
        [
            "name" => "French Polynesia",
            "id" => "+689",
            "code" => "PF"
        ],
        [
            "name" => "Gabon",
            "id" => "+241",
            "code" => "GA"
        ],
        [
            "name" => "Gambia",
            "id" => "+220",
            "code" => "GM"
        ],
        [
            "name" => "Georgia",
            "id" => "+995",
            "code" => "GE"
        ],
        [
            "name" => "Germany",
            "id" => "+49",
            "code" => "DE"
        ],
        [
            "name" => "Ghana",
            "id" => "+233",
            "code" => "GH"
        ],
        [
            "name" => "Gibraltar",
            "id" => "+350",
            "code" => "GI"
        ],
        [
            "name" => "Greece",
            "id" => "+30",
            "code" => "GR"
        ],
        [
            "name" => "Greenland",
            "id" => "+299",
            "code" => "GL"
        ],
        [
            "name" => "Grenada",
            "id" => "+1473",
            "code" => "GD"
        ],
        [
            "name" => "Guadeloupe",
            "id" => "+590",
            "code" => "GP"
        ],
        [
            "name" => "Guam",
            "id" => "+1671",
            "code" => "GU"
        ],
        [
            "name" => "Guatemala",
            "id" => "+502",
            "code" => "GT"
        ],
        [
            "name" => "Guernsey",
            "id" => "+44",
            "code" => "GG"
        ],
        [
            "name" => "Guinea",
            "id" => "+224",
            "code" => "GN"
        ],
        [
            "name" => "Guinea-Bissau",
            "id" => "+245",
            "code" => "GW"
        ],
        [
            "name" => "Guyana",
            "id" => "+595",
            "code" => "GY"
        ],
        [
            "name" => "Haiti",
            "id" => "+509",
            "code" => "HT"
        ],
        [
            "name" => "Holy See (Vatican City State)",
            "id" => "+379",
            "code" => "VA"
        ],
        [
            "name" => "Honduras",
            "id" => "+504",
            "code" => "HN"
        ],
        [
            "name" => "Hong Kong",
            "id" => "+852",
            "code" => "HK"
        ],
        [
            "name" => "Hungary",
            "id" => "+36",
            "code" => "HU"
        ],
        [
            "name" => "Iceland",
            "id" => "+354",
            "code" => "IS"
        ],
        [
            "name" => "India",
            "id" => "+91",
            "code" => "IN"
        ],
        [
            "name" => "Indonesia",
            "id" => "+62",
            "code" => "ID"
        ],
        [
            "name" => "Iran, Islamic Republic of Persian Gulf",
            "id" => "+98",
            "code" => "IR"
        ],
        [
            "name" => "Iraq",
            "id" => "+964",
            "code" => "IQ"
        ],
        [
            "name" => "Ireland",
            "id" => "+353",
            "code" => "IE"
        ],
        [
            "name" => "Isle of Man",
            "id" => "+44",
            "code" => "IM"
        ],
        [
            "name" => "Israel",
            "id" => "+972",
            "code" => "IL"
        ],
        [
            "name" => "Italy",
            "id" => "+39",
            "code" => "IT"
        ],
        [
            "name" => "Jamaica",
            "id" => "+1876",
            "code" => "JM"
        ],
        [
            "name" => "Japan",
            "id" => "+81",
            "code" => "JP"
        ],
        [
            "name" => "Jersey",
            "id" => "+44",
            "code" => "JE"
        ],
        [
            "name" => "Jordan",
            "id" => "+962",
            "code" => "JO"
        ],
        [
            "name" => "Kazakhstan",
            "id" => "+77",
            "code" => "KZ"
        ],
        [
            "name" => "Kenya",
            "id" => "+254",
            "code" => "KE"
        ],
        [
            "name" => "Kiribati",
            "id" => "+686",
            "code" => "KI"
        ],
        [
            "name" => "Korea, Democratic People's Republic of Korea",
            "id" => "+850",
            "code" => "KP"
        ],
        [
            "name" => "Korea, Republic of South Korea",
            "id" => "+82",
            "code" => "KR"
        ],
        [
            "name" => "Kuwait",
            "id" => "+965",
            "code" => "KW"
        ],
        [
            "name" => "Kyrgyzstan",
            "id" => "+996",
            "code" => "KG"
        ],
        [
            "name" => "Laos",
            "id" => "+856",
            "code" => "LA"
        ],
        [
            "name" => "Latvia",
            "id" => "+371",
            "code" => "LV"
        ],
        [
            "name" => "Lebanon",
            "id" => "+961",
            "code" => "LB"
        ],
        [
            "name" => "Lesotho",
            "id" => "+266",
            "code" => "LS"
        ],
        [
            "name" => "Liberia",
            "id" => "+231",
            "code" => "LR"
        ],
        [
            "name" => "Libyan Arab Jamahiriya",
            "id" => "+218",
            "code" => "LY"
        ],
        [
            "name" => "Liechtenstein",
            "id" => "+423",
            "code" => "LI"
        ],
        [
            "name" => "Lithuania",
            "id" => "+370",
            "code" => "LT"
        ],
        [
            "name" => "Luxembourg",
            "id" => "+352",
            "code" => "LU"
        ],
        [
            "name" => "Macao",
            "id" => "+853",
            "code" => "MO"
        ],
        [
            "name" => "Macedonia",
            "id" => "+389",
            "code" => "MK"
        ],
        [
            "name" => "Madagascar",
            "id" => "+261",
            "code" => "MG"
        ],
        [
            "name" => "Malawi",
            "id" => "+265",
            "code" => "MW"
        ],
        [
            "name" => "Malaysia",
            "id" => "+60",
            "code" => "MY"
        ],
        [
            "name" => "Maldives",
            "id" => "+960",
            "code" => "MV"
        ],
        [
            "name" => "Mali",
            "id" => "+223",
            "code" => "ML"
        ],
        [
            "name" => "Malta",
            "id" => "+356",
            "code" => "MT"
        ],
        [
            "name" => "Marshall Islands",
            "id" => "+692",
            "code" => "MH"
        ],
        [
            "name" => "Martinique",
            "id" => "+596",
            "code" => "MQ"
        ],
        [
            "name" => "Mauritania",
            "id" => "+222",
            "code" => "MR"
        ],
        [
            "name" => "Mauritius",
            "id" => "+230",
            "code" => "MU"
        ],
        [
            "name" => "Mayotte",
            "id" => "+262",
            "code" => "YT"
        ],
        [
            "name" => "Mexico",
            "id" => "+52",
            "code" => "MX"
        ],
        [
            "name" => "Micronesia, Federated States of Micronesia",
            "id" => "+691",
            "code" => "FM"
        ],
        [
            "name" => "Moldova",
            "id" => "+373",
            "code" => "MD"
        ],
        [
            "name" => "Monaco",
            "id" => "+377",
            "code" => "MC"
        ],
        [
            "name" => "Mongolia",
            "id" => "+976",
            "code" => "MN"
        ],
        [
            "name" => "Montenegro",
            "id" => "+382",
            "code" => "ME"
        ],
        [
            "name" => "Montserrat",
            "id" => "+1664",
            "code" => "MS"
        ],
        [
            "name" => "Morocco",
            "id" => "+212",
            "code" => "MA"
        ],
        [
            "name" => "Mozambique",
            "id" => "+258",
            "code" => "MZ"
        ],
        [
            "name" => "Myanmar",
            "id" => "+95",
            "code" => "MM"
        ],
        [
            "name" => "Namibia",
            "id" => "+264",
            "code" => "NA"
        ],
        [
            "name" => "Nauru",
            "id" => "+674",
            "code" => "NR"
        ],
        [
            "name" => "Nepal",
            "id" => "+977",
            "code" => "NP"
        ],
        [
            "name" => "Netherlands",
            "id" => "+31",
            "code" => "NL"
        ],
        [
            "name" => "Netherlands Antilles",
            "id" => "+599",
            "code" => "AN"
        ],
        [
            "name" => "New Caledonia",
            "id" => "+687",
            "code" => "NC"
        ],
        [
            "name" => "New Zealand",
            "id" => "+64",
            "code" => "NZ"
        ],
        [
            "name" => "Nicaragua",
            "id" => "+505",
            "code" => "NI"
        ],
        [
            "name" => "Niger",
            "id" => "+227",
            "code" => "NE"
        ],
        [
            "name" => "Nigeria",
            "id" => "+234",
            "code" => "NG"
        ],
        [
            "name" => "Niue",
            "id" => "+683",
            "code" => "NU"
        ],
        [
            "name" => "Norfolk Island",
            "id" => "+672",
            "code" => "NF"
        ],
        [
            "name" => "Northern Mariana Islands",
            "id" => "+1670",
            "code" => "MP"
        ],
        [
            "name" => "Norway",
            "id" => "+47",
            "code" => "NO"
        ],
        [
            "name" => "Oman",
            "id" => "+968",
            "code" => "OM"
        ],
        [
            "name" => "Pakistan",
            "id" => "+92",
            "code" => "PK"
        ],
        [
            "name" => "Palau",
            "id" => "+680",
            "code" => "PW"
        ],
        [
            "name" => "Palestinian Territory, Occupied",
            "id" => "+970",
            "code" => "PS"
        ],
        [
            "name" => "Panama",
            "id" => "+507",
            "code" => "PA"
        ],
        [
            "name" => "Papua New Guinea",
            "id" => "+675",
            "code" => "PG"
        ],
        [
            "name" => "Paraguay",
            "id" => "+595",
            "code" => "PY"
        ],
        [
            "name" => "Peru",
            "id" => "+51",
            "code" => "PE"
        ],
        [
            "name" => "Philippines",
            "id" => "+63",
            "code" => "PH"
        ],
        [
            "name" => "Pitcairn",
            "id" => "+872",
            "code" => "PN"
        ],
        [
            "name" => "Poland",
            "id" => "+48",
            "code" => "PL"
        ],
        [
            "name" => "Portugal",
            "id" => "+351",
            "code" => "PT"
        ],
        [
            "name" => "Puerto Rico",
            "id" => "+1939",
            "code" => "PR"
        ],
        [
            "name" => "Qatar",
            "id" => "+974",
            "code" => "QA"
        ],
        [
            "name" => "Romania",
            "id" => "+40",
            "code" => "RO"
        ],
        [
            "name" => "Russia",
            "id" => "+7",
            "code" => "RU"
        ],
        [
            "name" => "Rwanda",
            "id" => "+250",
            "code" => "RW"
        ],
        [
            "name" => "Reunion",
            "id" => "+262",
            "code" => "RE"
        ],
        [
            "name" => "Saint Barthelemy",
            "id" => "+590",
            "code" => "BL"
        ],
        [
            "name" => "Saint Helena, Ascension and Tristan Da Cunha",
            "id" => "+290",
            "code" => "SH"
        ],
        [
            "name" => "Saint Kitts and Nevis",
            "id" => "+1869",
            "code" => "KN"
        ],
        [
            "name" => "Saint Lucia",
            "id" => "+1758",
            "code" => "LC"
        ],
        [
            "name" => "Saint Martin",
            "id" => "+590",
            "code" => "MF"
        ],
        [
            "name" => "Saint Pierre and Miquelon",
            "id" => "+508",
            "code" => "PM"
        ],
        [
            "name" => "Saint Vincent and the Grenadines",
            "id" => "+1784",
            "code" => "VC"
        ],
        [
            "name" => "Samoa",
            "id" => "+685",
            "code" => "WS"
        ],
        [
            "name" => "San Marino",
            "id" => "+378",
            "code" => "SM"
        ],
        [
            "name" => "Sao Tome and Principe",
            "id" => "+239",
            "code" => "ST"
        ],
        [
            "name" => "Saudi Arabia",
            "id" => "+966",
            "code" => "SA"
        ],
        [
            "name" => "Senegal",
            "id" => "+221",
            "code" => "SN"
        ],
        [
            "name" => "Serbia",
            "id" => "+381",
            "code" => "RS"
        ],
        [
            "name" => "Seychelles",
            "id" => "+248",
            "code" => "SC"
        ],
        [
            "name" => "Sierra Leone",
            "id" => "+232",
            "code" => "SL"
        ],
        [
            "name" => "Singapore",
            "id" => "+65",
            "code" => "SG"
        ],
        [
            "name" => "Slovakia",
            "id" => "+421",
            "code" => "SK"
        ],
        [
            "name" => "Slovenia",
            "id" => "+386",
            "code" => "SI"
        ],
        [
            "name" => "Solomon Islands",
            "id" => "+677",
            "code" => "SB"
        ],
        [
            "name" => "Somalia",
            "id" => "+252",
            "code" => "SO"
        ],
        [
            "name" => "South Africa",
            "id" => "+27",
            "code" => "ZA"
        ],
        [
            "name" => "South Sudan",
            "id" => "+211",
            "code" => "SS"
        ],
        [
            "name" => "South Georgia and the South Sandwich Islands",
            "id" => "+500",
            "code" => "GS"
        ],
        [
            "name" => "Spain",
            "id" => "+34",
            "code" => "ES"
        ],
        [
            "name" => "Sri Lanka",
            "id" => "+94",
            "code" => "LK"
        ],
        [
            "name" => "Sudan",
            "id" => "+249",
            "code" => "SD"
        ],
        [
            "name" => "Suriname",
            "id" => "+597",
            "code" => "SR"
        ],
        [
            "name" => "Svalbard and Jan Mayen",
            "id" => "+47",
            "code" => "SJ"
        ],
        [
            "name" => "Swaziland",
            "id" => "+268",
            "code" => "SZ"
        ],
        [
            "name" => "Sweden",
            "id" => "+46",
            "code" => "SE"
        ],
        [
            "name" => "Switzerland",
            "id" => "+41",
            "code" => "CH"
        ],
        [
            "name" => "Syrian Arab Republic",
            "id" => "+963",
            "code" => "SY"
        ],
        [
            "name" => "Taiwan",
            "id" => "+886",
            "code" => "TW"
        ],
        [
            "name" => "Tajikistan",
            "id" => "+992",
            "code" => "TJ"
        ],
        [
            "name" => "Tanzania, United Republic of Tanzania",
            "id" => "+255",
            "code" => "TZ"
        ],
        [
            "name" => "Thailand",
            "id" => "+66",
            "code" => "TH"
        ],
        [
            "name" => "Timor-Leste",
            "id" => "+670",
            "code" => "TL"
        ],
        [
            "name" => "Togo",
            "id" => "+228",
            "code" => "TG"
        ],
        [
            "name" => "Tokelau",
            "id" => "+690",
            "code" => "TK"
        ],
        [
            "name" => "Tonga",
            "id" => "+676",
            "code" => "TO"
        ],
        [
            "name" => "Trinidad and Tobago",
            "id" => "+1868",
            "code" => "TT"
        ],
        [
            "name" => "Tunisia",
            "id" => "+216",
            "code" => "TN"
        ],
        [
            "name" => "Turkey",
            "id" => "+90",
            "code" => "TR"
        ],
        [
            "name" => "Turkmenistan",
            "id" => "+993",
            "code" => "TM"
        ],
        [
            "name" => "Turks and Caicos Islands",
            "id" => "+1649",
            "code" => "TC"
        ],
        [
            "name" => "Tuvalu",
            "id" => "+688",
            "code" => "TV"
        ],
        [
            "name" => "Uganda",
            "id" => "+256",
            "code" => "UG"
        ],
        [
            "name" => "Ukraine",
            "id" => "+380",
            "code" => "UA"
        ],
        [
            "name" => "United Arab Emirates",
            "id" => "+971",
            "code" => "AE"
        ],
        [
            "name" => "United Kingdom",
            "id" => "+44",
            "code" => "GB"
        ],
        [
            "name" => "United States",
            "id" => "+1",
            "code" => "US"
        ],
        [
            "name" => "Uruguay",
            "id" => "+598",
            "code" => "UY"
        ],
        [
            "name" => "Uzbekistan",
            "id" => "+998",
            "code" => "UZ"
        ],
        [
            "name" => "Vanuatu",
            "id" => "+678",
            "code" => "VU"
        ],
        [
            "name" => "Venezuela, Bolivarian Republic of Venezuela",
            "id" => "+58",
            "code" => "VE"
        ],
        [
            "name" => "Vietnam",
            "id" => "+84",
            "code" => "VN"
        ],
        [
            "name" => "Virgin Islands, British",
            "id" => "+1284",
            "code" => "VG"
        ],
        [
            "name" => "Virgin Islands, U.S.",
            "id" => "+1340",
            "code" => "VI"
        ],
        [
            "name" => "Wallis and Futuna",
            "id" => "+681",
            "code" => "WF"
        ],
        [
            "name" => "Yemen",
            "id" => "+967",
            "code" => "YE"
        ],
        [
            "name" => "Zambia",
            "id" => "+260",
            "code" => "ZM"
        ],
        [
            "name" => "Zimbabwe",
            "id" => "+263",
            "code" => "ZW"
        ]
    ];
}
