<?php

	/**
	 * Humanist attitude (SMAX-H)
	 *
	 * Humanist attitude makes SMAX think humans are honest most of the
	 * times. It gives strongest importance to what a user has to say about
	 * his own contents, even if he says that they do not contain maturity,
	 * but taking into account that the world is not perfect and there is
	 * some people out there that would lie, or simply not rate their
	 * contents just to appear on a site's listings. That's why humanist
	 * SMAX-H still gives quite importance to what other users have to say
	 * about the contents.
	 *
	 * When SMAX-H hears trotting, he often thinks of unicorns.
	 * 
	 * @package Smax
	 * @category Attitudes
	 */

	namespace Smax;

	const ATTITUDE_HUMANIST = 0;

	global $smaxAttitudeNames;
	global $smaxAlgorithmTables;
	
	$smaxAttitudeNames[ATTITUDE_HUMANIST] = "Humanist";
	
	$smaxAlgorithmTables[ATTITUDE_HUMANIST] = [
		RATING_TYPE_DEFAULT => [
			"rating" => RATING_SAFE,
			"certainty" => 1/3,
			"power" => 1/3
		],
		RATING_TYPE_FROM_OWNER => [
			"power" => 3/3,
			"certaintyTable" => [
				RATING_SAFE => 2/3,
				RATING_MODERATE => 3/3,
				RATING_ADULT => 3/3,
				RATING_EXPLICIT => 3/3
			]
		],
		RATING_TYPE_FROM_OTHER => [
			"power" => 1/3,
			"certaintyTable" => [
				RATING_SAFE => 3/3,
				RATING_MODERATE => 2/3,
				RATING_ADULT => 2/3,
				RATING_EXPLICIT => 2/3
			]
		],
		RATING_TYPE_FROM_MODERATOR => [
			"power" => POWER_ABSOLUTE,
			"certaintyTable" => [
				RATING_SAFE => CERTAINTY_ABSOLUTE,
				RATING_MODERATE => CERTAINTY_ABSOLUTE,
				RATING_ADULT => CERTAINTY_ABSOLUTE,
				RATING_EXPLICIT => CERTAINTY_ABSOLUTE
			]
		]
	];

?>