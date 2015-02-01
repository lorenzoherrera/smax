<?
	/**
	 * Main
	 *
	 * @package Smax
	 * @category Main
	 */

	namespace Smax;

	/**
	 * Main
	 *
	 * A class that provides all basic interactions with SMAX
	 *
	 * @package Smax
	 * @category Main
	 */
	class Main {
		/**
		 * getVersionInfo
		 *
		 * Returns information about the running SMAX version
		 *
		 * @return string A string containing the information
		 */
		static function getVersionInfo() {
			return "SMAX v.".VERSION.".".SUBVERSION;
		}

		/**
		 * getConfigInfo
		 *
		 * Returns configuration about the running SMAX system
		 *
		 * @return array A key-value array of information
		 */
		static function getConfigInfo() {
			global $smaxAttitudeNames;

			return array(
				"Configured attitude" => $smaxAttitudeNames[\SMAX_ATTITUDE]
			);
		}
	}

?>