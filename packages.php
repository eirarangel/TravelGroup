<?php include 'header.html'; ?>
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
                                                    <input type="submit" onclick="location.href = 'reserve.php';" value="Reserve Now!">                                                  
                                                </div>
                                        </div>
                                   </div>
                                         <br />   
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h4 id="destinations">Destination</h4>
                                                    <ul class="list-styles" id="package_destinations"></ul>
                                                </div>
                                                <div class="col-md-4">
                                                    <h4 id="includes">Includes</h4>
                                                    <ul class="list-styles" id="package_includes"></ul>                                   
                                                </div>  
                                                <div class="col-md-4">
                                                    <h4 id="restrictions">Restrictions</h4>
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
                            <h2>Need Help? Call us Now! - (619) 730-0380</h2>
                        </div>
                    </div>
                </a>               

            </section>
            <!-- End Content Central -->
<?php include 'footer.html'; ?>

<script type="text/javascript">
    $(document).ready(function() {
        getPackage(getURLParameter("view").substring(7));
    });

    function getPackage(id) {
        var query = new Parse.Query(Parse.Object.extend("Packages"));
        query.include("category");
        query.get(id, {
            success: function(packageObject) {
                $("#pack_category_name").text(packageObject.get("category").get("name"));
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

            }, error: function(error) {

            }
        });
    }

    function getURLParameter(name) {
      return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null
    }
</script>