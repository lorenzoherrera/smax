<?php
	/**
	 * @package Smax
	 * @category Engine
	 */

	namespace Smax;

	/**
	 * A class that represents de default single rating for a content which is to be added at the moment of the content's creation
	 * @package Smax
	 * @category Engine
	 */
	class RatingDefault extends Rating {
		/**
		 * Constructs the object with the given $setup specification
		 * @param array $setup A key-value array containing the specification
		 * @return boolean True when constrution was done without errors, false otherwise
		 */
		function __construct($setup) {
			if (!parent::__construct($setup))
				return false;
			$this->setRating(Main::getAlgorithmKey("rating", RATING_TYPE_DEFAULT, $setup["attitude"]));
			return true;
		}

		/**
		 * Returns a description for this rating
		 * @return string The description
		 */
		function getDescription() {
			return "Rating added when the content is created";
		}

		/**
		 * @param integer $attitude The algorithm attitude to use, one of the available Smax\ATTITUDE_*. Uses the configured attitude if omitted
		 * @return double The certainty
		 */
		function getCertainty($attitude = ATTITUDE_DEFAULT) {
			return Main::getAlgorithmKey("certainty", RATING_TYPE_DEFAULT, $attitude);
		}

		/**
		 * @param integer $attitude The algorithm attitude to use, one of the available Smax\ATTITUDE_*. Uses the configured attitude if omitted
		 * @return double The power
		 */
		function getPower($attitude = ATTITUDE_DEFAULT) {
			return Main::getAlgorithmKey("power", RATING_TYPE_DEFAULT, $attitude);
		}
	}

?>