<!DOCTYPE html>
<html lang="en">
<head>
    <title>Course - Teachers</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Course Project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="styles/teachers_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/teachers_responsive.css">
</head>
<body>

<div class="super_container">
@extends('pc.home.header')




    <!-- Home -->

    <div class="home">
        <div class="home_background_container prlx_parent">
            <div class="home_background prlx" style="background-image:url(images/teachers_background.jpg)"></div>
        </div>
        <div class="home_content">
            <h1>Teachers</h1>
        </div>
    </div>

    <!-- Teachers -->

    <div class="teachers page_section">
        <div class="container">
            <div class="row">

                <!-- Teacher -->
                <div class="col-lg-4 teacher">
                    <div class="card">
                        @foreach($teachers as $item)
                        <div class="card_img">
                            <img class="card-img-top trans_200" src="{{$item->avatar}}" alt="https://unsplash.com/@michaeldam">
                        </div>
                        <div class="card-body text-center">
                            <div class="card-title"><a href="/teacher/detail/{{$item->id}}">{{$item->name}}</a></div>
                            <div class="card-text">{{$item->certificate}}</div>
                            <div class="teacher_social">
                                <ul class="menu_social">
                                    <li class="menu_social_item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                    <li class="menu_social_item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li class="menu_social_item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li class="menu_social_item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="menu_social_item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                            @endforeach
                    </div>
                </div>

    <!-- Milestones -->

    <div class="milestones">
        <div class="milestones_background" style="background-image:url(images/milestones_background.jpg)"></div>

        <div class="container">
            <div class="row">

                <!-- Milestone -->
                <div class="col-lg-3 milestone_col">
                    <div class="milestone text-center">
                        <div class="milestone_icon"><img src="images/milestone_1.svg" alt="https://www.flaticon.com/authors/zlatko-najdenovski"></div>
                        <div class="milestone_counter" data-end-value="750">0</div>
                        <div class="milestone_text">Current Students</div>
                    </div>
                </div>

                <!-- Milestone -->
                <div class="col-lg-3 milestone_col">
                    <div class="milestone text-center">
                        <div class="milestone_icon"><img src="images/milestone_2.svg" alt="https://www.flaticon.com/authors/zlatko-najdenovski"></div>
                        <div class="milestone_counter" data-end-value="120">0</div>
                        <div class="milestone_text">Certified Teachers</div>
                    </div>
                </div>

                <!-- Milestone -->
                <div class="col-lg-3 milestone_col">
                    <div class="milestone text-center">
                        <div class="milestone_icon"><img src="images/milestone_3.svg" alt="https://www.flaticon.com/authors/zlatko-najdenovski"></div>
                        <div class="milestone_counter" data-end-value="39">0</div>
                        <div class="milestone_text">Approved Courses</div>
                    </div>
                </div>

                <!-- Milestone -->
                <div class="col-lg-3 milestone_col">
                    <div class="milestone text-center">
                        <div class="milestone_icon"><img src="images/milestone_4.svg" alt="https://www.flaticon.com/authors/zlatko-najdenovski"></div>
                        <div class="milestone_counter" data-end-value="3500" data-sign-before="+">0</div>
                        <div class="milestone_text">Graduate Students</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Become -->

    <div class="become">
        <div class="container">
            <div class="row row-eq-height">

                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="become_title">
                        <h1>Become a teacher</h1>
                    </div>
                    <p class="become_text">In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum. Etiam eu purus nec eros varius luctus. Praesent finibus risus facilisis ultricies venenatis. Suspendisse fermentum sodales lacus, lacinia gravida elit dapibus sed. Cras in lectus elit. Maecenas tempus nunc vitae mi egestas venenatis. Aliquam rhoncus, purus in vehicula porttitor, lacus ante consequat purus, id elementum enim purus nec enim. In sed odio rhoncus, tristique ipsum id, pharetra neque.</p>
                    <div class="become_button text-center trans_200">
                        <a href="#">Read More</a>
                    </div>
                </div>

                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="become_image">
                        <img src="images/become.jpg" alt="">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer -->
                @extends('pc.home.footer')

</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/teachers_custom.js"></script>

</body>
</html>