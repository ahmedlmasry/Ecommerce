@extends('front.master')
@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Read the Details</p>
                        <h1>Single Article</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- single article section -->
    <div class="mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-article-section">
                        <div class="single-article-text">
                            <img src="{{url('uploads/'.$post->image)}}">
                            <p class="blog-meta">
                                <span class="author"><i class="fas fa-user"></i> Admin</span>
                                <span class="date"><i class="fas fa-calendar"></i> {{$post->created_at}}</span>
                            </p>
                            <h2>{{$post->title}}</h2>
                            <p>{{$post->content}}</p>
                        </div>
                        <div class="comments-list-wrap">
                        @include('flash::message')
                            <h3 class="comment-count-title">{{$post->comments->count()}}  Comments</h3>
                            <div class="comment-list">
                                @foreach($post->comments as $comment)
                                <div class="single-comment-body">
                                    <div class="comment-user-avater">
                                        <img src="{{url($comment->client->image)}}" alt="">
                                    </div>
                                    <div class="comment-text-body">
                                        <h5>{{$comment->client->name}}<span class="comment-date">{{$comment->created_at->format('M d, Y')}}</span></h5>
                                        <p>{{$comment->body}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="comment-template">
                            <h4>Leave a comment</h4>
                            <p>If you have a comment dont feel hesitate to send us your opinion.</p>
                            <form action="{{url('add-comment')}}" method="post">
                                @csrf
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                <p><textarea name="comment" id="comment" cols="30" rows="10" placeholder="Your Message"></textarea></p>
                                <p><input type="submit" value="Submit"></p>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-section">
                        <div class="recent-posts">
                            <h4>Recent Posts</h4>
                            @foreach($recentPosts as $recentPost)
                            <ul>
                                <li><a href="{{url('post/',$recentPost->id)}}">{{$recentPost->title}}</a></li>
                            </ul>
                            @endforeach
                        </div>
                        <div class="archive-posts">
                            <h4>Archive Posts</h4>
                            <ul>
                                <li><a href="single-news.html">JAN 2019 (5)</a></li>
                                <li><a href="single-news.html">FEB 2019 (3)</a></li>
                                <li><a href="single-news.html">MAY 2019 (4)</a></li>
                                <li><a href="single-news.html">SEP 2019 (4)</a></li>
                                <li><a href="single-news.html">DEC 2019 (3)</a></li>
                            </ul>
                        </div>
                        <div class="tag-section">
                            <h4>Tags</h4>
                            <ul>
                                <li><a href="single-news.html">Apple</a></li>
                                <li><a href="single-news.html">Strawberry</a></li>
                                <li><a href="single-news.html">BErry</a></li>
                                <li><a href="single-news.html">Orange</a></li>
                                <li><a href="single-news.html">Lemon</a></li>
                                <li><a href="single-news.html">Banana</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end single article section -->
@endsection
