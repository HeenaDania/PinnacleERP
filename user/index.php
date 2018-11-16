<!DOCTYPE html>
<html>
<head>
	<title>S.S. Industries</title>
	
	<!-------------- My stylesheet -------------->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-------------- Pre-Loader stylesheet and JS -------------->
	<link rel="stylesheet" type="text/css" href="css/preLoader.css" />
	<script src="js/modernizr.custom.js"></script>

	<!-------------- Fonts stylesheet -------------->
	<link rel="stylesheet" type="text/css" href="fonts/fontsStylesheet.css">

	<!-------------- Favicon -------------->
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">

	<!-------------- Animations Stylesheet -------------->
	<link rel="stylesheet" href="css/aos.css">

	<!-------------- Master Slider Stylesheets -------------->
	<link rel="stylesheet" href="css/masterslider.css" />
    <link href="css/mastersliderStyle.css"  rel="stylesheet" type="text/css">
	<link href="css/ms-fullscreen.css"  rel="stylesheet" type="text/css">

	<!-------------- Owl Slider Stylesheets -------------->
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-------------- Sweet Alerts Stylesheet -------------->
	<link rel="stylesheet" href="css/sweetalert.css">

	<!-------------- Additional Stylesheets -------------->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/hover.css">

	
</head>
<body>

<!-------------- Pre Loader -------------->
<div id="ip-container" class="ip-container">
	<header class="ip-header">
		<div class="ip-loader">
			<svg class="ip-inner" width="60px" height="60px" viewBox="0 0 80 80">
				<path class="ip-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
				<path id="ip-loader-circle" class="ip-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
			</svg>
		</div>
	</header>
</div>
<?php 	include '../config.php';
		include 'includes/topHeader.php';
		include 'includes/mainHeaderIndex.php'; ?>

<!-------------- Master Slider -------------->
<section class="no-padding-tb"> 
        <div class="ms-fullscreen-template" id="slider1-wrapper">
			<!-- masterslider -->
			<div class="master-slider ms-skin-default" id="masterslider">
				<div class="ms-slide slide-3">
					<h3 class="ms-layer thin-text-white blacktext" data-type="text" data-effect="bottom(short)" data-duration="1800" data-delay="0" data-hide-effect="fade" >
						Welcome to
					</h3>
					<h4 class="ms-layer bold-text-white bigtext" data-type="text" data-effect="top(45)" data-duration="3400" data-delay="400" data-ease="easeOutExpo">
						S.S. Industries
					</h4>
					<img src="images/loading-2.gif" data-src="images/original.jpg" alt="lorem ipsum dolor sit">   
				</div>
				<div class="ms-slide slide-3">
					<h3 class="ms-layer thin-text-white blacktext" data-type="text" data-effect="skewleft(15,long)" data-duration="1800" data-delay="0" data-hide-effect="fade" >
						Shop For
					</h3>
					<h4 class="ms-layer bold-text-white bigtext" data-type="text" data-effect="skewright(15,long)" data-duration="1800" data-delay="0" data-hide-effect="fade" >
						The Best ...
					</h4>
					<img src="images/loading-2.gif" data-src="images/original2.jpg" alt="lorem ipsum dolor sit">   
				</div>
			</div>
			<!-- end of masterslider -->
		</div>
    </section>     
    <div class="clearfix"></div> 

<!-------------- Qualities -------------->
<div class="qualities" id="qualities">
	<div class="container">
		<div class="qual">
			<i class="fa fa-codepen" aria-hidden="true"></i>
			<h2>Prototyping</h2>
			<p>Providing customers with seamless transitions from prototypes to production.</p>
		</div>
		<div class="qual">
			<i class="fa fa-cog" aria-hidden="true"></i>
			<h2>Cycle Parts Manufacturing</h2>
			<p>Custom precision cycle parts manufacturing by the experts.</p>
		</div>
		<div class="qual">
			<i class="fa fa-eyedropper" aria-hidden="true"></i>
			<h2>Paining and Powder Coating</h2>
			<p>Expertise in all types of interior and exterior applications.</p>
		</div>
	</div>
</div>

