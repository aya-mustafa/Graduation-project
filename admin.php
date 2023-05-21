<?php
    ini_set('display_errors', true);
    error_reporting(E_ALL);


    include_once "./handler/fun.php";
    include_once "./includes/header.php";
    include_once "./handler/handle_show_act.php";
    ifNotAdmin();
    include_once "./classes/fillData.php";
    $x= new HandleData;
?>

<div class="admin " style="margin-top: 100px;">
    <h1 class="mt-5 text-danger text-center"><span  class=" border-bottom border-danger px-3">Admin</span> </h1>
</div>
<?php if(isset($_SESSION["act_added"])){?>
                <p id="reqInp" class=" bg-danger text-center text-white mb-0 p-3 "  >*<?php if(isset($_SESSION["act_added"])){ echo($_SESSION["act_added"]);} ?></p>
            <?php }?>
<?php if(isset($_SESSION["act_deleted"])){?>
                <p id="reqInp" class=" bg-danger text-center text-white mb-0 p-3 "  >*<?php if(isset($_SESSION["act_deleted"])){ echo($_SESSION["act_deleted"]);} ?></p>
            <?php }?>
<section class="add_activites py-2">
    <h1 class="text-primary text-center">Add activites</h1>
    <div class="add_form container">
        <form action="./handler/handle_add_act.php" method="POST">
            <input class="btn-block mb-2" type="number" maxlength="10"  name="act_id" value="<?php echo (rand(1,2147483647)); ?>">
            <select class="form-select btn-block mb-2" aria-label="Default select example" name="act_type">
                <option value="competitions" >competitions</option>
                <option value="research">research</option>
                <option value="sports">sports</option>
                <option value="theater">theater</option>
                <option value="camps">camps </option>
                <option value="trips">trips </option>
                <option value="religious_courses">religious courses</option>
                <option value="artistic_courses">artistic courses</option>
                <option value="scientific_courses">scientific courses</option>
                <option value="inventions">inventions</option>
                
            </select>
            <input class="btn-block mb-2" type="text" value="<?php $x->reFillInputValue("title");?>" name="title" placeholder="enter the title">
            <input class="btn-block mb-2" type="date" value="<?php $x->reFillInputValue("act_date");?>" name="act_date">
            <input class="btn-block mb-2" type="text" value="<?php $x->reFillInputValue("location");?>" name="location" placeholder="type a location for this activity" >
            <textarea id="" cols="20" rows="4" value="<?php $x->reFillInputValue("act_disc");?>" name="act_disc" class="btn-block mb-2" placeholder="Type a description for the Activite"></textarea>
            <?php if(isset($_SESSION["error_add_act"])){?>
                <p id="reqInp" class=" bg-danger text-white p-3" >*<?php if(isset($_SESSION["error_add_act"])){ echo($_SESSION["error_add_act"]);} ?></p>
            <?php }?>
           
            <input class=" btn btn-success btn-block mb-2" type="submit" value="add">

        </form>
    </div>
</section>

            

<section class="delet_activites pt-0">
    <h1 class="text-primary text-center">delete activites</h1>
    <div class="del_form container">
        <form action="./handler/handle_delete_act.php" method="post">

            <select class="form-select btn-block mb-2" aria-label="Default select example" name="act_type">
                <option value="competitions" >competitions</option>
                <option value="research">research</option>
                <option value="sports">sports</option>
                <option value="theater">theater</option>
                <option value="camps">camps </option>
                <option value="trips">trips </option>
                <option value="religious_courses">religious courses</option>
                <option value="artistic_courses">artistic courses</option>
                <option value="scientific_courses">scientific courses</option>
                <option value="inventions">inventions</option>
                
            </select>
            <input class="btn-block mb-2" type="number" maxlength="15" name="act_id" placeholder="type the activity id you want delet">
            <?php if(isset($_SESSION["error_del_act"])){?>
                <p id="reqInp" class=" bg-danger text-white p-3" >*<?php if(isset($_SESSION["error_del_act"])){ echo($_SESSION["error_del_act"]);} ?></p>
            <?php }?>
            <input class=" btn btn-success btn-block mb-2" type="submit">

        </form>
    </div>
