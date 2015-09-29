<?php
include 'header.html';
if (isset($_GET['lang'])) {
$contact = "Contacto";
$office = "Oficina";
$address = "Dirección";
$city = "Ciudad";
$phone = "Teléfono";
$email = "Correo Electronico";
$title_contact = "Forma de Contacto";
$contact_text = "Encuentra una amplia variedad de paquetes turísticos, cruceros y más en travelgroup-holidays.com, puede elegir su destino favorito y comenzar a planificar sus vacaciones esperadas. <br />También puede consultar la disponibilidad de tours y hoteles de forma rápida y sencilla, con el fin de encontrar la opción que mejor se adapte a sus necesidades.";
$name = "Nombre";
$message = "Escribe tu Mensaje.";
$send = "Mandar Mensaje";
}
else{
$contact = "Contact";
$office = "The Office";
$address = "Address";
$city = "City";
$phone = "Phone";
$email = "Email";
$title_contact = "Contact Form";
$contact_text = "Find a wide variety of tour packages, cruises and more in travelgroupcollege.com, you can choose your favorite destination and start planning your long-awaited vacation. <br />You can also check availability of tours and hotels quickly and easily, in order to find the option that best suits your needs.";
$name = "name";
$message = "Your Message.";
$send = "Send Message";
}
?>

            <!-- Section Title-->    
            <div class="section-title-01">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1><?php echo $contact; ?></h1>
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
                                        <h4><?php echo $office; ?></h4>
                                        <address>
                                          <strong>Travelgroup Holidays.</strong><br>
                                          <i class="fa fa-map-marker"></i><strong><?php echo $address; ?></strong> 875 Bowsprit Rd.<br>
                                          <i class="fa fa-plane"></i><strong><?php echo $city; ?>: </strong>Chula Vista, CA 91914<br>
                                          <i class="fa fa-phone"></i><strong><?php echo $phone; ?> (US):</strong>(619) 730-0380<br />
                                          <i class="fa fa-phone"></i><strong><?php echo $phone; ?> (MX):</strong>(661) 100-6379
                                        </address>

                                        <address>
                                          <strong>Travelgroup Holidays.</strong><br>
                                          <i class="fa fa-envelope"></i><strong><?php echo $email; ?></strong><a href="mailto:mpicazo@travelgroup-holidays.com"><br />mpicazo@travelgroup-holidays.com</a><br>
                                          <i class="fa fa-envelope"></i><strong><?php echo $email; ?></strong><a href="mailto:mpicazo@carefreevacations.com"><br />mpicazo@carefreevacations.com</a><br>
                                        </address>
                                    </aside>

                                    <hr class="tall">

                                </div>
                                <!-- End Sidebars -->

                                <div class="col-md-8">
                                    <h3><?php echo $title_contact; ?></h3>
                                    <p class="lead">
                                      <?php echo $contact_text; ?>
                                    </p>
                                    <form id="form-contact" class="form-theme" action="php/send-mail.php">
                                        <input type="text" placeholder="<?php echo $name; ?>" name="Name" required="">
                                        <input type="email" placeholder="<?php echo $email; ?>" name="Email" required="">
                                        <input type="number" placeholder="<?php echo $phone; ?>" name="Phone" required="">
                                        <textarea placeholder="<?php echo $message; ?>" name="message" required=""></textarea>
                                        <input type="submit" name="Submit" value="<?php echo $send; ?>" class="btn btn-primary">
                                    </form> 
                                    <div id="result"></div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
                <!-- End content info - page Fill with  --> 
            </div>
            <!-- End Content Central -->
      
<?php include 'footer.html'; ?>

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
                html: "<strong>CA Office</strong><br>875 Bowsprit Rd. Chula Vista, CA 91914<br><br><a href='#' onclick='mapCenterAt({latitude: 32.6537109, longitude: -116.9488188, zoom: 13}, event)'>[+] zoom here</a>",
                icon: {
                    image: "img/img-theme/pin.png",
                    iconsize: [26, 46],
                    iconanchor: [12, 46]
                }
            }];

            // Map Initial Location
            var initLatitude = 32.8137109;
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