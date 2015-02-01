<?
	/**
	 * Rating
	 *
	 * @package Smax
	 * @category Main
	 */

	namespace Smax;

	/**
	 * Rating
	 *
	 * A class that represents an obtained single rating about a content
	 *
	 * @package Smax
	 * @Category Main
	 */
	class Rating {
		/**
		 * @var integer $timestamp The timestamp when the Rating was emmited
		 */
		private $timestamp;

		/**
		 * Rating
		 *
		 * Constructs a Rating object with the given $setup specification
		 *
		 * @param array $setup A key-value array containing the specification
		 * @return boolean True when constrution was done without errors, false otherwise
		 */
		function Rating($setup) {
			$this->timestamp = $setup["timestamp"];
		}
	}

	/**
	 * RatingDefault
	 *
	 * A class that represents de default single rating for a content which is to be added at the moment of its creation
	 *
	 * @package Smax
	 * @Category Main
	 */
	class RatingDefault extends \Smax\Rating {
		/**
		 * RatingDefault
		 *
		 * Constructs a RatingDefault object with the given $setup specification
		 *
		 * @param array $setup A key-value array containing the specification
		 * @return boolean True when constrution was done without errors, false otherwise
		 */
		function RatingDefault($setup) {
			_parent::Rating($setup);
		}
	}

	/**
	 * RatingOwn
	 *
	 * A class that represents an obtained single rating about a content emmited by the owner of the content
	 *
	 * @package Smax
	 * @Category Main
	 */
	class RatingOwn extends \Smax\Rating {
		/**
		 * RatingOwn
		 *
		 * Constructs a RatingOwn object with the given $setup specification
		 *
		 * @param array $setup A key-value array containing the specification
		 * @return boolean True when constrution was done without errors, false otherwise
		 */
		function RatingOwn($setup) {
			_parent::Rating($setup);
		}
	}

?>