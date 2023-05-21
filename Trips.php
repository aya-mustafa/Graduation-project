<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

//include_once "../includes/fun.php";
include_once "./includes/header.php";


?>


    <main id="main" class="mt-5">

        <!-- ======= Services Section ======= -->
        <section id="services" class="services services">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Trips</h2>
                    <p>A Trips is something suggesting travel or passage from one place to another the journey from youth to maturity a journey through time. 2 : an act or instance of traveling from one place to another </p>
                </div>

                <div class="row">

                    <div class="col-lg-6 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon"><i class="icofont-travelling"></i></div>
                        <h4 class="title"><p>Trips</p></h4>
                        <p class="description">Travel is the movement of people between distant geographical locations. Travel can be done by foot, bicycle, automobile, train, boat, bus, airplane, ship or other means, with or without luggage, and can be one way or round trip.
                            Travel can also include relatively short stays between successive movements, as in the case of tourism.</p>
                        <form action="./showActive.php" method="get">
                            <input type="trips" name="activity_type" value="trips" hidden>
                            <input type="submit" value="Show " class="btn btn-primary btn-block ">
                        </form>
                    </div>

                    <div class="col-lg-6 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
                        <div class="icon"><i class="icofont-airplane-alt"></i></div>
                        <h4 class="title"><p>Camps</p></h4>
                        <p class="description">a place usually away from urban areas where tents or simple buildings (such as cabins) are erected for shelter or for temporary residence (as for laborers, prisoners, or vacationers) migrant labor camp. b : a group of tents, cabins,
                            or huts fishing camps along the river. <br><br></p>
                        <form action="./showActive.php" method="get">
                            <input type="camps" name="activity_type" value="camps" hidden>
                            <input type="submit" value="Show " class="btn btn-primary btn-block ">
                        </form>
                    </div>

                </div>

            </div>
        </section>
        <!-- End Services Section -->

    </main>
    <!-- End #main -->
    <?php
        include_once "./includes/footer.php";
?>