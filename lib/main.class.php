<?
	namespace Smax;

	class Main {
		static function getVersionInfo() {
			return "SMAX v.".VERSION.".".SUBVERSION;
		}

		static function getConfigInfo() {
			global $smaxAttitudeNames;

			return array(
				"Configured attitude" => $smaxAttitudeNames[\SMAX_ATTITUDE]
			);
		}
	}

?>