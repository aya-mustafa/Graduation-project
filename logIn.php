<?php
ini_set('display_errors', true);
error_reporting(E_ALL);
include_once "./handler/fun.php";
//include_once "../includes/fun.php";
include_once "./includes/header.php";
include_once "./classes/fillData.php";
ifLoggedIn();

$x= new HandleData;

?>


    <main id="main" class="signin ">

        <span class="d-none" id="username"></span>

        <div class="container">
            <div class=" w-75  my-5 mx-auto py-3">
                <h1 class="text-center text-info pt-3">Smart Login System</h1>
                <form action="./handler/handle_log_in.php" method="POST">
                    <input id="email" type="text" name="email" value="<?php $x->reFillInputValue("email"); ?>" class="form-control w-100 my-4 mx-auto" placeholder="Enter Your Email">
                    <input id="password" type="password"  name="password" class="form-control w-100 my-4 mx-auto" placeholder="Enter Your Password">
                    <?php if(isset($_SESSION["error_log_in"])){?>
                    <p id="reqInp" class=" bg-danger text-white p-3" >*<?php if(isset($_SESSION["error_log_in"])){ echo($_SESSION["error_log_in"]);} ?></p>
<?php }?>

                    <button class="btn btn-outline-info w-100">Log in</button>
                </form>
                <p class="text-white text-center my-2 py-2">Don’t have an account?
                    <a href="signUp.php" class="text-white">Sign Up</a>
                </p>
            </div>
        </div>

    </main>
    <!-- End #main -->
    <?php
        unset($_SESSION["error_log_in"]);
        if(isset($_SESSION["email"])) {unset($_SESSION["email"]);}

        include_once "./includes/footer.php";
?>