<?
	/**
	 * Definitions
	 *
	 * @package Smax
	 * @category Main
	 */

	namespace Smax;

	// Defines and equivalent namings for debugging/testing
	define("Smax\VERSION", 1);
	define("Smax\SUBVERSION", 0);

	define("Smax\ATTITUDE_OPTIMISTIC", 0);
	define("Smax\ATTITUDE_SKEPTICAL", 1);

	$smaxAttitudeNames = array(
		ATTITUDE_OPTIMISTIC => "Optimistic",
		ATTITUDE_SKEPTICAL => "Skeptical"
	);

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

	// SMAX Algorithm tables
	$smaxCertainties = array(
		ATTITUDE_OPTIMISTIC => array(
			"contentCreation" => array(
				"rating" => RATING_SAFE,
				"certainty" => CERTAINTY_LOW,
				"power" => POWER_LOW
			),
			"ratingOwnContents" => array(
				"power" => POWER_HIGH,
				"ratings" => array(
					RATING_SAFE => CERTAINTY_MEDIUM,
					RATING_MODERATE => CERTAINTY_HIGH,
					RATING_ADULT => CERTAINTY_HIGH
				)
			),
			"ratingOthersContents" => array(
				"power" => POWER_LOW,
				"ratings" => array(
					RATING_SAFE => CERTAINTY_HIGH,
					RATING_MODERATE => CERTAINTY_MEDIUM,
					RATING_ADULT => CERTAINTY_MEDIUM
				)
			)
		),
		ATTITUDE_SKEPTICAL => array(
			"contentCreation" => array(
				"rating" => RATING_SAFE,
				"certainty" => CERTAINTY_LOW,
				"power" => POWER_LOW
			),
			"ratingOwnContents" => array(
				"power" => POWER_MEDIUM,
				"ratings" => array(
					RATING_SAFE => CERTAINTY_LOW,
					RATING_MODERATE => CERTAINTY_MEDIUM,
					RATING_ADULT => CERTAINTY_MEDIUM
				)
			),
			"ratingOthersContents" => array(
				"power" => POWER_LOW,
				"ratings" => array(
					RATING_SAFE => CERTAINTY_MEDIUM,
					RATING_MODERATE => CERTAINTY_LOW,
					RATING_ADULT => CERTAINTY_LOW
				)
			)
		)
	);

	// Include main classes
	include \SMAX_DIR."/main.class.php";
	include \SMAX_DIR."/rating.class.php";
?>