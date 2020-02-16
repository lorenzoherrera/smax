<?php
	/**
	 * @package Smax
	 * @category Engine
	 */

	namespace Smax;

	/**
	 * A class that provides all basic interactions with SMAX
	 * @package Smax
	 * @category Engine
	 */
	class Main {
		/**
		 * Returns information about the running SMAX version
		 * @return string A string containing the information
		 */
		static function getVersionInfo() {
			return "SMAX v.".VERSION.".".SUBVERSION;
		}

		/**
		 * Returns configuration about the running SMAX system
		 * @return array A key-value array of information
		 */
		static function getConfigInfo() {
			global $smaxAttitudeNames;
			return array(
				"Default attitude" => Main::getAttitudeName(),
				"Available attitudes" => implode(" / ", $smaxAttitudeNames)
			);
		}

		/**
		 * Returns the attitude name for the given $attitude
		 * @param integer $attitude The attitude, one of the available Smax\ATTITUE_*. Uses the default attitude if omitted
		 * @return string The attitude name
		 */
		static function getAttitudeName($attitude = ATTITUDE_HUMANIST) {
			global $smaxAttitudeNames;
			return $smaxAttitudeNames[$attitude];
		}

		/**
		 * Returns the rating name for the given $rating
		 * @param integer $rating The rating, one of the available Smax\RATING_*
		 * @return string The rating name
		 */
		static function getRatingName($rating) {
			global $smaxRatingNames;
			return $smaxRatingNames[$rating];
		}

		/**
		 * Returns the algorithm value for the specified key on algorithm table for the given attitude and rating type
		 * @param string $key The algorithm key		 
		 * @param integer $ratingType The rating type for which to get the algorithm table for the specified attitude, one of the available Smax\RATING_TYPE_*
		 * @param integer $attitude The attitude to get the algorithm table for, one of the available Smax\ATTITUDE_*		 
		 * @return mixed The algorithm key value
		*/
		static function getAlgorithmKey($key, $ratingType, $attitude = ATTITUDE_DEFAULT) {
			global $smaxAlgorithmTables;
			return $smaxAlgorithmTables[$attitude][$ratingType][$key];
		}
	}

?>