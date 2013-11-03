﻿<?php require_once (dirname(__FILE__) . DIRECTORY_SEPARATOR . 'settings.php'); ?>
<!DOCTYPE HTML>
<!--[if IE 8]> <html class="ie8 no-js"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<!-- begin meta -->
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=8, IE=9, IE=10">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- end meta -->
	
	<!-- begin CSS -->
	<link href="style.css" type="text/css" rel="stylesheet" id="main-style">
	<link href="css/responsive.css" type="text/css" rel="stylesheet">
	<!--[if IE]> <link href="css/ie.css" type="text/css" rel="stylesheet"> <![endif]-->
	<link href="css/colors/green.css" type="text/css" rel="stylesheet" id="color-style">
    <!-- end CSS -->
    
    <link href="images/favicon.ico" type="image/x-icon" rel="shortcut icon">
	
	<!-- begin JS -->
    <script src="js/jquery-1.8.2.min.js" type="text/javascript"></script> <!-- jQuery -->
    <script src="js/ie.js" type="text/javascript"></script> <!-- IE detection -->
    <script src="js/jquery.easing.1.3.js" type="text/javascript"></script> <!-- jQuery easing -->
	<script src="js/modernizr.custom.js" type="text/javascript"></script> <!-- Modernizr -->
    <!--[if IE 8]>
    <script src="js/respond.min.js" type="text/javascript"></script> 
    <script src="js/selectivizr-min.js" type="text/javascript"></script> 
    <![endif]--> 
    <script src="js/ddlevelsmenu.js" type="text/javascript"></script> <!-- drop-down menu -->
    <script type="text/javascript"> <!-- drop-down menu -->
        ddlevelsmenu.setup("nav", "topbar");
    </script>
    <script src="js/tinynav.min.js" type="text/javascript"></script> <!-- tiny nav -->
    <script src="js/jquery.validate.min.js" type="text/javascript"></script> <!-- form validation -->
    <script src="js/jquery.ui.totop.min.js" type="text/javascript"></script> <!-- scroll to top -->
    <script src="js/jquery.fitvids.js" type="text/javascript"></script> <!-- responsive video embeds -->
    <script src="js/jquery.tweet.js" type="text/javascript"></script> <!-- Twitter widget -->
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script> <!-- Google maps -->
    <script src="js/jquery.gmap.min.js" type="text/javascript"></script> <!-- gMap -->
    <script type="text/javascript" src="js/revslider.jquery.themepunch.plugins.min.js"></script> <!-- swipe gestures -->
    <script src="js/jquery.tipsy.js" type="text/javascript"></script> <!-- tooltips -->
    <script src="js/custom.js" type="text/javascript"></script> <!-- jQuery initialization -->
    <!-- end JS -->
	
	<title>Inceptio - Contact</title>
</head>

