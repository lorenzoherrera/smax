<?
	/**
	 * RatingDefault
	 *
	 * @package Smax
	 * @category Engine
	 */

	namespace Smax;

	/**
	 * RatingDefault
	 *
	 * A class that represents de default single rating for a content which is to be added at the moment of the content's creation
	 *
	 * @package Smax
	 * @category Engine
	 */
	class RatingDefault extends \Smax\Rating {
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
			$this->setRating(\Smax\Main::getAlgorithmKey("rating", \Smax\RATING_TYPE_DEFAULT, $setup["attitude"]));
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
			return \Smax\Main::getAlgorithmKey("certainty", \Smax\RATING_TYPE_DEFAULT, $attitude);
		}

		/**
		 * getPower
		 *
		 * @param integer $attitude The algorithm attitude to use, one of the available Smax\ATTITUDE_*. Uses the configured attitude if omitted
		 *
		 * @return integer The power, one of the available Smax\POWER_*
		 */
		function getPower($attitude = \SMAX_ATTITUDE) {
			return \Smax\Main::getAlgorithmKey("power", \Smax\RATING_TYPE_DEFAULT, $attitude);
		}
	}

?>