<!-------------- Welcome -------------->
<div class="welcome" id="welcome">
	<div class="container">
		<h1>Welcome to S.S. Industries</h1>
		<hr>
		<p>S.S. Industries, a global leader in automotive seating and e-systems, with world-class products designed, engineered and manufactured by a diverse team of talented employees. Our vision is to be consistently recognized as the supplier of choice, an employer of choice, the investment of choice and a company that supports the communities where we do business.</p>
	</div>
</div>

<!-------------- Achievements -------------->
<div class="achievements" id="achievements" data-aos="fade-up">
	<div class="container">
	<div id="counter">
		<div class="achiev">
			<i class="fa fa-heart-o hvr-grow" aria-hidden="true"></i>
			<h1 class="counter-value" data-count="110">0</h1>
			<p>Happy Customers</p>
		</div>
		<div class="achiev">
			<i class="fa fa-thumbs-o-up hvr-grow" aria-hidden="true"></i>
			<h1 class="counter-value" data-count="30">0</h1>
			<p>Items Produced</p>
		</div>
		<div class="achiev">
			<i class="fa fa-bullhorn hvr-grow" aria-hidden="true"></i>
			<h1 class="counter-value" data-count="342">100</h1>
			<p>Trusted Employees</p>
		</div>
		<div class="achiev">
			<i class="fa fa-cloud hvr-grow" aria-hidden="true"></i>
			<h1 class="counter-value" data-count="1140">0</h1>
			<p>Successfull Delivery</p>
		</div>
	</div>
	</div>
</div>

<!-------------- Practice Area -------------->
<div class="practiceArea" id="practiceArea" data-aos="zoom-in">
		<div class="container">
		<div>
			<h1>Our Products</h1>
			<hr>
		</div>
		<div class="areaText">
		<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="7000">
		  <div class="carousel-inner">
		    <div class="item active">
		      <div class="area">
		       <img  class="itemz"  src="images/items/bullHorn.png">
		         <h3>Bull Horn Handles</h3>
		      </div>

		       <div class="area">
		       <img  class="itemz"  src="images/items/riserbar.png">
		         <h3>Rise Bar Handles</h3>
		      </div>

		      <div class="area">
		       <img  class="itemz"  src="images/items/moto.png">
		         <h3>Moto Bar Handles</h3>
		      </div>

		      <div class="area">
		       <img  class="itemz"  src="images/items/dropbar.png">
		         <h3>Crop Bar Handles</h3>
		      </div>	    

		    </div>

		    <div class="item">
		      <div class="area">
		       <img  class="itemz"  src="images/items/bullHorn.png">
		         <h3>Bull Horn Handles</h3>
		      </div>

		       <div class="area">
		       <img  class="itemz"  src="images/items/riserbar.png">
		         <h3>Rise Bar Handles</h3>
		      </div>

		      <div class="area">
		       <img  class="itemz"  src="images/items/moto.png">
		         <h3>Moto Bar Handles</h3>
		      </div>

		      <div class="area">
		       <img  class="itemz"  src="images/items/dropbar.png">
		         <h3>Crop Bar Handles</h3>
		      </div>	    

		    </div>
		  </div>

		  <!-- Left and right controls -->
		  <a class="left carousel-control" id="leftArrow" href="#myCarousel" data-slide="prev">
		    <span class="fa fa-angle-left" aria-hidden="true" ></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control " id="rightArrow" href="#myCarousel" data-slide="next">
		    <span class="fa fa-angle-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
		</div>
		</div>
</div>

