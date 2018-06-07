<!DOCTYPE html>
<html lang="en">
<head>
    <title>Course - Courses</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Course Project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="styles/courses_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/courses_responsive.css">
    <style>
        .home_content {
            bottom: 50%;
            margin-bottom: -43px;
        }
        .home_content h1 {
            padding: 5px 20px;
            font-size: 45px;
            text-transform: uppercase;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="super_container">

    <!-- Header -->

@extends('pc.home.header')



    <!-- Home -->

    <div class="home">
        <div class="home_background_container prlx_parent">
            <div class="home_background prlx" style="background-image:url(images/courses_background.jpg)"></div>
        </div>
        <div class="home_content">
            <h1>Courses</h1>
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
            @foreach($course as $item)
                <!-- Popular Course Item -->
                <div class="col-lg-4 course_box">
                    <div class="card">

                                <img class="card-img-top" src="{{$item->image}}" alt="https://unsplash.com/@kellybrito">
                                <div class="card-body text-center">
                                    <div class="card-title" style="font-size: 22px; font-weight: 500; color: #1a1a1a; line-height: 1.2">
                                             <a href="/course/detail/{{$item->id}}">{{$item->titlle}}</a>
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

    <!-- Footer -->



</div>
        </div>
    </div>

    @extends('pc.home.footer')

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
<script src="js/courses_custom.js"></script>

</body>
</html>