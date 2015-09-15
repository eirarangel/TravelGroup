<?php include 'header.html'; ?>

<!-- Section Title-->    
            <div class="section-title-01">
                <!-- Parallax Background -->
                <div class="bg_parallax image_03_parallax"></div>
                <!-- Parallax Background -->

                <!-- Content Parallax-->
                <div class="opacy_bg_02">
                     <div class="container">
                        <h1>Paquetes vacacionales</h1>
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
    $(document).ready(function() {
        setCategories();
        setPackages();
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
            if(i==0)
                elements += '<a href="#" data-filter="*" class="current">Show All</a>';
                var element = '<a href="#tripPack' + object.id + '" data-filter=".tripPack' + object.id + '">' + object.get("name") + '</a>';
            elements += element;
        }
        $("#navigation-filters").empty();
        $("#navigation-filters").append(elements);
    }

    function setPackages() {
        var query = new Parse.Query(Parse.Object.extend("Packages"));
        query.include("category");
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
            var description = "";
            var price = "";
            if(typeof object.get("description") != "undefined") {
                description = object.get("description").substring(0,100) + "...";
            }

            if(typeof object.get("price") != "undefined") {
                price = '<div class="price"><span>$</span><b>From</b>' + object.get("price") + '</div>';
            }
            var element = '<div class="col-xs-12 col-sm-6 col-md-3 tripPack' + object.get("category").id + '">' + 
                            '<div class="img-hover">' +
                                '<img src="img/gallery-2/1.jpg" alt="" class="img-responsive">' +
                                '<div class="overlay"><a href="img/gallery-2/1.jpg" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>' +
                            '</div>' +
                            '<div class="info-gallery info-gallery-trip">' +
                            '<h3>' + object.get("name") + '<br><span>' + object.get("category").get("name").toUpperCase() + '</span></h3>' +
                            '<hr class="separator">' +
                            '<p>' + description + '</p>' +
                            '<div class="content-btn info-gallery-btn"><a href="packages.php?view=package' + object.id + '" class="btn btn-primary">View Details</a></div>' +
                            price +
                            '</div>' +
                        '</div>';
            elements += element;
        }

        $newItems = $(elements);
        $("#navigation-packages").empty();

        var $container = $("#navigation-packages");
        $container.isotope('insert', $newItems);

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
    }
</script>
    </body>
</html>