</section>

<section class=" row justify-content-center pt-0 mt-2  compitation " >
        <h1 class="text-center text-primary "><span class="border-bottom">compitation</span> </h1>

        <table class="table mx-4">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Date</th>
                    <th scope="col">Statue</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                   $act_result= show_act("competitions");
                    while($row=$act_result->fetch_assoc())
                {
                
                ?>
                    <tr>
                        <th scope="row"><?php echo $row["id"]; ?></th>
                        <td><?php echo $row["title"]; ?></td>
                        <td><?php echo $row["start_date"]; ?></td>
                        <td class="text-success">Running</td>
                    </tr>
                <?php }?>
            </tbody>
        </table>


</section>

<section class=" row justify-content-center pt-0 mt-2  scientific_courses " >
        <h1 class="text-center text-primary "><span class="border-bottom">scientific_courses</span> </h1>

        <table class="table mx-4">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Date</th>
                    <th scope="col">Statue</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                   $act_result= show_act("scientific_courses");
                    while($row=$act_result->fetch_assoc())
                {
                
                ?>
                    <tr>
                        <th scope="row"><?php echo $row["id"]; ?></th>
                        <td><?php echo $row["title"]; ?></td>
                        <td><?php echo $row["start_date"]; ?></td>
                        <td class="text-success">Running</td>
                    </tr>
                <?php }?>

            </tbody>
        </table>


</section>

<section class=" row justify-content-center pt-0 mt-2  religious_courses " >
        <h1 class="text-center text-primary "><span class="border-bottom">religious_courses</span> </h1>

        <table class="table mx-4">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Date</th>
                    <th scope="col">Statue</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                   $act_result= show_act("religious_courses");
                    while($row=$act_result->fetch_assoc())
                {
                
                ?>
                    <tr>
                        <th scope="row"><?php echo $row["id"]; ?></th>
                        <td><?php echo $row["title"]; ?></td>
                        <td><?php echo $row["start_date"]; ?></td>
                        <td class="text-success">Running</td>
                    </tr>
                <?php }?>

            </tbody>
        </table>


</section>

<section class=" row justify-content-center pt-0 mt-2  artistic_courses " >
        <h1 class="text-center text-primary "><span class="border-bottom">artistic_courses</span> </h1>

        <table class="table mx-4">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Date</th>
                    <th scope="col">Statue</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                   $act_result= show_act("artistic_courses");
                    while($row=$act_result->fetch_assoc())
                {
                
                ?>
                    <tr>
                        <th scope="row"><?php echo $row["id"]; ?></th>
                        <td><?php echo $row["title"]; ?></td>
                        <td><?php echo $row["start_date"]; ?></td>
                        <td class="text-success">Running</td>
                    </tr>
                <?php }?>

            </tbody>
        </table>


</section>

<section class=" row justify-content-center pt-0 mt-2  research " >
        <h1 class="text-center text-primary "><span class="border-bottom">research</span> </h1>

        <table class="table mx-4">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Date</th>
                    <th scope="col">Statue</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                   $act_result= show_act("research");
                    while($row=$act_result->fetch_assoc())
                {
                
                ?>
                    <tr>
                        <th scope="row"><?php echo $row["id"]; ?></th>
                        <td><?php echo $row["title"]; ?></td>
                        <td><?php echo $row["start_date"]; ?></td>
                        <td class="text-success">Running</td>
                    </tr>
                <?php }?>


            </tbody>
        </table>


</section>

