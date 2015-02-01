<?
	/**
	 * RatingFromOther
	 *
	 * @package Smax
	 * @category Engine
	 */

	namespace Smax;

	/**
	 * RatingFromOther
	 *
	 * A class that represents an obtained single rating about a content emmited by someone who's not the owner of the content
	 *
	 * @package Smax
	 * @category Engine
	 */
	class RatingFromOther extends \Smax\Rating {
		/**
		 * __construct
		 *
		 * Constructs the object with the given $setup specification
		 *
		 * @param array $setup A key-value array containing the specification
		 * @return boolean True when constrution was done without errors, false otherwise
		 */
		function __construct($setup) {
			if (!parent::__construct($setup))
				return false;
			$this->setRating($setup["rating"]);
			return true;
		}

		/**
		 * getCertainty
		 *
		 * @param integer $attitude The algorithm attitude to use, one of the available Smax\ATTITUDE_*. Uses the configured attitude if omitted
		 *
		 * @return integer The certainty, one of the available Smax\CERTAINTY_*
		 */
		function getCertainty($attitude = \SMAX_ATTITUDE) {
			$certaintyTable = \Smax\Main::getAlgorithmKey("certaintyTable", \Smax\RATING_TYPE_FROM_OTHER, $attitude);
			return $certaintyTable[$this->getRating()];
		}

		/**
		 * getPower
		 *
		 * @param integer $attitude The algorithm attitude to use, one of the available Smax\ATTITUDE_*. Uses the configured attitude if omitted
		 *
		 * @return integer The power, one of the available Smax\POWER_*
		 */
		function getPower($attitude = \SMAX_ATTITUDE) {
			return \Smax\Main::getAlgorithmKey("power", \Smax\RATING_TYPE_FROM_OTHER, $attitude);
		}
	}

?>