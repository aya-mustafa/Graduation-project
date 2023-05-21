<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

//include_once "../includes/fun.php";
include_once "./includes/header.php";
include_once "./handler/handle_show_act.php";


?>


    <main id="main" class="mt-5">
    
        <!-- ======= Services Section ======= -->
        <section id="services" class="services services">
        <?php if(isset($_SESSION["error_enquird_act"])){?>
                <p id="reqInp" class=" bg-danger text-center text-white mb-0 p-3 "  >*<?php if(isset($_SESSION["error_enquird_act"])){ echo($_SESSION["error_enquird_act"]);} ?></p>
            <?php }?>
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Previous Inventions</h2>
                    
                    <p class="pb-5">An invention is a unique or novel device, method, composition or process. The invention process is a process within an overall engineering and product development process. It may be an improvement upon a machine or product or a new
                        process for creating an object or a result.</p>

                    <div class="row">
                        <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon"><i class="icofont-wheelchair"></i></div>
                            <h4 class="title"><p>THE WHEEL</p></h4>
                            <p class="description">Wheeled carts facilitated agriculture and commerce by enabling the transportation of goods to and from markets, as well as easing the burdens of people travelling great distances.</p>
                        </div>

                        <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
                            <div class="icon"><i class="icofont-telephone"></i></div>
                            <h4 class="title"><p>THE TELEPHONE</p></h4>
                            <p class="description">Bell’s inspiration for the telephone was influenced by his family. His father taught speech elocution and specialized in teaching the deaf speak, his mother - an accomplished musician - lost her hearing in later life and his
                                wife Mabel, who he married in 1877, had been deaf since the age of five, according to Evenson.</p>
                        </div>

                        <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
                            <div class="icon"><i class="icofont-tack-pin"></i></div>
                            <h4 class="title"><p>THE NAIL</p></h4>
                            <p class="description">Meanwhile, the invention of the screw - a stronger but harder-to-insert fastener - is usually ascribed to the Greek scholar Archimedes in the third century B.C.</p>
                        </div>

                        <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
                            <div class="icon"><i class="icofont-compass"></i></div>
                            <h4 class="title"><p href="">THE COMPASS</p></h4>
                            <p class="description">The compass enabled mariners to navigate safely far from land, opening up the world for exploration and the subsequent development of global trade. An instrument still widely used today, the compass has transformed our knowledge
                                and understanding of the Earth forever. </p>
                        </div>

                        <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
                            <div class="icon"><i class="icofont-light-bulb"></i></div>
                            <h4 class="title"><p>THE LIGHT BULB</p></h4>
                            <p class="description">The invention of the light bulb transformed our world by removing our dependence on natural light, allowing us to be productive at any time, day or night. Thomas Edison is credited as the primary inventor because he created
                                a completely functional lighting system, including a generator and wiring as well as a carbon-filament bulb like the one above, in 1879.</p>
                        </div>

                        <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
                            <div class="icon"><i class="icofont-network-tower"></i></div>
                            <h4 class="title"><p>THE INTERNET</p></h4>
                            <p class="description">The internet is a global system of interconnected computer networks that is used by billions of people worldwide. In the 1960s, a team of computer scientists working for the U.S. Defense Department's ARPA (Advanced Research
                                Projects Agency) built a communications network to connect the computers in the agency, called ARPANET, the predecessor of the internet.</p>
                        </div>

                    </div>

                </div>
        </section>
        <!-- End Services Section -->

        <section class="container mt-0">
            <h1 class="text-center">Invention competitions</h1>
            <div class="row  justify-content-around">
            <?php 
                   $act_result= show_act("inventions");
                    while($row=$act_result->fetch_assoc())
                {
                
                ?>
            <!-- card  -->
                <div class="card col-lg-3  col-md-5 col-10 my-3 mx-1">
                    <div class="card-body ">
                        <h2 class="card-title text-primary text-center"><?php echo $row["title"]; ?></h5>
                        <div class="row justify-content-between">
                            <p class="text-success "><?php echo $row["start_date"]; ?></p>
                            <p class="text-success">running</p>
                        </div>
                        <div class=" text-danger mb-2"><?php echo $row["location"]; ?></div>
                        <p class="card-text text-justify"><?php echo $row["activity_desc"]; ?></p>

                    </div>

                    <button id="<?php echo $row["id"]; ?>" onclick="act_id=this.id;showModelForEnquir();" class="btn btn-primary btn-block">Enquir</button>
                    

                </div>
                <!-- card  -->
   <?php }?>


            </div>
        </section>

               <!--form to get my lost  -->
        
               <div class=" bg-dark w-100 h-100 " id="model_for_enquir" style="z-index:1000000;display: none;position: fixed;top: 0;left: 0; bottom: 0; right: 0; background-color: rgba(0, 0, 0, 0.089);">
            <div class="colse m-4 " onclick="hideModelForEnquir();" style=" font-weight: bold;color: rgb(253, 0, 0); height: 50px; width: 50px; position: fixed; top: 0; right: 0; cursor: pointer; ">Close</div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8 col-12   ">
                        <div id="found_loss" class="mt-5 overflow-auto">
                            <h1 class="text-center text-white"> fill all Data </h1>
                            <form action="./handler/handle_enquir.php" method="POST">
                                <p class="text-danger text-center bg-white p-5 " style="font-size:24px ; font-weight: bold;">You will enquir to this invention if you click Enquir</p>
                                <input id="input_act_type" type="text" hidden value="inventions"  name="act_type">
                                <input id="input_act_id" type="text" hidden  name="act_id">
                           
                                <p id="incorrect"></p>

                                <button class="btn btn-outline-info w-100 mx-0">Enquir</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!--form to get my lost  -->
    </main>
    <!-- End #main -->

    <?php
        include_once "./includes/footer.php";
        if(isset($_SESSION["error_enquird_act"])) {unset($_SESSION["error_enquird_act"]);}

?>