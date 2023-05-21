<?php
ini_set('display_errors', true);
error_reporting(E_ALL);
session_start();
include_once "./handler/fun.php";
//include_once "../includes/fun.php";
include_once "./includes/header.php";
include_once "./classes/fillData.php";
ifLoggedIn();

$x= new HandleData;

?>

    <main id="main" class="signin">

        <span class="d-none" id="username"></span>

        <div class="container">
            <div class=" w-75  my-5 mx-auto py-3">
                <h1 class="text-center text-info pt-3">Smart Register System</h1>
                <form action="./handler/handle_sign_up.php" method="POST">
                    <input id="userName" name="all_name" value="<?php $x->reFillInputValue("all_name"); ?>" type="text" class="form-control w-100 my-4 mx-auto" placeholder="Enter Your Name">
                    <input id="email" name="email" value="<?php $x->reFillInputValue("email"); ?>" type="text" class="form-control w-100 my-4 mx-auto" placeholder="Enter Your Email">
                    <input id="phone_number" value="<?php $x->reFillInputValue("phone_number"); ?>" name="phone_number" type="text" class="form-control w-100 my-4 mx-auto" placeholder="Enter Your phone">
                    <input id="first_password" value="<?php $x->reFillInputValue("first_password"); ?>" name="first_password" type="password" class="form-control w-100 my-4 mx-auto" placeholder="Enter Your Password">
                    <input id="second_password" value="<?php $x->reFillInputValue("second_password"); ?>" name="second_password" type="password" class="form-control w-100 my-4 mx-auto" placeholder="Re-Enter Your Password">
                    <input id="admin_key" name="admin_key"  value="<?php $x->reFillInputValue("second_password"); ?>" type="text" class="form-control w-100 my-4 mx-auto" placeholder="admin key(if you have it from the universtiy)">
                    <?php if(isset($_SESSION["error_sign_up"])){?>
                    <p id="reqInp" class=" bg-danger text-white p-3" >*<?php if(isset($_SESSION["error_sign_up"])){ echo($_SESSION["error_sign_up"]);} ?></p>
<?php }?>
                    <button class="btn btn-outline-info w-100" type="submit">Sign Up</button>
                </form>
                <p class="text-white text-center my-2 py-2 ">You have an account?
                    <a href="./logIn.php " class="text-white ">Signin</a>
                </p>
            </div>
        </div>

    </main>
    <!-- End #main -->
    <?php
        include_once "./includes/footer.php";
       if(isset($_SESSION["error_sign_up"])) {unset($_SESSION["error_sign_up"]);}
       if(isset($_SESSION["all_name"])) {unset($_SESSION["all_name"]);}
       if(isset($_SESSION["email"])) {unset($_SESSION["email"]);}
       if(isset($_SESSION["phone_number"])) {unset($_SESSION["phone_number"]);}
       if(isset($_SESSION["first_password"])) {unset($_SESSION["first_password"]);}
       if(isset($_SESSION["second_password"])) {unset($_SESSION["second_password"]);}
       if(isset($_SESSION["admin_key"])) {unset($_SESSION["admin_key"]);}
?>