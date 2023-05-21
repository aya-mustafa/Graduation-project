<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

include_once "./handler/fun.php";
include_once "./includes/header.php";
include_once "./handler/handle_profile.php";

ifNotLoggedIn();
print_r($_SESSION);


?>


    <main id="main" class="mt-3">
    
    <!--///////////////// Start your project here///////////////-->
    <section class="w-100 my-3">
        <?php if(isset($_SESSION["act_enquired"])){?>
            <p id="reqInp" class=" bg-danger text-center text-white mb-0 p-3 "  >*<?php if(isset($_SESSION["act_enquired"])){ echo($_SESSION["act_enquired"]);} ?></p>
        <?php }?>
        <?php if(isset($_SESSION["del_enquired"])){?>
            <p id="reqInp" class=" bg-danger text-center text-white mb-0 p-3 "  >*<?php if(isset($_SESSION["del_enquired"])){ echo($_SESSION["del_enquired"]);} ?></p>
        <?php }?>
        <section class="profil_pic container">
            <div class="row justify-content-around">
                <img src="./assets/img/person.png" alt="id" class="col-lg-3 col-md-5 col-8 bx-border-circle position-relative">
                <p id="showMassages" class="position-absolute text-white border-1 font-weight-bold px-3 bx-border-circle " style="background-color: red;font-size: 25px; "><?php print($result->num_rows); ?></p>
            </div>
        </section>

        


        <div class="text-center justify-content-center" style="font-size:39px; font-weight:bold ; ">My Info</div>

        <section class="my-5 bg-gray profil_info " style="color:gray ;">
            <table class="table mx-2 w-75 ">

                <tbody class="">
                    <tr>
                        <th>Name</th>
                        <td><?php print($row["user_name"]); ?></td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td><?php print($row["user_phone"]); ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php print($row["user_email"]); ?></td>
                    </tr>

                </tbody>
            </table>


        </section>


        <section class="container ">
            <h1 class="text-center text-primary "><span class="border-bottom">My Activities</span> </h1>
            <div class="row justify-content-around ">
            <?php  
                if(!empty($all_data_to_show_massages)){
                    for($x = 0; $x < count($all_data_to_show_massages["act_ids"]); $x++)
            { ?>
                        <!-- card  -->
                        <div class="card col-lg-3 col-md-5 col-10 my-3 mx-1 ">
                            <div class="card-body ">
                                <h2 class="card-title text-center "><?php echo $all_data_to_show_massages1['title'][$x] ?> </h2>
                                <p class="card-text text-center " style="font-size:20px ; "><?php echo $all_data_to_show_massages1['activity_desc'][$x] ?></p>
                                <div class="row justify-content-between ">
                                    <form action="./handler/handle_Delete_enquir.php" class="w-100">
                                        <input type="text" name="act_id" value="<?php echo $all_data_to_show_massages['act_ids'][$x] ?>" hidden>
                                        <input type="text" name="act_type" value="<?php echo $all_data_to_show_massages['act_types'][$x] ?>" hidden>
                                        <button type="submit"  class="btn btn-danger btn-block ml-2">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- card  -->
                <?php }}?>
              </div>
        </section>

        <section class=" row justify-content-center pt-0 mt-5  massages " >
            <h1 class="text-center text-primary "><span class="border-bottom">Massages</span> </h1>

            <table class="table mx-4">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Date</th>
                        <th scope="col">Statue</th>
                        <th scope="col">location</th>
                        <th scope="col">Massage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                     if(!empty($all_data_to_show_massages)){
                    
                        for($x = 0; $x < count($all_data_to_show_massages["act_ids"]); $x++)
                        { ?>
                            <tr>
                                <th scope="row"><?php echo $x?></th>
                                <td><?php echo $all_data_to_show_massages1["title"][$x] ?></td>
                                <td><?php echo $all_data_to_show_massages1['start_date'][$x] ?></td>
                                <td class="text-success"><?php if($all_data_to_show_massages1['act_stat'][$x]==1){echo "Accepted";} else{echo "unaccepted";} ?></td>
                                <td class=""><?php echo $all_data_to_show_massages1['location'][$x] ?></td>
                                <td><?php echo $all_data_to_show_massages['massages'][$x] ?>
                            </tr>
                    <?php }}?>
                </tbody>
            </table>


        </section>

    </section>

    
</main>
<!-- End #main -->
<?php
        include_once "./includes/footer.php";
       if(isset($_SESSION["act_enquired"])) {unset($_SESSION["act_enquired"]);}
       if(isset($_SESSION["del_enquired"])) {unset($_SESSION["del_enquired"]);}
        
?>