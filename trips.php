<?php
include 'header.html';
if (isset($_GET['lang'])) {
$eleccion = "Elección de los viajeros para sus vacaciones";
}
else{
$eleccion = "Choice of holiday travelers";
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
                        <h1><?php echo $eleccion; ?></h1>
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
                    <div class="paddings-mini">
                        <div class="container">
                            <!-- Nav Filters -->
                            <div id="navigation-filters" class="portfolioFilter"></div>
                            <!-- End Nav Filters -->

                            <!-- Items Gallery filters-->
                            <div id="navigation-packages" class="portfolioContainer"></div>   
                            <!-- End Items Gallery filters-->       
                        </div>
                    </div>
                </div>   
                <!-- End content info - Vacations Destinatios--> 
            </section>
            <!-- End Content Central -->
<?php include 'footer.html'; ?>

<script type="text/javascript">
    var lang = "eng";
    $(document).ready(function() {
        if(getURLParameter("lang")) {
            lang = getURLParameter("lang");
        }
        setCategories();
        setPackages();
        $(".image_03_parallax").css('background-image', 'url(img/official/banner6.jpg)');
    });

    function setCategories() {
        var query = new Parse.Query(Parse.Object.extend("Category"));
        query.descending("createdAt");
        query.find({
            success: function(results) {
                createCategoryData(results);
            },
            error: function(error) {
                console.log("Error: " + error.code + " " + error.message);
            }
        });
    }

    function createCategoryData(results) {
        var elements = "";
        for (var i = 0; i < results.length; i++) {
            var object = results[i];
            var name = object.get("nameEng");
            var show = "Show All";
            if(lang == "esp") {
                name = object.get("name");
                show = "Ver todo";
            }
            if(i==0)
                elements += '<a href="#" data-filter="*" id="all-filter">' + show + '</a>';
                var element = '<a href="#tripPack' + object.id + '" data-filter=".tripPack' + object.id + '">' + name + '</a>';
            elements += element;
        }
        $("#navigation-filters").empty();
        $("#navigation-filters").append(elements);
    }

    function setPackages() {
        var query = new Parse.Query(Parse.Object.extend("Packages"));
        query.include("category");
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
            var cat_name = object.get("category").get("nameEng").toUpperCase();
            var price = "";
            var urlLang = "";
            var details = "View Details";
            var from = "From";

            if(lang == "esp") {
                description = "Pregunta a tu agente de ventas";
                cat_name = object.get("category").get("name").toUpperCase();
                urlLang = "&lang=esp";
                details = "Ver Detalles";
                from = "Desde";
            }
            
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
            var element = '<div class="col-xs-12 col-sm-6 col-md-3 tripPack' + object.get("category").id + '">' + 
                            '<div class="img-hover">' +
                                '<img src="' + image +'" alt="" class="img-responsive" style="max-height:150px; width:100%">' +
                                '<div class="overlay"><a href="' + image +'" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>' +
                            '</div>' +
                            '<div class="info-gallery info-gallery-trip">' +
                            '<h3>' + object.get("name") + '<br><span>' + cat_name + '</span></h3>' +
                            '<hr class="separator">' +
                            '<p>' + description + '</p>' +
                            '<div class="content-btn info-gallery-btn"><a href="packages.php?view=package' + object.id + urlLang + '" class="btn btn-primary">' + details + '</a></div>' +
                            price +
                            '</div>' +
                        '</div>';
            elements += element;
        }

        $newItems = $(elements);
        $("#navigation-packages").empty();
        //$("#navigation-packages").append(elements);

        var $container = $("#navigation-packages");
        setTimeout(function(){    
            $container.isotope('insert', $newItems);
            $("#all-filter").addClass('current');
            $container.isotope({
                filter: $("#all-filter").attr('data-filter'),
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });

            $('#navigation-filters a').click(function(){
                $('#navigation-filters .current').removeClass('current');
                $(this).addClass('current');
                var selector = $(this).attr('data-filter');
                $container.isotope({
                    filter: selector,
                          animationOptions: {
                          duration: 750,
                          easing: 'linear',
                          queue: false
                        }
                });
            });
        }, 1000);  
    }
</script>
    </body>
</html>