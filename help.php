<?php include 'header.html'; ?>
<!-- Section Title-->    
            <div style="
    height: 300px;
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
                     <div class="container">
                        <h1 style="padding-top: 40px;">Any questions?</h1>
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
                                                <center>    
                                                    <h2>We will help you!</h2>
                                                    
                                                    <h4>Call now in Mexico or in the United States </h4>
                                                    <p>MX 661-100-6379 <br>
                                                    US 619-730-0380 <br>
                                                    </p>

                                                    
                                                    <h4>Service hours:</h4>
                                                    Monday to Friday 9:00am-2:00pm <br />
                                                    Saturday 9:00am-2:00pm <br />
                                                    </p>
             
                                                    <h5>Address: 875 Bowsprit Rd. Chula Vista Ca.91914

                                                    <h5>Or contact us via <a href="#"><i class="fa fa-facebook-square"></i></a> <a href="#"><i class="fa fa-twitter-square"></i></a></h5>
                                                    <br>
                                                    <br>
                                                </center>
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
        getPackage(getURLParameter("view").substring(7));
    });

    function getPackage(id) {
        var query = new Parse.Query(Parse.Object.extend("Packages"));
        query.include("category");
        query.get(id, {
            success: function(packageObject) {
                $("#pack_category_name").text(packageObject.get("category").get("name"));
                $("#package_name").text(packageObject.get("name"));
                $("#package_price").text(packageObject.get("price"));
                $("#package_description").text(packageObject.get("description"));

                $(".image_03_parallax").css('background-image', 'url(' + packageObject.get("category").get("image").url() + ')');

                var image = "img/gallery-2/2.jpg";
                if(typeof packageObject.get("image") != "undefined") {
                    image = packageObject.get("image").url();
                }

                $("#package_image").append('<div class="overlay"><a href="'+image+'" class="fancybox"><i class="fa fa-plus-circle"></i></a></div><img src="'+image+'" alt="" class="img-responsive">');
                

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

            }, error: function(error) {

            }
        });
    }

    function getURLParameter(name) {
      return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null
    }
</script>