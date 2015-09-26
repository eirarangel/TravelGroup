<?php include 'header.html'; ?>
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
                                    <h2>Travelers <span>Choice</span> of Hotels</h2>
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
                            <h2>Need Help? Call us Now! - (619) 730-0380</h2>
                        </div>
                    </div>
                </a>  

            </section>
            <!-- End Content Central -->

<?php include 'footer.html'; ?>
<script type="text/javascript">
    $(document).ready(function() {
        getCategory(getURLParameter("view").substring(8));
    });

    function getCategory(id) {
        var query = new Parse.Query(Parse.Object.extend("Category"));
        query.get(id, {
            success: function(packageObject) {
                $("#category_name").text(packageObject.get("name"));
                $(".image_03_parallax").css('background-image', 'url(' + packageObject.get("image").url() + ')');
                getPackages(packageObject);
            }, error: function(error) {

            }
        });
    }

    function getPackages(category) {
        var query = new Parse.Query(Parse.Object.extend("Packages"));
        query.equalTo("category", category);
        query.equalTo("languages", 0);
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
            var description = "Pregunta a tu agente de ventas";
            var price = "";
            if(typeof object.get("description") != "undefined") {
                description = object.get("description").substring(0,100) + "...";
            }

            if(typeof object.get("price") != "undefined") {
                price = '<div class="price"><span>$</span><b>From</b>' + object.get("price") + '</div>';
            }

            var image = "img/gallery-2/1.jpg";
            if(typeof object.get("image") != "undefined") {
                image = object.get("image").url();
            }

            var element = '<div>' + 
                            '<div class="img-hover">' +
                                '<img src="'+ image +'" alt="" class="img-responsive" style="max-height:205px; width:100%">' +
                                '<div class="overlay"><a href="'+image+'" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>' +
                            '</div>' +
                            '<div class="info-gallery info-gallery-custom">' +
                                '<h3>' + object.get("name") + '</h3>' +
                                '<hr class="separator">' +
                                '<p>' + description + '</p>' +
                                '<div class="content-btn"><a href="packages.php?view=package' + object.id + '" class="btn btn-primary">View Details</a></div>' +
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