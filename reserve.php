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
                                                    <h2>Welcome</h2>
                                                    <h2>A TRIP TO YOUR NEEDS</h2>
                                                    <h5><em> Save time and not have to worry, an adviser will assist you from beginning to end!! </em></h5>
                                                </center>

                                                <div style="margin-left:20%; margin-right:20%;">
                                                    <h5>Name and last name as it appears on your Passport: <input type="text" name="name" value=""></h5>
                                                    <h5>You are a U.S. citizen?
                                                        <input type="radio" name="sex" value="yes" checked> Yes 
                                                        <input type="radio" name="sex" value="no"> No
                                                    </h5>
                                                    <h5>Date of birth:  <input type="date" name="fecha"> </h5>
                                                    <h5>Email: <input type="text" name="email" value=""></h5>
                                                    <h5>Telephone:  <input type="text" name="telephone" value=""> 
                                                        Is a Mobile?
                                                        <input type="radio" name="sex" value="yes" checked> Yes 
                                                        <input type="radio" name="sex" value="no"> No
                                                    </h5>
                                                    <h4>DETAILS OF YOUR TRAVEL</h4>
                                                    <h5>City and Country: <input type="text" name="citycountry" value=""></h5>                                                                                                        
                                                    <h5>Departure date:  <input type="date" name="fecha"> Return date:  <input type="date" name="fecha"></h5>
                                                    <h4>I WANT TO GO TO</h4>
                                                    <input type="text" name="package_name" class="package_name" value="" readonly>
                                                    <input type="hidden" name="package_id" class="package_id" value="">
                                                    <h5> Num. of nights <input type="number" name="quantity" min="1" max="99" value="1"><br></h5>
                                                    <strong>Note Cruise: All cabins must have one adult 21 years or older in the cabin</strong><br />
                                                    <br />
                                                    <h5>Budget:
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
                                                    <h5>Approximate number of adults: <input type="number" name="quantity" min="1" max="99" value="1"></h5>
                                                    <h5>Reviews: </h5>
                                                    <textarea rows="4" cols="50" value="Type of vacation….."></textarea><br />
                                                    <h6><em>Please indicate special requirements (flights, tours, transfers, etc.) to help you contribute to your needs.</em></h6>
                                                        <div align="right">
                                                            <input type="submit" onclick="location.href = 'help.php';" value="Send"> 
                                                        </div>
                                                    <br />
                                                    <br />
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