<body class="wide">
<!-- begin container -->
<div id="wrap">
	<!-- begin header -->
    <header id="header">
    	<div class="container clearfix">
    	<!-- begin logo -->
        <h1 id="logo"><a href="index.html"><img src="images/logo.png" alt="Inceptio"></a></h1>
        <!-- end logo -->
        
        <!-- begin navigation wrapper -->
        <div class="nav-wrap clearfix">
        
        <!-- begin search form -->
        <form id="search-form" action="search.php" method="get">
            <input id="s" type="text" name="s" placeholder="Search &hellip;" style="display: none;">
            <input id="search-submit" type="submit" name="search-submit" value="Search">
        </form>
        <!-- end search form -->

        <!-- begin navigation -->
        <nav id="nav">
            <ul id="navlist" class="clearfix">
                <li><a href="index.html" rel="submenu1">Home</a>
                    <ul id="submenu1" class="ddsubmenustyle">
                        <li><a href="index.html">Home 1 &ndash; Revolution Slider</a></li>
                        <li><a href="index-2.html">Home 2 &ndash; Revolution Slider + Layout Variation</a></li>
                        <li><a href="index-3.html">Home 3 &ndash; FlexSlider + Layout Variation</a></li>
                    </ul>
                </li>
                <li><a href="#" rel="submenu2">Templates</a>
                    <ul id="submenu2" class="ddsubmenustyle">
                        <li><a href="about-us.html">About Us</a></li>
                        <li><a href="services.html">Services 1</a></li>
                        <li><a href="services-2.html">Services 2</a></li>
                        <li><a href="testimonials.html">Testimonials</a></li>
                        <li><a href="sitemap.html">Sitemap</a></li>
                        <li><a href="404-error-page.html">404 Error Page</a></li>
                        <li><a href="search-results.html">Search Results</a></li>
                        <li><a href="full-width-page.html">Full Width Page</a></li>
                        <li><a href="page-right-sidebar.html">Page with Right Sidebar</a></li>
                        <li><a href="page-left-sidebar.html">Page with Left Sidebar</a></li>
                        <li><a href="#">Multi-Level Drop-Down</a>
                            <ul>
                                <li><a href="#">Drop-Down Example</a></li>
                                <li><a href="#">Multi-Level Drop-Down</a>
                                    <ul>
                                        <li><a href="#">Drop-Down Example</a></li>
                                        <li><a href="#">Drop-Down Example</a></li>
                                        <li><a href="#">Drop-Down Example</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Drop-Down Example</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#" rel="submenu3">Shortcodes</a>
                    <ul id="submenu3" class="ddsubmenustyle">
                        <li><a href="icon-boxes.html">Icon Boxes 1</a></li>
                        <li><a href="icon-boxes-2.html">Icon Boxes 2</a></li>
                        <li><a href="elements.html">Elements</a></li>
                        <li><a href="typography.html">Typography</a></li>
                        <li><a href="grid-columns.html">Grid Columns</a></li>
                        <li><a href="pricing-tables.html">Pricing Tables</a></li>
                        <li><a href="media.html">Media</a></li>
                    </ul>
                </li>
                <li><a href="#" rel="submenu4">Portfolio</a>
                    <ul id="submenu4" class="ddsubmenustyle">
                        <li><a href="portfolio.html">Portfolio Overview &ndash; 4 Columns</a></li>
                        <li><a href="portfolio-3cols.html">Portfolio Overview &ndash; 3 Columns</a></li>
                        <li><a href="portfolio-2cols.html">Portfolio Overview &ndash; 2 Columns</a></li>
                        <li><a href="portfolio-item-slider.html">Portfolio Item &ndash; Slider</a></li>
                        <li><a href="portfolio-item-image.html">Portfolio Item &ndash; Image</a></li>
                        <li><a href="portfolio-item-video.html">Portfolio Item &ndash; Video</a></li>
                        <li><a href="portfolio-item-full-width.html">Portfolio Item &ndash; Full Width</a></li>
                    </ul>
                </li>
                <li><a href="#" rel="submenu5">Blog</a>
                    <ul id="submenu5" class="ddsubmenustyle">
                        <li><a href="blog.html">Blog Overview</a></li>
                        <li><a href="blog-post-image.html">Blog Post &ndash; Image</a></li>
                        <li><a href="blog-post-slider.html">Blog Post &ndash; Slider</a></li>
                        <li><a href="blog-post-video.html">Blog Post &ndash; Video</a></li>
                        <li><a href="blog-post-no-media.html">Blog Post &ndash; No Media</a></li>
                    </ul>
                </li>
                <li class="current"><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
        <!-- end navigation -->
        </div>
        <!-- end navigation wrapper -->
        </div>
    </header>
    <!-- end header -->
	
    <!-- begin page title -->
    <section id="page-title">
    	<div class="container clearfix">
            <h1>Contact</h1>
            <nav id="breadcrumbs">
                <ul>
                    <li><a href="index.html">Home</a> &rsaquo;</li>
                    <li>Contact</li>
                </ul>
            </nav>
        </div>
    </section>
    <!-- begin page title -->
    
    <!-- begin content -->
    <section id="content">
    	<div class="container clearfix">
        <!-- begin google map --> 
        <section>
            <div id="map"
                data-address="40 Broadway, London"
                data-zoom="17"
                style="width: 100%; height: 400px;">
            </div>
        </section>
        <!-- end google map -->
        
        <!-- begin main -->
        <section id="main" class="three-fourths">
        <!-- begin contact form -->
        <h2>Contact Us</h2>
        <p>We would be glad to have feedback from you. Drop us a line, whether it is a comment, a question, a work proposition or just a hello. You can use either the form below or the contact details on the right.</p>
        <div id="contact-notification-box-success" class="notification-box notification-box-success" style="display: none;">
            <p>Your message has been successfully sent. We will get back to you as soon as possible.</p>
            <a href="#" class="notification-close notification-close-success">x</a>
        </div>
        
        <div id="contact-notification-box-error" class="notification-box notification-box-error " style="display: none;">
            <p id="contact-notification-box-error-msg" data-default-msg="Your message couldn't be sent because a server error occurred. Please try again."></p>
            <a href="#" class="notification-close notification-close-error">x</a>
        </div>
        <form id="contact-form" class="content-form" method="post" action="#">
            <p>
                <label for="name">Name:<span class="note">*</span></label>
                <input id="name" type="text" name="name" class="required">
            </p>
            <p>
                <label for="email">Email:<span class="note">*</span></label>
                <input id="email" type="email" name="email" class="required">
            </p>
            <p>
                <label for="url">Website:</label>
                <input id="url" type="url" name="url">
            </p>
            <p>
                <label for="subject">Subject:<span class="note">*</span></label>
                <input id="subject" type="text" name="subject" class="required">
            </p>
            <p>
                <label for="message">Message:<span class="note">*</span></label>
                <textarea id="message" cols="68" rows="8" name="message" class="required"></textarea>
            </p>
            <?php
            if(ENABLE_CAPTCHA){
                require_once ('recaptcha/recaptchalib.php');
                echo '<p>';
                echo recaptcha_get_html($captcha_public_key, null, USE_SSL);
                echo '</p>';
            }
            ?>
            <p>
                <input id="submit" class="button" type="submit" name="submit" value="Send Message">
            </p>
        </form>
        <p><span class="note">*</span> Required fields</p>
        <!-- end contact form -->
        </section>
        <!-- end main -->
        
        <!-- begin sidebar -->
        <aside id="sidebar" class="one-fourth column-last">
            <div class="widget contact-info">
                <h3>Contact Info</h3>
                <p>You can also reach us here:</p>
                <div>
                    <p class="address"><strong>Address:</strong> 123 Street, City, Country</p>
                    <p class="phone"><strong>Phone:</strong> (123) 456-7890</p>
                    <p class="fax"><strong>Fax:</strong> (123) 456-7890</p>
                    <p class="email"><strong>Email:</strong> <a href="mailto:office@company.com">office@company.com</a></p>
                    <p class="business-hours"><strong>Business Hours:</strong><br>
                    Monday-Friday: 9:00-18:00<br>
                    Saturday: 10:00-17:00<br>
                    Sunday: Closed
                    </p>
                </div>
            </div>
        </aside>
        <!-- end sidebar -->
    </div>
    </section>
    <!-- end content -->  <!-- begin footer -->
	<footer id="footer">
    	<!-- begin footer top -->
        <div id="footer-top">
        	<div class="container clearfix">
                <div class="one-fourth">
                    <div class="widget">
                        <h3>Text Widget</h3>
                        <p>Cras pretium elit quis nunc congue ut sollicitudin ante mattis. Nam cursus tellus vel libero pretium ut sagittis felis.</p>
						<p>Etiam laoreet nisl a dolor convallis euismod. Nulla felis velit, elementum ut fringilla ac, tincidunt eu justo.</p>
                    </div>
                </div>
                <div class="one-fourth">
                    <div class="widget twitter-widget">
                        <h3>Latest Tweets</h3>
                        <div class="tweet"></div>
                    </div>
                </div>
                <div class="one-fourth">
                    <div class="widget newsletter">
                        <h3>Newsletter</h3>
                        <p>Subscribe to our email newsletter for useful tips and valuable resources sent out every second Monday.</p>
                        <div id="newsletter-notification-box-success" class="notification-box notification-box-success" style="display: none;">
                            <p>You have successfully subscribed to our newsletter.</p>
                            <a href="#" class="notification-close notification-close-success">x</a>
                        </div>
        
                        <div id="newsletter-notification-box-error" class="notification-box notification-box-error" style="display: none;">
                            <p>Your email address couldn't be subscribed because a server error occurred. Please try again later.</p>
                            <a href="#" class="notification-close notification-close-error">x</a>
                        </div>
                        <form id="newsletter-form" class="content-form" action="#" method="post">
                            <input id="newsletter" type="email" name="newsletter" placeholder="Enter your email address &hellip;" class="required">
                            <input id="subscribe" class="button" type="submit" name="subscribe" value="Subscribe">
                        </form>
                    </div>
                </div>
                <div class="one-fourth column-last">
                    <div class="widget contact-info">
                        <h3>Contact Info</h3>
                        <div>
                            <p class="address"><strong>Address:</strong> 123 Street, City, Country</p>
                            <p class="phone"><strong>Phone:</strong> (123) 456-7890</p>
                            <p class="fax"><strong>Fax:</strong> (123) 456-7890</p>
                            <p class="email"><strong>Email:</strong> <a href="mailto:office@company.com">office@company.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end footer top -->

        <!-- begin footer bottom -->
        <div id="footer-bottom">
        	<div class="container clearfix">
                <div class="one-half">
                    <p>Copyright &copy; 2013 Inceptio. Created by <a href="http://themeforest.net/user/ixtendo">Ixtendo</a>.</p>
                </div>
        
                <div class="one-half column-last">
                    <ul class="social-links">
                        <li class="twitter"><a href="#" title="Twitter" target="_blank">Twitter</a></li>
                        <li class="facebook"><a href="#" title="Facebook" target="_blank">Facebook</a></li>
                        <li class="google-plus"><a href="#" title="Google+" target="_blank">Google+</a></li>
                        <li class="linkedin"><a href="#" title="LinkedIn" target="_blank">LinkedIn</a></li>
                        <li class="vimeo"><a href="#" title="Vimeo" target="_blank">Vimeo</a></li>
                        <li class="youtube"><a href="#" title="YouTube" target="_blank">YouTube</a></li>
                        <li class="skype"><a href="#" title="Skype" target="_blank">Skype</a></li>
                        <li class="digg"><a href="#" title="Digg" target="_blank">Digg</a></li>
                        <li class="delicious"><a href="#" title="Delicious" target="_blank">Delicious</a></li>
                        <li class="tumbler"><a href="#" title="Tumbler" target="_blank">Tumbler</a></li>
                        <li class="dribbble"><a href="#" title="Dribbble" target="_blank">Dribbble</a></li>
                        <li class="stumbleupon"><a href="#" title="StumbleUpon" target="_blank">StumbleUpon</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end footer bottom -->
	</footer>
	<!-- end footer -->  
</div>
<!-- end container -->
</body>
</html>