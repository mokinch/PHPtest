<?php

 require "index.html";

$imgWidth = (int)($_GET['bWidth']);
$imgHeight = (int)($_GET['bHeight']);
$circleRad = (int)($_GET['cRad']);

$place = min($imgWidth, $imgHeight) - $circleRad;

$numOfCircles = (int)($_GET['cNum']);



create_image($imgWidth, $imgHeight, $place, $numOfCircles, $circleRad);
//print "<img src=image.png?".date("U").">";

function  create_image($imgWidth, $imgHeight, $place, $numOfCircles, $circleRad){
        $im = @imagecreate($imgWidth, $imgHeight) or die("Cannot Initialize new GD image stream");
        $background_color = imagecolorallocate($im, 255, 255, 255);  

        $blue = imagecolorallocate($im, 0, 0, 255);         
        $red = imagecolorallocate($im, 255, 0, 0);
        $green = imagecolorallocate($im, 0, 255, 0);         
        $black = imagecolorallocate($im, 0, 0, 0);
        $yellow = imagecolorallocate($im, 255, 255, 0);         
       
		$circleColor = [$blue, $red, $green, $black, $yellow];


		function place_circles($placeRand, $num, $im, $circleColor, $circleRad) {

      		 for($i = 0; $i < $num; $i++) {

			       	$X = rand($circleRad, $placeRand);
					$Y = rand($circleRad, $placeRand);
					$C = rand(0,4);
					imagefilledellipse($im, $X, $Y, $circleRad, $circleRad, $circleColor[$C]);
				}
		}

        switch ($numOfCircles) {
        	case '5':
        		place_circles($place, 5, $im, $circleColor, $circleRad);
        		break;

        	case '10':
        		place_circles($place, 10, $im, $circleColor, $circleRad);
        		break;

        	case '20':
        		place_circles($place, 20, $im, $circleColor, $circleRad);
        		break;

        	case '50':
        		place_circles($place, 50, $im, $circleColor, $circleRad);
        		break;
        	}
        

        imagepng($im,"image.png");
        imagedestroy($im);
}


?>