<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Course Project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>

<div class="super_container">

    <!-- Header -->

@extends('pc.home.header')

    <!-- Home -->

    <div class="home">

        <!-- Hero Slider -->
        <div class="hero_slider_container">
            <div class="hero_slider owl-carousel">

                <!-- Hero Slide -->
                <div class="hero_slide">
                    <div class="hero_slide_background" style="background-image:url(/images/news_1.jpg)"></div>
                    <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                        <div class="hero_slide_content text-center">
                            <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Get your <span>Education</span> today!</h1>
                        </div>
                    </div>
                </div>

                <!-- Hero Slide -->
                <div class="hero_slide">
                    <div class="hero_slide_background" style="background-image:url(/images/news_1.jpg)"></div>
                    <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                        <div class="hero_slide_content text-center">
                            <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Get your <span>Education</span> today!</h1>
                        </div>
                    </div>
                </div>

                <!-- Hero Slide -->
                <div class="hero_slide">
                    <div class="hero_slide_background" style="background-image:url(/images/news_2.jpg)"></div>
                    <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                        <div class="hero_slide_content text-center">
                            <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Get your <span>Education</span> today!</h1>
                        </div>
                    </div>
                </div>

            </div>

            <div class="hero_slider_left hero_slider_nav trans_200"><span class="trans_200">prev</span></div>
            <div class="hero_slider_right hero_slider_nav trans_200"><span class="trans_200">next</span></div>
        </div>

    </div>

    <div class="hero_boxes">
        <div class="hero_boxes_inner">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 hero_box_col">
                        <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                            <img src="images/earth-globe.svg" class="svg" alt="">
                            <div class="hero_box_content">
                                <h2 class="hero_box_title">Online Courses</h2>
                                <a href="/course" class="hero_box_link">view more</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 hero_box_col">
                        <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                            <img src="images/books.svg" class="svg" alt="">
                            <div class="hero_box_content">
                                <h2 class="hero_box_title">Our Library</h2>
                                <a href="/course" class="hero_box_link">view more</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 hero_box_col">
                        <div class="hero_box d-flex flex-row align-items-center justify-content-start">
                            <img src="images/professor.svg" class="svg" alt="">
                            <div class="hero_box_content">
                                <h2 class="hero_box_title">Our Teachers</h2>
                                <a href="/teacher" class="hero_box_link">view more</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Popular -->

    <div class="popular page_section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title text-center">
                        <h1>Popular Courses</h1>
                    </div>
                </div>
            </div>

            <div class="row course_boxes">

                <!-- Popular Course Item -->
            @foreach($course as $item)
                <!-- Popular Course Item -->
                    <div class="col-lg-4 course_box">
                        <div class="card">

                            <img class="card-img-top" src="{{$item->image}}" alt="https://unsplash.com/@kellybrito">
                            <div class="card-body text-center">
                                <div class="card-title" style="font-size: 22px; font-weight: 500; color: #1a1a1a; line-height: 1.2">
                                    <a href="/course/detail/{{$item->id}}" class="hero_box_link">{{$item->titlle}}</a>
                                </div>
                                <div class="card-text">{{$item->introduce}}</div>

                            </div>
                            <div class="price_box d-flex flex-row align-items-center">
                                <div class="course_author_image">
                                    <img src="{{$item->image_teacher}}" alt="https://unsplash.com/@mehdizadeh" style="width: 50px">

                                </div>
                                <div class="course_author_name">
                                    {{$item->name}}<span>, Teacher</span>
                                </div>

                                <div class="course_price d-flex flex-column align-items-center justify-content-center"><span>{{$item->price}}$</span></div>
                            </div>


                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <!-- Services -->

    <div class="services page_section">

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title text-center">
                        <h1>Our Services</h1>
                    </div>
                </div>
            </div>

            <div class="row services_row">

                <div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
                    <div class="icon_container d-flex flex-column justify-content-end">
                        <img src="images/earth-globe.svg" alt="">
                    </div>
                    <h3>Online Courses</h3>
                    <p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
                </div>

                <div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
                    <div class="icon_container d-flex flex-column justify-content-end">
                        <img src="images/exam.svg" alt="">
                    </div>
                    <h3>Indoor Courses</h3>
                    <p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
                </div>

                <div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
                    <div class="icon_container d-flex flex-column justify-content-end">
                        <img src="images/books.svg" alt="">
                    </div>
                    <h3>Amazing Library</h3>
                    <p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
                </div>

                <div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
                    <div class="icon_container d-flex flex-column justify-content-end">
                        <img src="images/professor.svg" alt="">
                    </div>
                    <h3>Exceptional Professors</h3>
                    <p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
                </div>

                <div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
                    <div class="icon_container d-flex flex-column justify-content-end">
                        <img src="images/blackboard.svg" alt="">
                    </div>
                    <h3>Top Programs</h3>
                    <p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
                </div>

                <div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
                    <div class="icon_container d-flex flex-column justify-content-end">
                        <img src="images/mortarboard.svg" alt="">
                    </div>
                    <h3>Graduate Diploma</h3>
                    <p>In aliquam, augue a gravida rutrum, ante nisl fermentum nulla, vitae tempor nisl ligula vel nunc. Proin quis mi malesuada, finibus tortor fermentum.</p>
                </div>

            </div>
        </div>
    </div>

    <!-- Testimonials -->

    {{----}}


@extends('pc.home.footer')
    <!-- Footer -->



</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>

</body>
</html>