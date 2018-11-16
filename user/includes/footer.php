<!-------------- Contact Us -------------->
<div class="footer">
	<div class="container">
		<div class="infoText" data-aos="zoom-in">
		<div class="info">
			<i class="fa fa-phone" aria-hidden="true"></i>
			<h2>Call</h2>
			<p>(+91) 896 834 6540</p>
			<p>(+91) 902 328 1815</p>
		</div>
		<div class="info">
			<i class="fa fa-location-arrow" aria-hidden="true"></i>
			<h2>Visit</h2>
			<p>Plot No. 5. St. No. 3, Friends Colony, Jamalpur, Chandigarh Road, Ludhiana
			</p>
		</div>
		<div class="info">
			<i class="fa fa-envelope" aria-hidden="true"></i>
			<h2>Email</h2>
			<p>subhashsood08@gmail.com</p>
		</div>
		</div>
		<div class="social">
		<ul>
	        <li><a href="https://www.facebook.com" target="_blank"> <i class="fa fa-facebook"></i></a></li>
	        <li><a href="https://twitter.com/login" target="_blank"> <i class="fa fa-twitter"></i></a></li>
	        <li><a href="https://in.linkedin.com" target="_blank"> <i class="fa fa-linkedin"></i></a></li>
	    </ul>
		</div>
		<p id="copyright">© 2018 by Pinnacle ERP</p>
	</div>
</div>

<!-------------- Bottom To Top -------------->
<a href="#topNav" class="scrollup" style="display: none;"><i class="fa fa-angle-up"></i></a>