<section class=" row justify-content-center pt-0 mt-2  sports " >
        <h1 class="text-center text-primary "><span class="border-bottom">sports</span> </h1>

        <table class="table mx-4">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Date</th>
                    <th scope="col">Statue</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                   $act_result= show_act("sports");
                    while($row=$act_result->fetch_assoc())
                {
                
                ?>
                    <tr>
                        <th scope="row"><?php echo $row["id"]; ?></th>
                        <td><?php echo $row["title"]; ?></td>
                        <td><?php echo $row["start_date"]; ?></td>
                        <td class="text-success">Running</td>
                    </tr>
                <?php }?>


            </tbody>
        </table>


</section>

<section class=" row justify-content-center pt-0 mt-2  theater " >
        <h1 class="text-center text-primary "><span class="border-bottom">theater</span> </h1>

        <table class="table mx-4">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Date</th>
                    <th scope="col">Statue</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                   $act_result= show_act("theater");
                    while($row=$act_result->fetch_assoc())
                {
                
                ?>
                    <tr>
                        <th scope="row"><?php echo $row["id"]; ?></th>
                        <td><?php echo $row["title"]; ?></td>
                        <td><?php echo $row["start_date"]; ?></td>
                        <td class="text-success">Running</td>
                    </tr>
                <?php }?>

            </tbody>
        </table>


</section>

<section class=" row justify-content-center pt-0 mt-2  camps " >
        <h1 class="text-center text-primary "><span class="border-bottom">camps</span> </h1>

        <table class="table mx-4">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Date</th>
                    <th scope="col">Statue</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                   $act_result= show_act("camps");
                    while($row=$act_result->fetch_assoc())
                {
                
                ?>
                    <tr>
                        <th scope="row"><?php echo $row["id"]; ?></th>
                        <td><?php echo $row["title"]; ?></td>
                        <td><?php echo $row["start_date"]; ?></td>
                        <td class="text-success">Running</td>
                    </tr>
                <?php }?>

            </tbody>
        </table>


</section>

<section class=" row justify-content-center pt-0 mt-2  trips " >
        <h1 class="text-center text-primary "><span class="border-bottom">trips</span> </h1>

        <table class="table mx-4">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Date</th>
                    <th scope="col">Statue</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                   $act_result= show_act("trips");
                    while($row=$act_result->fetch_assoc())
                {
                
                ?>
                    <tr>
                        <th scope="row"><?php echo $row["id"]; ?></th>
                        <td><?php echo $row["title"]; ?></td>
                        <td><?php echo $row["start_date"]; ?></td>
                        <td class="text-success">Running</td>
                    </tr>
                <?php }?>

            </tbody>
        </table>


</section>

<section class=" row justify-content-center pt-0 mt-2  inventions " >
        <h1 class="text-center text-primary "><span class="border-bottom">inventions</span> </h1>

        <table class="table mx-4">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Date</th>
                    <th scope="col">Statue</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                   $act_result= show_act("inventions");
                    while($row=$act_result->fetch_assoc())
                {
                
                ?>
                    <tr>
                        <th scope="row"><?php echo $row["id"]; ?></th>
                        <td><?php echo $row["title"]; ?></td>
                        <td><?php echo $row["start_date"]; ?></td>
                        <td class="text-success">Running</td>
                    </tr>
                <?php }?>

            </tbody>
        </table>


</section>


<?php
        include_once "./includes/footer.php";
        
        if(isset($_SESSION["error_add_act"])) {unset($_SESSION["error_add_act"]);}
        if(isset($_SESSION["error_del_act"])) {unset($_SESSION["error_del_act"]);}
        if(isset($_SESSION["act_deleted"])) {unset($_SESSION["act_deleted"]);}
        if(isset($_SESSION["act_added"])) {unset($_SESSION["act_added"]);}
        if(isset($_SESSION["title"])) {unset($_SESSION["title"]);}
        if(isset($_SESSION["act_date"])) {unset($_SESSION["act_date"]);}
        if(isset($_SESSION["location"])) {unset($_SESSION["location"]);}
        if(isset($_SESSION["act_disc"])) {unset($_SESSION["act_disc"]);}


?>