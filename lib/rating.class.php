<?
	/**
	 * Rating
	 *
	 * @package Smax
	 * @category Engine
	 */

	namespace Smax;

	/**
	 * Rating
	 *
	 * A class that represents an obtained single rating about a content
	 *
	 * @package Smax
	 * @category Engine
	 */
	class Rating {
		/**
		 * @var integer $timestamp The timestamp when the Rating was received
		 */
		private $timestamp;

		/**
		 * @var integer $rating The rating level, one of the available Smax\RATING_*
		*/
		private $rating;

		/**
		 * @var string $description A description, mainly for debugging uses
		 */
		private $description;

		/**
		 * __construct
		 *
		 * Constructs a Rating object with the given $setup specification
		 *
		 * @param array $setup A key-value array containing the specification
		 * @return boolean True when constrution was done without errors, false otherwise
		 */
		function __construct($setup) {
			$this->setTimestamp($setup["timestamp"]);
			if ($setup["description"])
				$this->setDescription($setup["description"]);
			return true;
		}

		/**
		 * setTimestamp
		 *
		 * Sets the timestamp when the Rating was received 
		 *
		 * @param integer $timestamp Timestamp
		 */
		function setTimestamp($timestamp) {
			$this->timestamp = $timestamp;
		}

		/**
		 * getTimestamp
		 *
		 * Returns the timestamp
		 *
		 * @return integer The timestamp
		 */
		function getTimestamp() {
			return $this->timestamp;
		}

		/**
		 * setDescription
		 *
		 * Sets the description
		 *
		 * @param string $description The description
		 */
		function setDescription($description) {
			$this->description = $description;
		}

		/**
		 * getDescription
		 *
		 * Returns the description
		 *
		 * @return string The description
		 */
		function getDescription() {
			return $this->description;
		}

		/**
		 * setRating
		 *
		 * Sets the rating level
		 *
		 * @param integer $rating The rating level, one of the available Smax\RATING_*
		 */
		function setRating($rating) {
			$this->rating = $rating;
		}

		/**
		 * getRating
		 *
		 * Returns the rating
		 *
		 * @return integer The rating, one of the available Smax\RATING_*
		 */
		function getRating() {
			return $this->rating;
		}
	}

?>