<!-------------- Javascript -------------->

	<script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

	<!-------------- Pre Loader js -------------->
	<script src="js/classie.js"></script>
	<script src="js/pathLoader.js"></script>
	<script src="js/main.js"></script>

	<!-------------- AOS animations js -------------->
    <script src="js/aos.js"></script>

	<!-------------- Master Slider js -------------->
	<script src="js/masterSliderjquery.easing.min.js"></script>
    <script src="js/masterslider.min.js"></script>

	<!-------------- Owl Slider js -------------->
    <script src="js/owl.carousel.min.js"></script>

	<!-------------- Sweet Alert js -------------->
    <script src="js/sweetalert.min.js"></script>

	<script type="text/javascript">
	$(document).ready(function() {

		// smooth scroll and activating links
		$(".index a").on('click', function(event) {

		    // Make sure this.hash has a value before overriding default behavior
			    if (this.hash !== "") {
			      // Prevent default anchor click behavior
			      event.preventDefault();

			      // Store hash
				$('#homeLink,#wel,#prac,#teamLink,#appointLink,#newsLink,#con').removeClass('active');

			    var hash = this.hash;
			    if(hash=='#'){
			    	$('#homeLink').addClass('active');
			    }
			    if(hash=='#welcome'){
			    	$('#wel').addClass('active');
			    }
			    if(hash=='#practiceArea'){
			       		$('#prac').addClass('active');
			        } 
			    if(hash=='#team'){
			       		$('#teamLink').addClass('active');
			        }
			    if(hash=='#appointment'){
			       		$('#appointLink').addClass('active');
			        }
			     if(hash=='#newsLink'){
			       		$('#news').addClass('active');
			        }   
			    if(hash=='#contact'){
			       		$('#con').addClass('active');
			        }

			     // Using jQuery's animate() method to add smooth page scroll
			      // The optional number (800) specifies the number of milliseconds it takes to s4croll to the specified area
			      $('html, body').animate({
			        scrollTop: $(hash).offset().top
			      }, 800, function(){
			   
			        // Add hash (#) to URL when done scrolling (default click behavior)
			        window.location.hash = hash;
			      });
	    		} // End if
  			});

		// animations
  			AOS.init({
			  duration: 800,
			});
		
  		// sticky navbar
			var yourNavigation = $(".mainNav");
			stickyDiv = "sticky";
			yourHeader = $('.topNav').height();
 			
 			$(window).scroll(function() {
  				// sticky navbar
				if( $(this).scrollTop() > yourHeader ) {
				    yourNavigation.addClass(stickyDiv);
				} 
				else {
				    yourNavigation.removeClass(stickyDiv);
				}

				// bottom to top
				if ($(this).scrollTop() > 800) {
		            $('.scrollup').fadeIn();
		        } else {
		            $('.scrollup').fadeOut();
		        }
				});
				$('.scrollup').click(function () {
					$('body,html').animate({
						scrollTop: 0
					}, 800);
					return false;
				});

  		// masterslider
			var slider = new MasterSlider();
		    slider.setup('masterslider' , {
		            width:1366,    // slider standard width
		            height:570,   // slider standard height
		            space:5,
		            autoplay:true,
		             fullwidth:true,
		            view:"fade",
		            grabCursor:false,
		            overPause:false
		    });

		// on Scroll Count
			var a = 0;
			$(window).scroll(function() {

			  var oTop = $('#counter').offset().top - window.innerHeight;
			  if (a == 0 && $(window).scrollTop() > oTop) {
			    $('.counter-value').each(function() {
			      var $this = $(this),
			        countTo = $this.attr('data-count');
			      $({
			        countNum: $this.text()
			      }).animate({
			          countNum: countTo
			        },

			        {

			          duration: 3000,
			          easing: 'swing',
			          step: function() {
			            $this.text(Math.floor(this.countNum));
			          },
			          complete: function() {
			            $this.text(this.countNum);
			          }

			        });
			    });
			    a = 1;
			  }

			});

		// owl Slider
			$(document).ready(function() {
              var owl = $('.owl-carousel');
              owl.owlCarousel({
                items: 4,
                loop: true,
                margin: 10,
                autoplay: false
              });
            });

        //sweet alert
 //        $("#contactForm").submit(function(e) {
 //    	event.preventDefault();
 //      			$.ajax({
	// 			url : "php/sendMail.php",
	// 			type : "POST",
	// 			data: {
	// 				name : $("#name").val(),
	// 				email : $("#email").val(),
	// 				subject : $("#subject").val(),
	// 				message:$("#message").val()
	// 			},		
	// 			success : function(response){
	// 				swal("Mail Sent!", "Thanks for contacting with us !", "success")	
	// 			}
	// 	});
	// });

        /**
     * This part handles the highlighting functionality.
     * We use the scroll functionality again, some array creation and 
     * manipulation, class adding and class removing, and conditional testing
     */
    var aChildren = $(".index li").children(); // find the a children of the list items
    var aArray = []; // create the empty aArray
    for (var i=0; i < aChildren.length; i++) {    
        var aChild = aChildren[i];
        var ahref = $(aChild).attr('href');
        aArray.push(ahref);
    } // this for loop fills the aArray with attribute href values

    $(window).scroll(function(){
        var windowPos = $(window).scrollTop(); // get the offset of the window from the top of page
        var windowHeight = $(window).height(); // get the height of the window
        var docHeight = $(document).height();

        for (var i=0; i < aArray.length; i++) {
            var theID = aArray[i];
            var divPos = $(theID).offset().top; // get the offset of the div from the top of page
            var divHeight = $(theID).height(); // get the height of the div in question
            if (windowPos >= divPos && windowPos < (divPos + divHeight)) {
                $("a[href='" + theID + "']").addClass("active");
            } else {
                $("a[href='" + theID + "']").removeClass("active");
            }
        }

        if(windowPos + windowHeight == docHeight) {
            if (!$("nav li:last-child a").hasClass("active")) {
                var navActiveCurrent = $(".nav-active").attr("href");
                $("a[href='" + navActiveCurrent + "']").removeClass("active");
                $("nav li:last-child a").addClass("active");
            }
        }
    });

	});
	</script>