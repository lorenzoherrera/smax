<?
	/**
	 * Tests
	 *
	 * Example basic direct usage of SMAX's algorithm by manually feeding content scenarios
	 *
	 * @package Smax
	 * @category Main
	 */
?><html>
<head>
	<title>SMAX tests</title>
	<link rel="stylesheet" type="text/css" href="css/main.css" />
</head>
<body><?

	define("SMAX_DIR", ".."); // Must contain the path to SMAX lib directory
	include \SMAX_DIR."/smax.inc.php"; // Include SMAX definitions
	include \SMAX_DIR."/smax.config.php"; // Include your desired SMAX configuration, copied from lib/smax.config.php.example

	echo "<h1>".Smax\Main::getVersionInfo()." tests</h1>";

	echo "<ul class=properties>\n";
	array_walk(Smax\Main::getConfigInfo(), function($value, $key){ echo "<li><span>$key</span><span>$value</span></li>\n"; });
	echo  "</ul>\n";

	echo "<hr>\n";

	// Manually build some scenarios for an imaginary content to test the SMAX algorithm by directly feeding a list of ratings to Smax\Main::calculate
	$now = mktime();
	$secondsIntervalBetweenSteps = 60;

	// Simple humanist
	echo "<h2>Simple</h2>\n";
	$set = new Smax\Set(array(
		new Smax\RatingDefault(array(
			"description" => "The content is created",
			"timestamp" => $now,
			"attitude" => Smax\ATTITUDE_HUMANIST
		)),
		new Smax\RatingFromOwner(array(
			"description" => "The content receives a rating from its owner",
			"timestamp" => $now+=$secondsIntervalBetweenSteps,
			"rating" => Smax\RATING_SAFE
		)),
		new Smax\RatingFromOther(array(
			"description" => "The content receives a rating from another user",
			"timestamp" => $now+=$secondsIntervalBetweenSteps,
			"rating" => Smax\RATING_MODERATE
		))
	), Smax\ATTITUDE_HUMANIST);
	echo $set->getDebugInfoHtml();

	// Simple skeptical
	echo "<h2>Simple skeptical</h2>\n";
	$set = new Smax\Set(array(
		new Smax\RatingDefault(array(
			"description" => "The content is created",
			"timestamp" => $now,
			"attitude" => Smax\ATTITUDE_SKEPTICAL
		)),
		new Smax\RatingFromOwner(array(
			"description" => "The content receives a rating from its owner",
			"timestamp" => $now+=$secondsIntervalBetweenSteps,
			"rating" => Smax\RATING_SAFE
		)),
		new Smax\RatingFromOther(array(
			"description" => "The content receives a rating from another user",
			"timestamp" => $now+=$secondsIntervalBetweenSteps,
			"rating" => Smax\RATING_MODERATE
		))
	), Smax\ATTITUDE_SKEPTICAL);
	echo $set->getDebugInfoHtml();

	// Simple moderated
	echo "<h2>Simple moderated</h2>\n";
	$set = new Smax\Set(array(
		new Smax\RatingDefault(array(
			"description" => "The content is created",
			"timestamp" => $now,
			"attitude" => Smax\ATTITUDE_HUMANIST
		)),
		new Smax\RatingFromOwner(array(
			"description" => "The content receives a rating from its owner",
			"timestamp" => $now+=$secondsIntervalBetweenSteps,
			"rating" => Smax\RATING_MODERATE
		)),
		new Smax\RatingFromOther(array(
			"description" => "The content receives a rating from another user",
			"timestamp" => $now+=$secondsIntervalBetweenSteps,
			"rating" => Smax\RATING_MODERATE
		)),
		new Smax\RatingFromModerator(array(
			"description" => "The content receives a rating from the moderator",
			"timestamp" => $now+=$secondsIntervalBetweenSteps,
			"rating" => Smax\RATING_MODERATE
		))
	), Smax\ATTITUDE_HUMANIST);
	echo $set->getDebugInfoHtml();

?></body>
</html>