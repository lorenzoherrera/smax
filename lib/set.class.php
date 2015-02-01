<?
	/**
	 * Set
	 *
	 * @package Smax
	 * @category Engine
	 */

	namespace Smax;

	/**
	 * Set
	 *
	 * A class that represents a set of Ratings received by a content, usually to be used to consider various Ratings and obtain a final rating evaluation using the SMAX algorithm
	 *
	 * @package Smax
	 * @category Main
	 */
	class Set {
		/**
		 * @var integer $attitude The attitude to use
		 */
		private $attitude;

		/**
		 * @var array $ratings An array of Rating objects representing the ratings received by a content, in chronological order
		 */
		private $ratings;

		/**
		 * __construct
		 *
		 * Constructs a Set object with the given $ratings with the specified 
		 *
		 * @param array $ratings The ratings received by a content, in chronological order
		 * @param integer $attitude The attitude to use for the algorithm, one of the available Smax\ATTITUDE_*. Uses the configured attitude if omitted
		 *
		 * @return boolean True when constrution was done without errors, false otherwise
		 */
		function __construct($ratings, $attitude = \SMAX_ATTITUDE) {
			$this->setAttitude($attitude);
			$this->setRatings($ratings);
		}

		/**
		 * setAttitude
		 *
		 * Sets the attitude
		 *
		 * @param integer $attitude The attitude, one of the available Smax\ATTITUDE_*
		 */
		function setAttitude($attitude) {
			$this->attitude = $attitude;
		}

		/**
		 * getAttitude
		 *
		 * Returns the attitude
		 *
		 * @return integer The attitude, one of the available Smax\ATTITUDE_*
		 */
		function getAttitude() {
			return $this->attitude;
		}

		/**
		 * setRatings
		 *
		 * Sets the ratings received by the object
		 *
		 * @param array $ratings A Ratings array in chronological order
		 */
		function setRatings($ratings) {
			$this->ratings = $ratings;
		}

		/**
		 * getDebugInfoHtml
		 *
		 * Returns debug information about the set and its ratings
		 *
		 * @return string The debug information in HTML format
		 */
		function getDebugInfoHtml() {
			$r .= "<b>Attitude</b> ".Main::getAttitudeName($this->getAttitude())."<br>\n";

			$count = 1;
			$r .= "<div class=propertiesHorizontalList>";
			foreach ($this->ratings as $rating) {
				$r .= "<ul class=properties>\n";
					$r .=
						"<li>".
							"<span>".date("n/j/Y H:i:s", $rating->getTimestamp())."</span>".
							"<span>#".$count++."</span>".
						"</li>\n";
					$r .= "<li><span>".$rating->getDescription()."</span></li>\n";
					$r .=
						"<li>".
							"<span>Rating</span>".
							"<span>".Main::getRatingName($rating->getRating())."</span>".
						"</li>\n";
					$r .=
						"<li>".
							"<span>Certainty</span>".
							"<span>".Main::getCertaintyName($rating->getCertainty($this->getAttitude()))."</span>".
						"</li>\n";
					$r .=
						"<li>".
							"<span>Power</span>".
							"<span>".Main::getPowerName($rating->getPower($this->getAttitude()))."</span>".
						"</li>\n";
				$r .= "</ul>\n";
			}
			$r .= "<ul class=properties>\n";
				$r .=
					"<li>".
						"<span>SMAX rating</span>".
						"<span></span>".
					"</li>\n";
			$r .= "</ul>\n";
			$r .= "</div>";
			return $r;
		}
	}

?>