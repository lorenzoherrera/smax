<?php
	/**
	 * @package Smax
	 * @category Engine
	 */

	namespace Smax;

	/**
	 * A class that represents a set of Ratings received by a content, usually to be used to consider various Ratings and obtain a final rating evaluation using the SMAX algorithm
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
		 * Constructs a Set object with the given $ratings with the specified 
		 * @param array $ratings The ratings received by a content, in chronological order
		 * @param integer $attitude The attitude to use for the algorithm, one of the available Smax\ATTITUDE_*. Uses the configured attitude if omitted
		 * @return boolean True when constrution was done without errors, false otherwise
		 */
		function __construct($ratings, $attitude = ATTITUDE_DEFAULT) {
			$this->setAttitude($attitude);
			$this->setRatings($ratings);
		}

		/**
		 * Sets the attitude
		 * @param integer $attitude The attitude, one of the available Smax\ATTITUDE_*
		 */
		function setAttitude($attitude) {
			$this->attitude = $attitude;
		}

		/**
		 * Returns the attitude
		 * @return integer The attitude, one of the available Smax\ATTITUDE_*
		 */
		function getAttitude() {
			return $this->attitude;
		}

		/**
		 * Sets the ratings received by the object
		 * @param array $ratings A Ratings array in chronological order
		 */
		function setRatings($ratings) {
			$this->ratings = $ratings;
		}


		/**
		 * Returns the final rating and certainty for the previously set Ratings with the given $attitude.
		 * @param integer $attitude The attitude to use for calculations, one of the available Smax\ATTITUDE_*. Uses the configured attitude if omitted
		 * @return array A hash array with the "rating", "certainty" and "scores" keys, or false if rating couldn't be calculated.
		 * @throws Exception When final rating could not be calculated
		 */
		function getFinalRating($attitude = ATTITUDE_DEFAULT) {
			if (!is_array($this->ratings))
				throw new \Exception("No ratings");

			if (sizeof($this->ratings) < 1)
				throw new \Exception("Almost one rating is needed");

			$timestamp = false;
			$interval = false;
			$scores = false;
			foreach ($this->ratings as $rating) {
				if (!$scores[$rating->getRating()])
					$scores[$rating->getRating()] = [
						"certainty" => $rating->getCertainty(),
						"score" => 0,
						"votes" => 0
					];

				if ($timestamp)
					$interval = $rating->getTimestamp() - $timestamp;
				$timestamp = $rating->getTimestamp();

				$scores[$rating->getRating()]["certainty"] = ($scores[$rating->getRating()]["certainty"] + $rating->getCertainty($attitude)) / 2;
				$scores[$rating->getRating()]["score"] += $rating->getCertainty($attitude) * $rating->getPower($attitude);
				$scores[$rating->getRating()]["votes"] ++;
			}
			reset($this->ratings);

			$highestScore = -1;
			foreach ($scores as $rating => $score)
				if ($score["score"] > $highestScore) {
					$highestScore = $score["score"];
					$winningRating = $rating;
					$winningCertainty = $score["certainty"];
				}
			reset($scores);

			return [
				"rating" => $winningRating,
				"certainty" => $winningCertainty,
				"scores" => $scores
			];
		}

		/**
		 * Returns debug information about the set and its ratings
		 * @param string $title An optional title
		 * @return string The debug information in HTML format
		 */
		function getDebugInfoHtml($title = false) {
			$count = 1;
			$r .=
				"<table>\n".
					($title ? "<tr><th colspan=6>".$title." / ".Main::getAttitudeName($this->getAttitude())." attitude</th></tr>" : "").
					"<tr>\n".
						"<th></th>\n".
						"<th>Timestamp</th>\n".
						"<th>Description</th>\n".
						"<th>Rating</th>\n".
						"<th>Certainty</th>\n".
						"<th>Power</th>\n".
					"</tr>\n";
			foreach ($this->ratings as $rating)
				$r .=
					"<tr>\n".
						"<td>".$count++."</td>\n".
						"<td>".date("n/j/Y H:i:s", $rating->getTimestamp())."</td>\n".
						"<td>".$rating->getDescription()."</td>\n".
						"<td>".Main::getRatingName($rating->getRating())."</td>\n".
						"<td>".($rating->getCertainty($this->getAttitude()) == CERTAINTY_ABSOLUTE ? "Absolute" : number_format($rating->getCertainty($this->getAttitude()), 2, ".", ","))."</td>\n".
						"<td>".($rating->getPower($this->getAttitude()) == POWER_ABSOLUTE ? "Absolute" : number_format($rating->getPower($this->getAttitude()), 2, ".", ","))."</td>\n".
					"</tr>\n";
			reset($this->ratings);

			try {
				$finalRating = $this->getFinalRating();
			} catch (\Exception $e) {
				$r .= "</table>".$e->getMessage()."\n";
				return $r;
			}

			$r .=
				"<tr>\n".
					"<th colspan=2></th>\n".
					"<th>Results</th>\n".
					"<th>Votes</th>\n".
					"<th>Certainty</th>\n".
					"<th>Score</th>\n".
				"</tr>\n";

			foreach ($finalRating["scores"] as $rating => $score)
				$r .=
					"<tr>\n".
						"<td colspan=2></td>\n".
						"<td>".Main::getRatingName($rating)."</td>\n".
						"<td>".$score["votes"]."</td>\n".
						"<td>".number_format($score["certainty"], 2, ".", ",")."</td>\n".
						"<td>".number_format($score["score"], 2, ".", ",")."</td>\n".
					"</tr>\n";

			$r .=
				"<tr>\n".
					"<th colspan=2></th>\n".
					"<th colspan=4>Final SMAX rating</th>\n".
				"</tr>\n".
				"<tr>\n".
					"<td colspan=2></td>\n".
					"<td><b>".Main::getRatingName($finalRating["rating"])."</b> with a certainty of ".number_format($finalRating["certainty"], 2, ".", ",")."</td>\n".
				"</tr>\n";

			$r .= "</table>\n";

			return $r;
		}
	}

?>