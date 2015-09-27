<?php
    include 'header.html';
    if (isset($_GET['lang'])) {
        $destination = "Destinos";
        $include = "Incluye";
        $restrictions = "Restricciones";
        $reserve = "¡Reserva Ahora!";
        $help = "¿Necesitas ayuda? ¡Llámanos ahora! - (619) 730-0380";
    } else {
        $destination = "Destinations";
        $include = "Include";
        $restrictions = "Restrictions";
        $reserve = "Reserve Now!";
        $help = "Need Help? Call us Now! - (619) 730-0380";
    }
?>

<!-- Section Title-->    
            <div class="section-title-01">
                <!-- Parallax Background -->
                <div class="bg_parallax image_03_parallax"></div>
                <!-- Parallax Background -->

                <!-- Content Parallax-->
                <div class="opacy_bg_02">
                     <div class="container">
                        <h1 id="pack_category_name"></h1>
                    </div>  
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
                                        <div class="col-md-6">
                                            <div id="package_image" class="img-hover">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                                <h1 id="package_name"></h1>
                                                <p class="lead">
                                                    $<span id="package_price"></span> usd p/p
                                                    <span class="line"></span>
                                                </p>
                                                <p id="package_description"></p>
                                                <div align="right">
                                                    <input id="reserve_button" type="button" value="<?= $reserve; ?>">                                                  
                                                </div>
                                        </div>
                                   </div>
                                         <br />   
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h4 id="destinations"><?= $destination; ?></h4>
                                                    <ul class="list-styles" id="package_destinations"></ul>
                                                </div>
                                                <div class="col-md-4">
                                                    <h4 id="includes"><?= $include; ?></h4>
                                                    <ul class="list-styles" id="package_includes"></ul>                                   
                                                </div>  
                                                <div class="col-md-4">
                                                    <h4 id="restrictions"><?= $restrictions; ?></h4>
                                                    <ul class="list-styles" id="package_restrictions"></ul>                                   
                                                </div>                                  
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
                <a href="help.php" style="text-decoration: none;">
                    <div class="content_info">
                        <div class="skin_base paddings-mini color-white text-center">
                            <h2><?= $help; ?></h2>
                        </div>
                    </div>
                </a>               

            </section>
            <!-- End Content Central -->
<?php include 'footer.html'; ?>

<script type="text/javascript">
    var id = getURLParameter("view").substring(7);
    var lang = "eng";
    $(document).ready(function() {
        if(getURLParameter("lang")) {
            lang = getURLParameter("lang");
        }
        getPackage(id);

        $("#reserve_button").click(function() {
            var urlLang = "";
            if(lang == "esp") urlLang = "&lang=esp";
            window.location.href =  "reserve.php?package=" + id + urlLang;
        });
    });

    function getPackage(id) {
        var query = new Parse.Query(Parse.Object.extend("Packages"));
        query.include("category");
        if(lang == "esp") query.equalTo("languages", 0);
        else query.equalTo("languages", 1);
        query.get(id, {
            success: function(packageObject) {
                getPackageObject(packageObject);
            }, error: function(error) {
                //tengo el id en ingles y busco el spanish one
                    var queryEng = new Parse.Query(Parse.Object.extend("Packages"));
                    queryEng.get(id, {
                        success: function(packageObj) {
                            if(lang == "esp") {
                                window.location.replace("http://localhost/TravelGroup/packages.php?view=package" + packageObj.get("packageEsp").id + "&lang=esp");
                            } else {
                                var queryEsp = new Parse.Query(Parse.Object.extend("Packages"));
                                queryEsp.equalTo("packageEsp", packageObj);
                                queryEsp.first({
                                  success: function(object) {
                                    // Successfully retrieved the object.
                                    window.location.replace("http://localhost/TravelGroup/packages.php?view=package" + object.id);
                                  },
                                  error: function(error) {
                                    console.log("Error: " + error.code + " " + error.message);
                                  }
                              });
                            }
                        }, error: function(error) {
                            console.log("hubo error");
                        }
                    });
            }
        });
    }

    function getPackageObject(packageObject) {
        if(lang == "esp") $("#pack_category_name").text(packageObject.get("category").get("name"));
        else $("#pack_category_name").text(packageObject.get("category").get("nameEng"));
        $("#package_name").text(packageObject.get("name"));
        if(packageObject.get("detailsAgent") == 1) {
                        $("#package_description").text("Pregunta a tu agente de ventas");
                        $(".lead").hide();
                        $("#destinations").hide();
                        $("#includes").hide();
                        $("#restrictions").hide(); 
                    } else {
                        $("#package_price").text(packageObject.get("price"));
                        $("#package_description").text(packageObject.get("description"));

                        var destinations = packageObject.get("destinations").split(',');
                        var destination = "";
                        for(var i=0; i<destinations.length; i++) {
                            destination += '<li><i class="fa fa-check"></i>' + destinations[i] + '</li>';
                        }
                        $("#package_destinations").empty();
                        $("#package_destinations").append(destination);

                        var includes = packageObject.get("include").split(',');
                        var include = "";
                        for(var i=0; i<includes.length; i++) {
                            include += '<li><i class="fa fa-check"></i>' + includes[i] + '</li>';
                        }
                        $("#package_includes").empty();
                        $("#package_includes").append(include);

                        var restrictions = packageObject.get("restrictions").split(',');
                        var restriction = "";
                        for(var i=0; i<restrictions.length; i++) {
                            restriction += '<li><i class="fa fa-check"></i>' + restrictions[i] + '</li>';
                        }
                        $("#package_restrictions").empty();
                        $("#package_restrictions").append(restriction);
                    }
                    
                    $(".image_03_parallax").css('background-image', 'url(' + packageObject.get("category").get("image").url() + ')');

                    var image = "img/gallery-2/2.jpg";
                    if(typeof packageObject.get("image") != "undefined") {
                        image = packageObject.get("image").url();
                    }

                    $("#package_image").append('<div class="overlay"><a href="'+image+'" class="fancybox"><i class="fa fa-plus-circle"></i></a></div><img src="'+image+'" alt="" class="img-responsive">');

    }

    function getURLParameter(name) {
      return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null
    }
</script>