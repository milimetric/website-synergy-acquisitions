<?php//@skip-indexing?>
<?php

include_once (dirname(__FILE__) . '/admin/util.php');
include_once (dirname(__FILE__) . '/admin/db.php');
include_once (dirname(__FILE__) . '/settings.php');

$newsletter_email_subject = 'Newsletter from ' . $_SERVER["HTTP_HOST"];

global $private_key;
$subscribed_emails = get_all_emails();

$status = 'forbidden';
$display_content = true;
$http_method = strtolower($_SERVER['REQUEST_METHOD']);
$action = strtolower($_REQUEST['action']);

if ($action == 'subscribe') {
    $ok = add_email_address($_REQUEST['email']);
    send_response($ok ? 200 : 500);
} elseif ($action == 'unsubscribe') {
    if(remove_email_address($_REQUEST['user'])){
        $status = 'unsubscribe_successful';
    }else{
        send_response(-1);
    }
}elseif ($_REQUEST['pk'] == $private_key){
    $status = 'display_form';
    if ($http_method == 'post') {
        send_newsletter();
    }
}

function send_response($code)
{
    global $display_content;
    $display_content = false;
    if ($code == 200) {
        header('HTTP/1.1 200 OK');
    } elseif ($code == 500) {
        header('HTTP/1.1 500 Internal Server Error');
    } else {
        $home_url = 'http://' . $_SERVER["HTTP_HOST"];
        header("Location: $home_url");
    }
}

function send_newsletter()
{
    global $my_email;
    global $subscribed_emails;
    global $newsletter_email_subject;
    $emails_to_send = $_POST['emails'];
    $orig_tmp_file_name = $_FILES['newsletter-template']['tmp_name'];
    $content = '';
    $file = fopen($orig_tmp_file_name, 'r');
    if ($file) {
        while (!feof($file)) {
            $content .= fgets($file);
        }
        fclose($file);
    }
    $content = str_replace('</body>', '', $content);
    $content = str_replace('</BODY>', '', $content);
    $content = str_replace('</html>', '', $content);
    $content = str_replace('</HTML>', '', $content);

    $headers = "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: $my_email\r\n";

    $base_unsubscribe_url = str_replace('send-newsletter.php', 'newsletter.php', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    foreach ($emails_to_send as $email_key) {
        $email = $subscribed_emails[$email_key];
        $unsubscribe_url = $base_unsubscribe_url . '?action=unsubscribe&amp;user=' . $email_key;
        $message = $content . '<p>To stop receiving emails from ' . $_SERVER["HTTP_HOST"] . ', unsubscribe <a href="' . $unsubscribe_url . '">here</a>.</p>';
        $message .= '</body></html>';
        mail($email, $newsletter_email_subject, $message, $headers);
    }
}
?>

<?php if ($display_content) { ?>
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
    <script type="text/javascript" src="js/revslider.jquery.themepunch.plugins.min.js"></script> <!-- swipe gestures -->
    <script src="js/jquery.tipsy.js" type="text/javascript"></script> <!-- tooltips -->
    <script src="js/custom.js" type="text/javascript"></script> <!-- jQuery initialization -->
    <!-- end JS -->

    <title>Inceptio - Page with Right Sidebar</title>
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
                <li class="current"><a href="#" rel="submenu2">Templates</a>
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
                <li><a href="contact.php">Contact</a></li>
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
        <h1>Newsletter</h1>
        <?php if ($status == 'display_form') { ?>
        <nav id="breadcrumbs">
            <ul>
                <li><a href="admin.php?pk=<?php echo $private_key;?>">Administration Dashboard</a></li>
            </ul>
        </nav>
        <?php } ?>
    </div>
</section>
<!-- begin page title -->

<!-- begin content -->
    <section id="content">
    	<div class="container clearfix">
    <!-- begin main content -->
    <section id="main" class="three-fourths">
        <?php if ($status == 'display_form') { ?>
        <?php if ($http_method == 'post') { ?>
            <div class="notification-box notification-box-success">
                <p>The newsletter has been sent.</p>
                <a href="#" class="notification-close notification-close-success">x</a>
            </div>
            <?php } ?>
        <form id="send-newsletter-form" class="content-form" method="post" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>">
            <p>
                <label for="emails">Select email addresses:<span class="note">*</span></label>
                <select id="emails" multiple size="10" name="emails[]" class="required">
                    <?php
                    foreach ($subscribed_emails as $id => $value) {
                        echo '<option selected value="' . $id . '"> ' . $value . '  </option>';
                    }
                    ?>
                </select>
            </p>
            <p>
                <label for="newsletter-template">Upload newsletter template:<span class="note">*</span></label>
                <input id="newsletter-template" type="file" name="newsletter-template" class="required">
            </p>
            <p>
                <input type="hidden" name="pk" value="<?php echo $private_key;?>">
                <input id="submit" class="button" type="submit" name="submit" value="Send Newsletter">
            </p>
        </form>
        <?php } elseif($status == 'unsubscribe_successful') { ?>
        <div class="notification-box notification-box-success">
            <p>You have been successfully unsubscribed from <a href="<?php echo $_SERVER["HTTP_HOST"]?>"><?php echo $_SERVER["HTTP_HOST"]?></a>.</p>
            <a href="#" class="notification-close notification-close-success">x</a>
        </div>
        <?php } else { ?>
        <div class="notification-box notification-box-error">
            <p>You have no rights to access this page.</p>
            <a href="#" class="notification-close notification-close-error">x</a>
        </div>
        <?php } ?>
    </section>
    <!-- end main content -->

    <!-- begin sidebar -->
    <aside id="sidebar" class="one-fourth column-last">
        <?php if ($status == 'display_form') : ?>
        <div class="widget">
            <h3>Admin Menu</h3>
            <nav>
                <ul class="menu">
                    <li><a href="admin.php?pk=<?php echo $private_key;?>">Administration dashboard</a></li>
                    <li class="current-menu-item"><a href="newsletter.php?pk=<?php echo $private_key;?>">Send newsletter</a></li>
                </ul>
            </nav>
        </div>
        <?php endif; ?>
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
                    <div class="notification-box notification-box-success" style="display: none;">
                        <p>You have successfully subscribed to our newsletter.</p>
                        <a href="#" class="notification-close notification-close-success">x</a>
                    </div>

                    <div class="notification-box notification-box-error" style="display: none;">
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
<?php } ?>