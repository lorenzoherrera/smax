<html>
<head>
	<title>SMAX tests</title>
	<link rel="stylesheet" type="text/css" href="css/main.css" />
</head>
<body>

	<?
		define("SMAX_DIR", ".."); // Must contain the path to SMAX lib directory
		include \SMAX_DIR."/smax.inc.php"; // Include SMAX definitions
		include \SMAX_DIR."/smax.config.php"; // Include your desired SMAX configuration, copied from lib/smax.config.php.example

		echo "<h1>".Smax\Main::getVersionInfo()." tests</h1>";

		echo "<ul class=properties>";
		array_walk(Smax\Main::getConfigInfo(), function($value, $key){ echo "<li><span>$key</span><span>$value</span></li>"; });
		echo  "</ul>";

		// Manually build some scenarios for an imaginary content to test the SMAX algorithm by directly feeding a list of ratings to Smax\Main::calculate
		$now = mktime();

		$scenarios = array(
			"Test 1" => array(
				"description" => "The content is created by a user",
				"attitude" => Smax\ATTITUDE_OPTIMISTIC,
				"ratings" => array(
					new Smax\Rating(array(
						"timestamp" => $now,
						"isContentCreation" => true
					))
				)
			)
		);
	?>

</body>
</html>