<?
	namespace Smax;

	class Rating {
		private $timestamp;
		private $isContentCreation;

		function Rating($setup) {
			$this->timestamp = $setup["timestamp"];

			// If the rating is generated as a result of the content creation (first rating)
			if ($setup["isContentCreation"]) {
				$this->isContentCreation = true;

			}
		}
	}

?>