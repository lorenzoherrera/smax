<?php
	/**
	 * @package Smax
	 * @category Engine
	 */

	namespace Smax;

	/**
	 * A class that represents an obtained single rating about a content
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
		 * Constructs a Rating object with the given $setup specification
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
		 * Sets the timestamp when the Rating was received 
		 * @param integer $timestamp Timestamp
		 */
		function setTimestamp($timestamp) {
			$this->timestamp = $timestamp;
		}

		/**
		 * Returns the timestamp
		 * @return integer The timestamp
		 */
		function getTimestamp() {
			return $this->timestamp;
		}

		/**
		 * Returns a description for this rating
		 * @return string The description
		 */
		function getDescription() {}

		/**
		 * Sets the rating level
		 * @param integer $rating The rating level, one of the available Smax\RATING_*
		 */
		function setRating($rating) {
			$this->rating = $rating;
		}

		/**
		 * Returns the rating
		 * @return integer The rating, one of the available Smax\RATING_*
		 */
		function getRating() {
			return $this->rating;
		}
	}

?>