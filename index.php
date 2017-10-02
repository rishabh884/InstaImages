<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>InstaImages</title>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	</script>
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	</script>
	<script>

	    // javascript to set alignment of images
	   function four() {
	   var elements = document.getElementsByClassName("col-md-4 col-centered");
	   var i;
	   for (i = 0; i < elements.length; i++) {
	       elements[i].style.width = "25%";
	   }
	}

	// javascript to set alignment of images
	function two() {
	   var elements = document.getElementsByClassName("col-md-4 col-centered");
	   var i;
	   for (i = 0; i < elements.length; i++) {
	       elements[i].style.width = "50%";
	   }
	}

	// javascript to set alignment of images
	function one() {
	   var elements = document.getElementsByClassName("col-md-4 col-centered");
	   var i;
	   for (i = 0; i < elements.length; i++) {
	       elements[i].style.width = "100%";
	   }
	} 
	//jQuery to set an animation on scrool up
	$(window).scroll(function() {
	 $(".slideanim").each(function(){
	   var pos = $(this).offset().top;

	   var winTop = $(window).scrollTop();
	   if (pos < winTop + 600) {
	     $(this).addClass("slide");
	   }
	 });
	}); 
	        
	</script><!--   Begining of all the styles       !-->

	<style>
	            body, html {
	   height: 100%;
	}

	/* The hero image */
	.hero-image {
	   /* The image used */
	   background-image: url("instaheader.jpg");

	   /* Set a specific height */
	   height: 50%;

	   /* Position and center the image to scale nicely on all screens */
	   background-position: center;
	   background-repeat: no-repeat;
	   background-size: cover;
	   position: relative;
	}

	/* Place text in the middle of the image */
	.hero-text {
	   text-align: center;
	   position: absolute;
	   top: 50%;
	   left: 50%;
	   transform: translate(-50%, -50%);
	   color: white;
	}
	            .column {
	   float: left;
	   width: 50%;
	   padding: 10px;
	}

	.column img {
	   margin-top: 12px;
	   width: 100%;
	}

	/* Clear floats after the columns */
	.row:after {
	   content: "";
	   display: table;
	   clear: both;
	}
	.col-centered{
	   float: none;
	   margin: 0 auto;
	}
	.bg-2 {
	     background-color: #474e5d; /* Dark Blue */
	     color: #ffffff;
	 }
	 .bg-1 {
	     background-color: #1abc9c; /* Green */
	     color: #ffffff;
	 }
	 
	 .bg-3 {
	     background-color: #ffffff; /* White */
	     color: #555555;
	 }
	 .logo {
	     color: #f4511e;
	     font-size: 200px;
	 }
	  body {
	     font: 400 15px Lato, sans-serif;
	     line-height: 1.8;
	     color: #818181;
	 }
	 .slide {
	     animation-name: slide;
	     -webkit-animation-name: slide;
	     animation-duration: 1s;
	     -webkit-animation-duration: 1s;
	     visibility: visible;
	 }
	</style>
</head>
<!-- Body start  !-->
<body class="bg-2" data-offset="60" data-spy="scroll" data-target=".navbar">
	<?php 
	        $username = 'ADD USERNAME'; //put your  instagram  username here 
	        $access_token = 'ADD ACCESS TOKEN'; // put your access token here
	        $count = 10; // number of images to show on the page
	        include 'instagram.php';   
	    ?>
    <!--  Hero header begin     !-->
	<div class="hero-image">
		<div class="hero-text">
		<h1 align="center"><?php echo $username; ?></h1>
		</div>
	</div>
	<div class="container-fluid bg-1 text-center slide">
		<h2>Hello- <?php echo $username; ?></h2>
		<div class="col-centered col-md-7">
		<h3>Click these buttons to adjust the Alignment of your images</h3>
		</div><br>
		<!--  buttons to set alignment of images  !-->
		<div class="col-md-3 col-centered">
			<button class="btn btn-primary" onclick="four()">4</button>
                        <button class="btn btn-primary" onclick="two()">2</button> 
                        <button class="btn btn-primary" onclick="one()">1</button><br>
			<br>
		</div>
	</div><br>
	<?php
	        $ins_media = $insta->userMedia(); 
	        $i = 0;
	        $total = 0;        
	        
	        foreach ($ins_media['data'] as $vm): 
	            if($count == $i){ break;}
	            $i++;
	            $img = $vm['images']['low_resolution']['url']; //get images from the json
	            $link = $vm["link"]; //in case you want a link on the images
	            $pic_like_count=$vm['likes']['count']; //counts the likes on every picture
	            $pic_location=$vm['location']['name']; //diplayes the location under every image
	            $total= $total + $pic_like_count; //total number of likes  in all pictures
	            $average_likes = $total/$count; //average likes calculation 
	        ?>
	<div class="row">
		<div class="col-md-4 col-centered">
			<!-- dislpay images under column to be mobile responsive-->
                        <img src="<?php echo $img; ?>" width="" style="" /> 
                        <!-- call for likes count -->
			<h4>Likes-<?php echo $pic_like_count ?></h4>
                        <!-- call for location  -->
			<h4>Location-<?php echo $pic_location ?></h4>
		</div>
		<div class="column"></div>
	</div><?php endforeach ?>
	<div class="container-fluid bg-3 slide" id="about">
		<div class="row">
			<div class="col-sm-8">
				<h2>Your Stats-</h2><br>
				<h3>Your average number of likes is <b><?php echo $average_likes ?></b></h3>
				<h3>Is been a long time that you posted something after going to <b><?php echo $pic_location ?></b></h3>
				<h3>You total number of likes till now-<b><?php echo $total ?></b></h3>
			</div><br>
			<br>
			<div class="col-sm-4">
				<span class="glyphicon glyphicon-signal logo"></span>
			</div>
		</div>
	</div>
</body>
</html>