<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

//include_once "../includes/fun.php";
include_once "./includes/header.php";


?>


    <main id="main" class="mt-5">

        <!-- ======= Courses Section ======= -->
        <section id="courses" class="courses">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Courses</h2>
                    <p>Course is a unit of teaching that typically lasts one academic term, is led by one or more instructors (teachers or professors), and has a fixed roster of students. A course usually covers an individual subject. Courses generally have
                        a fixed program of sessions every week during the term, called lessons or classes. Students may receive a grade and academic credit after completion of the course.</p>
                </div>

                <div class="row" data-aos="zoom-in" data-aos-delay="100">

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="course-item">
                            <img src="assets/img/course-1.jpg" class="img-fluid" alt="...">
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4>Scientific</h4>

                                </div>

                                <h3>Scientific Course</h3>
                                <p>Science course means a course in Science, Physics, Chemistry, Mathematics, Biology, Computer Science, Nursing, Geology, Electronics, Biotechnology, ,Microbiology</p>
                            </div>
                            <form action="./showActive.php" method="get">
                                <input type="scientific_courses" name="activity_type" value="scientific_courses" hidden>
                                <input type="submit" class="btn btn-primary btn-block ">
                            </form> 
                        </div>
                    </div>
                    <!-- End Course Item-->

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                        <div class="course-item">
                            <img src="assets/img/course-2.png" class="img-fluid" alt="...">
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4>Religious</h4>

                                </div>

                                <h3>Religious Course</h3>
                                <p>Religious studies, also known as the study of religion, is an academic field devoted to research into religious beliefs, behaviors, and institutions.</p>

                            </div>
                            <form action="./showActive.php" method="get">
                                <input type="religious_courses" name="activity_type" value="religious_courses" hidden>
                                <input type="submit" class="btn btn-primary btn-block ">
                            </form>
                        </div>
                    </div>
                    <!-- End Course Item-->

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                        <div class="course-item">
                             <img src="assets/img/course-3.jpg" class="img-fluid" alt="...">
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4>Artistic</h4>

                                </div>

                                <h3>Artistic Course</h3>
                                <p>Art classes typically focus on a specific art form and involve in-depth study of art theory, history, practice, or technique, among other art-related topics</p>

                            </div>
                            <form action="./showActive.php" method="get">
                                <input type="artistic_courses" name="activity_type" value="artistic_courses" hidden>
                                <input type="submit" class="btn btn-primary btn-block ">
                            </form>
                        </div>
                    </div>
                    <!-- End Course Item-->

                </div>

            </div>
        </section>
        <!-- End Courses Section -->
    </main>
    <!-- End #main -->
    <?php
        include_once "./includes/footer.php";
?>