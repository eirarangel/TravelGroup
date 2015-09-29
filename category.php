<?php
    include 'header.html';
    if (isset($_GET['lang'])) {
        $first = "Eleccion de ";
        $second = "Viajeros ";
        $third = "en Hoteles";
        $help = "¿Necesitas ayuda? ¡Llámanos ahora! - US <strong>(619) 730-0380</strong> o MX <strong>(661) 100-6379</strong>";
    } else {
        $first = "Travelers ";
        $second = "Choice ";
        $third = "of Hotels";
        $help = "Need Help? Call us Now! - US <strong>(619) 730-0380</strong> or MX <strong>(661) 100-6379</strong>";
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
                        <h1 id="category_name">Categoria Dummy</h1>
                    </div>  
                </div>  
                <!-- End Content Parallax--> 
            </div>   
            <!-- End Section Title-->

            <!--Content Central -->
            <section class="content-central">
                    <!-- Info Resalt-->
                    <div class="padding-bottom">
                        <!-- Title -->
                        <div class="container">
                            <div class="row">
                                <div class="titles">
                                    <h2><?= $first; ?><span><?= $second; ?></span><?= $third; ?></h2>
                                    <i class="fa fa-plane"></i>
                                    <hr class="tall">
                                </div>                    
                            </div>
                        </div>
                        <!-- End Title-->

                        <!-- boxes-carousel-->
                        <div id="boxes-carousel">
                            
                        </div>
                        <!-- End boxes-carousel-->
                    </div>
                    <!-- End Info Resalt-->
 

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
    var lang = "eng";
    $(document).ready(function() {
        if(getURLParameter("lang")) {
            lang = getURLParameter("lang");
        }
        getCategory(getURLParameter("view").substring(8));
    });

    function getCategory(id) {
        var query = new Parse.Query(Parse.Object.extend("Category"));
        query.get(id, {
            success: function(packageObject) {
                var name = packageObject.get("nameEng");
                if(lang == "esp") name = packageObject.get("name");
                $("#category_name").text(name);
                $(".image_03_parallax").css('background-image', 'url(' + packageObject.get("image").url() + ')');
                getPackages(packageObject);
            }, error: function(error) {

            }
        });
    }

    function getPackages(category) {
        var query = new Parse.Query(Parse.Object.extend("Packages"));
        query.equalTo("category", category);
        if(lang == "esp") query.equalTo("languages", 0);
        else query.equalTo("languages", 1);
        query.find({
            success: function(results) {
                createPackageData(results);
            },
            error: function(error) {
                console.log("Error: " + error.code + " " + error.message);
            }
        });
    }

    function createPackageData(results) {
        var elements = "";
        
        for (var i = 0; i < results.length; i++) {
            var object = results[i];
            var description = "Ask your travel agent";
            var from = "From";
            var details = "View Details";
            var urlLang = "";
            if(lang == "esp") {
                description = "Pregunta a tu agente de ventas";
                from = "Desde";
                details = "Ver Detalles";
                urlLang = "&lang=esp";
            }
            var price = "";
            if(typeof object.get("description") != "undefined") {
                description = object.get("description").substring(0,100) + "...";
            }

            if(typeof object.get("price") != "undefined") {
                price = '<div class="price"><span>$</span><b>' + from + '</b>' + object.get("price") + '</div>';
            }

            var image = "img/gallery-2/1.jpg";
            if(typeof object.get("image") != "undefined") {
                image = object.get("image").url();
            }

            var element = '<div>' + 
                            '<div class="img-hover">' +
                                '<img src="'+ image +'" alt="" class="img-responsive" style="width:100%;">' +
                                '<div class="overlay"><a href="'+image+'" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>' +
                            '</div>' +
                            '<div class="info-gallery info-gallery-custom">' +
                                '<h3>' + object.get("name") + '</h3>' +
                                '<hr class="separator">' +
                                '<p>' + description + '</p>' +
                                '<div class="content-btn"><a href="packages.php?view=package' + object.id + urlLang + '" class="btn btn-primary">' + details + '</a></div>' +
                                price +
                            '</div>' +
                        '</div>';
            elements += element;
        }
        $("#boxes-carousel").empty();
        $("#boxes-carousel").append(elements);
        $("#boxes-carousel").owlCarousel({
           autoPlay: 3200,      
           items : 4,
           itemsScaleUp: true,
           navigation: true,
           itemsDesktopSmall : [1024,3],
           itemsTablet : [768,2],
           itemsMobile : [500,1],
           pagination: false
       });
    }

    function getURLParameter(name) {
      return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null
    }
</script>