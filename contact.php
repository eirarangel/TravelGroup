<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Basic -->
        <meta charset="utf-8">
        <title>TravelGroup - Contact</title>
        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="World Cup - Responsive HTML5 Template soccer and sports">
        <meta name="author" content="iwthemes.com">  

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Theme CSS -->
        <link href="css/style.css" rel="stylesheet" media="screen">
        <!-- Responsive CSS -->
        <link href="css/theme-responsive.css" rel="stylesheet" media="screen">
        <!-- Skins Theme -->
        <link href="#" rel="stylesheet" media="screen" class="skin">

        <!-- Favicons -->
        <link rel="shortcut icon" href="img/icons/favicon.ico">
        <link rel="apple-touch-icon" href="img/icons/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="img/icons/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="img/icons/apple-touch-icon-114x114.png">  

        <!-- Head Libs -->
        <script src="js/modernizr.js"></script>

        <!--[if IE]>
            <link rel="stylesheet" href="css/ie/ie.css">
        <![endif]-->

        <!--[if lte IE 8]>
            <script src="js/responsive/html5shiv.js"></script>
            <script src="js/responsive/respond.js"></script>
        <![endif]-->
    </head>
    <body>
       <!--Preloader-->
        <div class="preloader">
            <div class="status">&nbsp;</div>
        </div>
        <!--End Preloader-->
         

        <!-- layout-->
        <div id="layout" class="layout-semiboxed">

            <!-- Header-->
            <header class="header-v3">
                <!-- Main Nav -->
                <?php
                include 'menu.php';
                ?>
                <!-- Main Nav -->
            </header>
            <!-- End Header-->

            <!-- Section Title-->    
            <div class="section-title-02">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <h1>Contact</h1>
                        </div>
                        <div class="col-md-8">
                            <div class="crumbs">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li>/</li>
                                    <li>Contact</li>                                       
                                </ul>    
                            </div>
                        </div>
                    </div>
                </div>  
            </div>   
            <!-- End Section Title-->

            <!--Content Central -->
            <div class="content-central">
                <!-- Shadow Semiboxed -->
                <div class="semiboxshadow text-center">
                    <img src="img/img-theme/shp.png" class="img-responsive" alt="">
                </div>
                <!-- End Shadow Semiboxed -->

                <!-- Google Map --> 
                <div id="map"></div>
                <!-- End Google Map --> 

                <!-- End content info - page Fill with -->
                <div class="content_info">
                    <div class="paddings-mini">
                        <div class="container">
                            <div class="row">
                                <!-- Sidebars -->
                                <div class="col-md-4">
                                    <aside>
                                        <h4>The Office</h4>
                                        <address>
                                          <strong>Travelgroup, Collage Holidays.</strong><br>
                                          <i class="fa fa-map-marker"></i><strong>Address: </strong> 875 Bowsprit Rd.<br>
                                          <i class="fa fa-plane"></i><strong>City: </strong>Chula Vista, CA 91914<br>
                                          <i class="fa fa-phone"></i><strong>Phone (US):</strong>(619) 730-0380<br />
                                          <i class="fa fa-phone"></i><strong>Phone (MX):</strong>(661) 100-6379
                                        </address>

                                        <address>
                                          <strong>Travelia Emails</strong><br>
                                          <i class="fa fa-envelope"></i><strong>Email:</strong><a href="mailto:#"> mar@atravelgroupcollege.com</a><br>
                                          <i class="fa fa-envelope"></i><strong>Email:</strong><a href="mailto:#"> marpicazo@aol.com</a><br>
                                        </address>
                                    </aside>

                                    <hr class="tall">

                                </div>
                                <!-- End Sidebars -->

                                <div class="col-md-8">
                                    <h3>Contact Form</h3>
                                    <p class="lead">
                                       Find a wide variety of tour packages, cruises and more in travelgroupcollege.com.You can choose your favorite destination and start planning your long-awaited vacation.
                                       You can also check availability of tours and hotels quickly and easily, in order to find the option that best suits your needs.
                                    </p>
                                    <form id="form-contact" class="form-theme" action="php/send-mail.php">
                                        <input type="text" placeholder="Name" name="Name" required="">
                                        <input type="email" placeholder="Email" name="Email" required="">
                                        <input type="number" placeholder="Phone" name="Phone" required="">
                                        <textarea placeholder="Your Message" name="message" required=""></textarea>
                                        <input type="submit" name="Submit" value="Send Message" class="btn btn-primary">
                                    </form> 
                                    <div id="result"></div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
                <!-- End content info - page Fill with  --> 

                <!-- Twitter Section -->
                <div class="section-twitter content_resalt border-top">
                    <i class="fa fa-twitter icon-big"></i>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <h2>Our recents <span class="text-resalt">twitts</span>.</h2>
                                </div>
                                <div id="twitter"></div>
                            </div>
                        </div>
                    </div>
                </div>  
                <!-- End Twitter Section -->  
            </div>
            <!-- End Content Central -->
      
            <!-- footer-->
                <?php
                include 'footer.php';
                ?>
            <!-- End footer-->
        </div>
        <!-- End layout-->

        <!-- ======================= JQuery libs =========================== -->
        <!-- jQuery local--> 
        <script src="js/jquery.js"></script>  
        <script src="js/jquery-ui.1.10.4.min.js"></script>                
        <!--Nav-->
        <script src="js/nav/jquery.sticky.js" type="text/javascript"></script>    
        <!--Totop-->
        <script type="text/javascript" src="js/totop/jquery.ui.totop.js" ></script>  
         <!--Accorodion-->
        <script type="text/javascript" src="js/accordion/accordion.js" ></script>  
        <!--Slide Revolution-->
        <script type="text/javascript" src="js/rs-plugin/js/jquery.themepunch.tools.min.js" ></script>      
        <script type='text/javascript' src='js/rs-plugin/js/jquery.themepunch.revolution.min.js'></script>    
        <!-- Maps -->
        <script src="js/maps/gmap3.js"></script>            
        <!--Ligbox--> 
        <script type="text/javascript" src="js/fancybox/jquery.fancybox.js"></script> 
        <!-- carousel.js-->
        <script src="js/carousel/carousel.js"></script>
        <!-- Filter -->
        <script src="js/filters/jquery.isotope.js" type="text/javascript"></script>
        <!-- Twitter Feed-->
        <script src="js/twitter/jquery.tweet.js"></script> 
        <!-- flickr Feed-->
        <script src="js/flickr/jflickrfeed.min.js"></script>    
        <!--Theme Options-->
        <script type="text/javascript" src="js/theme-options/theme-options.js"></script>
        <script type="text/javascript" src="js/theme-options/jquery.cookies.js"></script> 
        <!-- Bootstrap.js-->
        <script type="text/javascript" src="js/bootstrap/bootstrap.js"></script>
        <script type="text/javascript" src="js/bootstrap/bootstrap-slider.js"></script> 
        <!--MAIN FUNCTIONS-->
        <script type="text/javascript" src="js/main.js"></script>
        <!-- ======================= End JQuery libs =========================== -->

        <!--  ======================= Google Map  ============================== -->
        <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript">
            /*
                Map Settings
                Find the Latitude and Longitude of your address:    
                - http://universimmedia.pagesperso-orange.fr/geo/loc.htm    
                - http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/
            */

            // Map Markers
            var mapMarkers = [{
                address: "875 BOWSPRIT RD. CHULA VISTA, CA 91914",
                html: "<strong>CA Office</strong><br>875 Bowsprit Rd. Chula Vista, CA 91914<br><br><a href='#' onclick='mapCenterAt({latitude: 33.44792, longitude: -86.72963, zoom: 16}, event)'>[+] zoom here</a>",
                icon: {
                    image: "img/img-theme/pin.png",
                    iconsize: [26, 46],
                    iconanchor: [12, 46]
                }
            }];

            // Map Initial Location
            var initLatitude = 32.5137109;
            var initLongitude = -117.0288188;

            // Map Extended Settings
            var mapSettings = {
                controls: {
                    panControl: true,
                    zoomControl: true,
                    mapTypeControl: true,
                    scaleControl: true,
                    streetViewControl: true,
                    overviewMapControl: true
                },
                scrollwheel: false,
                markers: mapMarkers,
                latitude: initLatitude,
                longitude: initLongitude,
                zoom: 9
            };
            
            $("#map").gMap(mapSettings);

            // Map Center At
            var mapCenterAt = function(options, e) {
                e.preventDefault();
                $("#map").gMap("centerAt", options);
            }

        </script>
    </body>
</html>