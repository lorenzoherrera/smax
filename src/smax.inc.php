<?php
	/**
	 * SMAX definitions, namings and variables, and SMAX algorithm configuration tables
	 * @package Smax
	 * @category Main
	 */

	namespace Smax;

	const VERSION = 1;
	const SUBVERSION = 0;

	const RATING_SAFE = 0;
	const RATING_MODERATE = 1;
	const RATING_ADULT = 2;
	const RATING_EXPLICIT = 3;

	$smaxRatingNames = [
		RATING_SAFE => "Safe",
		RATING_MODERATE => "Moderate",
		RATING_ADULT => "Adult",
		RATING_EXPLICIT => "Explicit"
	];

	const CERTAINTY_ABSOLUTE = -1;
	const POWER_ABSOLUTE = -1;

	const RATING_TYPE_DEFAULT = 0;
	const RATING_TYPE_FROM_OWNER = 1;
	const RATING_TYPE_FROM_OTHER = 2;
	const RATING_TYPE_FROM_MODERATOR = 3;

	const ATTITUDE_DEFAULT = ATTITUDE_HUMANIST;
?>