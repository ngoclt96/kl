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

    <div class="home">
        <div class="home_background_container prlx_parent">
            <div class="home_background prlx" style="background-image:url(/images/news_background.jpg)"></div>
        </div>
        <div class="home_content">
            <h1>The News</h1>
        </div>
    </div>

    <!-- News -->

    <div class="news">
        <div class="container">
            <div class="row">

                <!-- News Post Column -->

                <div class="col-lg-8">
                    @foreach($detai_of_course as $item)
                    <div class="news_post_container">
                        <!-- News Post -->

                        <div class="news_post">
                            <div class="news_post_image">
                                <img src="{{$item->image}}" alt="https://unsplash.com/@dsmacinnes">
                            </div>
                            <div class="news_post_top d-flex flex-column flex-sm-row">
                                <div class="news_post_date_container">
                                    <div class="news_post_date d-flex flex-column align-items-center justify-content-center">
                                       {{$item->time_start}}
                                    </div>
                                </div>
                                <div class="news_post_title_container">
                                    <div class="news_post_title">
                                       <h2 style="color: #100e0e">{{$item->titlle}}</h2>
                                    </div>
                                    <div class="news_post_meta">
                                        <span class="news_post_author"><a href="#">{{$item->name}}</a></span>
                                        <span>|</span>
                                        <span class="news_post_comments"><a href="/course/detail/message_course/{{$item->id}}">{{$count_comment}} Comments</a></span>
                                    </div>
                                </div>
                            </div>
                            <div class="news_post_text">
                                <p> {{$item->introduce}} </p>
                            </div>

                            <div class="news_post_quote">
                                <p class="news_post_quote_text">{{$item->maxim}}</p>
                            </div>

                        </div>

                    </div>
                    <div class="news_post_comments">
                        <button><a href="/course/detail/book/{{$item->id}}">Booking</a></button>
                    </div>

                    <!-- Comments -->

                    <div >
                        <div class="comments_title">Comments</div>
                        <ul class="comments_list">
                        @foreach($comment as $cmt)
                            <!-- Comment -->
                            <li class="comment">
                                <div class="comment_container d-flex flex-row">
                                    <div>
                                        <div class="comment_image">
                                            <img src="images/comment_1.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="comment_content">
                                        <div class="comment_meta">
                                            <span class="comment_name"><a href="#">{{$cmt->name}}</a></span>
                                            <span class="comment_separator">|</span>
                                            <span class="comment_date">{{$cmt->created_at}}</span>
                                            <span class="comment_separator">|</span>
                                            <span class="comment_reply_link"><a href="/course/detail/message_course/{{$item->id}}">Reply</a></span>
                                        </div>
                                        <p class="comment_text">{{$cmt->content}}</p>
                                    </div>
                                </div>
                            </li>

                            @endforeach

                        </ul>

                    </div>
                    @endforeach

                </div>

                <!-- Sidebar Column -->

                <div class="col-lg-4">
                    <div class="sidebar">

                        <!-- Archives -->
                        <div class="sidebar_section">
                            <div class="sidebar_section_title">
                                <h3>Archives</h3>
                            </div>
                            <ul class="sidebar_list">
                                <li class="sidebar_list_item"><a href="#">Design Courses</a></li>
                                <li class="sidebar_list_item"><a href="#">All you need to know</a></li>
                                <li class="sidebar_list_item"><a href="#">Uncategorized</a></li>
                                <li class="sidebar_list_item"><a href="#">About Our Departments</a></li>
                                <li class="sidebar_list_item"><a href="#">Choose the right course</a></li>
                            </ul>
                        </div>

                        <!-- Latest Posts -->

                        <div class="sidebar_section">
                            <div class="sidebar_section_title">
                                <h3>Latest posts</h3>
                            </div>

                            <div class="latest_posts">

                                <!-- Latest Post -->
                                <div class="latest_post">
                                    <div class="latest_post_image">
                                        <img src="images/latest_1.jpg" alt="https://unsplash.com/@dsmacinnes">
                                    </div>
                                    <div class="latest_post_title"><a href="news_post.html">Why do you need a qualification?</a></div>
                                    <div class="latest_post_meta">
                                        <span class="latest_post_author"><a href="#">By Christian Smith</a></span>
                                        <span>|</span>
                                        <span class="latest_post_comments"><a href="#">3 Comments</a></span>
                                    </div>
                                </div>

                                <!-- Latest Post -->
                                <div class="latest_post">
                                    <div class="latest_post_image">
                                        <img src="images/latest_2.jpg" alt="https://unsplash.com/@erothermel">
                                    </div>
                                    <div class="latest_post_title"><a href="news_post.html">Why do you need a qualification?</a></div>
                                    <div class="latest_post_meta">
                                        <span class="latest_post_author"><a href="#">By Christian Smith</a></span>
                                        <span>|</span>
                                        <span class="latest_post_comments"><a href="#">3 Comments</a></span>
                                    </div>
                                </div>

                                <!-- Latest Post -->
                                <div class="latest_post">
                                    <div class="latest_post_image">
                                        <img src="images/latest_3.jpg" alt="https://unsplash.com/@element5digital">
                                    </div>
                                    <div class="latest_post_title"><a href="news_post.html">Why do you need a qualification?</a></div>
                                    <div class="latest_post_meta">
                                        <span class="latest_post_author"><a href="#">By Christian Smith</a></span>
                                        <span>|</span>
                                        <span class="latest_post_comments"><a href="#">3 Comments</a></span>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <!-- Tags -->

                        <div class="sidebar_section">
                            <div class="sidebar_section_title">
                                <h3>Tags</h3>
                            </div>
                            <div class="tags d-flex flex-row flex-wrap">
                                <div class="tag"><a href="#">Course</a></div>
                                <div class="tag"><a href="#">Design</a></div>
                                <div class="tag"><a href="#">FAQ</a></div>
                                <div class="tag"><a href="#">Teachers</a></div>
                                <div class="tag"><a href="#">School</a></div>
                                <div class="tag"><a href="#">Graduate</a></div>
                            </div>
                        </div>

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