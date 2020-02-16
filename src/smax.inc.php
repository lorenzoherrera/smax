<?php
	/**
	 * SMAX definitions, namings and variables, and SMAX algorithm configuration tables
	 * @package Smax
	 * @category Main
	 */

	namespace Smax;

	define("VERSION", 1);
	define("SUBVERSION", 0);

	define("RATING_SAFE", 0);
	define("RATING_MODERATE", 1);
	define("RATING_ADULT", 2);
	define("RATING_EXPLICIT", 3);

	$smaxRatingNames = array(
		RATING_SAFE => "Safe",
		RATING_MODERATE => "Moderate",
		RATING_ADULT => "Adult",
		RATING_EXPLICIT => "Explicit"
	);

	define("CERTAINTY_ABSOLUTE", -1);
	define("POWER_ABSOLUTE", -1);

	define("RATING_TYPE_DEFAULT", 0);
	define("RATING_TYPE_FROM_OWNER", 1);
	define("RATING_TYPE_FROM_OTHER", 2);
	define("RATING_TYPE_FROM_MODERATOR", 3);

	// Include attitudes
	include SMAX_DIR."/attitudes/humanist.inc.php";
	include SMAX_DIR."/attitudes/skeptical.inc.php";

	// Include main classes
	include SMAX_DIR."/main.class.php";
	include SMAX_DIR."/set.class.php";
	include SMAX_DIR."/rating.class.php";
	include SMAX_DIR."/ratingdefault.class.php";
	include SMAX_DIR."/ratingfromowner.class.php";
	include SMAX_DIR."/ratingfromother.class.php";
	include SMAX_DIR."/ratingfrommoderator.class.php";
?>