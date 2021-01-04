

<!DOCTYPE html>
<html>
<head>
<title>HMS FE Portal</title>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/form.css">
<link rel="stylesheet" type="text/css" href="css/media.css">
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link href="https://fonts.googleapis.com/css?family=Fjalla+One|Maitree|Ropa+Sans" rel="stylesheet">

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="js/jquery.js"></script>
<script src="js/main.js"></script>
<style>
.msg-alert{
  display: none;
  position: fixed;
  left: 50%;
 -ms-transform: translate(-50%);
  transform: translate(-50%); 
  bottom:0;
  z-index: 9999;
}

.msg-alert p{
  font-family: calibri;
  border-radius: 5px 5px 0px 0px;
  padding: 5px 8px;
  font-size: 20px;
  color: white;
}
</style>
</head>

<body id="home" style="--unique-color:#22aaf9;">
	<div class="msg-alert"><p></p></div>
	<div class="cssload-loader">
	<div class="cssload-flipper">
		<div class="cssload-front"></div>
		<div class="cssload-back"></div>
	</div><br/>
	<center><span id="loading">Loading</span></center>
	</div>

	<div class="clr-switch"></div>
	<div class="bubble-1"></div>
	<div class="bubble-2"></div>
	<div class="bubble-3"></div>
	
	<div id="login-form">
	<input type="radio" id="login" name="switch" class="hide" checked>
	<input type="radio" id="signup" name="switch" class="hide">
	<div>
		<ul class="form-header">
		<li><label for="login"><i class="material-icons">lock</i> TicketDesk</li>
		<li><label for="signup"><i class="material-icons">credit_card</i> News</label></li>
		</ul>
	</div>

	<div class="section-out">
		<section class="login-section">
			<div class="login">
				<form id="form_login" name="form_login" action="login.php" method="post">
					<ul class="ul-list">
						<li><input type="email" id="log_email" name="log_email" required class="input" placeholder="Email Address" required="" /><span class="icon"><i class="material-icons">local_post_office</i></span></li>

						<li><input type="password" id="log_passwd" name="log_passwd" required class="input" minlength="4" maxlength="32" placeholder="Your Password" required="" /><span class="icon"><i class="material-icons">lock</i></span></li>

						<li><input type="submit" id="submit" name="submit" value="Sign in" class="btn"></li>

						<li><input type="button" value="Sign in with Facebook" class="btn fb" onclick="login()"></li>

						<li><input type="button" value="Close" class="btn close"></li>

						<span class="errorTxt"></span>
						<div id="status"></div>
					</ul>
				</form>
			</div>	<!-- login -->
		</section>

		<section class="signup-section">
			<div class="login">
				<form id="form_signup" name="form_signup" action="signup.php" method="post">
					<ul class="ul-list">
						<li><input type="radio" id="student" name="check-type" onchange="check_type()" value="student" checked> Student&emsp;<input type="radio" id="inst" name="check-type" value="institute" onchange="check_type()"> Institute&emsp;<input type="radio" id="comp" name="check-type" value="company" onchange="check_type()"> Company</li>

						<li><input type="text" required pattern="^[a-zA-Z ]+$" class="input" id="reg_name" name="reg_name" maxlength="32" placeholder="Student Name"/><span class="icon"><i class="material-icons">account_box</i></span></li>

						<li><input type="text" required class="input" id="reg_uname" name="reg_uname" pattern="^[a-z\d\.]{5,}$" placeholder="User Name" onchange="check_user()"/><span class="icon"><i class="material-icons">person</i></span></li>

						<li><input type="email" required class="input" id="reg_email" name="reg_email" placeholder="Email Address"/><span class="icon"><i class="material-icons">local_post_office</i></span></li>

						<li><input type="password" required class="input" id="reg_passwd" name="reg_passwd" placeholder="Password"/><span class="icon"><i class="material-icons">lock</i></span></li>

						<li><input type="password" required="" class="input" id="c_password" name="c_password" placeholder="Confirm Password"/><span class="icon"><i class="material-icons">lock</i></span></li>
						<li><label>By signing up, you agree to our Terms of Service</label></li>

						<li><input type="submit" id="signup-btn" value="Sign up" class="btn"></li>

						<li><input type="button" value="Contiue using Facebook" class="btn fb" onclick="login()"></li>

						<li><input type="button" value="Close" class="btn close"></li>
					</ul>					
					<script type="text/javascript">
						function check_type(){
							if ($("#student").is(":checked")){
								$("input#reg_name").prop("placeholder","Student Name");
								$("input#reg_name span i").text("account_box");
							}

							else if ($("#inst").is(":checked")){
								$("input#reg_name").prop("placeholder","Institute Name");
								$("input#reg_name span i").text("account_balance");	
							}
							else{
								$("input#reg_name").prop("placeholder","Company Name");
								$("input#reg_name span i").text("business_center");
							}
						}
					</script>

					<script type="text/javascript">
   					function check_user(){
   						var uname = $("#reg_uname").val();
   						$.ajax({
            				url: "check_user.php?username="+uname,
            				success: function(data){
            					$(".msg-alert p").html(data);
            					if (data == "Username Available"){
            						$(".msg-alert p").css("background-color","blue");
            					}
            					else{
            						$(".msg-alert p").css("background-color","red");
            					}
            					$(".msg-alert").show(0,function(){
            						$(".msg-alert").delay(3000).fadeOut('slow');
            					});
             				}
          				});
					}
					</script>

				</form>
			</div>	<!-- login -->
		</section>
	</div>	<!-- section-out -->
	</div>	<!-- login-form -->

	<header>
		<div class="wrap-width">
		<a href="#home">
			<div class="navbar-logo">
				<img src="/ticketdesk/img/hmslogoresized.jpg"/>
				<img id="hat" src="/ticketdesk/img/snowflake.png"/>
			</div> <!-- navbar-logo -->
		</a>
		<!--<a href="#nav"><i class="material-icons">reorder</i></a>-->
		<div class="horizontal-page-links" id="nav">

			<div class="register-user">
				<!--<a id="register">TicketDesk</a>
				<a id="login">News</a>
				<!--<a id="register" href="#register">Register</a>-->
			</div>	<!-- register-user -->
			
			<ul>	
				
				<div class="sliding-out links"><li><a href="Announcement">Announcements</a></li></div>
				<div class="sliding-out links"><li><a href="TicketDesk">Ticket Desk </a></li></div>
				<div class="sliding-out links"><li><a href="Newsletter">Newsletters </a></li></div>
				<div class="sliding-out links"><li><a href="https://www.ready-pay.net/LV_HMS2215/Admin.aspx">Leave Portal </a></li></div>
				<div class="last-navbar-link"><li></li></div>
			</ul>
			
		</div> <!-- horizontal-page-links -->
		</div>
	</header>
	
	<div class="content">
	<!-- Welcome Page -->
	<div class="welcome wrap-width">
		<div class="empty-layout"></div>
		<center>
		<img class="welcome-image" src="/ticketdesk/img/hmsawards2.jpg">
		<div class="welcome-text">
			<p id="text-heading">HMS Far East Employee Portal</p><br>
			<p id="text-context">We are dedicated to Professionalism in ship supply. <br>We are committed to meet
				customers’ requirements by adopting <br>the policy of fast response,efficient and reliable
						24/7 service and <br>quality products. We are committed to continually improve our System<br> in the changing business environment. </p>
			<a id="readmore" href="#about">Read More</a>
		</div> <!-- welcome-text -->
		</center>
	</div>	<!-- welcome -->

	<div class="link-container clearfix">
		<div class="wrap-width">
			<a id="register2"><b> </b></a>
			 
			<p id="text-paragraph"> 
			</p> </p>

		</div> 
	</div>	 <!-- link-container -->

	
	<div class="about-container clearfix wrap-width" id="about">
		<p id="title">Something you might want to know about us.</p><hr class="style-1" style="width: 600px; align-self: center;"><br/>

		<div class="col-container">
		<span class="text-back tooltip" onclick="slider()"></span>
		<i class="material-icons arrow arrow-back">navigate_before</i>
		<img id="about-img" src="/ticketdesk/img/hmsawards.jpg"/>
		
		<div class="col_one_third col_1st">
				<h1>WHO ARE <span> WE</span>.</h1>
		<div class="bottom-border"></div>
		<p>HMS Far East Pte Ltd. is today one of Singapore’s leading suppliers to the shipping and offshore industries and is ISO 9001:2000 and ISO 14001 certified.  </p>
		</div>	<!-- col_one_third -->
		
		
		<div class="col_one_third col_2nd">
		<h1>OUR <span> Self-image</span>.</h1>
		<div class="bottom-border"></div>	<!-- border-bottom -->
		<p>* Family Interaction<br>* Trust<br>* Self-confidence but no arrogance<br>* Self-criticism and responsibility<br>* Humour<br>* Individuality and respect</p>
		</div>	<!-- col_one_third -->
		
		
		<div class="col_one_third col_3rd">
		<h1>Our way of <span>  Working</span>.</h1>
		<div class="bottom-border"></div> <!-- border-bottm -->	
		<p>* Making and shaping<br>* Perseverance<br>* Simplicity, speed and flexibility<br>* Reliability</p>
		</div>	<!-- col_one_third col_last -->
		
		
		<div class="col_one_third col_4th">
		<h1>Our <span> Future</span>.</h1>
		<div class="bottom-border"></div> <!-- border-bottm -->	
		<p>In the long term, we want to maintain our status as<br> a financially independent family business.</p>
		</div>	<!-- col_one_fourth col_last -->
	
		<i class="material-icons arrow arrow-forward">navigate_next</i>
		<span class="text-forward tooltip"></span>
		
		</div> <!-- col-conatiner -->
	</div>	<!-- About-container -->
	<script>
	var slide = 1;
	
	var myVar = setInterval(slider, 4000);
	$(".col_one_third").hover(function(ev){
			clearInterval(myVar);
		}, function(ev){
			myVar = setInterval(slider,4000);
	});

	function slider(){
		slide+=1;
		if(slide>4){
			slide = 1;
		}

		$(".col_one_third").css("animation","fadeInRight 0.6s ease-out");
		$("#about-img").css("animation","fadeInLeft 0.4s ease-out");
		move();
	}
	</script>	
	<script>
	function move(){
		if (slide ==1){
		$(".radio-1").html("radio_button_checked");
		$(".radio-2").html("radio_button_unchecked");
		$(".radio-3").html("radio_button_unchecked");
		$(".radio-4").html("radio_button_unchecked");
		$(".col_1st").show();
		$(".col_2nd").hide();
		$(".col_3rd").hide();
		$(".col_4th").hide();
		$("#about-img").prop("src","/ticketdesk/img/hmsphoto.jpg");
		$(".text-back").text("Our way of Working");
		$(".text-forward").text("Our Self-image");
		}
		else if (slide==2){
		$(".radio-1").html("radio_button_unchecked");
		$(".radio-2").html("radio_button_checked");
		$(".radio-3").html("radio_button_unchecked");
		$(".radio-4").html("radio_button_unchecked");
		$(".col_1st").hide();
		$(".col_2nd").show();
		$(".col_3rd").hide();
		$(".col_4th").hide();
		$("#about-img").prop("src","/ticketdesk/img/hmsteam1.jpg");
		$(".text-back").text("Who are we");
		$(".text-forward").text("Our way of Working");
		}
		else if (slide==3){
		$(".radio-1").html("radio_button_unchecked");
		$(".radio-2").html("radio_button_unchecked");
		$(".radio-3").html("radio_button_checked");
		$(".radio-4").html("radio_button_unchecked");
		$(".col_1st").hide();
		$(".col_2nd").hide();
		$(".col_3rd").show();
		$(".col_4th").hide();
		$("#about-img").prop("src","/ticketdesk/img/xmas1.jpg");
		$(".text-back").text("Our Self-image");
		$(".text-forward").text("Who are we");
		}
		else if (slide==4){
		$(".radio-1").html("radio_button_unchecked");
		$(".radio-2").html("radio_button_unchecked");
		$(".radio-3").html("radio_button_unchecked");
		$(".radio-4").html("radio_button_checked");
		$(".col_1st").hide();
		$(".col_2nd").hide();
		$(".col_3rd").hide();
		$(".col_4th").show();
		$("#about-img").prop("src","/ticketdesk/img/hmsawards.jpg");
		$(".text-back").text("Who are we");
		$(".text-forward").text("Our way of Working");
		}
	}
	</script>
	<center>
		
		<i class="material-icons radio-1">radio_button_checked</i>
		<i class="material-icons radio-2">radio_button_unchecked</i>
		<i class="material-icons radio-3">radio_button_unchecked</i>
		<i class="material-icons radio-4">radio_button_unchecked</i>
	
	</center>
	<center>
	<div class="contact-container " id="contact">
		
	<div id="form-main">
  			<div>
	  			<p class="contact-title" >IT Support Ticket<br></p>
					<iframe width="980" height="915" src="http://portal.hmsfe.net/ticketdesk" frameborder="1" allowfullscreen></iframe>
    	  			</div>
    			</form>
    		
    		</div>

			<div> 
    		<div align="center" class="centered" id="contact" >
	  			<p class="contact-title" >If you have any suggestions on the portal please email to Bill@hmsfareast.com</p>
		  			
					</div>
    				<div> 
				    				</i>
    				</p>
				</div>
	    		
			</div>	<!-- contact-container -->
		</center>
	</div>
	<footer>
		<a href="#home"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>
		<div id="copyrights">
				<span class="siteName">HMS Far East © 2020 (Internal Use only)</span>
            </div><!--copyrights-->
	</footer>
