<?php
if (isset($_GET['lang'])) {
$q = "Bienvenid@";
$w = "UN VIAJE A TU MEDIDA";
$e = "Ahorra tiempo y despreocúpate, un asesor te atenderá de principio a fin!!";
$r = "Nombre y apellido como aparece en tu pasaporte o credencial oficial.";
$t = "¿Eres ciudadano Mexicano?";
$y = "Si";
$u = "Fecha de nacimiento";
$i = "Correo Electrónico: ";
$o = "Teléfono: ";
$a = "¿Es un Móvil?";
$s = "DETALLES DE TU VIAJE:";
$d = "Ciudad y País: ";
$f = "Fecha de salida: ";
$g = "Fecha de regreso: ";
$h = "QUIERO IR A";
$j = "Num. de noches ";
$k = "Nota para Cruceros: Todas las cabinas deben tener un adulto de 21 años o mayores en cabina.";
$l = "Budget:";
$z = "Numero de adultos";
$x = "Comentarios: ";
$c = "Indícanos requerimientos especiales (vuelos, tours, traslados, etc.) para ayudarte a cotizar a tu gusto y necesidades.";

}
else{
$q = "Welcome";
$w = "A TRIP TO YOUR NEEDS";
$e = "Save time and not have to worry, an adviser will assist you from beginning to end!! ";
$r = "Name and last name as it appears on your Passport: ";
$t = "You are a U.S. citizen? ";
$y = "Yes";
$u = "Date of birth: ";
$i = "Email: ";
$o = "Telephone:  ";
$a = "Is a Mobile?";
$s = "DETAILS OF YOUR TRAVEL";
$d = "City and Country: ";
$f = "Departure date: ";
$g = "Return date: ";
$h = "I WANT TO GO TO";
$j = "Num. of nights ";
$k = "Note Cruise: All cabins must have one adult 21 years or older in the cabin";
$l = "Budget:";
$z = "Approximate number of adults: ";
$x = "Reviews: ";
$c = "Please indicate special requirements (flights, tours, transfers, etc.) to help you contribute to your needs.";

}
?>
<?php include 'header.html'; ?>
<!-- Section Title-->    
            <div style="
    height: 200px;
    background-color: #262626;
    text-align: center;
    position: relative;
    width: 100%;
    overflow: hidden;">
                <!-- Parallax Background -->
                <div class="bg_parallax image_03_parallax"></div>
                <!-- Parallax Background -->

                <!-- Content Parallax-->
                <div class="opacy_bg_02"> 
                </div>  
                <!-- End Content Parallax--> 
            </div>   
            <!-- End Section Title-->

            <!--Content Central -->
            <section class="content-central">
                <!-- Shadow Semiboxed -->
                <div class="semiboxshadow text-center">
                    <img src="img/img-theme/shp.png" class="img-responsive" alt="">
                </div>
                <!-- End Shadow Semiboxed -->

                <!-- End content info - Vacations Destinatios-->
                <div class="content_info">
                    <div class="content_info">
                    <!-- Parallax Background -->
                    <div class="bg_parallax image_02_parallax"></div>
                    <!-- Parallax Background -->

                    <div class="content_info">
                    <!-- Info Resalt-->
                    <div class="content_resalt tabs-detailed">
                        <div class="container wow fadeInUp">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tab-content">
                                        <!-- Tab One - Hotel -->
                                        <div class="tab-pane active" id="hotel">                                        
                                            <div class="row padding-top">
                                                <center>    
                                                    <h2><?php echo $q; ?></h2>
                                                    <h2><?php echo $w; ?></h2>
                                                    <h5><em><?php echo $e; ?></em></h5>
                                                </center>

                                                <form id="form-contact" class="form-theme" action="php/send-mail.php">
                                                    <div style="margin-left:20%; margin-right:20%;">
                                                        <h5><?php echo $r; ?> <input type="text" name="name" value=""></h5>
                                                        <h5><?php echo $t; ?>
                                                            <input type="radio" name="sex" value="yes" checked> <?php echo $y; ?> 
                                                            <input type="radio" name="sex" value="no"> No
                                                        </h5>
                                                        <h5><?php echo $u; ?>   <input type="date" name="fecha"> </h5>
                                                        <h5><?php echo $i; ?>  <input type="text" name="email" value=""></h5>
                                                        <h5><?php echo $o; ?>   <input type="text" name="telephone" value=""> 
                                                            <?php echo $a; ?> 
                                                            <input type="radio" name="sex" value="yes" checked> <?php echo $y; ?> 
                                                            <input type="radio" name="sex" value="no"> No
                                                        </h5>
                                                        <h4><?php echo $s; ?> </h4>
                                                        <h5><?php echo $d; ?> <input type="text" name="citycountry" value=""></h5>                                                                                                        
                                                        <h5><?php echo $f; ?> <input type="date" name="fecha"> <?php echo $g; ?>   <input type="date" name="fecha"></h5>
                                                        <h4><?php echo $h; ?> </h4>
                                                        <input type="text" name="package_name" class="package_name" value="" readonly>
                                                        <input type="hidden" name="package_id" class="package_id" value="">
                                                        <h5> <?php echo $j; ?> <input type="number" name="quantity" min="1" max="99" value="1"><br></h5>
                                                        <strong><?php echo $k; ?></strong><br />
                                                        <br />
                                                        <h5><?php echo $l; ?>
                                                            <select>
                                                              <option value="volvo">US$0 – 1,400</option>
                                                              <option value="saab">US$1400 - 2800</option>
                                                              <option value="mercedes">US$2800 – 4200</option>
                                                              <option value="audi">US$4200 – 5600</option>
                                                              <option value="volvo">US$5600 – 7000</option>
                                                              <option value="saab">US$7000 – 8400</option>
                                                              <option value="mercedes">US$8400 – 9800</option>
                                                              <option value="audi">US$9800 – 11200</option>                                                          
                                                            </select>    
                                                        </h5>
                                                        <h5><?php echo $z; ?><input type="number" name="quantity" min="1" max="99" value="1"></h5>
                                                        <h5><?php echo $x; ?></h5>
                                                        <textarea rows="4" cols="50" value="Type of vacation….."></textarea><br />
                                                        <h6><em><?php echo $c; ?></em></h6>
                                                            <div align="right">
                                                                <input type="submit" onclick="location.href = 'help.php';" value="Send"> 
                                                            </div>
                                                        <br />
                                                        <br />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- end Tab One - Hotel -->
                                    </div>  
                                </div>                 
                            </div>
                        </div>
                    </div>
                    <!-- End Info Resalt-->
                </div>
                </div>                        
                </div>   
                <!-- End content info - Vacations Destinatios-->               

            </section>
            <!-- End Content Central -->
<?php include 'footer.html'; ?>

<script type="text/javascript">
    $(document).ready(function() {
        getPackage(getURLParameter("package"));
    });

    function getPackage(id) {
        var query = new Parse.Query(Parse.Object.extend("Packages"));
        query.get(id, {
            success: function(packageObject) {
                $(".package_name").val(packageObject.get("name"));
                $(".package_id").val(packageObject.id);
            }, error: function(error) {

            }
        });
    }

    function getURLParameter(name) {
      return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null
    }
</script>