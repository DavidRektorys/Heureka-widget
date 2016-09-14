<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<title>Heureka widget</title>
	<style>
	body {width: 130px}
	.heurekaWidget {width: 100%; height: auto; border: #E5E5E5 1px solid; border-radius: 10px; background-color: #ffffff; text-align: center; font-family: "Helvetica";}
	.heurekaStar, .hodnoceniText, .recenzePocet {color: #30A9D4}
	.heurekaStar {font-size: 22px}
	.hodnoceniText {font-size: 20px}
	.recenzePocet {font-size: 10px}
	.hodnoceniFooter {color: silver; font-size: 11px}
	.heurekaWidgetPosition {position: relative; top: -20px}
	</style>
</head>
<body>

<!-- Main widget -->
<div class="heurekaWidget">
	<!-- This is an image of the Heureka seal -->
	<img class="heurekaWidgetPosition" src="http://im9.cz/css-v2/images/overeno-zlate-75x75.png"/>
	<?php
	/* This is where you insert URL of your own online shop's ratings on Heureka */
	$urlRating = 'http://obchody.heureka.cz/NameOfYourOnlineShop/recenze/';
	$content = file_get_contents($urlRating);
	/* There are two ratings - client happiness and number of reviews */
	$hodnoceniFirst = explode('<div class="score long" itemprop="ratingValue">', $content);
	$hodnoceniSecond = explode("</div>", $hodnoceniFirst[1]);
	echo "<div class='hodnoceniText heurekaWidgetPosition'>" . $hodnoceniSecond[0] . "</div>";
	/* This second part is for the number of your reviews */
	$urlNumberOfReviews = 'http://obchody.heureka.cz/NameOfYourOnlineShop/recenze/';
	$content = file_get_contents($urlNumberOfReviews);
	/* Don't forget to add your own URL here as well */
	$recenzeFirst = explode('<a href="http://obchody.heureka.cz/NameOfYourOnlineShop/#recenze">', $content);
	$recenzeSecond = explode("</a>", $recenzeFirst[1]);
	echo "<div class='recenzePocet heurekaWidgetPosition'>" . trim(str_replace("", "", strip_tags($recenzeSecond[0]))) . "</div>";
	?>
	<!-- This last bit is unfortunately not working based on the actual rating - it always shows 5 gold stars. Maybe a challenge for someone who would like to pull request this and add that? -->
	<div class="heurekaStar heurekaWidgetPosition">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
	<div class="hodnoceniFooter heurekaWidgetPosition">* hodnocení za 90 dní</div>
</div>

</body>
</html>