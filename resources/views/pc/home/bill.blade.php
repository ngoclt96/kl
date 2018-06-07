<!DOCTYPE html>
<html lang="en">
<head>
    <title>Course - News Post</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Course Project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/styles/bootstrap4/bootstrap.min.css">
    <link href="/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/styles/news_post_styles.css">
    <link rel="stylesheet" type="text/css" href="/styles/news_post_responsive.css">
    <style>
        .news_post_date {
            width: auto;
            height: auto;
            padding: 15px;
        }
    </style>
</head>
<body>

<div class="super_container">

    <!-- Header -->
@extends('pc.home.header')
<!-- Home -->

    <!-- News -->

    <div class="news">
        <div class="container">
            <div class="row">

                <!-- News Post Column -->

                <div class="col-lg-8">


                        <div >
                            <div class="comments_title">Detail book a course</div>
                            <ul class="comments_list">
                            @foreach($book as $item)
                                <!-- Comment -->
                                    <li class="comment">
                                        <div class="comment_container d-flex flex-row">
                                            <div class="comment_content">
                                                <div class="comment_meta">
                                                <p>Course: {{$item->titlle}}</p>
                                                <p>Time start of course: {{$item->time_start}}</p>
                                                <p>Date end of course: {{$item->date_plan}}</p>
                                                <p>Price of course: {{$item->price}}</p>
                                                <p>Teacher: {{$item->name}}</p>
                                                <p>Email of teacher: {{$item->email}}</p>
                                                <p>Certificate of teacher: {{$item->certificate}}</p>
                                                <p>Slot registered: {{$item->slot}}</p>
                                                <p>Amount money : {{($item->slot)*($item->price)}}</p>
                                            </div>
                                        </div>

                                    </li>
                                    <div class="news_post_comments">
                                        <button style="margin-left: 20px"><a href="/course/cancel_course/{{$item->id}}">Cancel</a></button>
                                        <button style="margin-left: 40px"><a href="#">Payment</a></button>
                                    </div>



                                @endforeach

                            </ul>

                        </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Footer -->

    @extends('pc.home.footer')

</div>

<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/styles/bootstrap4/popper.js"></script>
<script src="/styles/bootstrap4/bootstrap.min.js"></script>
<script src="/plugins/greensock/TweenMax.min.js"></script>
<script src="/plugins/greensock/TimelineMax.min.js"></script>
<script src="/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="/plugins/greensock/animation.gsap.min.js"></script>
<script src="/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="/plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="/plugins/easing/easing.js"></script>
<script src="/js/news_post_custom.js"></script>

</body>
</html>