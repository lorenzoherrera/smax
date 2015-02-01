<?
	/**
	 * Definitions
	 *
	 * SMAX definitions, namings and variables, and SMAX algorithm configuration tables
	 *
	 * @package Smax
	 * @category Main
	 */

	namespace Smax;

	define("Smax\VERSION", 1);
	define("Smax\SUBVERSION", 0);

	define("Smax\RATING_SAFE", 0);
	define("Smax\RATING_MODERATE", 1);
	define("Smax\RATING_ADULT", 2);
	define("Smax\RATING_EXPLICIT", 3);

	$smaxRatingNames = array(
		RATING_SAFE => "Safe",
		RATING_MODERATE => "Moderate",
		RATING_ADULT => "Adult",
		RATING_EXPLICIT => "Explicit"
	);

	define("Smax\CERTAINTY_LOW", 0);
	define("Smax\CERTAINTY_MEDIUM", 1);
	define("Smax\CERTAINTY_HIGH", 2);
	define("Smax\CERTAINTY_ABSOLUTE", 3);

	$smaxCertaintyNames = array(
		CERTAINTY_LOW => "Low",
		CERTAINTY_MEDIUM => "Medium",
		CERTAINTY_HIGH => "High",
		CERTAINTY_ABSOLUTE => "Absolute"
	);

	$smaxCertaintyValues = array(
		CERTAINTY_LOW => 1/3,
		CERTAINTY_MEDIUM => 2/3,
		CERTAINTY_HIGH => 1
	);

	define("Smax\POWER_LOW", 0);
	define("Smax\POWER_MEDIUM", 1);
	define("Smax\POWER_HIGH", 2);
	define("Smax\POWER_ABSOLUTE", 3);

	$smaxPowerNames = array(
		POWER_LOW => "Low",
		POWER_MEDIUM => "Medium",
		POWER_HIGH => "High",
		POWER_ABSOLUTE => "Absolute"
	);

	$smaxPowerValues = array(
		POWER_LOW => 1/3,
		POWER_MEDIUM => 2/3,
		POWER_HIGH => 1
	);

	define("Smax\RATING_TYPE_DEFAULT", 0);
	define("Smax\RATING_TYPE_FROM_OWNER", 1);
	define("Smax\RATING_TYPE_FROM_OTHER", 2);
	define("Smax\RATING_TYPE_FROM_MODERATOR", 3);

	// Include attitudes
	include \SMAX_DIR."/attitudes/humanist.inc.php";
	include \SMAX_DIR."/attitudes/skeptical.inc.php";

	// Include main classes
	include \SMAX_DIR."/main.class.php";
	include \SMAX_DIR."/set.class.php";
	include \SMAX_DIR."/rating.class.php";
	include \SMAX_DIR."/ratingdefault.class.php";
	include \SMAX_DIR."/ratingfromowner.class.php";
	include \SMAX_DIR."/ratingfromother.class.php";
	include \SMAX_DIR."/ratingfrommoderator.class.php";
?>