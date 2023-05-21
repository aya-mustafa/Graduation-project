<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

//include_once "../includes/fun.php";
include_once "./includes/header.php";
include_once "./handler/handle_show_all_act.php";
if( !isset($_GET["activity_type"]))
{
    header("location: ./profile.php");

}
?>



    <main id="main"  class="mt-5">

        <section class="container">
        <h1 id="act_type" class="text-center text-danger mt-4"><?php if(isset($_SESSION["act_type"])){ echo($_SESSION["act_type"]);} ?></h1>

            <div class="row  justify-content-around">
            <?php while( $row=$act_result->fetch_assoc()){ ?>



                <!-- card  -->
                <div class="card col-lg-3  col-md-5 col-10 my-3 mx-1">
                    <div class="card-body ">
                        <h4 class="card-title text-primary text-center"><?php echo $row["title"]; ?></h4>
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
    </main>


</script>
           <!--form to get my lost  -->
        
           <div class=" bg-dark w-100 h-100 " id="model_for_enquir" style="z-index:1000000;display: none;position: fixed;top: 0;left: 0; bottom: 0; right: 0; background-color: rgba(0, 0, 0, 0.089);">
            <div class="colse m-4 " onclick="hideModelForEnquir();" style=" font-weight: bold;color: rgb(253, 0, 0); height: 50px; width: 50px; position: fixed; top: 0; right: 0; cursor: pointer; ">Close</div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8 col-12   ">
                        <div id="found_loss" class="mt-5 overflow-auto">
                            <h1 class="text-center text-white"> fill all Data </h1>
                            <form action="./handler/handle_enquir_all.php" method="POST">
                                <p class="text-danger text-center bg-white p-5 " style="font-size:24px ; font-weight: bold;">You will enquir to this <?php if(isset($_SESSION["act_type"])){ echo($_SESSION["act_type"]);} ?> if you click Enquir</p>
                                <input id="input_act_type" type="text" hidden  name="act_type">
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



    <!-- End #main -->
    <?php
        include_once "./includes/footer.php";
        


    ?>