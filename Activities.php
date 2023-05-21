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
                    <h2>Activities</h2>
                    <p>
                        An activity is something you do, or just the state of doing. You might plan some indoor activities for a rainy day, or you might just rely on watching your gerbils' activity in their cage. Usually, when you use an article like an or the in front of activity,
                        you are referring to a specific event.</p>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon"><i class="icofont-racing-flag-alt"></i></div>
                        <h4 class="title"></p>Competitions</p></h4>
                        <p class="description">is a rivalry where two or more parties strive for a common goal which cannot be shared: where one's gain is the other's loss (an example of which is a zero-sum game)</p>
                        <form action="./showActive.php" method="get">
                            <input type="competitions" name="activity_type" value="competitions" hidden>
                            <input type="submit" value="Show " class="btn btn-primary btn-block ">
                        </form>
                    </div>
                    <div class="col-lg-6 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
                        <div class="icon"><i class="icofont-operation-theater"></i></div>
                        <h4 class="title"></p>Theater</p></h4>
                        <p class="description">is a collaborative form of performing art that uses live performers, usually actors or actresses, to present the experience of a real or imagined event before a live audience in a specific place, often a stage.</p>
                        <form action="./showActive.php" method="get">
                            <input type="theater" name="activity_type" value="theater" hidden>
                            <input type="submit" value="Show " class="btn btn-primary btn-block ">
                        </form>
                    </div>
                    <div class="col-lg-6 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
                        <div class="icon"><i class="icofont-search-document"></i></div>
                        <h4 class="title"></p>Research</p></h4>
                        <p class="description">
                            Research is defined as the creation of new knowledge and/or the use of existing knowledge in a new and creative way so as to generate new concepts, methodologies and understandings</p>
                            <form action="./showActive.php" method="get">
                                <input type="research" name="activity_type" value="research" hidden>
                                <input type="submit" value="Show " class="btn btn-primary btn-block ">
                            </form>
                    </div>
                    <div class="col-lg-6 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon"><i class="icofont-result-sport"></i></div>
                        <h4 class="title"></p>Sports</p></h4>
                        <p class="description">an athletic activity requiring skill or physical prowess and often of a competitive nature, as racing, baseball, tennis, golf, bowling, wrestling, boxing, hunting, fishing, etc. a particular form of this, especially in the out
                            of doors.</p>
                            <form action="./showActive.php" method="get">
                                <input type="sports" name="activity_type" value="sports" hidden>
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