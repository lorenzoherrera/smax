<?php

	/**
	 * Skeptical attitude (SMAX-S)
	 *
	 * Skeptical attitude makes SMAX behave a little grouchy. SMAX-S is not
	 * that convinced about the human nature being honest by default, and
	 * tries to take care about what users have to say on the maturity of
	 * his own contents, specially when they say they're completely safe.
	 * Skeptical SMAX-S tries to rely a lot more on the collective
	 * intelligence of all the other users that have rated a content.
	 *
	 * SMAX-S took the red pill.
	 *
	 * @package Smax
	 * @category Attitudes
	 */

	namespace Smax;

	const ATTITUDE_SKEPTICAL = 1;

	global $smaxAttitudeNames;
	global $smaxAlgorithmTables;
	
	$smaxAttitudeNames[ATTITUDE_SKEPTICAL] = "Skeptical";

	$smaxAlgorithmTables[ATTITUDE_SKEPTICAL] = [
		RATING_TYPE_DEFAULT => [
			"rating" => RATING_SAFE,
			"certainty" => 1/3,
			"power" => 1/3
		],
		RATING_TYPE_FROM_OWNER => [
			"power" => 2/3,
			"certaintyTable" => [
				RATING_SAFE => 1/3,
				RATING_MODERATE => 2/3,
				RATING_ADULT => 2/3
			]
		],
		RATING_TYPE_FROM_OTHER => [
			"power" => 1/3,
			"certaintyTable" => [
				RATING_SAFE => 2/3,
				RATING_MODERATE => 1/3,
				RATING_ADULT => 1/3
			]
		],
		RATING_TYPE_FROM_MODERATOR => [
			"power" => POWER_ABSOLUTE,
			"certaintyTable" => [
				RATING_SAFE => CERTAINTY_ABSOLUTE,
				RATING_MODERATE => CERTAINTY_ABSOLUTE,
				RATING_ADULT => CERTAINTY_ABSOLUTE
			]
		]
	];

?>