<script async type="text/javascript">
		
  	function login(){
  	FB.login(function(response) {
  		if (response.status === 'connected') {
  
  			$("#login-form").hide();
  			$('.content, footer,header').css("pointer-events","auto");
  			$("a#login").html("Logout");
  			FB.api('/me', function(response) {
      			alert('Successful login for: ' + response.name);
    		});

  			setTimeout(dashboard, 1000); 
        function dashboard(){
            window.open("profile.php","_self");
        }

  			$("a#login").click(function(){
  				FB.logout(function(response) {
  					$("a#login").html("Login");
   					alert("logged out successfully.");
				});
  			});
        

  		} else {
    		// The person is not logged into your app or we are unable to tell.
      		document.getElementById('status').innerHTML = 'Please log ' +
        	'into this website.';
  		}
	});
  	}

  	// This function is called when someone finishes with the Login
  	// Button.  See the onlogin handler attached to it in the sample
  	// code below.
  	function checkLoginState() {
    	FB.getLoginStatus(function(response) {
     		statusChangeCallback(response);
    	});
  	}

  	window.fbAsyncInit = function() {
  		FB.init({
    		appId      : '732114246968740',
    		cookie     : true,  // enable cookies to allow the server to access the session
    		xfbml      : true,  // parse social plugins on this page
    		version    : 'v2.8' // use graph api version 2.8
  		});

  		FB.getLoginStatus(function(response) {
    		statusChangeCallback(response);
  		});
  	};

  	// Load the SDK asynchronously
  	(function(d, s, id) {
    	var js, fjs = d.getElementsByTagName(s)[0];
    	if (d.getElementById(id)) return;
    		js = d.createElement(s); js.id = id;
    		js.src = "//connect.facebook.net/en_US/sdk.js";
    		fjs.parentNode.insertBefore(js, fjs);
  	}(document, 'script', 'facebook-jssdk'));

	</script>
	

<script defer src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<script defer type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.12.0/additional-methods.js"></script>
<script defer src="js/animate.js"></script>

</body>

</html>