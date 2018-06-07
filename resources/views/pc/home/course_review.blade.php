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
        .text_field {
            width: 50%;
        }
        .comment_send_btn {
            width: 50%;
        }
    </style>
</head>
<body>

<div class="super_container">

    <!-- Header -->
@extends('pc.home.header')
<!-- Home -->

                    <!-- Leave Comment -->

                    <div class="leave_comment">


                        <div class="leave_comment_form_container">
                            {!! Form::model($cmt, ['url' => route('comment.confirm'), 'class' => 'form-horizontal']) !!}
                            {!! Form::hidden('course_id', $cmt->course_id) !!}
                            {!! Form::hidden('member_id', $cmt->member_id) !!}
                                <textarea id="comment_form_message" class="text_field contact_form_message" name="content" placeholder="Message" required="required" data-error="Please, write us a message." style="margin-left: 320px; margin-top: 100px;"></textarea>
                                <button id="comment_send_btn" type="submit" class="comment_send_btn trans_200" value="Submit" style="margin-left: 320px;
    margin-bottom: 100px;">send message</button>
                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>


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