<!-------------- Team -------------->
<div class="team" id="team">
	<div class="container">
	<div data-aos="fade-down">
		<h1>Our Team</h1>
		<hr>
		<div class="teamText">
			<p>We are pleased to present to you, our best experts in various fields. Check out our designations</p>
		</div>
	</div>
		<div class="teamArea" data-aos="fade-up">
    	<div class="row">
		<div class="owl-carousel owl-theme">
			<div class="member">
				<img class="img-responsive" src="../images/team2.jpg" alt="">
				<div class="ImageOverlayH"></div>
				<div class="Buttons StyleTi">
					<span class="WhiteRounded"><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></span>
					<span class="WhiteRounded"><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a>
					</span>
					<span class="WhiteRounded"><a href="https://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin"></i></a>
					</span>
				</div>
				<div class="team-member">
								<h4>Subhash Sood</h4>
								<p>Company Owner</p>
				</div>
			</div>
			
			<div class="member">
				<img class="img-responsive" src="../images/team1.jpg" alt="">
				<div class="ImageOverlayH"></div>
				<div class="Buttons StyleTi">
					<span class="WhiteRounded"><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></span>
					<span class="WhiteRounded"><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a>
					</span>
					<span class="WhiteRounded"><a href="https://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin"></i></a>
					</span>
				</div>
				<div class="team-member">
								<h4>Harshita Baweja</h4>
								<p>Manager</p>
				</div>
			</div>

			<div class="member">
				<img class="img-responsive" src="../images/team4.jpg" alt="">
				<div class="ImageOverlayH"></div>
				<div class="Buttons StyleTi">
					<span class="WhiteRounded"><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></span>
					<span class="WhiteRounded"><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a>
					</span>
					<span class="WhiteRounded"><a href="https://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin"></i></a>
					</span>
				</div>
				<div class="team-member">
								<h4>Ashish Roy</h4>
								<p>Head Employee</p>
				</div>
			</div>

			<div class="member">
				<img class="img-responsive" src="../images/team3.jpg" alt="">
				<div class="ImageOverlayH"></div>
				<div class="Buttons StyleTi">
					<span class="WhiteRounded"><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></span>
					<span class="WhiteRounded"><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a>
					</span>
					<span class="WhiteRounded"><a href="https://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin"></i></a>
					</span>
				</div>
				<div class="team-member">
								<h4>Rajni Chopra</h4>
								<p>Employee</p>
				</div>
			</div>

		</div>
   		</div>
  		</div>
	</div>
</div>

<!-------------- Appointment -------------->
<div class="appointment" id="appointment">
	<div class="container">
		<div>
			<h1>Write to Us</h1>
			<hr>
			<h3>Kindly Give Your Views About Our Services</h3>
		</div>
		<a href="#contact"><button class="appointBtn" > Come and Write to Us </button></a>
	</div>
</div>

<!-------------- Map -------------->
<div class="news" id="news">
	<div class="container">
	<div data-aos="fade-down">
		<h1>Locate Us</h1>
		<hr>
		<div class="newsText">
			<p>Do locate and visit our industry for personalized experience.</p>
		</div>
	</div>
		

 
<div  class="mbr-map" data-aos="fade-up" >
   <iframe src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=Aggar%20Nagar%2C%20Near%20Mohan%20Bhai%20Oswal%20Hospital%2C%20Aggar%20Nagar+(Muskan%20Industry%20)&amp;ie=UTF8&amp;t=&amp;z=16&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/create-google-map/" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

 
<script type="text/javascript">
$('.mbr-map')
  .click(function(){
      $(this).find('iframe').addClass('clicked')})
  .mouseleave(function(){
      $(this).find('iframe').removeClass('clicked')});
</script>

	
</div>


<!-------------- Contact Us -------------->
<div class="contact" id="contact">
	<div class="container">
	<div data-aos="fade-down">
		<h1>Contact Us</h1>
		<hr>
			<p>If you have any questions please contact us by phone or fill out the form below</p>
	</div>
	<form class="contactForm" id="contactForm" method="POST" data-aos="fade-up">
	<table>
		<tr>
			<td>
			<table>
				<tr><td><input type="text" name="name" id="name" placeholder="Name" required></td></tr>
				<tr><td><input type="email" name="email" id="email" placeholder="Email" required></td></tr>
				<tr><td><input type="subject" name="subject" id="subject" placeholder="Subject"></td></tr>
			</table>
			</td>
			<td><textarea name="message" id="message" placeholder=" Message" required></textarea></td>
		</tr>
	</table>
	<button name="send" id="send" type="submit">Send</button>
	</form>
	<?php 
	if (isset($_POST['send'])) {
		$name=$_POST['name'];
		$email=$_POST['email'];
		$subject=$_POST['subject'];
		$message=$_POST['message'];
		$from="From: $name<$email>\r\nReturn-path: $email";
		mail("subhashsood08@gmail.com",$subject,$message,$from);
	}
?>
	</div>
</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>