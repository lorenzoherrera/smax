<?

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

	define("Smax\ATTITUDE_HUMANIST", 0);

	$smaxAttitudeNames[ATTITUDE_HUMANIST] = "Humanist";

	$smaxAlgorithmTables[ATTITUDE_HUMANIST] = array(
		RATING_TYPE_DEFAULT => array(
			"rating" => RATING_SAFE,
			"certainty" => CERTAINTY_LOW,
			"power" => POWER_LOW
		),
		RATING_TYPE_FROM_OWNER => array(
			"power" => POWER_HIGH,
			"certaintyTable" => array(
				RATING_SAFE => CERTAINTY_MEDIUM,
				RATING_MODERATE => CERTAINTY_HIGH,
				RATING_ADULT => CERTAINTY_HIGH
			)
		),
		RATING_TYPE_FROM_OTHER => array(
			"power" => POWER_LOW,
			"certaintyTable" => array(
				RATING_SAFE => CERTAINTY_HIGH,
				RATING_MODERATE => CERTAINTY_MEDIUM,
				RATING_ADULT => CERTAINTY_MEDIUM
			)
		),
		RATING_TYPE_FROM_MODERATOR => array(
			"power" => POWER_ABSOLUTE,
			"certaintyTable" => array(
				RATING_SAFE => CERTAINTY_ABSOLUTE,
				RATING_MODERATE => CERTAINTY_ABSOLUTE,
				RATING_ADULT => CERTAINTY_ABSOLUTE
			)
		)
	);

?>